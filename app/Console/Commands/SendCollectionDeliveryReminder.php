<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\CronLog;
use App\UserQuote;
use App\QuoteByTransporter;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;


class SendCollectionDeliveryReminder extends Command
{
    protected $signature = 'send:collection-delivery-reminder';
    protected $description = 'Send reminder email for collection and delivery details after deposit payment';
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }
    public function handle()
    {
        try {
            $userQuotes = UserQuote::where('user_quotes.status', 'ongoing')
            ->join('users', 'users.id', '=', 'user_quotes.user_id')
            ->select('user_quotes.*', 'users.job_email_preference')
            ->get();
            if ($userQuotes->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:collection-delivery-reminder',
                    'status' => true, // Or false based on the outcome
                    'error_message' => 'No ongoing UserQuotes found to process.' // Provide a relevant message
                ]);
                return;
            }
            $allEmailsAlreadySent = true;
            foreach ($userQuotes as $userQuote) {
                $cronStatuses = json_decode($userQuote->cron_statuses, true);
                if (!is_array($cronStatuses)) {
                    $cronStatuses = [];
                }
                if (array_key_exists('collection_delivery_reminder_sent', $cronStatuses) && $cronStatuses['collection_delivery_reminder_sent'] === true) {
                    continue; // Skip this quote as the email was already sent
                }
                $transporter_detail = QuoteByTransporter::with(['getTransporters'])->where(['user_quote_id'=> $userQuote->id, 'status'=> 'accept'])->first();
                $trans_name='-';
                if ($transporter_detail) {
                    $trans_name = $transporter_detail->getTransporters->username ?? '-';
                } 
                $allEmailsAlreadySent = false;
                try {
                    if($userQuote->job_email_preference) {
                        $maildata['email'] = $userQuote->email;
                        $maildata['user_quotes'] = $userQuote;
                        $maildata['trans_name'] = $trans_name;
                        $htmlContent = view('mail.General.collection-delivery-reminder', ['data' => $maildata])->render();
                        $this->emailService->sendEmail($maildata['email'], $htmlContent, 'Transport Any Car - Finalise your collection & delivery');
                        $cronStatuses['collection_delivery_reminder_sent'] = true;
                        $userQuote->cron_statuses = json_encode($cronStatuses);
                        $userQuote->save();
                    }

                    CronLog::create([
                        'cron_name' => 'send:collection-delivery-reminder',
                        'status' => true,
                        'error_message' => 'collection delivery email sent successfully to UserQuote ID: ' . $userQuote->id
                    ]);
                }
                catch(\Exception $ex) {
                    $cronStatuses['collection_delivery_reminder_sent'] = false;
                    $userQuote->cron_statuses = json_encode($cronStatuses);
                    $userQuote->save();
    
                    CronLog::create([
                        'cron_name' => 'send:collection-delivery-reminder',
                        'status' => false,
                        'error_message' => 'Failed to send collection delivery email to UserQuote ID: ' . $userQuote->id . '. Error: ' . $ex->getMessage()
                    ]);
                }
            }

             // If all emails were already sent, log it
            if ($allEmailsAlreadySent) {
                CronLog::create([
                    'cron_name' => 'send:collection-delivery-reminder',
                    'status' => true,
                    'error_message' => 'All ongoing UserQuotes have already sent the collection delivery email. No new emails were sent.'
                ]);
            }
        }
        catch(Exception $e) {
            CronLog::create([
                'cron_name' => 'send:collection-delivery-reminder',
                'status' => false,
                'error_message' => 'An error occurred while processing the cron job: ' . $e->getMessage()
            ]);
        }
    }
}

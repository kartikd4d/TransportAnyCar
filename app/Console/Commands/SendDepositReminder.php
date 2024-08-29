<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\CronLog;
use App\UserQuote;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;


class SendDepositReminder extends Command
{
    protected $signature = 'send:deposit-reminder';
    protected $description = 'Send deposit reminder email to users';
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }
    public function handle()
    {
        try {
            $userQuotes = UserQuote::where('user_quotes.status', 'approved')
            ->join('users', 'users.id', '=', 'user_quotes.user_id')
            ->select('user_quotes.*', 'users.job_email_preference')
            ->get();
            if ($userQuotes->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:deposit-reminder',
                    'status' => true, // Or false based on the outcome
                    'error_message' => 'No approved UserQuotes found to process.' // Provide a relevant message
                ]);
                return;
            }
            $allEmailsAlreadySent = true;
            foreach ($userQuotes as $userQuote) {
                $cronStatuses = json_decode($userQuote->cron_statuses, true);
                if (!is_array($cronStatuses)) {
                    $cronStatuses = [];
                }
                if (array_key_exists('deposit_reminder_sent', $cronStatuses) && $cronStatuses['deposit_reminder_sent'] === true) {
                    continue; // Skip this quote as the email was already sent
                }
                $allEmailsAlreadySent = false;
                try {
                    if($userQuote->job_email_preference) {
                        $maildata['email'] = $userQuote->email;
                        $maildata['user_quotes'] = $userQuote;
                        $htmlContent = view('mail.General.accepted-quote-without-payment', ['data' => $maildata])->render();
                        $this->emailService->sendEmail($maildata['email'], $htmlContent, 'Transport Any Car booking deposit reminder');
                        $cronStatuses['deposit_reminder_sent'] = true;
                        $userQuote->cron_statuses = json_encode($cronStatuses);
                        $userQuote->save();
                    }

                    CronLog::create([
                        'cron_name' => 'send:deposit-reminder',
                        'status' => true,
                        'error_message' => 'Deposit reminder email sent successfully to UserQuote ID: ' . $userQuote->id
                    ]);
                }
                catch(\Exception $ex) {
                    $cronStatuses['deposit_reminder_sent'] = false;
                    $userQuote->cron_statuses = json_encode($cronStatuses);
                    $userQuote->save();
    
                    CronLog::create([
                        'cron_name' => 'send:deposit-reminder',
                        'status' => false,
                        'error_message' => 'Failed to send deposit reminder email to UserQuote ID: ' . $userQuote->id . '. Error: ' . $ex->getMessage()
                    ]);
                }
            }

             // If all emails were already sent, log it
            if ($allEmailsAlreadySent) {
                CronLog::create([
                    'cron_name' => 'send:deposit-reminder',
                    'status' => true,
                    'error_message' => 'All approved UserQuotes have already sent the deposit reminder email. No new emails were sent.'
                ]);
            }
        }
        catch(Exception $e) {
            CronLog::create([
                'cron_name' => 'send:deposit-reminder',
                'status' => false,
                'error_message' => 'An error occurred while processing the cron job: ' . $e->getMessage()
            ]);
        }
    }
}

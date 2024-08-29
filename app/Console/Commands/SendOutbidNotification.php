<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\UserQuote;
use App\QuoteByTransporter;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;

class SendOutbidNotification extends Command
{
    protected $signature = 'send:outbid-notifications {quote_id} {transporter_payment} {transporter_id}';
    protected $description = 'Send outbid notifications to transporters';

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        try {
            $quoteId = $this->argument('quote_id');
            $transporterPayment = $this->argument('transporter_payment');

            if (empty($quoteId) || empty($transporterPayment)) {
                $this->error('Both quote_id and transporter_payment are required.');
                return 1;
            }

            $currentTransporterEmail = User::where('id', $this->argument('transporter_id'))->value('email');
            $outbidQuotes = QuoteByTransporter::with(['getTransporters']) // Eager load both relationships
            ->where('user_quote_id', $quoteId)
            ->where('transporter_payment', '>', $transporterPayment)
            ->where('outbid_notified',0)
            ->get();
            //get quote details
            $quoteDetails = UserQuote::find($quoteId);
            if ($outbidQuotes->isEmpty()) {
                $this->info('No outbid quotes found for the given quote_id and transporter_payment.');
                return 0; // Return code 0 for success but no outbids
            }
            foreach ($outbidQuotes as $existingQuote) {
                $transporterEmail = $existingQuote->getTransporters->email;
                if($transporterEmail !== $currentTransporterEmail && $existingQuote->getTransporters->outbid_email_unsubscribe == 1) {
                    $maildata['email'] = $transporterEmail;
                    $mailSubject = 'You have been outbid.';
                    $htmlContent = view('mail.General.transporter-outbid', [
                        'quote' => $quoteDetails,
                        'existingQuote' => $existingQuote,
                    ])->render();
                    $this->emailService->sendEmail($maildata['email'], $htmlContent, $mailSubject);
                    $existingQuote->outbid_notified = 1;
                    $existingQuote->save();
                }
            }

            $this->info('Outbid notifications sent successfully.');
            return 0; // Return code 0 for success

        } catch (\Exception $ex) {
            Log::error('Error in send:outbid-notifications command: ' . $ex->getMessage());
            return 2; // Return error code 2 for general failures
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CronLog;
use App\UserQuote;
use App\QuoteByTransporter;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;

class SendQuotesSummaryEmail extends Command
{
    protected $signature = 'send:quotes-summary-email';
    protected $description = 'Send quotes summary emails after 2 and 4 days of job creation';
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        try {
            $userQuotes = UserQuote::whereIn('user_quotes.status', ['pending','approved'])
            ->join('users', 'users.id', '=', 'user_quotes.user_id')
            ->select('user_quotes.*', 'users.job_email_preference')
            ->get();
            if ($userQuotes->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'send:quotes-summary-email',
                    'status' => true,
                    'error_message' => 'No pending or approved UserQuotes found to process.'
                ]);
                return;
            }

            $allEmailsAlreadySent = true;
            foreach ($userQuotes as $userQuote) {
                $cronStatuses = json_decode($userQuote->cron_statuses, true);
                if (!is_array($cronStatuses)) {
                    $cronStatuses = [];
                }

                $pendingQuotesCount = QuoteByTransporter::where('user_quote_id', $userQuote->id)
                    ->where('status', 'pending')
                    ->count();
                $daysSinceCreated = now()->diffInDays($userQuote->created_at);
                // Send the first email after 2 days
                if ($daysSinceCreated == 2 && empty($cronStatuses['first_summary_email_sent'])) {
                    if($userQuote->job_email_preference) {
                        $maildata['email'] = $userQuote->email;
                        $maildata['pendingQuotesCount'] = $pendingQuotesCount;
                        $maildata['quote'] = $userQuote;
                        $htmlContent = view('mail.General.total-quotes-recieved-notification', ['data' => $maildata])->render();
                        $this->emailService->sendEmail($maildata['email'], $htmlContent, 'Here’s a summary of quotes you’ve received so far');
                        // Update the cron status to prevent multiple emails
                        $cronStatuses['first_summary_email_sent'] = true;
                        $userQuote->cron_statuses = json_encode($cronStatuses);
                        $userQuote->save();
                    }

                    CronLog::create([
                        'cron_name' => 'send:quotes-summary-email',
                        'status' => true,
                        'error_message' => 'First summary email sent successfully to UserQuote ID: ' . $userQuote->id
                    ]);

                    $allEmailsAlreadySent = false;
                }
                // Send the second email after another 2 days (4 days from creation)
                elseif ($daysSinceCreated == 4 && empty($cronStatuses['second_summary_email_sent'])) {
                    if($userQuote->job_email_preference) {
                        $maildata['email'] = $userQuote->email;
                        $maildata['pendingQuotesCount'] = $pendingQuotesCount;
                        $maildata['quote'] = $userQuote;
                        $htmlContent = view('mail.General.total-quotes-recieved-notification', ['data' => $maildata])->render();
                        $this->emailService->sendEmail($maildata['email'], $htmlContent, 'Here’s a summary of quotes you’ve received so far');

                        // Update the cron status to prevent multiple emails
                        $cronStatuses['second_summary_email_sent'] = true;
                        $userQuote->cron_statuses = json_encode($cronStatuses);
                        $userQuote->save();
                    }

                    CronLog::create([
                        'cron_name' => 'send:quotes-summary-email',
                        'status' => true,
                        'error_message' => 'Second summary email sent successfully to UserQuote ID: ' . $userQuote->id
                    ]);

                    $allEmailsAlreadySent = false;
                }
            }

            // If all emails were already sent, log it
            if ($allEmailsAlreadySent) {
                CronLog::create([
                    'cron_name' => 'send:quotes-summary-email',
                    'status' => true,
                    'error_message' => 'All UserQuotes have already received the summary emails. No new emails were sent.'
                ]);
            }
        } catch (\Exception $e) {
            CronLog::create([
                'cron_name' => 'send:quotes-summary-email',
                'status' => false,
                'error_message' => 'An error occurred while processing the cron job: ' . $e->getMessage()
            ]);
        }
    }
}

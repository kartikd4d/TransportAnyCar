<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CronLog;
use App\UserQuote;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CheckJobStatus extends Command
{
    protected $signature = 'check:job-status';
    protected $description = 'Send a reminder after 8 days and cancel jobs after 10 days if they are not completed / ongoing.';
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        try {
            // Fetch jobs that are 8 or more days old and are still pending or approved
            $userQuotes = UserQuote::whereIn('user_quotes.status', ['pending', 'approved'])
            ->where('user_quotes.created_at', '<=', Carbon::now()->subDays(8))
            ->join('users', 'users.id', '=', 'user_quotes.user_id')
            ->select('user_quotes.*', 'users.job_email_preference')
            ->get();
            if ($userQuotes->isEmpty()) {
                CronLog::create([
                    'cron_name' => 'check:job-status',
                    'status' => true,
                    'error_message' => 'No pending or approved UserQuotes found to process.'
                ]);
                return;
            }

            foreach ($userQuotes as $userQuote) {
                if ($userQuote->status == 'canceled') {
                    continue; // Skip already canceled jobs
                }
                $daysSinceCreated = now()->diffInDays($userQuote->created_at);
                $cronStatuses = json_decode($userQuote->cron_statuses, true) ?: [];
                // Send reminder after 8 days
                if ($daysSinceCreated == 8 && empty($cronStatuses['reminder_job_status'])) {
                    if (!empty($cronStatuses['reminder_job_status'])) {
                        // Log that the email has already been sent
                        CronLog::create([
                            'cron_name' => 'check:job-status',
                            'status' => true,
                            'error_message' => 'Reminder email already sent for UserQuote ID: ' . $userQuote->id
                        ]);
                        continue; // Exit the function as no further action is needed
                    }
                    try {
                        if($userQuote->job_email_preference) {
                            $maildata['email'] = $userQuote->email;
                            $maildata['quote'] = $userQuote;
                            $maildata['subject'] = 'Your '.$userQuote->vehicle_make.' '.$userQuote->vehicle_model.' is expiring in 2 days.';
                            $htmlContent = view('mail.General.expiring-quotes', ['data' => $maildata])->render();
                            $this->emailService->sendEmail($maildata['email'], $htmlContent, $maildata['subject']);
                            $cronStatuses['reminder_job_status'] = true;
                            $userQuote->cron_statuses = json_encode($cronStatuses);
                            $userQuote->save();
                        }
    
    
                        CronLog::create([
                            'cron_name' => 'check:job-status',
                            'status' => true,
                            'error_message' => 'Reminder email sent successfully to UserQuote ID: ' . $userQuote->id
                        ]);
                    } catch (\Exception $ex) {
                        \Log::error('Error sending email to transporter',$ex->message());
                    }
                }

                // Cancel job after 10 days
                if ($daysSinceCreated >= 10 && ($userQuote->status == 'pending' || $userQuote->status == 'approved')) {
                    if($userQuote->job_email_preference) {
                        $maildata['email'] = $userQuote->email;
                        $maildata['quote'] = $userQuote;
                        $maildata['subject'] = 'Your '.$userQuote->vehicle_make.' '.$userQuote->vehicle_model.' delivery has expired.';
                        $htmlContent = view('mail.General.expired-quotes', ['data' => $maildata])->render();
                        $this->emailService->sendEmail($maildata['email'], $htmlContent, $maildata['subject']);
                    }

                    $userQuote->status = 'cancelled';
                    $userQuote->save();

                    CronLog::create([
                        'cron_name' => 'check:job-status',
                        'status' => true,
                        'error_message' => 'Job canceled successfully for UserQuote ID: ' . $userQuote->id
                    ]);
                }
            }

        } catch (\Exception $e) {
            CronLog::create([
                'cron_name' => 'check:job-status',
                'status' => false,
                'error_message' => 'An error occurred while processing the cron job: ' . $e->getMessage()
            ]);
        }
    }
}


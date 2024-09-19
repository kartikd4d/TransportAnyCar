<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Notification; // Ensure this matches your Notification model's namespace
use Illuminate\Support\Facades\Auth;
use App\UserQuote;
use Carbon\Carbon;
use App\QuoteByTransporter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                
                if ($user->type == 'car_transporter') {
                    // Get notifications and count in one go
                    $query = Notification::where('user_id', $user->id)
                    //->where('seen', 1)
                    ->where('type', '!=', 'feedback')
                    ->orderBy('created_at', 'desc');
                    $notifications = $query->get();
                    $notificationCount = $notifications->where('seen', 1)->count();
                    $totalQuotes=0;
                    $user_quote = QuoteByTransporter::where('user_id', $user->id)->pluck('user_quote_id');
                    $totalQuotes = UserQuote::with('user')
                    ->whereNotIn('id', $user_quote)
                    ->where(function($query) {
                        $query->where('status', 'pending')
                              ->orWhere('status', 'approved');
                    })
                    ->count();

                    //unseen job count
                    $lastVisitTimestamp = $user->last_visited_on_find_job_page;
                    $lastVisitTimestamp = Carbon::parse($lastVisitTimestamp);
                    $newQuotesCount = UserQuote::where('created_at', '>', $lastVisitTimestamp)
                    ->count();

                    $unseenMessageCount = Notification::where([
                        'user_id' => $user->id,
                        'seen' => 1,
                        'type' => 'message'
                    ])->count();   
                    
                    $unseenFeedback = Notification::where([
                        'user_id' => $user->id,
                        'seen' => 1,
                        'type' => 'feedback'
                    ])->count();      

                    $view->with('notifications', $notifications)
                         ->with('notificationCount', $notificationCount)
                         ->with('totalQuotes', $totalQuotes)
                         ->with('newQuotesCount', $newQuotesCount)
                         ->with('unseenMessageCount', $unseenMessageCount)
                         ->with('unseenFeedback',$unseenFeedback);
                } else {
                    // Get notifications and count in one go
                    $query = Notification::where(['user_id' => $user->id])
                        ->orderBy('created_at', 'desc');
                    $notifications = $query->get();
                    $notificationCount = $notifications->where('seen', 1)->count();

                    $unseenMessageCount = Notification::where([
                        'user_id' => $user->id,
                        'seen' => 1,
                        'type' => 'message'
                    ])->count(); 
                    
                    $quoteIds = UserQuote::where('user_id', $user->id)->pluck('id');
                    $quotationCounts = QuoteByTransporter::whereIn('user_quote_id', $quoteIds)
                    ->where('status', 'pending')
                    ->count();

                    $view->with('notifications', $notifications)
                         ->with('notificationCount', $notificationCount)
                         ->with('unseenMessageCount', $unseenMessageCount)
                         ->with('quotationCounts', $quotationCounts);



                }
            }
        });
        
    }
}

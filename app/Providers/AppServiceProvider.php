<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Notification; // Ensure this matches your Notification model's namespace
use Illuminate\Support\Facades\Auth;

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
                if ($user->type == 'car_transporter')
                {

                    $notifications = Notification::where(function ($query) use ($user) {
                        $query->where('user_id_to', $user->id)
                        ->orWhere('type', 'quote');
                    })
                    ->where('status', 0)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

                    $notificationCount = Notification::where(function ($query) use ($user) {
                        $query->where('user_id_to', $user->id)
                        ->orWhere('type', 'quote');
                    })
                    ->where('status', 0)
                    ->count();

                    $view->with('notifications', $notifications)
                    ->with('notificationCount', $notificationCount);
                    
                }else{
                    $user = Auth::user();
                    $notifications = Notification::where('user_id_to', $user->id)
                    ->where('status', 0)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
                    $notificationCount = Notification::where('user_id_to', $user->id)
                    ->where('status', 0)
                    ->count();
                    $view->with('notifications', $notifications)
                    ->with('notificationCount', $notificationCount);
                }
            }
        });
    }
}

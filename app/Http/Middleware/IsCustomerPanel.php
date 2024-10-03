<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCustomerPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $valid_type = ['user'];
        $current_route = $request->route()->getName();
        $user = Auth::guard("web")->user();
        if (!$user) {
            return redirect()->route('front.login');
        } elseif (in_array($user->type, ['user'])) {
            if ($user->status == "inactive") {
                Auth::logout(); // Ensure the user is logged out
                return redirect()->route('front.login')->withErrors(['general' => 'Your account has been disabled, kindly contact the admin.']);
            }else {
                return $next($request);
            }
        } else {
            return redirect()->route(getDashboardRouteName('web'));
        }
    }
}

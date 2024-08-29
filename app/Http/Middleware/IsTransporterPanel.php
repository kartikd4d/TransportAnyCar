<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsTransporterPanel
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
        $user = Auth::guard("transporter")->user();
        if (!$user) {
            return redirect()->route('transporter.login');
        } elseif (in_array($user->type, ['car_transporter'])) {
            if ($user->status == "inactive") {
                Auth::logout(); // Ensure the user is logged out
                return redirect()->route('transporter.login')->withErrors(['general' => 'You have been permanently banned.']);
            } else {
                return $next($request);
            }
        } else {
            return redirect()->route(getDashboardRouteName('transporter'));
        }
    }
}

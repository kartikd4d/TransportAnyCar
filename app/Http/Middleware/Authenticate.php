<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard = 'web')
    {
        if (! $request->expectsJson()) {
            if (!Auth::guard('transporter')->check() && $request->segment(1) == 'transporter' || $request->segment(3) == 'transporter') {
                // Store the 'share_quotation' parameter in the session if it exists
                $shareQuotation = $request->query('share_quotation');
                if ($shareQuotation !== null) {
                    $request->session()->put('share_quotation', $shareQuotation);
                }
                return route('transporter.login');
            } else  if (!Auth::guard('admin')->check() && $request->segment(1) == 'admin' || $request->segment(3) == 'admin') {
                return route('admin.login');
            } else  if (!Auth::guard('web')->check() && $guard == 'web') {
                return route('front.login');
            }
        }
    }
}

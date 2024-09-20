<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User; // Import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function loginAsTransporter($transporterId)
    {
       // Find the user by ID
        $user = User::findOrFail($transporterId);

        // Log in the admin as the user using the transporter guard
        Auth::guard('transporter')->login($user);

        // Log a message to indicate successful login

        // Redirect to transporter dashboard
        return redirect()->route('transporter.dashboard');
    }
}



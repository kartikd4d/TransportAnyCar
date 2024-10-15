<?php

namespace App\Http\Controllers\Api\V1;

use App\DeviceToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Services\EmailService;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Mail;



class MailController extends ResponseController
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function sendEmail(Request $request)
    {
        $validation = $this->apiValidation([
            'email' => 'required|email',
            'template' => 'required|string',
            'user' => 'required|array'
        ]);
        if (!$validation) {
            return $this->sendError(null, null);
        }
        try {
            $htmlContent = view($request->template, ['user' => $request->user])->render();
            $this->emailService->sendEmail($request->email, $htmlContent, $request->subject); // Corrected variable name
            return $this->sendResponse(200, 'Email sent successfully.');
        } catch (\Exception $ex) {
            return $this->sendError('Email could not be sent.', null);
        }
    }

    public function transporterEmailVerify(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'user' => 'required|array',
            'user.first_name' => 'required|string',
            'user.name' => 'required|string',
            'user.username' => 'required|string',
        ]);

        // Find the user by the provided email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Generate an email verification token
        $user->email_verification_token = Str::random(32);
        $user->save();

        // Prepare the email data
        $mailData = [
            'user' => $user,
            'first_name' => $request->user['first_name'],
            'name' => $request->user['name'],
            'username' => $request->user['username'],
            'verification_link' => route('verify.email', $user->email_verification_token),
        ];

        // Send the email
        Mail::send($request->template, $mailData, function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Verify Your Email Address');
        });

        return response()->json(['message' => 'Verification email sent successfully.']);
    }

    public function verifyEmail($token)
    {
        // Find the user by the verification token
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }

        // Mark the email as verified
        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return redirect('/')->with('success', 'Your email has been verified.');
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\DeviceToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log; 
use App\Services\EmailService;

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
            $htmlContent = view($request->template,['user'=> $request->user])->render();
            $this->emailService->sendEmail($request->email, $htmlContent, $request->subject); // Corrected variable name
            return $this->sendResponse(200, 'Email sent successfully.');
        } catch (\Exception $ex) {
            return $this->sendError('Email could not be sent.', null);
        }
    }

}
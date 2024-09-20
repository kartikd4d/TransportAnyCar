<?php
namespace App\Services;

use App\GeneralSettings;
use Illuminate\Support\Facades\Log;

class EmailService
{
    protected $apiKey;
    protected $fromEmail;
    protected $fromName;

    public function __construct()
    {
        $this->apiKey = GeneralSettings::where('unique_name', 'smtp_http_api')->value('value');
        $this->fromEmail = GeneralSettings::where('unique_name', 'from_email')->value('value');
        $this->fromName = GeneralSettings::where('unique_name', 'from_name')->value('value');
    }

    public function sendEmail($toEmail, $htmlContent, $subject)
    {
        $data = [
            'key' => $this->apiKey,
            'message' => [
                'html' => $htmlContent,
                'subject' => $subject,
                'from_email' => $this->fromEmail,
                'from_name' => $this->fromName,
                'to' => [
                    [
                        'email' => $toEmail,
                        'type' => 'to'
                    ]
                ]
            ]
        ];
        $ch = curl_init('https://mandrillapp.com/api/1.0/messages/send.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            Log::error('Curl error: ' . $error);
            return ['status' => false, 'message' => 'Curl error: ' . $error];
        }

        Log::info('Email sent successfully. Mandrill response: ' . $response);
        return ['status' => true, 'message' => 'Email sent successfully. Mandrill response: ' . $response];
    }
}

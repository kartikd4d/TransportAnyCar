<?php

namespace App\Services;

class MandrillService
{
    protected $apiKey;
    protected $fromEmail;
    protected $fromName;

    public function __construct()
    {
        $this->apiKey ='md-Tt0ssydK1LD5mXyi44jmSw';
        $this->fromEmail ='info@transportanycar.com';
        $this->fromName ='Transportanycar';
    }

    public function sendEmail($toEmail, $subject, $htmlContent)
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
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        } else {
            return 'Response:' . $response;
        }
        curl_close($ch);
    }
}

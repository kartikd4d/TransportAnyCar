<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Quote_email_send extends Command
{
    
    protected $signature = 'send:quote_email_sent';
    protected $description = 'Send an email every minute';

    public function handle()
    {

        $emails = DB::table('users')
        ->where('status', 'active')
        ->where('type', 'car_transporter')
        ->where('is_status','approved')
        ->where('job_email_preference',1)
        ->pluck('email');

        $toEmails = $emails->map(function($email) {
        return ['email' => $email, 'type' => 'to'];
        })->toArray();
        

        // $toEmails = [
        //     ['email' => 'info@transportanycar.com', 'type' => 'to'],
        //     ['email' => 'tonyphillips123@live.co.uk', 'type' => 'to'],
        //     ['email'=> 'hello@tonyjamesphillips.com','type'=>'to'],
        //     ['email'=> 'info@scrapanycar.co.uk','type'=>'to']
        // ];

        $quotes = DB::table('user_quotes')
        ->where('email_sent', 0)
        ->orderBy('id', 'asc')
        ->get();
        
        foreach ($quotes as $quote) {
            $quote->id;
            $mailData = [
                'id' => $quote->id,
                'vehicle_make' => $quote->vehicle_make,
                'vehicle_model' => $quote->vehicle_model,
                'vehicle_make_1' => $quote->vehicle_make_1,
                'vehicle_model_1' => $quote->vehicle_model_1,
                'pickup_postcode' => formatAddress($quote->pickup_postcode),
                'drop_postcode' => formatAddress($quote->drop_postcode),
                'delivery_timeframe_from' => isset($quote->delivery_timeframe_from) ? $quote->delivery_timeframe_from : null,
                'starts_drives' => $quote->starts_drives == 1 ? 'Yes' : 'No',
                'starts_drives_1' => $quote->starts_drives_1,
                'how_moved' => $quote->how_moved,
                'distance' => $quote->distance,
                'duration' => $quote->duration,
                'map_image' => $quote->map_image,
                'delivery_timeframe' => $quote->delivery_timeframe
            ]; 

            try {
                $htmlContent = view('mail.General.transporter-new-job-received', ['quote' => $mailData])->render();

                $subject='You have received a transport notification';
                $this->new_email_send($toEmails,$subject,$htmlContent);
            } catch (\Exception $ex) {
                \Log::error('Error sending email to transporter');
            }

            DB::table('user_quotes')
            ->where('id', $quote->id)
            ->update(['email_sent' => 1]);
        }
    }

    public function new_email_send($toEmails,$subject,$htmlContent){

        $apiKey='md-Tt0ssydK1LD5mXyi44jmSw';
        $fromName='Transport Any Car';
        $fromEmail='info@transportanycar.com';
        //$htmlContent='';
        $data = [
            'key' =>$apiKey,
            'message' => [
                'html' => $htmlContent,
                'subject' => $subject,
                'from_email' =>$fromEmail,
                'from_name' =>$fromName,
                'to' => $toEmails
            ]
        ];
        
        $test=json_encode($data);
        
        \Log::info($test);

        $ch = curl_init('https://mandrillapp.com/api/1.0/messages/send.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            echo 'Response:' . $response;
        }
        curl_close($ch);
        return $response;

    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MandrillService;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    protected $mandrillService;

    public function __construct(MandrillService $mandrillService)
    {
        $this->mandrillService = $mandrillService;
    }
    public function sendTestEmail()
    {
       $emails = DB::table('users')
        ->where('status', 'active')
        ->where('type', 'car_transporter')
        ->where('is_status','approved')
        ->pluck('email');

        $toEmails = $emails->map(function($email) {
        return ['email' => $email, 'type' => 'to'];
        })->toArray();
        
        echo json_encode($toEmails);
       
    }
}

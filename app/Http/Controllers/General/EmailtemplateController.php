<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Emailtemplate;
use App\Services\EmailService;

class EmailtemplateController extends Controller
{
     protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function showForm()
    {
        $emailTemplates = EmailTemplate::all();
        $title = 'Email template';
        return view('admin.general.email_template', [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                $title => route('admin.email_template'),
            ]),
        ],
        compact('emailTemplates')
    );
    }

    public function getEmailTemplate(Request $request)
    {
        $template = EmailTemplate::find($request->id);
        return response()->json([
            'subject' => $template->subject,
            'body' => $template->body,
        ]);
    }
    public function sendtestEmailTemplate(Request $request)
    {
        $template = EmailTemplate::find($request->id);
        $to=$request->test_email_to;
        $subject=$request->subject;
        $body=$request->body;
        $htmlContent = view('mail.email_content', ['body' => $body])->render();
        $response = $this->emailService->sendEmail($to, $htmlContent, $subject);
        return $response;

    }
    

    public function update_email_template(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        $emailTemplate = EmailTemplate::findOrFail($id);
        $emailTemplate->subject = $request->input('subject');
        $emailTemplate->body = $request->input('body');
        $emailTemplate->save();
        return response()->json(['message' => 'Email template updated successfully']);
    }
}

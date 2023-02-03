<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SentEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use PDF;

class EmailController extends Controller
{

    public function DisplayPage()
    {
        $activeUserId = session('activeUserID');
        $userDetails = \App\Models\User::where('id', $activeUserId)->first();
        // var_dump($userDetails);
        return view('finalPage', compact('userDetails'));
    }

    public function pdfPage()
    {
        $MealDetails = \App\Models\User::where('id', $data['userId'])->first();

        exit;
        $pdf = PDF::loadview('mail.email-template', [
            'name' => 'salo'
        ]);
        $pdf->setOptions([
            'footer-center' => 'Optimum'
        ]);
         $pdfFilePath = public_path('pdf/'.uniqid().'.pdf');
         $pdf->save($pdfFilePath);
    }

    public function emailLogic(Request $request)
    {
        $data = $request->all();
        $userDetails = \App\Models\User::where('id', $data['userId'])->first();
        // var_dump($userDetails);
        // exit;
        if ($this->isOnline()) {
            $mail_data = [
                // 'reciever' => $userDetails['email'], this is the correct path when domain is ready
                'reciever' => 'sunmolasolomon@gmail.com',
                'from' => 'solomon@testing.com',
                'fromName' => 'Salo',
                'recieverName' => $userDetails['name'],

            ];
            // Mail::send('mail/email-template', $mail_data, function($message) use($mail_data){
            //     $message->to($mail_data['reciever'])
            //             ->from($mail_data['from'], $mail_data['fromName'])
            //             ->subject($mail_data['subject']);
            // });
            $file_path = public_path('favicon.ico');
            $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName'], $file_path));;
            if ($sent) {
                return "Email has been sent successfully.";
            }
            return "Oops! There was some error sending the email.";
        } else {
        }
    }

    public function isOnline($site = "https://youtube.com")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}

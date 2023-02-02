<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SentEmail;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{

    public function DisplayPage()
    {
        $activeUserId = session('activeUserID');
        $userDetails = \App\Models\User::where('id', $activeUserId)->first();
        // var_dump($userDetails);
        return view('finalPage',compact('userDetails'));
    }
   
    public function emailLogic(Request $request)
    {
        $data = $request->all();
        var_dump($data);
        // $userDetails = \App\Models\User::where('email',$data['best_email'])->first();
        exit;
        if ($this->isOnline()) {
            $mail_data = [
                'reciever' => $request->best_email,
                'from' => 'solomon@testing.com',
                'fromName' => 'Salo',
                'recieverName' => $request->best_name,
                'subject' => "Testing Gmail Testing"

            ];
            // Mail::send('mail/email-template', $mail_data, function($message) use($mail_data){
            //     $message->to($mail_data['reciever'])
            //             ->from($mail_data['from'], $mail_data['fromName'])
            //             ->subject($mail_data['subject']);
            // });
            $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName']));;
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

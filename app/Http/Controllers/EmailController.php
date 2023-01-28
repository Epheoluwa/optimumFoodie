<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SentEmail;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
   
    public function emailLogic(Request $request)
    {
        $data = $request->all();
        var_dump($data);
        $emailwa = \App\Models\User::where('email',$data['best_email'])->first();
        if ($emailwa) {
            if ($emailwa['status']== 'paid') {
               var_dump('paid user');
            }else{
                var_dump('not paid user');
            }
        }else{
            var_dump('NEW USER CREATE AND ACCOUNT');
            //Create new user account and send mail
            $userData = [
                'email' => $data['best_email'],
                'name' => $data['best_name'],
                'status' => 'free',
                'password' => 123456
            ];
            $update = \App\Models\User::create($userData);
            var_dump($update);
        }
        exit;
        if ($this->isOnline()) {
            $mail_data = [
                'reciever' => $request->best_email,
                'from' => 'solomon@testing.com',
                'fromName' => 'Salo',
                'recieverName' => $request->best_name,
                'subject' => "Testing Gmail Tessting"

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

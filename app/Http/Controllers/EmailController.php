<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SentEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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
        $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal')->where('user_id', 1)->limit(2)->get();
        // return view('free-time-table', compact('MealDetails'));
        // exit;
        $pdf = PDF::loadview('free-time-table', compact('MealDetails'));
        $pdf->setOptions([
            'footer-center' => 'Optimum'
        ]);
         $pdfFilePath = public_path('pdf/'.uniqid().'.pdf');
        $pdfdone = $pdf->save($pdfFilePath);
        if ($pdfdone) {
            echo 'yes';
        }else{
            echo 'no';
        }
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

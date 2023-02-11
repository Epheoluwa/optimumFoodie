<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function planview()
    {
        $userID = session('activeUserID');
        $userDetails = \App\Models\User::where('id', $userID)->first();
        return view('payment/plans', compact('userDetails'));
    }

    public function verify($reference)
    {
        $SECRET_KEY = "sk_test_6a0c12072149e974efc7e2bd50efc49fc79ad1ef";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            //ADD THIS PART IF WORKING ON LOCALHOPST REMOVE IN LIVE URL
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            //ENDS HERE
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $main_response = json_decode($response);
        // var_dump($main_response);

        //save payment data
        $CustEmail = $main_response->data->customer->email;
        $userDetails = \App\Models\User::where('email', $CustEmail)->first();
        // $paymentUserId = $userDetails['id'];
        // $paymentStatus = $main_response->status;
        // $paymentReference = $main_response->data->reference;
        // $paymentId = $main_response->data->id;
        // $paymentAmount = $main_response->data->amount / 100;

        

        // $paymentCustPaystackId = $main_response->data->customer->id;
        // $paymentCustCode= $main_response->data->customer->customer_code;
        $paymentDate = $main_response->data->paid_at;
        $date = Carbon::parse($paymentDate)->format('Y-m-d H:i:s');
        $paymentDetails = [
            'user_id' => $userDetails['id'],
            'status' => $main_response->status,
            'reference' => $main_response->data->reference,
            'payment_id' => $main_response->data->id,
            'amount' => $main_response->data->amount / 100,
            'payment_date' => $date,
            'paystack_cust_id' => $main_response->data->customer->id,
            'cust_code' => $main_response->data->customer->customer_code
        ];
        $save = \App\Models\Payment::create($paymentDetails);
        if($save)
        {
            echo true;
        }
        
        // return [$main_response];
    }
}

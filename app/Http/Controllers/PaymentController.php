<?php

namespace App\Http\Controllers;

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
        var_dump($main_response);

        //save payment data
        $CustEmail = $main_response->data->customer->email;
        $userDetails = \App\Models\User::where('email', $CustEmail)->first();
        $paymentUserId = $userDetails['id'];
        $paymentStatus = $main_response->status;
        $paymentReference = $main_response->data->reference;
        $paymentId = $main_response->data->id;
        $paymentAmount = $main_response->data->amount / 100;
        $paymentDate = $main_response->data->paid_at;
        $paymentCustPaystackId = $main_response->data->customer->id;
        $paymentCustCode= $main_response->data->customer->customer_code;
        
        // return [$main_response];
    }
}

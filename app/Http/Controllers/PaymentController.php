<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Mail\SentEmail;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;


class PaymentController extends Controller
{

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
        if ($save) {

            $paidUser = \App\Models\User::where('id', $paymentDetails['user_id'])->first();
            //send email to admin about new paid user nneeding approval
            $user = 'solomonepheoluwa@gmail.com';
            $sent = Mail::to($user)->send(new Notification($paidUser['name'], $paidUser['email']));;

            //update user to paid user
            \App\Models\User::where('id', $paymentDetails['user_id'])->update(array('status' => 'paid'));
            // Delete old and generate new pdf file and send to user mail.
            $file_path = public_path('pdf/' . $userDetails['id'] . $userDetails['name'] . '.pdf');
            if(file_exists($file_path))
            {
                unlink($file_path);
            }
            //     //Generate pdf
            //     //generate pdf and display for paid user
            //     $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'month_par', 'food_options', 'calories', 'main_meal', 'snack_meal','weight_aim', 'calories', 'weight_time_aim')->where('user_id', $userDetails['id'])->get();
            //     foreach ($MealDetails as $meals) {
            //         $mealsss = $meals->main_meal;
            //         $snack = $meals->snack_meal;
            //         $calories = $meals->calories;
            //         $food_options = $meals->food_options;
            //     }
            //     $options_food = array();
            //     $recipes = array();
            //     $rough = array();
            //     $food_options = json_decode($food_options);
            //     foreach ($food_options as $food) {
            //         $onje = str_replace(['[', ']'], '', $food);
            //         array_push($options_food, $onje);
            //     }
            //     $mealTem = $mealsss . 'meal' . ' ' . $snack . 'snacks';
            //     $calTem = $calories . 'cal ' . $mealTem;
        
            //     foreach ($options_food as $key => $foods) {
            //         $v = \App\Models\FoodRecipe::select('food_id', 'recipe_id')->where('calory_template_type_id', $calTem)->get();
            //         foreach ($v as $new) {
            //             if (in_array($foods, $new['food_id'])) {
            //                 array_push($rough, $new['recipe_id']);
            //             }
            //         }
            //     }
            //     $recipes = array_unique($rough);

            //     $pdf = PDF::loadview('time-table', compact('MealDetails', 'userDetails','recipes'));
            //     $pdf->setOptions([
            //         'footer-html' => view('pdf.footer')
            //     ]);
            //     $pdfFilePath = public_path('pdf/' . $userDetails['id'] . $userDetails['name'] . '.pdf');
            //     $pdf->save($pdfFilePath);

            //     //send email
            //     if ($this->isOnline()) {
            //         $mail_data = [
            //             'reciever' => $userDetails['email'], //chnage this to the correct user email after live
            //             'from' => 'solomon@testing.com',
            //             'fromName' => 'Salo',
            //             'recieverName' => $userDetails['name'],
    
            //         ];
            //         $file_path = public_path('pdf/' . $userDetails['id'] . $userDetails['name'] . '.pdf');
            //         $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName'], $file_path,  $userDetails['email']));;
            //     } else {
            //         return "Please turn on mobile date or connect to a wifi to continue.";
            //     }
         
        }
        // var_dump($main_response->status);
        return $main_response->status;
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

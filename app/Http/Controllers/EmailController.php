<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SentEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class EmailController extends Controller
{

    public function DisplayPage()
    {
        if (Auth::user()) {
            $activeUserId = Auth::user()->id;
        } else {
            $activeUserId = session('activeUserID');
        }
        if ($activeUserId == '') {
            return redirect('/');
        }
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
            'footer-html' => view('pdf.footer')
        ]);
        $pdfFilePath = public_path('pdf/' . uniqid() . '.pdf');
        $pdfdone = $pdf->save($pdfFilePath);
        if ($pdfdone) {
            echo 'yes';
        } else {
            echo 'no';
        }
    }

    public function emailLogic(Request $request)
    {
        //This Logic here can always be improved very basic and bad approach here though
        $data = $request->all();
        $userDetails = \App\Models\User::where('id', $data['userId'])->first();

        // var_dump($userDetails->UserMealPlan);
        $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'food_options', 'calories', 'main_meal', 'snack_meal','weight_aim', 'calories', 'weight_time_aim')->where('user_id', $data['userId'])->limit(2)->get();
        // return view('free-time-table', compact('MealDetails', 'userDetails'));
        $presentYear = date("Y");
      

        foreach ($MealDetails as $meals) {
            $mealsss = $meals->main_meal;
            $snack = $meals->snack_meal;
            $calories = $meals->calories;
            $food_options = $meals->food_options;
        }
        $options_food = array();
        $recipes = array();
        $rough = array();
        $initialSnack = array();
        $roughSnack = array();
        $snackMain = array();
        $food_options = json_decode($food_options);
        foreach ($food_options as $food) {
            $onje = str_replace(['[', ']'], '', $food);
            array_push($options_food, $onje);
        }
        $mealTem = $mealsss . 'meal' . ' ' . $snack . 'snacks';
        $calTem = $calories . 'cal ' . $mealTem;


        $snk = \App\Models\Snack::get();
        foreach($snk as $sskid)
        {
            if(in_array($calTem, $sskid['template']))
            {
                $initialSnack[] = $sskid['snack'];
                // array_push($initialSnack, $sskid['snack']);
                // var_dump($sskid['snack']);
            }
        }
        $roughSnack = $initialSnack[0];

        foreach ($options_food as $key => $foods) {
         
            $v = \App\Models\FoodRecipe::select('food_id', 'recipe_id')->where('calory_template_type_id', $calTem)->get();
            foreach ($v as $new) {
                if (in_array($foods, $new['food_id'])) {
                    $re = \App\Models\Recipe::select('recipe')->where('id',  $new['recipe_id'])->get();
                    array_push($rough, $re);
                }
            }

            foreach($roughSnack as $getsnk)
            {
                if(str_contains($getsnk, $foods))
                {
                   array_push($snackMain, $getsnk);
                }
          
                
            }
        }
        
        $recipesTo = array_unique($rough);
        foreach($recipesTo as $rec)
        {
            foreach($rec as $r)
            {
                $newr = explode("|", $r['recipe']);
                $recipes = $newr;
            } 
        }

        // return view('free-time-table', compact('MealDetails', 'userDetails', 'recipes', 'snackMain'));
        // exit;

        if ($data['cusType'] == 'free') {
            $file_path = public_path('pdf/'  . $userDetails['name'] . $data['userId']. '.pdf');

            if (!file_exists($file_path)) {
                $pdf = PDF::loadview('free-time-table', compact('MealDetails', 'userDetails', 'recipes', 'snackMain'));
                $pdf->setOptions([
                    'footer-html' => view('pdf.footer')
                    // 'footer-center' => 'Copyright Optimum Foodie ' . $presentYear
                ]);
                $pdfFilePath = public_path('pdf/' . $userDetails['name'] .  $data['userId'] .'.pdf');
                $pdf->save($pdfFilePath);
            }

            if ($this->isOnline()) {
                $mail_data = [
                    'reciever' => $userDetails['email'],
                    'from' => 'Optimumfoodie@gmail.com',
                    'fromName' => 'Optimum Foodie',
                    'recieverName' => $userDetails['name'],

                ];
                $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName'], $file_path, $userDetails['email']));;
                if ($sent) {
                    $notifcation = array(
                        'message' => 'Mean Plan has been sent to your email successfully! ',
                        'time' => 'second',
                        'alert' => 'success'
                    );
                    return back()->with($notifcation);
                } else {
                    $notifcation = array(
                        'message' => 'Seems to be an error when sending meal plan ',
                        'time' => 'second',
                        'alert' => 'danger'
                    );
                    return back()->with($notifcation);
                }
            } else {
                $notifcation = array(
                    'message' => 'Please turn on mobile date or connect to a wifi to continue ',
                    'time' => 'second',
                    'alert' => 'danger'
                );
                return back()->with($notifcation);
            }
        } else {

            // $pdf = PDF::loadview('free-time-table', compact('MealDetails', 'userDetails'));
            // $pdf->setOptions([
            //     'footer-center' => 'Optimum'
            // ]);
            // return $pdf->inline();
            $file_path = public_path('pdf/'  . $userDetails['name'] .  $data['userId'] .'.pdf');

          
            if(file_exists($file_path))
            {
             
                if ($this->isOnline()) {
                    $mail_data = [
                        'reciever' => $userDetails['email'],
                        'from' => 'Optimumfoodie@gmail.com',
                        'fromName' => 'Optimum Foodie',
                        'recieverName' => $userDetails['name'],
    
                    ];
                    $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName'], $file_path, $userDetails['email']));;
                }

                return back();
            }else{
                echo "Please wait..... Your meal Plan need Final Approval";
            }
            
            // generate pdf and display for paid user
            // $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'month_par', 'food_options', 'calories', 'main_meal', 'snack_meal','weight_aim', 'calories', 'weight_time_aim')->where('user_id', $data['userId'])->get();

            // $pdf = PDF::loadview('time-table', compact('MealDetails', 'userDetails', 'recipes'));
            // $pdf->setOptions([
            //     'footer-html' => view('pdf.footer')
            //     // 'footer-center' => 'Copyright Optimum Foodie ' . $presentYear,
            //     // 'footer-line' => true
            // ]);
            // return $pdf->inline();
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

    private function float2rat($n, $tolerance = 1.e-6)
    {
        $h1 = 1;
        $h2 = 0;
        $k1 = 0;
        $k2 = 1;
        $b = 1 / $n;
        do {
            $b = 1 / $b;
            $a = floor($b);
            $aux = $h1;
            $h1 = $a * $h1 + $h2;
            $h2 = $aux;
            $aux = $k1;
            $k1 = $a * $k1 + $k2;
            $k2 = $aux;
            $b = $b - $a;
        } while (abs($n - $h1 / $k1) > $n * $tolerance);

        return "$h1/$k1";
    }
}

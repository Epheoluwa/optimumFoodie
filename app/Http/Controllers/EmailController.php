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
            'footer-center' => 'Optimum'
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
        $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'food_options', 'calories', 'main_meal', 'snack_meal')->where('user_id', $data['userId'])->limit(2)->get();
        // return view('free-time-table', compact('MealDetails', 'userDetails'));
        $presentYear = date("Y");

        // var_dump($MealDetails);

        foreach ($MealDetails as $meals) {
            $mealsss = $meals->main_meal;
            $snack = $meals->snack_meal;
            $calories = $meals->calories;
            $food_options = $meals->food_options;
        }
        $options_food = array();
        $recipes = array();
        $rough = array();
        $food_options = json_decode($food_options);
        foreach ($food_options as $food) {
            $onje = str_replace(['[', ']'], '', $food);
            array_push($options_food, $onje);
        }
        $mealTem = $mealsss . 'meal' . ' ' . $snack . 'snacks';
        $calTem = $calories . 'cal ' . $mealTem;

        foreach ($options_food as $key => $foods) {
            // $v = \App\Models\FoodRecipe::where('foods.name', $foods)->where('calory_template_types.template_name', $mealTem)->where('calory_template_types.calory', $calories)->join('recipes', 'food_recipes.recipe_id', '=', 'recipes.id')->join('calory_template_types', 'food_recipes.calory_template_type_id', '=', 'calory_template_types.id')->join('foods', 'food_recipes.food_id', '=', 'foods.id')->select('recipes.recipe')->get();
            // echo $foods;
            $v = \App\Models\FoodRecipe::select('food_id','recipe_id')->where('calory_template_type_id', $calTem)->get();
            foreach ($v as $new) {
                if (in_array($foods, $new['food_id'])) {
                    array_push($rough, $new['recipe_id']);
                }
            }
            // if($v->count() !== 0){
            //     array_push($recipes, $v);
            // }
            // var_dump($v);
        }

        $recipes = array_unique($rough);
     
        // return view('free-time-table', compact('MealDetails', 'userDetails', 'recipes'));

        if ($data['cusType'] == 'free') {
            $file_path = public_path('pdf/' . $data['userId'] . $userDetails['name'] . '.pdf');

            if (!file_exists($file_path)) {
                $pdf = PDF::loadview('free-time-table', compact('MealDetails', 'userDetails', 'recipes'));
                $pdf->setOptions([
                    'footer-center' => 'Copyright Optimum Foodie ' . $presentYear
                ]);
                $pdfFilePath = public_path('pdf/' . $data['userId'] . $userDetails['name'] . '.pdf');
                $pdf->save($pdfFilePath);
            }

            if ($this->isOnline()) {
                $mail_data = [
                    'reciever' => $userDetails['email'],
                    // 'reciever' => 'solomonepheoluwa@gmail.com',
                    'from' => 'solomon@testing.com',
                    'fromName' => 'Salo',
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

            //generate pdf and display for paid user
            $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'month_par', 'food_options', 'calories', 'main_meal', 'snack_meal')->where('user_id', $data['userId'])->get();

            $pdf = PDF::loadview('time-table', compact('MealDetails', 'userDetails', 'recipes'));
            $pdf->setOptions([
                'footer-center' => 'Copyright Optimum Foodie ' . $presentYear
            ]);
            return $pdf->inline();
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

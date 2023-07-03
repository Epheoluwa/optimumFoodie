<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Mail\SentEmail;
use Illuminate\Support\Facades\Mail;
use App\Exports\ExportUsers;
use App\Models\Product;
use App\Models\User;
use App\Models\UserMealPlan;
use Excel;

class UserController extends Controller
{
    public function usersAdd()
    {
        $data['user'] = \App\Models\User::all();

        // $MealDetails = \App\Models\UserMealPlan::select('days','user_id', 'daymeal', 'month_par', 'food_options', 'calories', 'main_meal', 'snack_meal', 'email', 'sex','age', 'height', 'weight')->join('users', 'user_meal_plans.user_id', '=', 'users.id')->get();
        $data['mealUserid'] = \App\Models\UserMealPlan::select('user_id')->get();

        // exit;
        return view('backend.new-user', $data);
    }

    public function Addnewusers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data = $request->all();
        $words = explode(" ", $data['name']);
        $password = $words[0];
        $userdetails = [
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'password' => bcrypt($password),
        ];

        $update = \App\Models\User::create($userdetails);

        if ($update) {
            $mail_data = [
                'reciever' => $userdetails['email'],
                'from' => 'Optimumfoodie@gmail.com',
                'fromName' => 'Optimum Foodie',
                'recieverName' => $userdetails['name'],

            ];
            $sent = Mail::to($mail_data['reciever'])->send(new NewUser($mail_data['recieverName'], $userdetails['email']));;
            \Session::flash('success', 'User created successfully!');

            return redirect()->back();
        }
    }

    public function Editusers(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $update = \App\Models\User::whereId($id)->update($request->except('_token'));
        \Session::flash('success', 'User updated successfully!');

        return redirect()->back();
    }

    public function suggest()
    {
        $data['suggest'] = \App\Models\Suggestion::all();
        return view('backend.suggestion', $data);
    }

    public function AdminPreviewuserMeal($id)
    {

        $presentYear = date("Y");
        $userDetails = \App\Models\User::where('id', $id)->first();
        $file_path = public_path('pdf/' . 'Customised Meal Plan -' .  $userDetails['email'] . '.pdf');
        // if ($file_path) {
        //     return PDF::loadfile($file_path)->inline();
        // }
        //generate pdf and display for paid user
        $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'month_par', 'food_options', 'calories', 'main_meal', 'snack_meal', 'weight_aim', 'calories', 'weight_time_aim')->where('user_id', $id)->get();

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

        foreach ($snk as $sskid) {

            if (in_array($calTem, $sskid['template'])) {

                $initialSnack[] = $sskid['snack'];
                // array_push($initialSnack, $sskid['snack']);
                // var_dump($sskid['snack']);
            }
        }

        $roughSnack = count($initialSnack) > 0 ? $initialSnack[0] : [];

        foreach ($options_food as $key => $foods) {
            $v = \App\Models\FoodRecipe::select('food_id', 'recipe_id')->where('calory_template_type_id', $calTem)->get();
            foreach ($v as $new) {
                if (in_array($foods, $new['food_id'])) {
                    array_push($rough, $new['recipe_id']);
                }
            }

            foreach ($roughSnack as $getsnk) {
                if (str_contains($getsnk, $foods)) {
                    array_push($snackMain, $getsnk);
                }
            }
        }


        if (count($rough) > 0) {
            $recipesTo = \App\Models\Recipe::where('id', $rough[0])->first();
            if ($recipesTo) {
                $newr = explode("|", $recipesTo['recipe']);
                $recipes = $newr;
            }
        }

        // if ($recipesTo) {
        //     foreach($recipesTo as $rec)
        //     {
        //      var_dump($rec);
        //      exit;
        //         foreach($rec as $r)
        //         {
        //             $newr = explode("|", $r['recipe']);
        //             $recipes = $newr;
        //         } 
        //     }
        // }

        // return view('time-table', compact('MealDetails', 'userDetails', 'recipes', 'snackMain'));

        $pdf = PDF::loadview('time-table', compact('MealDetails', 'userDetails', 'recipes', 'snackMain'));
        $pdf->setOptions([
            'footer-html' => view('pdf.footer'),
        ]);
        // Set the desired file name
        $fileName = 'Customised Meal Plan -' .  $userDetails['email'] . '.pdf';

        // Return the PDF as a download with the specified file name
        // return $pdf->download($fileName);        
        return $pdf->inline($fileName);
    }

    public function AdminUploaduserMeal(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'mealplan' => 'required|mimes:pdf',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        $userDetails = \App\Models\User::where('id', $id)->first();
        $filename =   'Customised Meal Plan -' .  $userDetails['email'] . '.pdf';

        $uploaded = $request->mealplan->move(public_path('pdf'), $filename);

        if ($uploaded) {
            $file_path = public_path('pdf/' . 'Customised Meal Plan -' .  $userDetails['email'] .  '.pdf');
            $mail_data = [
                'reciever' => $userDetails['email'],
                'from' => 'Optimumfoodie@gmail.com',
                'fromName' => 'Optimum Foodie',
                'recieverName' => $userDetails['name'],

            ];
            $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName'], $file_path, $userDetails['email']));;
        }

        \Session::flash('success', 'Meal Plan uploaded successfully! ');

        return redirect()->back();
    }

    public function AdminApproveuserMeal(Request $request, $id)
    {
        $presentYear = date("Y");
        $validator = Validator::make($request->all(), [
            'useid' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $userDetails = \App\Models\User::where('id', $id)->first();
        $MealDetails = DB::table('user_meal_plans')->select('days', 'daymeal', 'month_par', 'food_options', 'calories', 'main_meal', 'snack_meal')->where('user_id', $id)->get();

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
        foreach ($snk as $sskid) {
            if (in_array($calTem, $sskid['template'])) {
                $initialSnack[] = $sskid['snack'];
                // array_push($initialSnack, $sskid['snack']);
                // var_dump($sskid['snack']);
            }
        }
        $roughSnack = count($initialSnack) > 0 ? $initialSnack[0] : [];

        foreach ($options_food as $key => $foods) {
            $v = \App\Models\FoodRecipe::select('food_id', 'recipe_id')->where('calory_template_type_id', $calTem)->get();
            foreach ($v as $new) {
                if (in_array($foods, $new['food_id'])) {
                    array_push($rough, $new['recipe_id']);
                }
            }

            foreach ($roughSnack as $getsnk) {
                if (str_contains($getsnk, $foods)) {
                    array_push($snackMain, $getsnk);
                }
            }
        }

        if (count($rough) > 0) {
            $recipesTo = \App\Models\Recipe::where('id', $rough[0])->first();
            if ($recipesTo) {
                $newr = explode("|", $recipesTo['recipe']);
                $recipes = $newr;
            }
        }
        // $recipesTo = array_unique($rough);
        // foreach ($recipesTo as $rec) {
        //     foreach ($rec as $r) {
        //         $newr = explode("|", $r['recipe']);
        //         $recipes = $newr;
        //     }
        // }
        $file_path = public_path('pdf/' .  'Customised Meal Plan -' .  $userDetails['email'] . '.pdf');
        if (!file_exists($file_path)) {
            $pdf = PDF::loadview('time-table', compact('MealDetails', 'userDetails', 'recipes', 'snackMain'));
            $pdf->setOptions([
                'footer-center' => 'Copyright Optimum Foodie ' . $presentYear
            ]);
            $pdfFilePath = public_path('pdf/' . 'Customised Meal Plan -' .  $userDetails['email'] .  '.pdf');
            $pdf->save($pdfFilePath);
        }

        $mail_data = [
            'reciever' => $userDetails['email'],
            'from' => 'Optimumfoodie@gmail.com',
            'fromName' => 'Optimum Foodie',
            'recieverName' => $userDetails['name'],

        ];
        $sent = Mail::to($mail_data['reciever'])->send(new SentEmail($mail_data['recieverName'], $file_path, $userDetails['email']));;
        if ($sent) {
            \Session::flash('success', 'Meal Plan Approved successfully! ');

            return redirect()->back();
        }
    }

    public function AdminDeleteUserdetails($id)
    {
        $userDetails = \App\Models\User::find($id);
        $userMealDetails = \App\Models\UserMealPlan::find($id);
        $file_path = public_path('pdf/' . 'Customised Meal Plan -' .  $userDetails['email'] . '.pdf');
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $userDetails->delete();
        if ($userMealDetails) {
            $userMealDetails->delete();
        }

        \Session::flash('success', 'User Details Deleted successfully! ');

        return redirect()->back();
    }

    public function exportcsv()
    {
        return Excel::download(new ExportUsers, 'emailsubscription.csv');
    }


    public function AdminUserFoodOptions($id)
    {

        $food_options = UserMealPlan::where('user_id', $id)->select('food_options')->first();
        $user = User::where('id', $id)->get();

        $newFood = $food_options->food_options;
        $foodNames = array_map(function ($item) {
            return trim($item, '[]');
        }, $newFood);
        // var_dump($foodNames);

        // exit;
        $foods = Product::whereIn('name', $foodNames)->get();

        $foodsNoAlternate = Product::whereIn('name', $foodNames)
        ->select('name')
            ->whereNull('alternates')
            ->get();

        $foodsWithAlternate = Product::whereIn('name', $foodNames)
            ->whereNotNull('alternates')
            ->get();

        return view('backend.foodoptions', compact('user', 'foodsWithAlternate', 'foodsNoAlternate'));
    }
}

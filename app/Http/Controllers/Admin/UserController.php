<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\DB;

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
        $userdetails = [
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'password' => bcrypt($data['name']),
        ];

        $update = \App\Models\User::create($userdetails);
        \Session::flash('success', 'User created successfully!');

        return redirect()->back();
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
        $file_path = public_path('pdf/' . $userDetails['id'] . $userDetails['name'] . '.pdf');
        // if ($file_path) {
        //     return PDF::loadfile($file_path)->inline();
        // }
        //generate pdf and display for paid user
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
        $food_options = json_decode($food_options);
        foreach ($food_options as $food) {
            $onje = str_replace(['[', ']'], '', $food);
            array_push($options_food, $onje);
        }
        $mealTem = $mealsss . 'meal' . ' ' . $snack . 'snacks';
        $calTem = $calories . 'cal ' . $mealTem;

        foreach ($options_food as $key => $foods) {
            $v = \App\Models\FoodRecipe::select('food_id', 'recipe_id')->where('calory_template_type_id', $calTem)->get();
            foreach ($v as $new) {
                if (in_array($foods, $new['food_id'])) {
                    array_push($rough, $new['recipe_id']);
                }
            }
        }
        $recipes = array_unique($rough);
        //  return view('time-table', compact('MealDetails', 'userDetails', 'recipes'));
        // exit;
        $pdf = PDF::loadview('time-table', compact('MealDetails', 'userDetails', 'recipes'));
        // $pdf->setTimeout(300);
        $pdf->setOptions([
            'footer-center' => 'Copyright Optimum Foodie ' . $presentYear
        ]);
        return $pdf->inline();
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
        $filename =  $userDetails['id'] . $userDetails['name'] . '.pdf';

        $request->mealplan->move(public_path('pdf'),$filename);

        \Session::flash('success', 'Meal Plan uploaded successfully!');

        return redirect()->back();
    }
}

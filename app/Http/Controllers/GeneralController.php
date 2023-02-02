<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Cookie\CookieJar;
use PDF;

use function PHPSTORM_META\type;

// use Stripe;

class GeneralController extends Controller
{
    public $sentData;
    public function __construct()
    {
        // $this->middleware('auth');

        // if(!\Session::has('location')){
        //     $this->updateLocation();
        // }
    }

    public function index(Request $request)
    {
        // $data['interests'] = \App\Models\Category::where('status','active')->get()->pluck('title');
        // $data['sections'] = app('App\Http\Controllers\ProductController')->adSections;
        // $data['ads'] = \App\Models\Ad::where('user_id',\Session::get('user_id'))->orderBy('id','DESC')->get();

        // return view('create-ads', $data);  
        return view('index');
    }

    public function calculator(Request $request)
    {
        $cats = \App\Models\Category::whereStatus('active')->get();
        $food_options = [];
        foreach ($cats as $cat) {
            $foods = \App\Models\Product::whereStatus('active')->where('category_id', $cat->id)->pluck('name')->toArray();
            if (!empty($foods)) $food_options[$cat->name] = $foods;
        }
        if (empty($food_options)) $food_options = json_decode(file_get_contents('food_options.json'), true);
        // dd($food_options, $food_optionsX);
        $data['food_options'] = $food_options;

        // dd($data);
        return view('calculator', $data);
    }

    public function postCalculatorData(Request $request)
    {

        //create the meal plan
        $data['data'] = $request->all();
        $this->sentData = $request->all();

        $template = $request->main_meal . 'meal ' . $request->snack_meal . 'snacks';
        $cal = \App\Models\CaloryTemplateType::whereCalory($request->calories)->where('template_name', $template)->where('template_name', $template)->first();
        $mealDays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        if (empty($cal)) {
            \Session::flash('error', 'Your Daily Calory Template Does Not Exist Yet. Kindly Contact Us For More Info.');
            return redirect()->back()->withInput();
        }

        $mealPlans1 = $mealPlans2 = [];
        foreach ($cal->mealPlans as $mp) {
            if ($mp->status == 'active' && $mp->month_part == '1_and_2') {
                $mealPlans1[$mp->day][] = ['order' => $mp->order, 'meal' => $mp->meal ?? 'Snack meal'];
            } elseif ($mp->status == 'active' && $mp->month_part == '3_and_4') {
                $mealPlans2[$mp->day][] = ['order' => $mp->order, 'meal' => $mp->meal ?? 'Snack meal'];
            }
        }
        $mp1 = $mp2 = [];
        foreach ($mealDays as $md) {
            $mp1[$md] = $mealPlans1[$md];
            $mp2[$md] = $mealPlans2[$md];
        }
        $mealPlans1 = $mealPlans2 = [];
        foreach ($mp1 as $k => $m) {
            if (isset($m[0]) && $m[0]['order'] == 1) $mealPlans1[$k][] = $this->checkRightMeal($m[0]['meal'], $request->food_options);
            else $mealPlans1[$k][] = 'Cheat meal';

            if (isset($m[1]) && $m[1]['order'] == 2) $mealPlans1[$k][] = $this->checkRightMeal($m[1]['meal'], $request->food_options);
            else $mealPlans1[$k][] = 'Cheat meal';

            if (isset($m[2]) && $m[2]['order'] == 3) $mealPlans1[$k][] = $this->checkRightMeal($m[2]['meal'], $request->food_options);
            else $mealPlans1[$k][] = 'Cheat meal';

            if (isset($m[3]) && $m[3]['order'] == 4) $mealPlans1[$k][] = $this->checkRightMeal($m[3]['meal'], $request->food_options);
            else $mealPlans1[$k][] = 'Cheat meal';
        }
        foreach ($mp2 as $k => $m) {
            if (isset($m[0]) && $m[0]['order'] == 1) $mealPlans2[$k][] = $this->checkRightMeal($m[0]['meal'], $request->food_options);
            else $mealPlans2[$k][] = 'Cheat meal';

            if (isset($m[1]) && $m[1]['order'] == 2) $mealPlans2[$k][] = $this->checkRightMeal($m[1]['meal'], $request->food_options);
            else $mealPlans2[$k][] = 'Cheat meal';

            if (isset($m[2]) && $m[2]['order'] == 3) $mealPlans2[$k][] = $this->checkRightMeal($m[2]['meal'], $request->food_options);
            else $mealPlans2[$k][] = 'Cheat meal';

            if (isset($m[3]) && $m[3]['order'] == 4) $mealPlans2[$k][] = $this->checkRightMeal($m[3]['meal'], $request->food_options);
            else $mealPlans2[$k][] = 'Cheat meal';
        }
        // dd($mealPlans1, $mealPlans2);
        $data['meal1'] = $mealPlans1;
        $data['meal2'] = $mealPlans2;
        // return view('time-table', $data);

        //check user status and create new user if no status
        $emailwa = \App\Models\User::where('email', $data['data']['best_email'])->first();
        if (!$emailwa) {
            $userData = [
                'email' => $data['data']['best_email'],
                'name' => $data['data']['best_name'],
                'status' => 'free',
                'password' => 123456
            ];
            $update = \App\Models\User::create($userData);
            if ($update) {
                //Can run logic to send email to new user and password
            }
        }

        //save meal to DB linking it to the user account
        $emailwa2 = \App\Models\User::where('email', $data['data']['best_email'])->first();
        $userID = $emailwa2['id'];
        $meal1ako = $data['meal1'];
        foreach ($meal1ako as $day => $mainmeals1eat) {
            $userMealData = [
                'days' => $day,
                'user_id' => $userID,
                'sex' => $data['data']['sex'],
                'age' => $data['data']['age'],
                'height' => $data['data']['height'],
                'weight' => $data['data']['weight'],
                'goal' => $data['data']['goal'],
                'weight_aim' => $data['data']['weight_aim'],
                'weight_time_aim' => $data['data']['weight_time_aim'],
                'activity' => $data['data']['activity'],
                'calories' => $data['data']['calories'],
                'main_meal' => $data['data']['main_meal'],
                'snack_meal' => $data['data']['snack_meal'],
                'food_options' => $data['data']['food_options'],
                'month_par' => '1_and_2',
                'daymeal' => $mainmeals1eat,

            ];
            // save the data on each day loop
            $saveMeal = \App\Models\UserMealPlan::create($userMealData);
        }

        $meal1ako2 = $data['meal2'];
        foreach ($meal1ako2 as $day2 => $mainmeals1eat2) {
            $userMealData2 = [
                'days' => $day2,
                'user_id' => $userID,
                'sex' => $data['data']['sex'],
                'age' => $data['data']['age'],
                'height' => $data['data']['height'],
                'weight' => $data['data']['weight'],
                'goal' => $data['data']['goal'],
                'weight_aim' => $data['data']['weight_aim'],
                'weight_time_aim' => $data['data']['weight_time_aim'],
                'activity' => $data['data']['activity'],
                'calories' => $data['data']['calories'],
                'main_meal' => $data['data']['main_meal'],
                'snack_meal' => $data['data']['snack_meal'],
                'food_options' => $data['data']['food_options'],
                'month_par' => '3_and_4',
                'daymeal' => $mainmeals1eat2,

            ];
            // save the data on each day loop
            $saveMeal = \App\Models\UserMealPlan::create($userMealData2);
        }
        
        session(['activeUserID' => $userID]);
        if($saveMeal){
            return redirect('/getmail');
        }
    }

    public function checkRightMeal($meal, $food_options)
    {
        if (empty($meal)) {
            // if(str_replace(['[',']'], '', $meal) == 'efo-riro') dd("Why here...");
            return $meal;
        }

        $spl_meals = array_map(function ($v) {
            return trim($v);
        }, explode('+', $meal));
        $food_options = array_map(function ($v) {
            return strtolower($v);
        }, $food_options);

        $choice = $all_choice = [];
        foreach ($spl_meals as $ind => $spl) {
            $all_choice['itm_' . $ind] = $spl;
        }

        foreach ($food_options as $food) {
            foreach ($spl_meals as $ind => $spl) {
                if (str_contains($spl, strtolower($food))) {
                    $choice['itm_' . $ind] = $spl;
                    break;
                }
            }
        }
        $diff_choice = array_diff($all_choice, $choice);
        $alt_choice = [];

        if (count($diff_choice) > 0) {
            foreach ($diff_choice as $k => $chc) {
                $srch = $this->word4search($chc);

                if (strlen($srch) > 4) {
                    $mpn = \App\Models\MealComposition::where('meal_composition', 'LIKE', '%' . $srch . '%')->whereStatus('active')->first();
                } else $mpn = null;

                if ($mpn) {
                    $alts = array_column($mpn->mealAlternates->toArray(), 'alternate');
                    $chkd = $chc;
                    $efos = [];
                    foreach ($alts as $at) {
                        $cd = $this->checkFood($food_options, $at);
                        if (!empty($cd)) {
                            $chkd = $cd;
                            break;
                        }
                    }
                    $alt_choice[$k] = $chkd;
                } else {
                    $alt_choice[$k] = $chc;
                }
            }
        }
        $all_choice = array_merge($choice, $alt_choice);
        ksort($all_choice);

        $meal = implode(' + ', $all_choice);

        return $meal;
    }

    public function word4search($chc)
    {
        $meal = trim(strstr(trim($chc), " "));
        $meal = explode(']', $meal)[0] . ']';
        // if(str_contains('serving of [efo-riro]', $meal)) dd("Why here...", $chc, $meal);

        return trim($meal);
    }

    public function checkFood($food_options, $spl)
    {
        $sp = null;

        foreach ($food_options as $food) {
            if (str_contains($spl, 'ugwu')) {
                $efos[] = $food;
            }
            if (str_contains($spl, $food)) {
                $sp = $spl;
                break;
            }
        }

        return $sp;
    }

    public function ajaxCalculator(Request $request)
    {
        $data['data'] = $request->all();

        $template = $request->main_meal . 'meal ' . $request->snack_meal . 'snacks';
        $cal = \App\Models\CaloryTemplateType::whereCalory($request->calories)->where('template_name', $template)->where('template_name', $template)->first();

        if (empty($cal)) {
            return 'A Meal Plan Does Not Exist For Your Daily Calory. Kindly Contact Us For More Info or Adjust Your Input For Result.';
        } else {
            return 'success';
        }
    }

    public function roundNearest50(int $number): int
    {
        $ret = 100 * round($number / 100);

        return $ret;
    }

    // Generate PDF
    public function createPDF()
    {
        // retreive all records from db
        $data = $this->sentData;
        var_dump($data);
        exit;
        // share data to view
        view()->share('values', $data);
        $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Cookie\CookieJar;
// use Stripe;

class PagesController extends Controller
{
    public function dashboard(Request $request){
        return view('backend.dashboard');
    }

    public function categories(Request $request){
        $data['categories'] = \App\Models\Category::all();
        return view('backend.categories', $data);
    }

    public function createCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        
        $update = \App\Models\Category::create($request->all());
        \Session::flash('success', 'Category created successfully!');
        
        return redirect()->back();
    }
    
    public function editCategory(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $update = \App\Models\Category::whereId($id)->update($request->except('_token'));
        \Session::flash('success', 'Category updated successfully!');
        
        return redirect()->back();
    }
    
    public function categoryDeactivate($id){
        \App\Models\Category::whereId($id)->update(['status'=>'inactive','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Category deactivated!');
        
        return redirect()->back();
    }
    
    public function categoryActivate($id){
        \App\Models\Category::whereId($id)->update(['status'=>'active','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Category activated!');
        
        return redirect()->back();
    }

    public function roundNearest50(int $number): int {
        $ret = 50 * round($number / 50);
        
        return $ret;
    }


    public function products(Request $request){
        $data['categories'] = \App\Models\Category::all();
        
        $query = \Request::all();
        $data['products'] = \App\Models\Product::orderBy('foods.id','DESC');
        if(isset($query['q'])){
            $data['products'] = $data['products']->join('categories','foods.category_id','=','categories.id');
            $data['products'] = $data['products']->where('foods.name','LIKE','%'.$query['q'].'%')
                            ->orWhere('categories.name','LIKE','%'.$query['q'].'%');
        }
        $data['products'] = $data['products']->select('foods.*')->paginate(20)->appends(\Request::all());

        return view('backend.products', $data);
    }

    public function createProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        } 
        $request['alternates'] = implode(",",$request->alternatePids);
        foreach($request->all() as $key=>$req){
            if(empty($req)) unset($request[$key]);
        }
        // $request['serviceID'] = strtolower(str_replace([' ',',',"'",'"','.','`','!','@','$','#','±','%','^','&','*','_'], '-', $request->name).'-'.$request->provider_product_id);
        
        $update = \App\Models\Product::create($request->all());
        \Session::flash('success', 'Product created successfully!');
        
        return redirect()->back();
    }
    
    public function editProduct(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        if($request->alternatePids){
            $request['alternates'] = implode(",",$request->alternatePids);
        }else{
            $request['alternates'] = NULL;
        }

        $update = \App\Models\Product::whereId($id)->update($request->except('_token','serviceID','alternatePids'));
        \Session::flash('success', 'Product updated successfully!');
        
        return redirect()->back();
    }
    
    public function productDeactivate($id){
        \App\Models\Product::whereId($id)->update(['status'=>'inactive','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Product deactivated!');
        
        return redirect()->back();
    }
    
    public function productActivate($id){
        \App\Models\Product::whereId($id)->update(['status'=>'active','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Product activated!');
        
        return redirect()->back();
    }


    public function calories(Request $request){
        $data['calories'] = \App\Models\CaloryTemplateType::all();
        return view('backend.calory-template-types', $data);
    }

    public function createCalory(Request $request){
        $validator = Validator::make($request->all(), [
            'template_name' => 'required',
            'calory' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        
        $update = \App\Models\CaloryTemplateType::create($request->all());
        \Session::flash('success', 'Calory Template created successfully!');
        
        return redirect()->back();
    }
    
    public function editCalory(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'template_name' => 'required',
            'calory' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $update = \App\Models\CaloryTemplateType::whereId($id)->update($request->except('_token'));
        \Session::flash('success', 'Calory Template updated successfully!');
        
        return redirect()->back();
    }
    
    public function caloryDeactivate($id){
        \App\Models\CaloryTemplateType::whereId($id)->update(['status'=>'inactive','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Calory Template deactivated!');
        
        return redirect()->back();
    }
    
    public function caloryActivate($id){
        \App\Models\CaloryTemplateType::whereId($id)->update(['status'=>'active','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Calory Template activated!');
        
        return redirect()->back();
    }

    public function meals(Request $request){
        $data['calories'] = \App\Models\CaloryTemplateType::whereStatus('active')->get();
        $data['mealCompositions'] = \App\Models\MealComposition::whereStatus('active')->get();
        // $data['meals'] = \App\Models\MealPlan::paginate(20);
        $foods = \App\Models\Product::all();
        
        foreach($foods as $food){
            $data['foods'][] = [
                'name'=>$food->name,
                'category'=>$food->category->name
            ];
        }
        
        $query = \Request::all();
        $data['meals'] = \App\Models\MealPlan::orderBy('meal_plans.id','DESC');
        if(isset($query['q'])){
            $data['meals'] = $data['meals']->join('calory_template_types','meal_plans.calory_template_type_id','=','calory_template_types.id');
            $data['meals'] = $data['meals']->where('meal_plans.meal','LIKE','%'.$query['q'].'%')
                            ->orWhere('meal_plans.day','LIKE','%'.$query['q'].'%')
                            ->orWhere('calory_template_types.template_name','LIKE','%'.$query['q'].'%')
                            ->orWhere('calory_template_types.calory','LIKE','%'.$query['q'].'%');
        }
        $data['meals'] = $data['meals']->select('meal_plans.*')->paginate(20)->appends(\Request::all());

        return view('backend.meals', $data);
    }

    public function createMeal(Request $request){
        $validator = Validator::make($request->all(), [
            'calory_template_type_id' => 'required',
            'order' => 'required',
            'day' => 'required',
            'month_part' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        } 
        foreach($request->all() as $key=>$req){
            if(empty($req)) unset($request[$key]);
        }
        $comps = $request->meal_composition_id;

        if(!empty($comps)){
            if(in_array('Snack meal', $comps) && count($comps)>1) {
                foreach($comps as $k=>$c){
                    if($c == "Snack meal") unset($comps[$k]);
                }
            }
            if(in_array('Cheat meal', $comps) && count($comps)>1) {
                foreach($comps as $k=>$c){
                    if($c == "Cheat meal") unset($comps[$k]);
                }
            }
            $request['meal'] = implode(' + ', $comps);
            unset($request['meal_composition_id']);
        }
        // dd($request->all());
        
        $update = \App\Models\MealPlan::create($request->all());
        \Session::flash('success', 'Meal Plan created successfully!');
        
        return redirect()->back();
    }
    
    public function editMeal(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'calory_template_type_id' => 'required',
            'order' => 'required',
            'day' => 'required',
            'month_part' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        $comps = $request->meal_composition_id;
        
        if(!empty($comps)){
            if(in_array('Snack meal', $comps) && count($comps)>1) {
                foreach($comps as $k=>$c){
                    if($c == "Snack meal") unset($comps[$k]);
                }
            }
            if(in_array('Cheat meal', $comps) && count($comps)>1) {
                foreach($comps as $k=>$c){
                    if($c == "Cheat meal") unset($comps[$k]);
                }
            }
            $request['meal'] = implode(' + ', $comps);
            unset($request['meal_composition_id']);
        }

        $update = \App\Models\MealPlan::whereId($id)->update($request->except('_token','serviceID'));
        \Session::flash('success', 'Meal Plan updated successfully!');
        
        return redirect()->back();
    }
    
    public function mealDeactivate($id){
        \App\Models\MealPlan::whereId($id)->update(['status'=>'inactive','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Mean Plan deactivated!');
        
        return redirect()->back();
    }
    
    public function mealActivate($id){
        \App\Models\MealPlan::whereId($id)->update(['status'=>'active','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Mean Plan activated!');
        
        return redirect()->back();
    }

    public function mealAlternates(Request $request){
        $data['categories'] = \App\Models\Category::whereStatus('active')->get();
        $foods = \App\Models\Product::all();

        foreach($foods as $food){
            $data['foods'][] = [
                'name'=>$food->name,
                'category'=>$food->category->name
            ];
        }
        
        $query = \Request::all();
        $data['meals'] = \App\Models\MealComposition::orderBy('meal_compositions.id','DESC');
        if(isset($query['q'])){
            $data['meals'] = $data['meals']->join('meal_alternates','meal_compositions.id','=','meal_alternates.meal_composition_id');
            $data['meals'] = $data['meals']->where('meal_compositions.meal_composition','LIKE','%'.$query['q'].'%')
                            ->orWhere('meal_alternates.alternate','LIKE','%'.$query['q'].'%');
        }
        $data['meals'] = $data['meals']->select('meal_compositions.*')->paginate(10)->appends(\Request::all());

        return view('backend.meal-alternates', $data);
    }

    public function createMealAlternate(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'meal_composition' => 'required',
            'alternates.*' => 'nullable',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        } 
        foreach($request->all() as $key=>$req){
            if(empty($req)) unset($request[$key]);
        }

        try{
            \DB::beginTransaction();
            $create = \App\Models\MealComposition::create($request->all());

            if(count($request->meal_alternate) > 0){
                $data = [];
                foreach($request->meal_alternate as $alt){
                    if(!empty($alt)){
                        $data[] = [
                            'meal_composition_id'=>$create->id,
                            'alternate'=>str_replace(' @', ' ', $alt)
                        ];
                    }
                }
                \App\Models\MealAlternate::insert($data);
            }
            \DB::commit();
            \Session::flash('success', 'Meal Composed successfully!');
        }catch(\Exception $e){
            \DB::rollback();
            \Session::flash('error', $e->getMessage());
        }
        
        return redirect()->back();
    }

    public function editMealAlternate(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'meal_composition' => 'required',
            'alternates.*' => 'nullable',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        } 
        foreach($request->all() as $key=>$req){
            if(empty($req)) unset($request[$key]);
        }

        try{
            \DB::beginTransaction();
            \App\Models\MealComposition::whereId($id)->update([
                'meal_composition'=>str_replace('@', '', $request->meal_composition),
                'category_id'=>$request->category_id,
                'status'=>$request->status
            ]);

            if(count($request->meal_alternate) > 0){
                $data = [];
                foreach($request->meal_alternate as $alt){
                    if(!empty($alt)){
                        $data[] = [
                            'meal_composition_id'=>$id,
                            'alternate'=>str_replace('@', '', $alt)
                        ];
                    }
                }
                \App\Models\MealAlternate::where('meal_composition_id',$id)->delete();
                \App\Models\MealAlternate::insert($data);
            }
            \DB::commit();
            \Session::flash('success', 'Meal Composition Updated successfully!');
        }catch(\Exception $e){
            \DB::rollback();
            \Session::flash('error', $e->getMessage());
        }
        
        return redirect()->back();
    }
    
    public function mealAlternateDeactivate($id){
        \App\Models\MealComposition::whereId($id)->update(['status'=>'inactive','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Mean Composition deactivated!');
        
        return redirect()->back();
    }
    
    public function mealAlternateActivate($id){
        \App\Models\MealComposition::whereId($id)->update(['status'=>'active','updated_at'=>\DB::raw('NOW()')]);
        \Session::flash('success', 'Mean Composition activated!');
        
        return redirect()->back();
    }
    
    public function mealAlternateDelete($id){
        \App\Models\MealComposition::whereId($id)->delete();
        \Session::flash('success', 'Mean Composition deleted!');
        
        return redirect()->back();
    }


    public function getRecipePage(){
        $data['recipe'] = \App\Models\Recipe::all();
        return view('backend.addrecipes', $data);
    }
    public function getRecipePagePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recipe' => 'required',
            // 'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data = $request->all();
        $recipedetails = [
            'recipe' => $data['recipe'],
            // 'status' => $data['status'],
        ];
        $update = \App\Models\Recipe::create($recipedetails);
        \Session::flash('success', 'Recipe created successfully!');
        
        return redirect()->back();
    }

    public function EditgetRecipePage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'recipe' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $update = \App\Models\Recipe::whereId($id)->update($request->except('_token'));
        \Session::flash('success', 'Recipe updated successfully!');
        return redirect()->back();
    }



    public function getFoodRecipePage()
    {
        $data = array();
        $data['calories'] = \App\Models\CaloryTemplateType::whereStatus('active')->get();
        $data['foods'] = \App\Models\Product::all();
        $data['recipes'] = \App\Models\Recipe::all();

        // $val = \App\Models\FoodRecipe::all();

        // foreach($val as $v)
        // {
        //     // echo($v);
        //     foreach($v['food_id'] as $fid)
        //     {
        //         echo "<br />";
        //         echo($fid);
        //         $data['foodrecipes'] = \App\Models\FoodRecipe::where('food_recipes.status', 'active')->join('calory_template_types','food_recipes.calory_template_type_id','=','calory_template_types.id')->join('foods', 'food_recipes.food_id','=','foods.id')->join('recipes','food_recipes.recipe_id','=','recipes.id')->get();
        //         print_r($data['foodrecipes']);
        //     }
        // }
        // // print_r($val);
        // exit;
        $data['foodrecipes'] = \App\Models\FoodRecipe::where('food_recipes.status', 'active')->join('calory_template_types','food_recipes.calory_template_type_id','=','calory_template_types.id')->join('foods','food_recipes.food_id','=','foods.id')->join('recipes','food_recipes.recipe_id','=','recipes.id')->get();


        // $data['foodrecipes'] = \App\Models\FoodRecipe::where('status', 'active')->with('caloryTemplate')->with('foodOption')->with('recipes')->get();
        // var_dump($data['foodrecipes']);
        // exit;
        return view('backend.recipes', $data );
    }

    public function getFoodRecipePagePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'calory_template_type_id' => 'required',
            'food_option' => 'required',
            'recipes' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data = $request->all();
        $recipedetails = [
            'calory_template_type_id' => $data['calory_template_type_id'],
            'status' => $data['status'],
            'food_id' => $data['food_option'],
            'recipe_id' => $data['recipes'],
        ];
        $update = \App\Models\FoodRecipe::create($recipedetails);
        \Session::flash('success', 'Food Recipe created successfully!');
        
        return redirect()->back();
    }

    public function EditFoodRecipePage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'calory_template_type_id' => 'required',
            'food_option' => 'required',
            'recipes' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        $data = $request->all();
        $recipedetails = [
            'calory_template_type_id' => $data['calory_template_type_id'],
            'status' => $data['status'],
            'food_id' => $data['food_option'],
            'recipe_id' => $data['recipes'],
        ];

        $update = \App\Models\FoodRecipe::whereId($id)->update($recipedetails);
        \Session::flash('success', 'Food Recipe updated successfully!');
        return redirect()->back();
    }
}

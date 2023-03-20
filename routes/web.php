<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Admin\PagesController as AdminPagesController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/run', function(){
//     spinoffAlts();
//     dd("DONT CROSS!!!"); 
// });


// Route::get('/calculator', [GeneralController::class, 'calculator']);
Route::get('/', [GeneralController::class, 'calculator']);
Route::post('/post-calculator-data', [GeneralController::class, 'postCalculatorData']);
Route::any('/ajax-calculator', [GeneralController::class, 'ajaxCalculator']);

Route::get('/getmail',[EmailController::class, 'DisplayPage']);
Route::post('/sendmail',[EmailController::class, 'emailLogic']);
Route::get('/pdfmail',[EmailController::class, 'pdfPage']);
Route::get('/mealsData/pdf', [GeneralController::class, 'createPDF']);

Route::get('/verify-payment/{reference}',[PaymentController::class, 'verify']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/loginlogic', [LoginController::class, 'loginLogic']);
Route::get('/logout', [LoginController::class, 'logoutLogic']);

// Admin Pages Routes
Route::prefix('admin')->middleware(['admin-auth', 'auth'])->group(function () {
    Route::get('/', [AdminPagesController::class, 'dashboard']);
    Route::get('/dashboard', [AdminPagesController::class, 'dashboard']);

    //USER ROUTES
    Route::get('/usersAdd', [AdminUserController::class, 'usersAdd']);
    Route::post('/create-new-user', [AdminUserController::class, 'Addnewusers']);
    Route::post('/edit-user/{id}', [AdminUserController::class, 'Editusers']);
    Route::get('/admin-view-meal-plan/{id}', [AdminUserController::class, 'AdminPreviewuserMeal']);
    Route::post('/uploadedmealplan/{id}', [AdminUserController::class, 'AdminUploaduserMeal']);

    //SUGGESTIONS ROUTE
    Route::get('/suggestion',[AdminUserController::class, 'suggest']);


    // CATEGORIES ROUTES
    Route::get('/categories', [AdminPagesController::class, 'categories']);
    Route::get('/category-activate/{id}', [AdminPagesController::class, 'categoryActivate']);
    Route::get('/category-deactivate/{id}', [AdminPagesController::class, 'categoryDeactivate']);
    Route::post('/create-category', [AdminPagesController::class, 'createCategory']);
    Route::post('/edit-category/{id}', [AdminPagesController::class, 'editCategory']);

    // PRODUCTS ROUTES
    Route::get('/products', [AdminPagesController::class, 'products']);
    Route::get('/product-activate/{id}', [AdminPagesController::class, 'productActivate']);
    Route::get('/product-deactivate/{id}', [AdminPagesController::class, 'productDeactivate']);
    Route::post('/create-product', [AdminPagesController::class, 'createProduct']);
    Route::post('/edit-product/{id}', [AdminPagesController::class, 'editProduct']);
    
    // CALORIES ROUTES
    Route::get('/calories', [AdminPagesController::class, 'calories']);
    Route::get('/calory-activate/{id}', [AdminPagesController::class, 'caloryActivate']);
    Route::get('/calory-deactivate/{id}', [AdminPagesController::class, 'caloryDeactivate']);
    Route::post('/create-calory', [AdminPagesController::class, 'createCalory']);
    Route::post('/edit-calory/{id}', [AdminPagesController::class, 'editCalory']);

    // MEALS ROUTES
    Route::get('/meals', [AdminPagesController::class, 'meals']);
    Route::get('/meal-activate/{id}', [AdminPagesController::class, 'mealActivate']);
    Route::get('/meal-deactivate/{id}', [AdminPagesController::class, 'mealDeactivate']);
    Route::post('/create-meal', [AdminPagesController::class, 'createMeal']);
    Route::post('/edit-meal/{id}', [AdminPagesController::class, 'editMeal']);

    // MEALS & ALTERNA ROUTES
    Route::get('/meal-alternates', [AdminPagesController::class, 'mealAlternates']);
    Route::get('/meal-alternate-activate/{id}', [AdminPagesController::class, 'mealAlternateActivate']);
    Route::get('/meal-alternate-deactivate/{id}', [AdminPagesController::class, 'mealAlternateDeactivate']);
    Route::post('/create-meal-alternate', [AdminPagesController::class, 'createMealAlternate']);
    Route::post('/edit-meal-alternate/{id}', [AdminPagesController::class, 'editMealAlternate']);


    //RECIPES ROUTES
    Route::get('/recipes', [AdminPagesController::class, 'getRecipePage']);
    Route::post('/addrecipepost', [AdminPagesController::class, 'getRecipePagePost']);
    Route::post('/edit-recipe/{id}', [AdminPagesController::class, 'EditgetRecipePage']);
    Route::get('/foodrecipes', [AdminPagesController::class, 'getFoodRecipePage']);
    Route::post('/create-new-foodrecipe', [AdminPagesController::class, 'getFoodRecipePagePost']);
    Route::post('/edit-foodrecipe/{id}', [AdminPagesController::class, 'EditFoodRecipePage']);
});



function spinoffFoods(){
    $foods = \App\Models\Product::pluck('name')->toArray();
    usort($foods, function ($a,$b){
        return strlen($b)-strlen($a);
    });
    $foods = array_map('strtolower', $foods);
    
    $foodComps = \App\Models\MealComposition::pluck('meal_composition', )->toArray();
    $availRep = $availRepX = [];
    
    // foreach($foodComps as $comp){
    //     $compX = strtolower($comp);
    //     $newStr = "";

    //     foreach($foods as $food){
    //         $foodX = strtolower($food);
    //         if (!str_contains($foodX, ' ')) continue;

    //         if (strpos($compX, trim($foodX)) !== false) {
    //         // if (str_contains($compX, $foodX)) { 
    //             $newStr = str_replace($foodX, '['.$foodX.']', $compX);
    //         }
    //     }

    //     $availRep[] = $newStr ?: $compX;
    // }
    // foreach($availRep as $comp){
    //     $compX = strtolower($comp);
    //     $newStr = "";

    //     preg_match_all("/\[(.*?)\]/", $compX, $match);
    //     if(count($match[0]) > 0) {
    //         for($i=0; $i<count($match[0]); $i++) $compX = str_replace($match[0][$i], 'RP'.$i, $compX);
    //     }

    //     foreach($foods as $food){
    //         $foodX = strtolower($food);
    //         if (str_contains($foodX, ' ')) continue;

    //         if (strpos($compX, trim($foodX)) !== false) {
    //             $newStr = str_replace($foodX, '['.$foodX.']', $compX);
    //         }
    //     }
    //     if(count($match[0]) > 0) {
    //         for($i=0; $i<count($match[0]); $i++) $compX = str_replace('RP'.$i, $match[0][$i], $compX);
    //     }

    //     $availRepX[] = $newStr ?: $compX;
    // }
    // for($i=0; $i<count($foodComps); $i++){
    //     \App\Models\MealComposition::where('meal_composition', $foodComps[$i])->update([
    //         'meal_composition'=>$availRepX[$i]
    //     ]);
    // }

    dd("DOONNEE!!!...", $foodComps, $foods);
}

function spinoffAlts(){
    $foods = \App\Models\Product::pluck('name')->toArray();
    usort($foods, function ($a,$b){
        return strlen($b)-strlen($a);
    });
    $foods = array_map('strtolower', $foods);
    
    $foodComps = \App\Models\MealAlternate::pluck('alternate')->toArray();
    $availRep = $availRepX = [];
    // dd($foodComps);
    
    foreach($foodComps as $comp){
        $compX = strtolower($comp);

        foreach($foods as $food){
            $foodX = strtolower($food);
            if (!str_contains($foodX, ' ')) continue;

            if (str_contains($compX, $foodX)) $compX = str_replace($foodX, '['.$foodX.']', $compX);
        }

        $availRep[] = $compX;
    }
    foreach($availRep as $comp){
        $compX = strtolower($comp);

        preg_match_all("/\[(.*?)\]/", $compX, $match);
        if(count($match[0]) > 0) for($i=0; $i<count($match[0]); $i++) $compX = str_replace($match[0][$i], 'RP'.$i, $compX);

        foreach($foods as $food){
            $foodX = strtolower($food);
            if (str_contains($foodX, ' ')) continue;

            if (str_contains($compX, trim($foodX))) $compX = str_replace($foodX, '['.$foodX.']', $compX);
        }
        if(count($match[0]) > 0) {
            for($i=0; $i<count($match[0]); $i++) $compX = str_replace('RP'.$i, $match[0][$i], $compX);
        }

        $xxx = $compX;
        $xxx = str_replace('[[', '[', $xxx);
        $availRepX[] = str_replace(']]', ']', $xxx);
    }
    // for($i=0; $i<count($foodComps); $i++){
    //     \App\Models\MealAlternate::whereId(($i+1))->update([
    //         'alternate'=>$availRepX[$i]
    //     ]);
    // }

    dd("DOONNEE!!!...", $availRepX, $foods);
}

function spinoffPlans(){
    $foods = \App\Models\Product::pluck('name')->toArray();
    usort($foods, function ($a,$b){
        return strlen($b)-strlen($a);
    });
    $foods = array_map('strtolower', $foods);
    
    $foodComps = array_map(function($v){
        return str_replace(['[',']'], '', $v);
    }, \App\Models\MealPlan::pluck('meal')->toArray());

    $availRep = $availRepX = [];
    
    foreach($foodComps as $comp){
        $compX = strtolower($comp);
        $newStr = "";
        $kombo = [];

        foreach($foods as $food){
            $foodX = strtolower($food);
            if (!str_contains($foodX, ' ')) continue;

            if (str_contains($compX, $foodX)) { 
                $compX = str_replace($foodX, '['.$foodX.']', $compX);
            }
        }

        $availRep[] = $compX;
    }

    foreach($availRep as $comp){
        $compX = strtolower($comp);

        preg_match_all("/\[(.*?)\]/", $compX, $match);
        if(count($match[0]) > 0) {
            for($i=0; $i<count($match[0]); $i++) $compX = str_replace($match[0][$i], 'RP_'.$i, $compX);
        }

        foreach($foods as $food){
            $foodX = strtolower($food);
            if (str_contains($foodX, ' ')) continue;

            if (strpos($compX, trim($foodX)) !== false) $compX = str_replace($foodX, '['.$foodX.']', $compX);
        }

        $oldCompX = $compX;
        $oldMatch = $match[0];
        if(count($match[0]) > 0) for($i=0; $i<count($match[0]); $i++) $compX = str_replace('RP_'.$i, $match[0][$i], $compX);

        $xxx = $compX;
        $xxx = str_replace('[[', '[', $xxx);
        $xxx = str_replace(']]', ']', $xxx);

        $availRepX[] = str_replace("\r\n", ' ', $xxx);
    }
    // for($i=0; $i<count($foodComps); $i++){
    //     \App\Models\MealPlan::whereId(($i+1))->update([
    //         'meal'=>$availRepX[$i]
    //     ]);
    // }

    dd("DOONNEE!!!...", $availRepX, $foods);
}


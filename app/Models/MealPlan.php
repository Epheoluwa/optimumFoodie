<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;
    protected $table = "meal_plans";
    protected $fillable = ['calory_template_type_id','order','day','month_part','meal','meal_composition_id','status'];
    
    public function caloryTemplate(){
        return $this->belongsTo('App\Models\CaloryTemplateType','calory_template_type_id');
    }

    public function mealComposition(){
        return $this->belongsTo('App\Models\MealComposition','meal_composition_id');
    }
}

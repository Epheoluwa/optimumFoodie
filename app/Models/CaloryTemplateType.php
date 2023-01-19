<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaloryTemplateType extends Model
{
    use HasFactory;
    protected $table = "calory_template_types";
    protected $fillable = ['template_name','calory','status'];

    
    public function mealPlans(){
        return $this->hasMany('App\Models\MealPlan', 'calory_template_type_id');
    }
}

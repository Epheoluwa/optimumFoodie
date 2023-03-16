<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRecipe extends Model
{
    use HasFactory;
    protected $table = "food_recipes";
    protected $fillable = ['calory_template_type_id','food_id','recipe_id','status'];


    public function caloryTemplate(){
        return $this->belongsTo('App\Models\CaloryTemplateType','calory_template_type_id');
    }

    public function foodOption()
    {
        return $this->belongsTo('App\Models\Product','food_id');
    }
    public function recipes()
    {
        return $this->belongsTo('App\Models\Recipe','recipe_id');
    }
}

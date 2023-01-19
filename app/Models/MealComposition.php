<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealComposition extends Model
{
    use HasFactory;
    protected $table = "meal_compositions";
    protected $fillable = ['category_id','meal_composition','status'];
    
    public function mealAlternates(){
        return $this->hasMany('App\Models\MealAlternate','meal_composition_id');
    }
    
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}

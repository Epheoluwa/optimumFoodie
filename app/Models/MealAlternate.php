<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealAlternate extends Model
{
    use HasFactory;
    protected $table = "meal_alternates";
    protected $fillable = ['meal_composition_id','alternate','status'];
    
    public function mealAlternates(){
        return $this->belongsTo('App\Models\MealAlternate','meal_composition_id');
    }
}

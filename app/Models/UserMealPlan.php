<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMealPlan extends Model
{
    use HasFactory;
    protected $table = 'user_meal_plans';
    protected $fillable = ['user_id','days','month_par','sex','age','height','weight','goal','weight_aim','weight_time_aim','activity','calories','main_meal','snack_meal','food_options','daymeal'];
    protected $casts = [
        'goal' => 'array','activity'=> 'array','food_options'=> 'array','daymeal' => 'array'
     ];

     public function User(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

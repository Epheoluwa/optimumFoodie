<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = "recipes";
    protected $fillable = ['recipe','title'];
    // protected $casts = [
    //     'recipe' => 'array'
    //  ];
}

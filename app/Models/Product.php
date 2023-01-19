<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "foods";
    protected $fillable = ['category_id','serviceID','provider_product_id','name','commission','commission_type','discount','discount_type','fee','fee_type','min','max','amount_type','unique_element','unique_element_label','alternates','status'];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function variations(){
        return $this->hasMany('App\Models\Variation','product_id');
    }
}

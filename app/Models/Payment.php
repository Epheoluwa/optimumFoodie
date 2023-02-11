<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = ['user_id','status','reference','payment_id','amount','payment_date','paystack_cust_id','cust_code'];

    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

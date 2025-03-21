<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment(){
        return $this->hasOne(PaymentMethod::class,'id','payment_gateway_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function crypto(){
        return $this->hasOne(Crypto::class,'id','crypto_id');
    }
}

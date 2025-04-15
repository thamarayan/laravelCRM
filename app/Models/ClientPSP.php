<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPSP extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "client_psp";

    public function pspDetails()
    {
        return $this->hasOne(PspList::class, 'psp_id', 'payment_bank');
    }
}

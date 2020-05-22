<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_date',
        'expires_at',
        'status',
        'user_id',
        'clp_usd'
    ];
}

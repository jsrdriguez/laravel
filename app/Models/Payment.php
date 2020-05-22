<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_PAID = 'paid';
    const STATUS_PENDING = 'pending';
    public $incrementing = false;

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'id',
        'payment_date',
        'expires_at',
        'status',
        'user_id',
        'clp_usd'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

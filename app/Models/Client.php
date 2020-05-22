<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Store extends Model
{
    protected $fillable = [
        'name', 'code', 'user_id', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

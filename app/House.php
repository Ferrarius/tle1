<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class House extends Model
{
    protected $guarded = [];

    function reports()
    {
        return $this->hasMany(Report::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}

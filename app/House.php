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

    function report()
    {
        return $this->reports()->orderBy('created_at', 'desc')->first();
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}

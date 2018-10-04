<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function outputs()
    {
        return $this->hasMany(Output::class);
    }
}

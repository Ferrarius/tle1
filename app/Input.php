<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $guarded = ['user_id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}

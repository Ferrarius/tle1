<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $guarded = [];
    function house()
    {
        return $this->belongsTo(House::class);
    }

    function outputs()
    {
        return $this->hasMany(Output::class);
    }
}

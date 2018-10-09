<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{

    public $timestamps = false;

    function reports()
    {
        return $this->belongsTo(Report::class);
    }
}

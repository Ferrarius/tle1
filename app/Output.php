<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}

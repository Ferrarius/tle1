<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = [];
    function reports()
    {
        return $this->hasMany(Report::class);
    }
}

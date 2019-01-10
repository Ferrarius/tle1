<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
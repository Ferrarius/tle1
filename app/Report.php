<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\BinaryUuid\HasBinaryUuid;

class Report extends Model
{
    use HasBinaryUuid;

    protected $guarded = [];

    public $incrementing = false;

    protected $appends = ['is_public'];

    function house()
    {
        return $this->belongsTo(House::class);
    }

    function outputs()
    {
        return $this->hasMany(Output::class);
    }

    function getIsPublicAttribute()
    {
        return $this->house->user == null;
    }
}

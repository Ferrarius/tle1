<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Output extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'saving_euro', 'amount', 'gas', 'surface', 'usage', 'investment', 'saving_meter', 'saving_gas', 'payback', 'suitability', 'saving_kwh', 'project_uuid'];

    protected $uuids = [
        'report_uuid'
    ];

    function reports()
    {
        return $this->belongsTo(Report::class);
    }
}

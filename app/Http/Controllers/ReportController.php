<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(Report $report)
    {
        $house = $report->house;
        $firstReport = $house->reports()->with('outputs')->first();
        $report->load('outputs');
        $nameArray = $report->outputs->pluck('name')->toArray();
        foreach($firstReport->outputs as $r) {
            $r->completed = 0;
            if(!in_array($r->name, $nameArray)) {
                $r->completed = 1;
                $report->outputs[] = $r;
            }
        }

        $report->outputs = $report->outputs->sortBy('name');

        return view('report.show', compact('house','report'));
    }
}

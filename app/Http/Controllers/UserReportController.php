<?php

namespace App\Http\Controllers;

use App\House;
use App\Report;
use App\Output;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    function show(Request $request, House $house, Report $report)
    {

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

    function store(Request $request)
    {
        // Create some report and put in DB
        dd($request->all());

        return redirect()->route('user.report.show', ['report' => new Report]); // send the report to this route
    }

    function delete(House $house, Report $report)
    {
        $report->delete();

        return redirect()->route('user.reports');
    }

    function update(Request $request, House $house, Report $report)
    {
        $report->load('outputs');
        $newReport = $report->replicate();
        $newReport->save();
        return redirect()->route('report.show', compact('house', 'newReport'));
    }

    function finishOutput(Request $request, House $house, Report $report, Output $output)
    {
        $newReport = $report->replicate();
        $newOutputs = $report->outputs->except($output->id);

        $newReport->save();
        foreach($newOutputs as $output) {
            $output->report_id = $newReport->id;
            $newOutput = $output->replicate();
            $newOutput->save();
        }

        return redirect()->route('report.show', compact('house', 'newReport'));
    }
}

<?php

namespace App\Http\Controllers;

use App\House;
use App\Report;
use App\Output;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function show(Request $request, House $house, Report $report)
    {
        $firstReport = $house->reports()->with('outputs')->first();
        $lastReport = $report->load('outputs');
        dd($firstReport->outputs->intersect($lastReport->outputs()));
        dd($report);
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
        $report = $report->with('outputs')->first();
        $newReport = $report->replicate();
        $newReport->save();
        return redirect()->route('report.show', compact('house', 'newReport'));
    }

    function finishOutput(Request $request, House $house, Report $report, Output $output)
    {
//        $report = $report->with('outputs')->first();
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

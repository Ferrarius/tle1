<?php

namespace App\Http\Controllers;

use App\House;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function show(Request $request, House $house, Report $report)
    {
        return view('report.show', compact('report'));
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
}

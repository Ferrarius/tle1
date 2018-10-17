<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReportController extends Controller
{
    function index()
    {
        $reports = Auth::user()->reports;

        return view('report.index', compact('reports'));
    }

    function show(Request $request, Report $report)
    {
        return view('report.show', compact('report'));
    }

    function store(Request $request)
    {
        // Create some report and put in DB
        dd($request->all());

        return redirect()->route('user.report.show', ['report' => new Report]); // send the report to this route
    }

    function delete(Report $report)
    {
        $report->delete();

        return redirect()->route('user.reports');
    }
}

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

        return view('report.index');
    }

    function show(Request $request, Report $report)
    {
        return view('report.show', compact('report'));
    }
}

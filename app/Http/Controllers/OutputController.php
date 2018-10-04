<?php

namespace App\Http\Controllers;

use App\Output;
use Illuminate\Http\Request;

class OutputController extends Controller
{
    public function index()
    {
        $outputs = Output::all();

        return view('output.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInputController extends Controller
{
    public function edit()
    {
        if(Auth::check()){
            $input = Auth::user()->input;
        }
        else{
            $input = "";
        }
        return view('input.edit', compact('input'));
    }

    public function update(Request $request)
    {
        $input = Auth::user()->input? Auth::user()->input : Auth::user()->input()->create();
        $input->fill($request->all());
        $input->save();

        return redirect()->back()->with(['status' => 'Your inputs has been saved']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productsController extends Controller
{
    public function show(){
        return view('pages.enter_product');
    }

    public function store(Request $request){
        return $request->name;
    }


}

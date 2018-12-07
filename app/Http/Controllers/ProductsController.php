<?php

namespace App\Http\Controllers;

use App\Product;
use App\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.products', compact('products'));
    }

    public function index_create(){
        return view('products.enter');
    }

    public function create(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'link' => $request->link
        ]);

        return view('products.enter');
    }

    public function update($product){

    }

    public function delete($product){

    }

    public function detail($product){
        return view('products.detail');
    }
}

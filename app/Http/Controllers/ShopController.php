<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index()
    {
        $products=product::all();
        return view('master.master-products',compact('products'));
    }
    public function show($slug)
    {
        $products=product::take(4)->get();
        $product=product::where('slug','=',$slug)->first();
        return view('master.master-product-detail',compact('product','products'));

    }
}

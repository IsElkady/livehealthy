<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();                                            // Get all products

        return  view('master.master',compact('products'));     // Show all products

    }
}

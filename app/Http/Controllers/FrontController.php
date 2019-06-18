<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{
    public function index() {
        $products = Product::all();

        // return all products
        return view('front.index', ['products' => $products]);
    }

    public function show(int $id) {
        // return a specific product
        return Product::find($id);
    }
}

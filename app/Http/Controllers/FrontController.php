<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{    
    protected $paginate = 6;

    public function index() {
        // get all products with pagination by 6
        $products = Product::published()->paginate($this->paginate);

        // return index.blade.php
        return view('front.index', ['products' => $products]);
    }

    public function show(int $id) {
        // get a specific product
        $product = Product::find($id);

        // return show.blade.php
        return view('front.show', ['product' => $product]);
    }

    public function sales() {
        // get all sales products with pagination by 6
        $products = Product::published()->sales()->paginate($this->paginate);

        // return index.blade.php
        return view('front.sales', ['products' => $products]);
    }

    public function categorie(int $id) {
        // get all products with pagination by 6
        $products = Product::published()->categorie($id)->paginate($this->paginate);

        // return index.blade.php
        return view('front.categorie', ['products' => $products]);
    }
}

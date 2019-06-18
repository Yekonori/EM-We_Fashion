<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{    
    // Default paginate value
    protected $paginate = 6;

    public function index() {
        /*
         * Get all published products
         * with default pagination
         */
        $products = Product::published()->paginate($this->paginate);

        // return index.blade.php with the $products varaible
        return view('front.index', ['products' => $products]);
    }

    public function show(int $id) {
        // get a specific product
        $product = Product::find($id);

        // return show.blade.php with the $product varaible
        return view('front.show', ['product' => $product]);
    }

    public function sales() {
        /*
         * Get all published sales products
         * with default pagination
         */
        $products = Product::published()->sales()->paginate($this->paginate);

        // return index.blade.php with the $products varaible
        return view('front.sales', ['products' => $products]);
    }

    public function categorie(int $id) {
        /*
         * Get all published products of a categorie
         * with default pagination
         */
        $products = Product::published()->categorie($id)->paginate($this->paginate);

        // return index.blade.php with the $products varaible
        return view('front.categorie', ['products' => $products]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;

class ProductController extends Controller
{
    // Default paginate value
    protected $paginate = 15;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Get all products
         * with default pagination
         */
        $products = Product::paginate($this->paginate);

        // return index.blade.php with the $products varaible
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::pluck('categorie', 'id')->all();

        return view('back.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // All the fields validators
        $this->validate($request, [
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:99999.99',
            'size.*' => 'required|array',
            'picture' => 'required|image|mimes:jpeg,png,jpg,svg',
            'visibility' => 'required|in:published,unpublished',
            'status' => 'required|in:standard,sale',
            'reference' => 'required|alpha_num',
            'categorie_id' => 'required|string'
        ]);

        // Stock the request
        $datas = $request->all();
        if(!empty($datas["size"])) {
            // Implode the size's array to get a string
            $datas["size"] = implode(',', $request->size);   
        }

        // Picture : 
        $picture = $request->file('picture');
        
        if (!empty($picture)) {
            // Store the picture in the products folder
            $picture->store('products');
            $datas["picture"] = 'products/' . $picture->hashName();
        }

        // Create the product
        $product = Product::create($datas);

        // Redirection to categorie/index
        return redirect()->route('products.index')->with('message', 'Produit crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the product
        $product = Product::find($id);
        // Pluck all categories and id
        $categories = Categorie::pluck('categorie', 'id')->all();

        return view('back.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // All the fields
         $this->validate($request, [
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:99999.99',
            'size' => 'required|array',
            'picture' => 'image|mimes:jpeg,png,jpg,svg',
            'visibility' => 'required|in:published,unpublished',
            'status' => 'required|in:standard,sale',
            'reference' => 'required|alpha_num|min:16|max:16',
            'categorie_id' => 'required|string'
        ]);

        // Stock the request
        $datas = $request->all();
        // Stock the request
        $datas = $request->all();

        if(!empty($datas["size"])) {
            // Implode the size's array to get a string
            $datas["size"] = implode(',', $request->size);   
        }

        // Picture : 
        $picture = $request->file('picture');
        
        if (!empty($picture)) {
            // Store the picture in the products folder
            $picture->store('products');
            $datas["picture"] = 'products/' . $picture->hashName();
        }

        // Find the product
        $product = Product::find($id);

        // Update the product
        $product->update($datas);

        // Redirection to products/index.blade.php
        return redirect()->route('products.index')->with('message', 'Produit édité avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the product
        $product = Product::find($id);

        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('message', 'Produit supprimé avec succès');
    }
}

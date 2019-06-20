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
        // All the fields
        $this->validate($request, [
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:99999.99',
            'size.*' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,svg',
            'visibility' => 'required|in:published,unpublished',
            'status' => 'required|in:standard,sale',
            'reference' => 'required|alpha_num',
            'categorie_id' => 'required|string'
        ]);

        $datas = $request->all();
        $datas["size"] = implode(',', $request->size);

        // Picture : 
        $picture = $request->file('picture');
        
        if (!empty($picture)) {
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
        $product = Product::find($id);
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
            'size.*' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg,svg',
            'visibility' => 'required|in:published,unpublished',
            'status' => 'required|in:standard,sale',
            'reference' => 'required|alpha_num',
            'categorie_id' => 'required|string'
        ]);

        $datas = $request->all();
        $datas["size"] = implode(',', $request->size);

        // Picture : 
        $picture = $request->file('picture');
        
        if (!empty($picture)) {
            $picture->store('products');
            $datas["picture"] = 'products/' . $picture->hashName();
        }

        // Find the product
        $product = Product::find($id);

        $product->update($datas);

        // Redirection to categorie/index
        return redirect()->route('products.index')->with('message', 'Produit crée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
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
         * Get all categories
         * with default pagination
         */
        $categories = Categorie::paginate($this->paginate);

        // return index.blade.php with the $products varaible
        return view('back.categorie.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('back.categorie.create');
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
            'categorie' => 'required|string|max:100'
        ]);

        // Create the categorie
        $categorie = Categorie::create($request->all());

        // Redirection to categorie/index
        return redirect()->route('categories.index')->with('message', 'Catégorie créée avec succès');
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
        // Find the categorie
        $categorie = Categorie::find($id);

        return view('back.categorie.edit', ['categorie' => $categorie]);
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
        // All the fields validators
        $this->validate($request, [
            'categorie' => 'required|string'
        ]);

        // Find the categorie
        $categorie = Categorie::find($id);

        // Update the categorie
        $categorie->update($request->all());

        // Redirection to categorie/index
        return redirect()->route('categories.index')->with('message', 'Catégorie éditée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the categorie
        $categorie = Categorie::find($id);

        // Delete the categorie
        $categorie->delete();

        return redirect()->route('categories.index')->with('message', 'Catégorie supprimé avec succès');
    }
}

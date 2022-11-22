<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Product::all();


        return view('accueil', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayData = $request->all();
        $query = $arrayData['query'];


        $words = '%' . $query . '%';


        if (strlen($query) >= 2) {
            $articles = Product::where('description', 'like', $words)->get();
        }

        return view('accueil', [
            'articles' => $articles
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $article = Product::findOrFail($id);
        $categorie = Product::find($id)->category;
        $productsMany = Product::find($id)->ingredients()->get();
        $test1 = Product::find($id)->ingredients()->get();
        $test = $test1->where('type', 'toping');

        $bases_ingredients = Ingredient::Where('type', '=', 'base')->get();
        $topings = Ingredient::Where('type', '=', 'toping')->get();
        $perles = Ingredient::Where('type', '=', 'perle')->get();

        return view('article', [
            'test' => $test,
            'id' => $id,
            'article' => $article,
            'categorie' => $categorie,
            'productsMany' => $productsMany,
            'bases_ingredients' => $bases_ingredients,
            'topings' => $topings,
            'perles' => $perles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

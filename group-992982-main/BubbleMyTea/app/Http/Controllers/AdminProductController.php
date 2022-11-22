<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\ProductIngredient;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('products.adminProduct', [
            'products' => $products,
            'categories' => $categories,
            'ingredients' => $ingredients
        ]);
    }


    public function create()
    {
        //
    }

    public function verificationNombreIngredientAvecToping($data, $nbIngredient)
    {

        $nbIngredientAvecToping = 0;
        $i = 1;
        $j = 0;
        while ($j < 4) {
            if ($data['ingredient' . $i] != null) {
                $nbIngredientAvecToping++;
            }
            $j++;
            $i++;
        }

        if ($nbIngredientAvecToping == $nbIngredient) {
            return true;
        } else {
            return false;
        }
    }

    public function ajouterEnBddIngredient($data, $idProduct)
    {
        $i = 1;
        $j = 0;
        while ($j < 4) {
            if ($data['ingredient' . $i] != null) {

                ProductIngredient::create([
                    'product_id' => $idProduct,
                    'ingredient_id' => $data['ingredient' . $i],
                ]);
            }
            $j++;
            $i++;
        }
    }


    public function store(request $request)
    {

        if ($this->verificationNombreIngredientAvecToping($request->all(), $request->nb_ingredient)) {
        } else {
            return redirect()->route('adminProduct')->with('success', 'le nombre de toping n est pas bon');
        }


        $request->validate([
            'name' => 'required|string|min:2|unique:products',
            'price' => 'required|numeric',
            'description' => 'required|string|min:2',
            'nb_ingredient' => 'required|numeric',
            'ingredient1' => 'required|string',
            'image' => 'required|string|min:2',
            'fileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        DB::transaction(function () use ($request) {
            //recuperation extension et concat pour que le nom soit unique et pas avoir de conflit
            $imageName = time() . '-' . "$request->image" . '.' . $request->file('fileImage')->getClientOriginalExtension();
            // storage dans le dossier public img
            $file = $request->file('fileImage');
            $file->move('img', $imageName);
            // create a new product in the database and return the product


            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'nb_ingredients' => $request->nb_ingredient + 1,
                'image' => $imageName,
                'date' => now(),
                'category_id' => '1'

            ]);

            $idProduit = DB::getPdo()->lastInsertId();
            $this->ajouterEnBddIngredient($request, $idProduit);
        });

        return back()->with('success', 'Produit ajouté avec succès');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,  $id)
    {

        $request->validate([

            'name' => 'required|string|min:2',
            'price' => 'required|numeric|between:0,20',
            'description' => 'required|string|min:2',
            'nb_ingredients' => 'required|numeric|between:0,5',
            'category_id' => 'required|integer|min:1',
        ]);



        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->nb_ingredients = $request->input('nb_ingredients');
        $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('adminProduct')->with('success', 'les modifications sont faites !');
    }


    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('adminProduct')->with('success', 'le produit a bien été supprimé');
    }
}

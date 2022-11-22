<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductIngredientRequest;
use App\Http\Requests\UpdateProductIngredientRequest;
use App\Models\ProductIngredient;

class ProductIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProductIngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductIngredientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductIngredient  $productIngredient
     * @return \Illuminate\Http\Response
     */
    public function show(ProductIngredient $productIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductIngredient  $productIngredient
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductIngredient $productIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductIngredientRequest  $request
     * @param  \App\Models\ProductIngredient  $productIngredient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductIngredientRequest $request, ProductIngredient $productIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductIngredient  $productIngredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductIngredient $productIngredient)
    {
        //
    }
}

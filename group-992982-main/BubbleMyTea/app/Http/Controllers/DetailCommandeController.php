<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\NumHistoryCommande;

class DetailCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Http\Requests\StoreDetailCommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailCommande  $detailCommande
     * @return \Illuminate\Http\Response
     */
    public function show($detailCommande)
    {
        $CommandesDetaillerUser = NumHistoryCommande::find($detailCommande)->detailCommandes;

        return view('detailCommande', [
            'CommandesDetaillerUser' => $CommandesDetaillerUser,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailCommande  $detailCommande
     * @return \Illuminate\Http\Response
     */
    public function edit($detailCommande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailCommandeRequest  $request
     * @param  \App\Models\DetailCommande  $detailCommande
     * @return \Illuminate\Http\Response
     */
    public function update($request,  $detailCommande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailCommande  $detailCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy($detailCommande)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\DetailCommande;
use App\Models\NumHistoryCommande;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreNumHistoryCommandeRequest;
use App\Http\Requests\UpdateNumHistoryCommandeRequest;

class NumHistoryCommandeController extends Controller
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
     * @param  \App\Http\Requests\StoreNumHistoryCommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumHistoryCommandeRequest $request)
    {
        if (auth()->user() == null) {
            session()->flash('success', 'Il faut être connecté !');
            return redirect()->route('cart.list');
        } else {


            DB::transaction(function () {
                $id = auth()->user()->id;
                $email = auth()->user()->email;
                $name = auth()->user()->name;
                $total = Cart::getTotalQuantity();
                $price_total = Cart::getTotal();

                $cartItems = Cart::getContent();
                NumHistoryCommande::create([
                    'user_id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'total_products' => $total,
                    'date' => now(),
                    'tva' => 5.5,
                    'price_witout_tva' => $price_total * 0.95,
                    'price_with_tva' => $price_total,
                    'email_verified_at' => now(),


                ]);
                $idNumHistoryCommande = DB::getPdo()->lastInsertId();
                foreach ($cartItems as $key => $item) {

                    DetailCommande::create([
                        'title' => $item->name,
                        'price' => $item->price,
                        'date' => now(),
                        'quantity' => $item->quantity,
                        'nb_ingredients' => $item->attributes->nb_toping,
                        'base' => $item->attributes->base,
                        'toping1' => $item->attributes->toping1,
                        'toping2' => $item->attributes->toping2,
                        'toping3' => $item->attributes->toping3,
                        'toping4' => $item->attributes->toping4,
                        'perle' => $item->attributes->perle,
                        'sucre' => $item->attributes->sucre,
                        'num_history_commande_id' => $idNumHistoryCommande,

                    ]);
                }
            });

            Cart::clear();
            session()->flash('success', 'Votre produit est bien payé !');
            return redirect()->route('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumHistoryCommande  $NumHistoryCommande
     * @return \Illuminate\Http\Response
     */
    public function show(NumHistoryCommande $NumHistoryCommande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NumHistoryCommande  $NumHistoryCommande
     * @return \Illuminate\Http\Response
     */
    public function edit(NumHistoryCommande $NumHistoryCommande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNumHistoryCommandeRequest  $request
     * @param  \App\Models\NumHistoryCommande  $NumHistoryCommande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumHistoryCommandeRequest $request, NumHistoryCommande $NumHistoryCommande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumHistoryCommande  $NumHistoryCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumHistoryCommande $NumHistoryCommande)
    {
        //
    }
}

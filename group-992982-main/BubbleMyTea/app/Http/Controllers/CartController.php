<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::getContent();

        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {


        Cart::add([
            'id' => $request->id,
            'name' => $request->nom,
            'price' => $request->prix,
            'quantity' => $request->quantite,
            'attributes' => array(
                'nb_toping' => ($request->nb_ingredients - 1),
                'base' => $request->base,
                'toping1' => $request->toping1,
                'toping2' => $request->toping2,
                'toping3' => $request->toping3,
                'toping4' => $request->toping4,
                'perle' => $request->perle,
                'sucre' => $request->sucre,
            )
        ]);
        session()->flash('success', 'Votre produit est bien ajouté !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Votre produit est bien modifié.');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        session()->flash('success', 'Votre produit est supprimé.');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'l ensemble des produits sont supprimes.');

        return redirect()->route('cart.list');
    }
}

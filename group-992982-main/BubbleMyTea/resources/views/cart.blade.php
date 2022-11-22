@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/panier.css') }}">

@section('content')
<main>

    @if ( Cart::getTotal() > 0 )

    <section>
        <h1> panier </h1>
        @if ($message = Session::get('success'))
        <p>{{$message}}
        </p>
        @endif
        <!-- <p>{{ $cartItems }}</p> -->
    </section>
    <section>
        @foreach ($cartItems as $key => $item)
        <article data-aos="flip-left" data-aos-duration="3000">
            <div>
                <p> <span>nom :</span> {{$item->name}} </p>
                <p> <span>prix :</span> {{$item->price}} € </p>
                <p> <span>quantité :</span> {{$item->quantity}} </p>
                <p> <span>nombre d'ingredients :</span> {{$item->attributes->nb_toping}} </p>
                <p> <span>base :</span> {{$item->attributes->base}} </p>
                @if (($item->attributes->toping1) != null)
                <p> <span>toping 1 :</span> {{$item->attributes->toping1}} </p>
                @endif
                @if (($item->attributes->toping2) != null)
                <p> <span>toping 2 :</span> {{$item->attributes->toping2}} </p>
                @endif
                @if (($item->attributes->toping3) != null )
                <p> <span>toping 3 :</span> {{$item->attributes->toping3}} </p>
                @endif
                @if (($item->attributes->toping4) != null)
                <p> <span>toping 4 :</span> {{$item->attributes->toping4}} </p>
                @endif
                <p> <span>perle :</span> {{$item->attributes->perle}} </p>
                <p> <span>sucré :</span> {{$item->attributes->sucre}} </p>
                <form action="{{route('cart.update')}}" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id" value={{$item->id}}>
                    <input type="number" id="quantity" name="quantity" value={{$item->quantity}}>
                    <button type="submit">modifier quantité</button>
                </form>
                <form action="{{route('cart.remove')}}" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id" value={{$item->id}}>
                    <button type="submit">supprimer</button>
                </form>
            </div>
        </article>
        @endforeach
        <div>Nombre total de produit : {{Cart::getTotalQuantity()}}</div>
        <div>
            Total: {{ Cart::getTotal()}} €
        </div>
        <div>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="">Retirer l'ensemble des produits </button>
            </form>
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                <button type="submit">Acheter</button>
            </form>
        </div>
    </section>
    @else
    <p>panier vide</p>
    @endif
</main>

@endsection
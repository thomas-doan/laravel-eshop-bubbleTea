@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/detailCommande.css') }}">
@section('content')

<main>
    <section>
        <article>
            <h1><span>Detail de la commande</span></h1>
            @foreach($CommandesDetaillerUser as $key => $detailCmd )
            <div class="delimiter">
                <p> <span>Nom :</span> {{ $detailCmd->title }}</p>
                <p> <span>Prix unitaire :</span> {{ $detailCmd->price }} €</p>
                <p> <span>Date :</span> {{$detailCmd->date}}</p>
                <p> <span>Nombre acheté :</span> {{$detailCmd->quantity}}</p>
                <p> <span>Nombre d'ingredient (toping) :</span> {{$detailCmd->nb_ingredients}}</p>
                <p> <span>base Bubble Hero :</span> {{$detailCmd->base}}</p>
                <p> <span>toping 1:</span> {{$detailCmd->toping1}}</p>
                <p> <span>toping 2:</span> {{$detailCmd->toping2}}</p>
                <p> <span>toping 3:</span> {{$detailCmd->toping3}}</p>
                <p> <span>toping 4:</span> {{$detailCmd->toping4}}</p>
                <p> <span>type de perle :</span> {{$detailCmd->perle}}</p>
                <p> quantité de sucre : {{$detailCmd->sucre}}</p>
            </div>
            @endforeach
            <button><a href="{{ route('profile') }}">Retour</a></button>
        </article>
    </section>
</main>

@endsection
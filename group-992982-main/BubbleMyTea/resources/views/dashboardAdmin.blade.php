@extends('layoutAdmin.app')
<link rel="stylesheet" href="{{ asset('css/layoutAdmin/dashboardAdmin.css') }}">
@section('content')

<main>

    <div class="container">
        <section class="dashboardFi">
            <article>
                <h1>Ratio financier</h1>
                <p> Chiffre d'affaire : {{$sum}} € </p>
                <p> Nombre total de commande : {{$sumCommandes}}</p>
            </article>
        </section>

        <section>
            @csrf
            <!-- display message from DashBoard -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
            @endif

            <h2> <span>Historique des commandes</span> </h2>
            <article>

                @foreach ($commandes as $key => $commande)
                <div class="formCommande">
                    <h3><span>Commande numero :</span> {{$key+1}}</h3>
                    <p> <span>Nom :</span> {{ $commande->name }} </p>
                    <p> <span>Email :</span> {{$commande->email}} </p>
                    <p> <span>Nombre de produit acheté :</span> {{$commande->total_products}} </p>
                    <p> <span>Prix total de la commande :</span> {{$commande->price_with_tva}} €</p>
                    <p> <span>Date de la commande :</span> {{$commande->created_at}}</p>
                </div>
                @endforeach
            </article>
        </section>
    </div>

</main>

@endsection
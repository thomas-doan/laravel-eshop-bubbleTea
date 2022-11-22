@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/accueil.css') }}">

@section('content')
<main>
    @if ($message = Session::get('success'))
    <p>{{$message}}
    </p>
    @endif
    <div data-aos="zoom-out" data-aos-duration="3000">
        <h1>Notre philosophie Bubble Hero</h1>
        <p>Le bubble tea Hero, est d'origine Bio mais également sourcé avec des produits locaux.<br>
            Cette démarche authentique est essentielle pour vous proposer des produits d'exceptions.
        </p>
    </div>

    <section>
        <div class="container_responsive">
            <div id="img2" class=" card" data-aos="zoom-in-up" data-aos-duration="3000">
                <div class="imgBx">
                    <img src="{{ asset('img/lait.png') }}">

                </div>
                <div class="contentBx">
                    <div class="content">
                        <h3>La passion</h3>
                        <p>De l'information pour vous transmettre le gout du bubble tea HERO !</p>
                    </div>


                </div>
            </div>
            <div id="img1" class="card" data-aos="fade-up" data-aos-duration="3000">
                <div class="imgBx">
                    <img src="{{ asset('img/the.png') }}">
                </div>
                <div class="contentBx">
                    <div class="content">
                        <h3>Voyage</h3>
                        <p>Passionnés, nouvelle culture, on souhaite vous faire partager notre quotidien.</p>
                    </div>
                </div>
            </div>

            <div id="img3" class="card" data-aos="zoom-in-down" data-aos-duration="3000">
                <div class="imgBx">
                    <img src="{{ asset('img/tapioca.png') }}">
                </div>
                <div class="contentBx">
                    <div class="content">
                        <h3>Transparence</h3>
                        <p>Partager des bubbles d'exceptions en respectant le travail de nos partenaires.</p>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <h2> Nos magnifiques produits : </h2>

    <div class="container_products">
        <section>
            @foreach ($articles as $article)

            <div class="card_product" data-aos="fade-down" data-aos-duration="3000">

                <div class="content_general">
                    <h3>{{ $article->name }}</h3>
                    <p>{{ $article->description }}</p>
                    <p>nombre d'ingredients : {{ $article->nb_ingredients }}</p>
                    <p>{{ $article->price }} €</p>
                    <a href="{{ route('article.show', ['id' => $article->id]) }}">Voir le produit</a>
                </div>
                <div>
                    <a href="{{ route('article.show', ['id' => $article->id]) }}"> <img src="{{ asset('img/' . $article->image) }}"> </a>
                </div>

            </div>
            @endforeach
        </section>
    </div>



</main>

@endsection
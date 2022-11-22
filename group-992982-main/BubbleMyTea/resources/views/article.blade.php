@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/article.css') }}">

@section('content')
<main>
    <section>
        <form action="{{route('cart.store')}}" method="post">
            @csrf
            <article>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @foreach( $errors->all() as $error)
                {{ $error }}
                @endforeach
                <div data-aos="fade-up" data-aos-duration="3000">
                    <input type="hidden" id="id" name="id" value={{$article->id}}>
                    <H1> Detail de notre {{$article->name}} </h1>
                    <input type="hidden" id="base" name="nom" value="{{$article->name}}">

                    <p> <span>description :</span> {{$article->description}} </p>
                    <p> <span>prix :</span> {{$article->price}} € </p>
                    <input type="hidden" id="base" name="prix" value={{$article->price}}>

                    <p> <span>Categorie :</span> {{$categorie->name}} </p>

                    <p> <span>Nombre d'ingredients :</span> {{($article->nb_ingredients)-1}} </p>
                    <input type="hidden" id="base" name="nb_ingredients" value={{$article->nb_ingredients}}>

                    @forelse ($productsMany as $key => $ingredient)
                    @if ($ingredient->type == 'base')

                    <p> <span>{{$ingredient->type}} :</span> {{$ingredient->ingredient}}</p>
                    @if (($article->nb_ingredients)-1 == 1)
                    <h3> <span> Toping : </span> </h3>
                    @else
                    <h3> <span> Topings : </span> </h3>
                    @endif
                    <input type="hidden" id="base" name="{{$ingredient->type}}" value="{{$ingredient->ingredient}}">
                    @elseif ($ingredient->type == 'toping')
                    <select name="toping{{$key}}" id="toping">

                        @foreach ($topings as $toping)
                        @if ($toping->ingredient == $ingredient->ingredient)

                        <option value="{{ $toping->ingredient }}" selected>{{ $toping->ingredient }}</option>
                        @else
                        <option value="{{ $toping->ingredient }}">{{ $toping->ingredient }}</option>
                        @endif
                        @endforeach
                    </select>

                    @endif
                    @empty
                    @endforelse
                    <h3> <span> Vos perles : </span> </h3>
                    <select name="perle" id="base">

                        @foreach ($perles as $perle)
                        @if ($perle->ingredient == 'tapioca classique')
                        <option value="{{ $perle->ingredient }}" selected>{{ $perle->ingredient }}</option>
                        @else
                        <option value="{{ $perle->ingredient }}">{{ $perle->ingredient }}</option>
                        @endif
                        @endforeach
                    </select>

                    <h3> <span> Sucré ou non : </span> </h3>
                    <select name="sucre" id="base">
                        <option value="1">non sucré</option>
                        <option value="2">peu sucré</option>
                        <option value="3">moyennement sucré</option>

                    </select>
                    <h3> <span> combien de Bubble Héro à partager ? : </span> </h3>
                    <select name="quantite" id="quantite">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>

                    </select>
                    <button>commander</button>
                    @if(isset($error))
                    <p class="error"> {{$error}} </p>

                    @endif
                </div>

                <img src="{{ asset('img/' . $article->image) }}" data-aos="zoom-in-down" data-aos-duration="3000">
            </article>


    </section>

</main>

@endsection
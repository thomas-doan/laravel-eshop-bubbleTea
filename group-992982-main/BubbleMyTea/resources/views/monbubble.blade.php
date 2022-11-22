@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/monbubble.css') }}">

@section('content')
<main>
    <h1> Ton meilleur Bubblddde tea Hero est ici ! </h1>

    <section>
        <form action="{{route('cart.store')}}" method="post">
            @csrf
            <article>
                <h2> Choisis ton Bubble Tea Hero, et personnalise-le ! </h2>
                <h3> base du Bubble : </h3>
                <select name="base" id="base">

                    @foreach ($bases_ingredients as $base)
                    <option value="{{ $base->ingredient }}">{{ $base->ingredient }}</option>
                    @endforeach
                </select>

                @for ($i = 0; $i <= 3; $i++) <h3> toping {{ $i + 1 }} : </h3>
                    <select name="toping{{ $i + 1 }}" id="toping{{ $i + 1 }}">
                        <option></option>
                        @foreach ($topings as $toping)
                        <option value="{{ $toping->ingredient }}">{{ $toping->ingredient }}</option>
                        @endforeach
                    </select>


                    @endfor

                    <h3> Vos perles : </h3>
                    <select name="perle" id="base">

                        @foreach ($perles as $perle)
                        <option value="{{ $perle->ingredient }}">{{ $perle->ingredient }}</option>
                        @endforeach
                    </select>

                    <h3> Sucré ou non : </h3>
                    <select name="sucre" id="base">
                        <option value="1">peu sucré</option>
                        <option value="2">moyennement sucré</option>
                        <option value="3">très sucré</option>

                    </select>
                    <button style="cursor:pointer" type="submit">Valide</button>
                    @if(isset($error))
                    <p class="error"> {{$error}} </p>

                    @endif
            </article>
        </form>

    </section>
</main>

@endsection
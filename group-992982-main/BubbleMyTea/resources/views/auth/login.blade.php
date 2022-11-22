@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('content')

<main>

    <form class="formLogin" action="{{ route('authentification') }}" method="post">
        @csrf
        <h1>Login Account</h1>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">

        @if (session('Deletesuccess'))
        <div class="alert alert-success">
            {{ session('Deletesuccess') }}
        </div>
        @endif

        <div class="errordisplay">
            @foreach( $errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        <div class="btn-log">
            <button type="submit">Login</button>
            <a href="#">Forgot password?</a>
        </div>

        <!-- add line Or -->
        <div class="line">
            <span>OR</span>
        </div>

        <!-- Register -->
        <div class="URLregister">
            <p>Need an account?</p>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </form>

</main>


@endsection
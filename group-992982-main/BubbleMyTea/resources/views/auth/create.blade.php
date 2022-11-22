@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@section('content')

<main>
    <form class="formRegister" method="POST" action="/register">
        {{ csrf_field() }}
        <h1>Register your account</h1>

        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name...">

        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address...">

        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password...">

        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your password again...">

        <div class="errordisplay">
            <!-- display error if password and confirme password are not same -->
            @foreach( $errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>

        <button style="cursor:pointer" type="submit">Sign up</button>

        <!-- add line Or -->
        <div class="line">
            <span>OR</span>
        </div>

        <!-- Login -->

        <div class="URLlogin">
            <p>Already have an account?</p>
            <a href="{{ route('login') }}">Login</a>
        </div>

    </form>
</main>

@endsection
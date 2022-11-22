@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')

<main>
    <h1><span>Profile</span></h1>

    <section>
        <article>
            <h1>information utilisateur</h1>


            <form method="POST" action="/editProfile/{{ auth()->user()->id }}">
                {{ csrf_field() }}
                @method('PUT')
                <!-- display the message from ProfileController.php -->

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @foreach( $errors->all() as $error)
                {{ $error }}
                @endforeach

                <h2><span> Mettre à jour son profil : </span></h2>
                <label for="name"><span>Name</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name..." value="{{ auth()->user()->name }}">

                <label for="email"><span>Email</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address..." value="{{ auth()->user()->email }}">

                <label for="telephone"><span>Telephone</span></label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter your telephone number..." value="{{ auth()->user()->telephone }}">

                <label for="adresse"><span>Adresse</span></label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter your adresse..." value="{{ auth()->user()->adresse }}">

                <label for="ville"><span>Ville</span></label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter your ville..." value="{{ auth()->user()->ville }}">

                <label for="code_postal"><span>Code Postal</span></label>
                <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Enter your code postal..." value="{{ auth()->user()->code_postal }}">

                <label for="pays"><span>Pays</span></label>
                <input type="text" class="form-control" id="pays" name="pays" placeholder="Enter your pays..." value="{{ auth()->user()->pays }}">

                <button style="cursor:pointer" type="submit">Update</button>
            </form>




            <form method="POST" action="/editPassword">
                {{ csrf_field() }}
                @method('PUT')
                <!-- Display the message from delete succesfull -->

                @if (session('Passwordsuccess'))
                <div>
                    {{ session('Passwordsuccess') }}
                </div>
                @endif


                @if (session('Passworderror'))
                <div>
                    {{ session('Passworderror') }}
                </div>
                @endif

                <h2><span>Change your password</span></h2>
                <label for="password"><span>Password</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password...">
                <label for="password_confirmation"><span>Password Confirmation</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your password again...">

                <button style="cursor:pointer" type="submit">Update</button>
            </form>

            <!-- Add delete account -->
            <form method="POST" action="/deleteAccount">
                {{ csrf_field() }}
                @method('DELETE')

                @if (session('DeleteFail'))
                <div class="alert alert-danger">
                    {{ session('DeleteFail') }}
                </div>
                @endif

                <!-- display the message from ProfileController.php -->
                @if (session('deleteAccount'))
                <div class="alert alert-success">
                    {{ session('deleteAccount') }}
                </div>
                @endif

                <h1>Delete your account</h1>
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password...">
                <div class="errordisplay">

                </div>
                <button style="cursor:pointer" type="submit">Delete</button>
            </form>
        </article>
    </section>
    <section>
        <article>
            <h2> <span>Historique des commandes</span> </h2>
            @foreach ($commandesGlobaleUser as $key => $commandeGlobaleUser)
            <h3><span>Commande numero :</span> {{$key+1}}</h3>
            <p> <span>Nom :</span> {{ $commandeGlobaleUser->name }} </p>
            <p> <span>Email :</span> {{$commandeGlobaleUser->email}} </p>
            <p> <span>Nombre de produit acheté :</span> {{$commandeGlobaleUser->total_products}} </p>
            <p> <span>Prix total de la commande :</span> {{$commandeGlobaleUser->price_with_tva}} €</p>
            <p> <span>Date de la commande :</span> {{$commandeGlobaleUser->created_at}}</p>
            <a href="{{ route('detailCommande.show', ['id' =>$commandeGlobaleUser->id]) }}"> <button>Detail commande N°{{$key+1}}</button> </a>

            @endforeach
        </article>
    </section>

</main>

@endsection
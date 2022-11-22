@extends('layoutAdmin.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/layoutAdmin/productAdmin.css') }}">

<main>
    <div class="container">
        <h1>Administration Produit</h1>
        @if (session('success'))
        {{ session('success') }}


        @endif
        <section>
            <article>
                <h2> Créer un produit : </h2>
                <form action="{{ route('adminProductAdd') }}" method="POST" enctype="multipart/form-data" class="createProduct">
                    @csrf

                    <!-- display message from DashBoard -->

                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Description"></textarea>
                    <label for="nb_ingredient">Nombre de toping : </label>
                    <select name="nb_ingredient" id="nb_ingredient">
                        @for($i = 1; $i <= 4; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>

                    <p>Choisi les topings : </p>
                    <select name="ingredient1" id="ingredient1">
                        <option selected></option>
                        @foreach($ingredients as $ingredient)
                        @if($ingredient->type == 'toping')
                        <option value="{{ $ingredient->id }}">{{ $ingredient->ingredient }}</option>
                        @endif
                        @endforeach
                    </select>


                    <select name="ingredient2" id="ingredient2">
                        <option selected></option>
                        @foreach($ingredients as $ingredient)
                        @if($ingredient->type == 'toping')
                        <option value="{{ $ingredient->id }}">{{ $ingredient->ingredient }}</option>
                        @endif
                        @endforeach
                    </select>

                    <select name="ingredient3" id="ingredient3">
                        <option selected></option>
                        @foreach($ingredients as $ingredient)
                        @if($ingredient->type == 'toping')
                        <option value="{{ $ingredient->id }}">{{ $ingredient->ingredient }}</option>
                        @endif
                        @endforeach
                    </select>

                    <select name=" ingredient4" id="ingredient4">
                        <option selected></option>
                        @foreach($ingredients as $ingredient)
                        @if($ingredient->type == 'toping')
                        <option value="{{ $ingredient->id }}">{{ $ingredient->ingredient }}</option>
                        @endif
                        @endforeach
                    </select>

                    <p>Base Bubble Tea Hero : </p>
                    <select name="category" id="category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>



                    <label for="fileImage">fichier Image</label>
                    <input type="file" name="fileImage" id="fileImage" placeholder="fileImage">
                    <label for="fileImage">Image</label>
                    <input type="text" name="image" id="image" placeholder="nom image">

                    <button type="submit">Add Product</button>
                    @foreach( $errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </form>
            </article>
        </section>

        <section>

            <article>
                <h2> Nos produits : </h2>
                @foreach($products as $key => $product)
                <div class="ctn-tableau">

                    <form action="{{ route('adminProductUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!--  <p>affichage id : {{$product->id}} </p> -->

                        <p>name : {{$product->name}} </p>
                        <input type="text" name="name" value="{{ $product->name }}" placeholder="modifier">

                        <p>description : {{$product->description}} </p>
                        <textarea name="description" value="{{ $product->description }}" placeholder="modifier">{{ $product->description }}</textarea>
                        <p> prix : {{$product->price}} €</p>
                        <input type="text" name="price" value="{{ $product->price }}" placeholder="modifier">

                        <p>nbr toping : {{(($product->nb_ingredients))}} (inclue la base du bubble Hero)</p>
                        <input type="text" name="nb_ingredients" value="{{ $product->nb_ingredients }}" placeholder="modifier">

                        @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                        <p> categorie : {{$category->name}} </p>

                        @endif
                        @endforeach


                        <select name="category_id" id="toping">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <div>
                            <button>Modifier</button>
                        </div>
                    </form>
                    <div>
                        <img src="{{ asset('img/' . $product->image) }}">
                    </div>

                    <form action="{{ route('adminProductDestroy', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button><span>SUPPR<span></button>

                    </form>

                </div>

                @endforeach
            </article>
        </section>
    </div>

</main>

@endsection
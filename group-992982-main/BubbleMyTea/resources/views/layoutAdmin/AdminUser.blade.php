@extends('layoutAdmin.app')
<link rel="stylesheet" href="{{ asset('css/adminUser.css') }}">
@section('content')

<main>
    <!-- create a table with all field of the table user from database with delete and modify -->
    <div class="container">
        <h1>Admin User</h1>
        <!-- display the message from controller -->
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        <section>
            <article>
                <h2> Nos utilisateurs : </h2>
                <!-- display the all field from user with auth() -->

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">is_admin</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">ville</th>
                            <th scope="col">code_postal</th>
                            <th scope="col">pays</th>
                            <th scope="col">email_verified_at</th>
                            <th scope="col">modify</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <form action="{{ route('adminUserUpdate', $user->id) }}" method="POST">
                                @csrf
                                <th scope="row">{{ $user->id }}</th>
                                <td><input type="text" id="name" name="name" value="{{ $user->name }}"> </td>
                                <td><input type="email" id="email" name="email" value="{{ $user->email }}"></td>
                                <td><input type="text" id="telephone" name="telephone" value="{{ $user->telephone }}"></td>
                                <td><input type="number" id="is_admin" name="is_admin" value="{{ $user->is_admin }}"></td>
                                <td><input type="text" id="adresse" name="adresse" value="{{ $user->adresse }}"></td>
                                <td><input type="text" id="ville" name="ville" value="{{ $user->ville }}"></td>
                                <td><input type="number" id="code_postal" name="code_postal" value="{{ $user->code_postal }}"></td>
                                <td><input type="text" id="pays" name="pays" value="{{ $user->pays}}"></td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Modify</button>
                                </td>
                            </form>
                            <td>
                                <form action="{{ route('adminUserDestroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </section>

</main>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
</head>

<body>
    <h1>Vous êtes sur DashBoard</h1>

    <p>Bienvenue {{ auth()->user()->name }}</p>
    <p>Votre id est {{ auth()->user()->id }}</p>
    <p> {{ auth()->user()->is_admin }} </p>


    <a href="#" onclick="document.getElementById('logout-form').submit()">
        <form action="{{ route('logout') }}" method=" POST" id="logout-form">@csrf</form>

        Log Out
    </a>

</body>

</html>
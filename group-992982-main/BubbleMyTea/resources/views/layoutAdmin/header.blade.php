<header>
    <nav>
        <a href="{{ route('welcome') }}"><span id="logo_name">Bubble</span>Hero</a>
        <ul class="Navigation">
            <a href="{{ route('dashboardAdmin') }}">
                <li><span>Dashboard</span></li>
            </a>

            <a href="{{ route('adminProduct')}}">
                <li>Produit</li>
            </a>


            <a href="{{ route('adminUser') }}">
                <li>Utilisateur</li>
            </a>



            <a href="#" onclick="document.getElementById('logout-form').submit()">
                <form action="{{ route('logout') }}" method=" POST" id="logout-form"> Log Out</form>
                @csrf
            </a>

        </ul>
        <div class="hamburger">

            <span></span>
            <span></span>
            <span></span>

        </div>
    </nav>

</header>
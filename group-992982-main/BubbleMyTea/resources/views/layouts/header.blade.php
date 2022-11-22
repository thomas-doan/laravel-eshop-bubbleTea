<header>
    <nav>
        <a href="{{ route('welcome') }}"><span id="logo_name">Bubble</span>Hero</a>
        <ul class="Navigation">
            <div class="search">
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="bubble Hero ?" name="query" value="{{ request()->input('query') }}">
                    <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </form>

            </div>
            <a href="{{ route('cart.list') }}">
                @if( Cart::getTotal() > 0 )
                <li>Panier <span>{{ Cart::getTotalQuantity()}}<span></li>
                @else
                <li>Panier</li>
                @endif
            </a>
            @if (auth()->user() != null)
            <a href="{{ route('profile')}}" <li>Profil</li>
            </a>
            @endif


            @if(auth()->user() != null && auth()->user()->is_admin = 1)
            <a href="{{ route('dashboardAdmin') }}">
                <li>Panel Admin</li>
            </a>

            @endif


            @if (auth()->user() == null)
            <a href="{{ route('login') }}">
                <li>Login</li>
            </a>
            @else



            <a href="#" onclick="document.getElementById('logout-form').submit()">
                <form action="{{ route('logout') }}" method=" POST" id="logout-form">@csrf</form>

                Log Out
            </a>
            @endif
        </ul>
        <div class="hamburger">

            <span></span>
            <span></span>
            <span></span>

        </div>
    </nav>

</header>
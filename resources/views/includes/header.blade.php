<div class="ui fixed inverted menu" style="background-color: #ff490d; list-style-type: none; height: 25px">
    <div class="ui container">
        <div class="center item">
            <a class="ui inverted button {{ request()->is('/') ? 'active' : '' }}" id="nav" href="/">Home</a>
            <a class="ui inverted button {{ request()->is('datumpick') ? 'active' : '' }}" id="nav" href="/datum">Reserveren</a>
            <a class="ui inverted button {{ request()->is('prijzen') ? 'active' : '' }}" id="nav" href="/prijzen">Prijzen</a>
            <a class="ui inverted button {{ request()->is('informatie') ? 'active' : '' }}" id="nav" href="/informatie">Fiets(tour) Informatie</a>
            @guest
                <li><a class="ui inverted button {{ request()->is('login') ? 'active' : '' }}"
                       href="{{ route('login') }}" id="nav">Inloggen</a>
                </li>
                @if (Route::has('register'))
                    <li class=><a class="ui inverted button {{ request()->is('register') ? 'active' : '' }}"
                                  href="{{ route('register') }}" id="nav">Registreren</a></li>
                @endif
            @else
                <li><a class="ui inverted button" href="/user" id="nav">{{ Auth::user()->voornaam . " " . Auth::user()->tussenvoegsel . " " . Auth::user()->achternaam }}</a></li>
                <li><a class="ui inverted button" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" id="nav">Uitloggen</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </div>
    </div>
</div>
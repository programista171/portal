<form action="{{route('search')}}" class="navbar-form">
    <input type="text" id="q" name="q" id="searched" placeholder="Czego szukasz?" class="form-control">
</form>
<li class="nav-item">
    <a class="nav-link" href="/posts">Strona główna</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('/requests')}}">
        Zaproszenia
        ({{Auth::user()->getFriendRequests()->count()}})
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">Wiadomości</a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">Powiadomienia</a>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->login }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a href="{{ url("users", [Auth::user()->id]) }}" class="dropdown-item">
            Twój profil
        </a>

        <a href="{{ route("settings.edit") }}" class="dropdown-item">
            Ustawienia
        </a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();                                     document.getElementById('logout-form').submit();">
            Wyloguj
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>

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
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->login }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
<form action="{{route('search')}}">
<label for="searched">
Czego szukasz?
</label>
<input type="text" id="q" name="q">
<input type="text" id="q" class="d-none" class="d-md-block">
<button type="submit">Szukaj</button>
</form>
</li>
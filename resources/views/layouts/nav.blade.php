<li><a href="/posts">Strona główna</a></li>
<li><a href="{{url('/requests')}}">Zaproszenia do grona znajomych, Nowe:
{{Auth::user()->getFriendRequests()->count()}}
</a></li>
<li><a href="">Wiadomości</a></li>
<li><a href="">Powiadomienia</a></li>
<li>{{Auth::user()->getRequestsCount()}}</li>
<li><a href="">Strona główna</a></li>
<li><a href="{{url('/requests')}}">Zaproszenia do grona znajomych, Nowe:
@if(!isset($ile))
0
@else
{{$ile}}
@endif
</a></li>
<li><a href="">Wiadomości</a></li>
<li><a href="">Powiadomienia</a></li>
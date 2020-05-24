@extends('layouts.app')

@section('content')
<img alt="Zdjęcie profilowe" src="{{url('')}}/public/{{$user->profile->image}}">
		<h2>Profil użytkownika {{$user->firstname}} {{$user->lastname}}</h2>
		@if(Auth::user()->id != $user->id)
@include('users.requests_decision')
@else
<a href="{{route("settings.edit")}}">Ustawienia</a>
		@endif
		<a href="{{url('/friends')}}/{{$user->id}}">Znajomi</a>
<p>
Imię: {{$user->firstname}}
</p>
<p>
Nazwisko: {{$user->lastname}}
</p>
<p>
Płeć: {{$user->profile->gender}}
</p>
<p>
Opis: {{$user->profile->description}}</p>
@endsection
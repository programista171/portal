@extends('layouts.app')

@section('content')
<img alt="Zdjęcie profilowe" src="{{url('')}}/{{$user->profile->image}}">
		<h2>Profil użytkownika {{$user->firstname}} {{$user->lastname}}</h2>
		@if(Auth::user()->id != $user->id)
@include('users.requests_decision')
@else
<a href="{{url('/settings')}}">Ustawienia</a>
		@endif
		<a href="{{url('/friends')}}/{{$user->id}}">Znajomi</a>
@endsection
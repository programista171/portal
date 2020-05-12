@extends('layouts.app')

@section('content')
	<h2>Profil użytkownika {{$user->firstname}} {{$user->lastname}}</h2>
	@if(Auth::user()->id != $user->id)
		<form action='/invitations/invite' method='POST'>
			@csrf
			<input type='hidden' name='inviter' value="{{Auth::user()->id}}">
			<input type='hidden' name='invited' value="{{$user->id}}">
			<button type='submit'>Dodaj do grona znajomych</button>
		</form>
	@endif
@endsection
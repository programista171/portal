@extends('layouts.app')

@section('content')
	<h2>Wyniki wyszukiwania</h2>
	@if(count($posts) ==0 && count($users) == 0)
		<p>Niczego nie znaleziono</p>
	@endif
	@if(count($posts) > 0)
		<h3>Posty</h3>
		@foreach($posts as $post)
			<img alt="Zdjęcie profilowe użytkownika {{$post->user->firstname}} {{$post->user->lastname}}" src="{{url('')}}/public/{{$post->user->profile->image}}">
			<h4><a href="{{url('/users')}}/{{$post->user->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a></h2>
			<p>{{$post->created_at}}</p>
			<p>{{$post->content}}</p>
			<a href="{{url('/posts')}}/{{$post->id}}">Otwarte zdarzenie</a>
			<form method="POST" action="{{url('/reactions/store')}}">
				@csrf
				<button type="submit" name="like" id="like">Lubię to!</button>
				<button type="submit" name="dislike" id="dislike">Nie lubię tego!</button>
			</form>
			@if(Auth::user()->id === $post->user->id)
				To mój post
			@endif
		@endforeach
	@endif
	@if(count($users) > 0)
		<h3>Osoby</h3>
		@foreach($users as $user)
			<h4><a href="{{url('/users')}}/{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a></h4>
		@endforeach
	@endif
@endsection
@extends('layouts.app')

@section('content')
	<form action="{{url('/posts/create')}}">
		<button type="submit">Opublikuj</button>
	</form>
	@foreach($posts as $post)
<img alt="Zdjęcie profilowe użytkownika {{$post->user->firstname}} {{$post->user->lastname}}" src="{{url('')}}/public/{{$post->user->profile->image}}">
		<h2><a href="{{url('/users')}}/{{$post->user->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a></h2>
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
@endsection
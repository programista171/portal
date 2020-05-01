@extends('layouts.app')

@section('content')
	<form action="{{url('/posts/create')}}">
		<button type="submit">Opublikuj</button>
	</form>
	@foreach($posts as $post)
		<h2><a href="{{url('/posts')}}/{{$post->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a></h2>
		<p>{{$post->created_at}}</p>
		<p>{{$post->content}}</p>
	<form method="POST" action="{{url('/reactions/store')}}">
		@csrf
		<button type="submit" name="like" id="like">Lubię to!</button>
		<button type="submit" name="dislike" id="dislike">Nie lubię tego!</button>
	</form>
	@endforeach
@endsection
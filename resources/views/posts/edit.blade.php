@extends('layouts.app')

@section('content')
	<h2>Dodaj nowy post</h2>
	<form action="{{route('posts.update', $entry->id)}}" method="post">
		@csrf
@method('PUT')
		<label for="content">
Czym chcesz się podzielić?
            </label>
		<input type="text" name="content" id = "content" value="{{$entry->content}}" autofocus>
		<button type="submit" name="add" id="add">Zaktualizuj</button>
	</form>
@endsection
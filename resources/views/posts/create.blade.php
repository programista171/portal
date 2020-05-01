@extends('layouts.app')

@section('content')
	<h2>Dodaj nowy post</h2>
	<form action="{{route("posts.store")}}" method="post">
		@csrf
		<label for="content">
Czym chcesz się podzielić?
            </label>
		<input type="text" name="content" id = "content">
		<button type="submit" name="add" id="add">Opublikuj</button>
	</form>
@endsection
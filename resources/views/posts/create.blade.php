@extends('layouts.app')

@section('content')
	<h2>Dodaj nowy post</h2>
	<form action="{{url('posts/createpost')}}" method="post">
		@csrf
		<label for="content">
Czym chcesz się podzielić?
            </label>
		<input type="text" name="content" id = "content" autofocus>
		<button type="submit" name="add" id="add">Opublikuj</button>
	</form>
@endsection
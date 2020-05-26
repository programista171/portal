@extends('layouts.app')

@section('content')
	<h2>Edytuj post</h2>
	<form action="{{route('posts.update', $entry->id)}}" method="post">
		@csrf
@method('PUT')
		<label for="content">
Czym chcesz się podzielić?
            </label>
		<textarea name="content" id = "content" autofocus>{{$entry->content}}</textarea>
		<button type="submit" name="add" id="add">Zaktualizuj</button>
	</form>
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
@extends('layouts.app')

@section('content')
	<h2>Dodaj nowy post</h2>
	<form action="{{url('posts/createpost')}}" method="post">
		@csrf
		<label for="content">
Czym chcesz się podzielić?
            </label>
		<textarea name="content" id = "content" autofocus></textarea>
		<button type="submit" name="add" id="add">Opublikuj</button>
	</form>
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
@extends('layouts.app')

@section('content')
		<h2>Personalizacja profilu</h2>
<h3>Zdjęcie profilowe</h3>
<form action="/settings/image" method="POST" enctype="multipart/form-data">
@csrf
<input type='file' name='image' id='image'>
<button type='submit'>Prześlij</button>
</form>
@endsection
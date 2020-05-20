@extends('layouts.app')

@section('content')
		<h2>Personalizacja profilu</h2>
<h3>Zdjęcie profilowe</h3>
@if(count($errors) > 0)
<strong>Nie udało się przesłać pliku z powodu następujących błędów:</strong>
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@else
<p>Zdjęcie zostało dodane</p>
@endif
<form action="/settings/image" method="POST" enctype="multipart/form-data">
@csrf
<input type='file' name='image' id='image'>
<button type='submit'>Prześlij</button>
</form>
@endsection
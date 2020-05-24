@extends('layouts.app')

@section('content')
		<h2>Personalizacja profilu</h2>
		@if(count($errors) > 0)
		<strong>Nie udało się przesłać pliku z powodu następujących błędów:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@else
		@if(isset($success))
			<p>{{$success}}</p>
		@endif
	@endif
	<form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
		<h3>Dane osobowe</h3>
		<p>
<label for="fname">
Imię:
</label>
<input type="text" name="fname" id="fname" value="{{Auth::user()->firstname}}">
</p>
<p>
<label for="lname">
Nazwisko:
</label>
<input type="text" name="lname" id="lname" value="{{Auth::user()->lastname}}">
</p>
<p>
<label for="login">
Login:
</label>
<input type="text" name="login" id="login" value="{{Auth::user()->login}}">
</p>
<h3>Informacje dodatkowe</h3>
<p>
<label for="gender">
Płeć:
</label>
<select name="gender" id="gender">
<option value="m">Mężczyzna</option>
<option value="f">Kobieta</option>
</select>
</p>
<h3>Aby inni mogli Cię lepiej poznać, dodaj tutaj kilka słów o sobie</h3>
<label for="desc">
Opowiedz innym o sobie:
</label>
<input type="text" id="desc" name="desc" value="{{Auth::user()->profile->description}}">
<h3>Zdjęcie profilowe</h3>
<input type='file' name='image' id='image'>
@csrf
<button type='submit'>Prześlij</button>
</form>
@endsection
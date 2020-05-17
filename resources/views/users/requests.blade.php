@extends('layouts.app')

@section('content')
	<h2>Zaproszenia do grona znajomych</h2>
	@foreach($requests as $request)
		<?php
			$recipient = App\User::find($request->sender_id);
		?>
		<h3><a href="{{url('/users')}}/{{$recipient->id}}">{{$recipient->firstname}} {{$recipient->lastname}}</a></h3>
		<form method="POST" action="{{url('/requests_decision')}}">
			@csrf
			<input type='hidden' name='sender' value="{{$recipient->id}}">
			<button type="submit" name="accept" id="accept">Potwierdź prośbę</button>
			<button type="submit" name="deny" id="deny">Odrzuć prośbę</button>
		</form>
	@endforeach
@endsection
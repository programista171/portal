@extends('layouts.app')

@section('content')
	<h2>Znajomi: {{count($friends)}}</h2>
	@foreach($friends as $friend)
		<p><a href="{{url('/users')}}/{{$friend->id}}">
			{{$friend->firstname}} {{$friend->lastname}}
		</a></p>
	@endforeach
@endsection
@extends('layouts.app')

@section('content')
@auth
<h2>Zaproszenia do grona znajomych</h2>
{{count($requests)}}
@foreach($requests as $request)
	<?php
$recipient = App\User::find($request->sender_id);
?>
<h3><a href="{{url('/users')}}/{{$recipient->id}}">{{$recipient->firstname}} {{$recipient->lastname}}</a></h3>
@endforeach
@endauth
@endsection
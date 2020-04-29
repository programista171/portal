@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<h2><a href="{{url('/posts')}}/{{$post->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a></h2>
<p>{{$post->created_at}}</p>
<p>{{$post->content}}</p>
@endforeach
@endsection
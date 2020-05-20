@extends('layouts.app')

@section('content')
	<form action="{{url('/posts/create')}}">
		<button type="submit">Opublikuj</button>
	</form>
	@foreach($posts as $post)
<img alt="Zdjęcie profilowe użytkownika {{$post->user->firstname}} {{$post->user->lastname}}" src="{{url('')}}/{{$post->user->profile->image}}">
		<h2><a href="{{url('/users')}}/{{$post->user->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a></h2>
		<p>{{$post->created_at}}</p>
		<p>{{$post->content}}</p>
		<a href="{{url('/posts')}}/{{$post->id}}">{{count($post->reactions)}} reakcji, {{count($post->comments)}} komentarzy</a>
	<button data-post_id="{{$post->id}}" data-reaction="like" class="reaction">Lubię to!</button>
	<button data-post_id="{{$post->id}}" data-reaction="dislike" class="reaction">Nie lubię tego!</button>
@if(Auth::user()->id === $post->user->id)
<p>Edytuj post</p>
<p>Usuń post</p>
@endif
	@endforeach

<script>
$('.reaction').on('click', function(){
//alert("Kliknięto");
$.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
$.ajax({
'method':'post',
'url':`/posts/react`,
'data':{
'post_id':$(this).attr('post_id'),
'reaction':$(this).attr('data-reaction')
}
})
.fail(error=>{
alert("Nie działa");
console.log(error);
})
.done(result=>{
console.log(result);
alert("Działa");
});
});
</script>
@endsection
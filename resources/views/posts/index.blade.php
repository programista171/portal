@extends('layouts.app')

@section('content')
	<form action="{{url('posts/createpost')}}" method="post">
		@csrf
		<label for="content">
Czym chcesz się podzielić?
            </label>
		<textarea name="content" id = "content"></textarea>
		<button type="submit" name="add" id="add">Opublikuj</button>
	</form>
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
    @foreach($posts as $post)
        <div class="card">
            <div class="card-header row">
                <img alt="Zdjęcie profilowe użytkownika {{$post->user->firstname}} {{$post->user->lastname}}"
                     src="{{asset($post->user->profile->image) }}" class="profile-image">
                <h2>
                    <a href="{{url('/users')}}/{{$post->user->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a>
                </h2>
                <span class="ml-auto"> {{$post->created_at}}</span>
            </div>
            <div class="card-body">
                <p>{!!$post->content!!}</p>
            </div>
            <div class="card-footer row">
                <a href="{{url('/posts')}}/{{$post->id}}" class="btn btn-primary mr-auto"> Otwarte zdarzenie </a>
                <form method="POST" action="{{url('/reactions/store')}}">
                    @csrf
                    <button type="submit" name="like" id="like" class="btn btn-success">Lubię to!</button>
                    <button type="submit" name="dislike" id="dislike" class="btn btn-danger">Nie lubię tego!</button>
                </form>
                @if(Auth::user()->id === $post->user->id)
                    <a href="{{url('/posts')}}/{{$post->id}}/edit">Edytuj post</a>
<form action="{{route('posts.destroy', $post->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit">Usuń post</button>
</form>
                @endif
            </div>
        </div>
    @endforeach
@endsection

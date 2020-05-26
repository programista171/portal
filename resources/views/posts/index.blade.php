@extends('layouts.app')

@section('content')
    <form action="{{url('/posts/create')}}">
        <button type="submit">Opublikuj</button>
    </form>
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
                <p>{{$post->content}}</p>
            </div>
            <div class="card-footer row">
                <a href="{{url('/posts')}}/{{$post->id}}" class="btn btn-primary mr-auto">{{count($post->reactions)}} reakcji, {{count($post->comments)}} komentarzy</a>
                <form method="POST" action="{{url('/reactions/store')}}">
                    @csrf
                    <button type="submit" name="like" id="like" class="btn btn-success">Lubię to!</button>
                    <button type="submit" name="dislike" id="dislike" class="btn btn-danger">Nie lubię tego!</button>
                </form>
                @if(Auth::user()->id === $post->user->id)
                    To mój post
                @endif
            </div>
        </div>
    @endforeach
    <script>
        $('.reaction').on('click', function () {
            $.ajaxSetup({
                headers:
                    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({
                method: 'post',
                url: `/posts/react`,
                data: {
                    post_id: $(this).attr('data-post_id'),
                    reaction: $(this).attr('data-reaction')
                }
            })
                .done(result => {
                    $(this).addClass("seleced-reaction");
                })
                .fail(error => {
                    console.log(error);
                })
        });
    </script>
@endsection
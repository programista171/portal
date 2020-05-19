@extends('layouts.app')

@section('content')
    <form action="{{url('/posts/create')}}">
        <button type="submit">Opublikuj</button>
    </form>
    <div class="posts-wrapper">
        @foreach($posts as $post)
            <div class="post card">
                <div class="card-header row">
                    <div class="col-4">
                        <h2 class="user-name">
                            <a href="{{url('/users')}}/{{$post->user->id}}">{{$post->user->firstname}} {{$post->user->lastname}}</a>
                            {{-- tooltip with user data and invite button --}}
                        </h2>
                    </div>
                    <div class="col-4 offset-4 text-right">
                        {{$post->getDate( $post->created_at ) }}
                    </div>
                </div>
                <div class="card-body text-justify">
                    <p>{{$post->content}}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <a href="{{url('/posts')}}/{{$post->id}}">Otwarte zdarzenie</a>
                        <form method="POST" action="{{url('/reactions/store')}}">
                            @csrf
                            <button type="submit" name="like">Lubię to!</button>
                            <button type="submit" name="dislike">Nie lubię tego!</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
@endsection

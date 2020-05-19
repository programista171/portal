@extends('layouts.app')

@section('content')
    <h2><a href="">{{$entry->user->firstname}} {{$entry->user->lastname}}</a></h2>
    <div id="date" class="date">
        {{$entry->getDate($entry->created_at) }}
    </div>
    <div id="entryContent" class="entryContent">
        {{$entry->content}}
    </div>
    @if(count($comments) > 0 )
        <h2>Komentarze {{count($comments)}}</h2>
    @endif

    <div id="comments" class="comments">
        @foreach($comments as $comment)
            <p>{{$comment->user->firstname}} {{$comment->user->lastname}} skomentowano:</p>
            <p>{{$comment->content}}</p>
            <hr/>
            <p>Napisano: {{$comment->created_at}}</p>
        @endforeach
    </div>
    @if( count($comments) > 0)
        <h3>Skomentuj</h3>
    @else
        <h3> Skomentuj jako pierwszy </h3>
    @endif
    <div id="giveComment" class="giveComment">
        <form action="{{url('/posts/createcomment')}}" method="post">
            @csrf
            <label for="comment">
                Twój komentarz
            </label>
            <input type="text" name="comment" id="comment">
            <input type="hidden" name="postid" id="postid" value="{{$entry->id}}">
            <button type="submit" name="add" id="add">Opublikuj</button>
        </form>
    </div>
@endsection

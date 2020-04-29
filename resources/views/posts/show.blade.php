@extends('layouts.app')

@section('content')
<h2><a href="">{{$entry->user->firstname}} {{$entry->user->lastname}}</a></h2>
<div id="date" class="date">
{{$entry->created_at}}
</div>
<div id="entryContent" class="entryContent">
{{$entry->content}}
</div>
<h2>Komentarze</h2>
<div id="comments" class="comments">
<p>{{$comments->content}}</p>
<hr />
<p>Napisano: {{$comments->created_at}}</p>
</div>
@endsection
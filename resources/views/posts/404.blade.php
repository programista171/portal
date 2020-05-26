@extends('layouts.app')

@section("content")
    <div class="card">
        <div class="card-header"> Nie znaleziono takiego wpisu </div>
        <div class="card-body"> Skorzystaj z wyszukiwania aby znaleźć ten wpis lub przejdź na <a href="{{ url("/posts") }}"> stronę główną </a>. </div>
    </div>
@endsection

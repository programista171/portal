@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header row">
            <div class="col-1">
                <img alt="Zdjęcie profilowe" src="{{asset($user->profile->image)}}" class="img-thumbnail">
            </div>
            <h2 class="my-auto"> {{$user->firstname}} {{$user->lastname}}</h2>
            <div class="ml-auto my-auto">
                @if(Auth::user()->id != $user->id)
                    @include('users.requests_decision')
                @else
                    <a href="{{route("settings.edit")}}">Spersonalizuj swój profil</a>
                @endif
                <a href="{{url('/friends')}}/{{$user->id}}">Znajomi</a>
            </div>
        </div>

        <div class="card-body row">
            <div class="col-12 col-md-3">
                <h3 class="text-center"> Dane osobowe </h3>
                <div class="row">
                    <b> Imię: </b>  <span class="ml-auto"> {{$user->firstname}} </span>
                </div>
                <div class="row">
                    <b>  Nazwisko: </b> <span class="ml-auto"> {{$user->lastname}} </span>
                </div>
                <div class="row">
                    <b> Login: </b> <span class="ml-auto"> {{$user->login}} </span>
                </div>
                <div class="row">
                    <b> Email: </b> <span class="ml-auto"> {{$user->email}} </span>
                </div>
                <div class="row">
                    <b> Płeć: </b> <span class="ml-auto"> {{$user->profile->gender}} </span>
                </div>
                <div class="row">
                    <b> Opis: </b> <span class="ml-auto">  {{$user->profile->description}} </span>
                </div>
            </div>
            <div class="col-12 col-md-8 overflow-auto">
                <h3 class="text-center"> Ostatnie wpisy </h3>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Personalizacja profilu
        </div>
        <div class="card-body">
            @if(count($errors) > 0)
                <strong>Nie udało się przesłać pliku z powodu następujących błędów:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @else
                @if(isset($success))
                    <p>{{$success}}</p>
                @endif
            @endif
            <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data"
                  class="col-sm-10 mx-auto">
                <fieldset>
                    <legend> Dane osobowe</legend>
                    <div class="row">
                        <div class="col-6">
                            <label for="fname" class="ml-2">
                                Imię:
                            </label>
                            <input type="text" name="fname" id="fname" value="{{old("fname", $user->firstname)}}"
                                   class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="lname" class="ml-2">
                                Nazwisko:
                            </label>
                            <input type="text" name="lname" id="lname" value="{{old("lname", $user->lastname)}}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-6">
                            <label for="login" class="ml-2">
                                Login:
                            </label>
                            <input type="text" name="login" id="login" value="{{old("login", $user->login)}}"
                                   class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="email" class="ml-2">
                                Email:
                            </label>
                            <input type="text" name="email" id="email" value="{{old("email", $user->email)}}"
                                   class="form-control">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informacje dodatkowe</legend>
                    <div class="row">
                        <div class="col-4 text-center">
                            <label for="gender">
                                Płeć:
                            </label>
                        </div>
                        <div class="col-8">
                            <select name="gender" id="gender" class="custom-select">
                                <option value="m">Mężczyzna</option>
                                <option value="f">Kobieta</option>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-4">
                            <label for = "image" class="my-auto"> Zdjęcie profilowe </label>
                        </div>
                        <div class="col-8">
                            <input type='file' name='image' id='image' class="form-control">
                        </div>
                    </div>
                    <h3 class="mt-4"> Aby inni mogli Cię lepiej poznać, dodaj tutaj kilka słów o sobie </h3>
                    <div class="row">
                        <label for="desc">
                            Opowiedz innym o sobie:
                        </label>
                        <textarea type="text" id="desc" name="desc"
                                  class="form-control"> {{old("desc", $user->profile->description)}} </textarea>
                    </div>

                    @csrf
                    <div class="row my-3">
                        <button type='submit' class="btn btn-success ml-auto mr-2"> Zapisz zmiany</button>
                        <a href="{{ url("/users", [$user->id]) }}" class="btn btn-danger mx-auto"> Anuluj </a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

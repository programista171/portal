@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"> Zaloguj się </div>

        <div class="card-body">
            <form method="POST" action="{{ route("login") }}" id="login-form">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email or Login') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <button type="submit" class="btn btn-primary mx-auto">
                        {{ __('Login') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script src = "{{ asset("js/libs/jquery.validate.min.js") }}"></script>
    <script src = "{{ asset("js/authorization/login.validate.js") }}"></script>
@endsection

@extends('layouts.app')
@include('components.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <h1 class="h3 p-3 mb-3">Iniciar sesión</h1>
                        </div>
                        <div class="col-md-5 text-center">
                            <img src="{{ asset('img/login.png') }}" class="donate-image uns">
                        </div>
                        <div class="col-md-7 pt-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <label for="password">Ingresar email</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="enterprise@dominio.com" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <label for="password">Ingresar contraseña</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Ver si es necesario el remember me -->
                                <!--div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Mantener sesión') }}
                                            </label>
                                        </div>
                                    </div>
                                </div-->

                                <div class="form-group row mb-0 text-right my-4">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary m-0 px-5">
                                            {{ __('Entrar') }}
                                        </button>
                                    </div>
                                    <div class="col-md-10 py-4">
                                        @if (Route::has('password.request'))
                                            <p>
                                                Olvidaste tu contraseña?
                                                <a class="link" href="{{ route('password.request') }}">{{ __('Recupérala') }}</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <a class="btn btn-light mr-0" href="/">Voler al inicio</a>
        </div>
    </div>
</div>
@endsection

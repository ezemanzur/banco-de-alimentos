@extends('layouts.app')
@include('components.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h1 class="h3 p-3 mb-3">Registrarse como voluntario</h1>
                            </div>
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('img/login.png') }}" class="donate-image uns">
                            </div>
                            <div class="col-md-7 register-form">    
                                <form method="POST" action="/new_volunteer" class="px-4">
                                    @csrf
                                        <!-- Dirección -->
                                        <h3 class="mt-5 py-3">Datos personales</h3>
                                    <!-- Nombre y apellido -->
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <label for="name" class="req-tooltip">Ingresar nombre y apellido @include('components.required_tool')</label>

                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="John Smith" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- DNI -->
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <label for="dni" class="req-tooltip">DNI (Solo números) @include('components.required_tool')</label>
                                            
                                            <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" placeholder="ej: 12345678" min="0" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                                            @error('dni')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Numero de telefono -->
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <label for="phone" class="req-tooltip">Número de teléfono @include('components.required_tool')</label>

                                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="ej: 2211234567" min="0" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <label for="email" class="req-tooltip">Email @include('components.required_tool')</label>
                                            
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="johnsmith@dominio.com" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Contraseña -->
                                    <h3 class="mt-5 py-3">Contraseña</h3>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <label for="password" class="req-tooltip">Ingrese la nueva contraseña @include('components.required_tool')</label>

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Repetir contraseña -->
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <label for="password-confirm" class="req-tooltip">Repita la nueva contraseña @include('components.required_tool')</label>

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Botones -->
                                    <div class="form-group row pt-5 mb-0">
                                        <div class="col-md-6 text-left">
                                            <button type="button" class="btn btn-cancel btn-n m-0" data-toggle="modal" data-target="#cancelRegisterModal">
                                                Cancelar
                                            </button>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-primary m-0">
                                                {{ __('Regístrate') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal cancelar registro -->
    @include('components.modal', [
        'modal_id' => 'cancelRegisterModal',
        'mainTitle' => "Está seguro que desea cancelar su registro?",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "Si cancela el registro ahora, los datos que ha ingresado hasta el momento se perderán.",
        'cancelLink' => '/',
        'cancel' => "Si, volver al inicio",
        'accept' => "No, seguir aquí",
    ])
@endsection

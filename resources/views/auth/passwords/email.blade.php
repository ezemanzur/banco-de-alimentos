@extends('layouts.app')

@section('title', 'Banco de alimentos')

@include('components.header')

@include('components.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-9 py-5">
            <div class="card reseatcard">
                <div class="row justify-content-center py-4">
                    <h4> Recuperar contraseña </h4>
                    <div class="col-md-10">
                        <p class="mt-3">Escribe la dirección de correo electrónico que tiene asociado a su cuenta del Banco Alimentario.</p>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
 
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresar email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-light-blue text-white button-details">
                                    <i class="fas fa-key text-white mr-1"></i>
                                    {{ __('Recuperar') }} 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

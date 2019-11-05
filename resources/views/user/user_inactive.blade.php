@extends('layouts.app')

@section('title', 'Banco de alimentos')

@include('components.header')

@section('content')

    <!-- Container -->
    <div class="container-fluid my-5 pb-5">
        <div class="row justify-content-center uns">
            <div class="col-md-11 uns">
                <img src="{{ asset('img/esperando_donante.jpg') }}" class="w-100 uns">
            </div>
        </div>
    </div>

@endsection
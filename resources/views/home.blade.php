@extends('layouts.app')

@include('components.header')

@include('components.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->isActive)
                        estas activo
                    @else
                        no estas activo
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

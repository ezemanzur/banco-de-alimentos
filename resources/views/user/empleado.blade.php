@extends('layouts.app')

@section('title', 'Banco de alimentos')

@include('components.header')

@php
    $code = 0;
    if(Session::has('codigo')) {
        $code = Session::get('codigo');
        Session()->forget('codigo');
    }

    $function_load = '';
    if(count($products) > 0) {
        $function_load = 'hideProductAdd(); ';
    }
@endphp

@section('content')

<script>
    //Carga el menu por defecto en la primer opcion
        window.onload = function load() {
        panelSwitch({{ $code }});
        {{ $function_load }};
    }
</script>

    <div class="container-fluid my-5 pb-5">

        <!-- Rol de usuario -->
        <div class="row my-5 justify-content-center">
            <div class="col-md-10">
                <h1>Panel de empleado</h1>
            </div>
        </div>
        <!-- /.Rol de usuario -->

        <!-- Row -->
        <div class="row justify-content-center">
            <!-- Col -->
            <div class="col-md-10 card">
                <!-- Row -->
                <div class="row">
                    <!-- Menú izquierdo -->
                    <div class="col-md-3 p-0">
                        <div class="shadow-none m-0 p-0">
                            <!-- Elementos del menú -->
                            <ul class="list-group list-group-flush menu-panel">
                                <!-- Donaciones -->
                                <li class="list-group-item menuDivisor py-2">Donaciones</li>
                                <!-- Crear una donación -->
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(0)"><i class="fas fa-plus-square mr-2 p-2 color7"></i><span>Listado de donaciones vigentes a retirar</span></li>
                                <!-- Ver donaciones vigentes -->
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(1)"><i class="fas fa-box-open mr-2 p-2 color7"></i><span>Solicitud de nuevas donaciones</span></li>
                                <!-- Ver donaciones pasadas -->
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(2)"><i class="fas fa-box mr-2 p-2 color7"></i><span>Solicitud de nuevos donantes</span></li>
                                <!-- Ver donaciones rechazadas -->
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(3)"><i class="fas fa-ban mr-2 p-2 color7"></i><span>Listado de donaciones pasadas</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.Menú izquierdo -->

                    <!-- Elementos del menu -->
                    <div class="col-md-9 card-menu">
                        <!-- Row -->
                        <div class="row justify-content-center px-4 py-4">

                            <!-- Listado de donaciones vigentes a retirar -->
                            <div class="col-md-12 subItem">
                                @include('user.components.donation_accepted_requests')
                            </div>
                            <!-- /.Listado de donaciones vigentes a retirar -->

                            <!-- Solicitudes de donacion -->
                            <div class="col-md-12 subItem">
                                @include('user.components.donation_requests')
                            </div>
                            <!-- /.Solicitudes de donacion -->

                            <!-- Solicitudes de donantes -->
                            <div class="col-md-12 subItem">
                                @include('user.components.givers_requests')
                            </div>
                            <!-- /.Solicitudes de donantes -->

                            <!-- Listado de donaciones pasadas -->
                            <div class="col-md-12 subItem">
                                @include('user.components.donation_completed_requests')
                            </div>
                            <!-- /.Listado de donaciones pasadas -->

                        </div>
                        <!-- Row -->
                    </div>
                    <!-- /.Elementos del menu -->
                </div>
                <!-- /.Row -->
            </div>
            <!-- /.Col -->
        </div>
        <!-- /.Row -->
    </div>
    <!-- /.Container -->

@endsection

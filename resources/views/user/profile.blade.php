@extends('layouts.app')

@section('title', 'Banco de alimentos')

@include('components.header')

@php 
    $code = 0;
    if(Session::has('codigo')) {
        $code = Session::get('codigo');
        Session()->forget('codigo');
    }
@endphp

@section('content')

    <script>
        //Carga el menu por defecto en la primer opcion
            window.onload = function load() {
            panelSwitch({{ $code }});
        }
    </script>

    <!-- Container -->
    <div class="container-fluid my-5 pb-5">

        <!-- Rol de usuario -->
        <div class="row my-5 justify-content-center">
            <div class="col-10">
                <h1>Perfil de {{ Auth::user()->getRolName() }}</h1>
            </div>
        </div>
        <!-- /.Rol de usuario -->
        
        <!-- Row -->
        <div class="row justify-content-center">
            <!-- Col -->
            <div class="col-10">
                <!-- Card -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body p-0">
                        <!-- Row -->
                        <div class="row">
                            <!-- Menú izquierdo -->
                            <div class="col-md-3 p-0">
                                
                                <div class="shadow-none m-0 p-0">
                                    <!-- Elementos del menú -->
                                    <ul class="list-group list-group-flush menu-panel">
                                        <!-- Configuracion personal -->
                                        <li class="list-group-item menuDivisor py-2">Configuración personal</li>
                                        <!-- Modificar perfil -->
                                        <li class="list-group-item menuItem color7" onclick="panelSwitch(0)"><i class="far fa-user-circle mr-2 p-2 color7"></i>Modificar perfil</li>
                                        <!-- Cambiar contraseña -->
                                        <li class="list-group-item menuItem color7" onclick="panelSwitch(1)"><i class="fas fa-unlock-alt mr-2 p-2 color7"></i>Cambiar contraseña</li>
                                        @if(Auth::user()->rol == 'giver')
                                            <!-- Solicitar dejar de ser donante -->
                                            <li class="list-group-item menuItem color7" onclick="panelSwitch(2)"><i class="far fa-times-circle mr-2 p-2 color7"></i>Solicitar baja de cuenta</li>
                                        @endif
                                        <!-- Cerrar sesión -->
                                        <a href="{{ route('logout') }}" class="list-group-item menuItem color7"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-2 p-2 color7"></i>
                                            {{ __('Cerrar sesión') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>                            
                                    </ul>
                                </div>
                            </div>
                            <!-- /.Menú izquierdo -->
                            
                            <!-- Elementos del menu -->
                            <div class="col-md-9 card-menu">
                                <!-- Row -->
                                <div class="row justify-content-center px-2 py-3">
                                    
                                    <!-- Modificar perfil -->
                                    @include('user.components.modify_profile')

                                    <!-- Cambiar contraseña -->
                                    @include('user.components.change_password')

                                    <!-- Estado de cuenta -->
                                    @if(Auth::user()->rol == 'giver')
                                        @include('user.components.account_status')
                                    @endif

                                </div>
                                <!-- /.Row -->
                            </div>
                            <!-- /.Elementos del menu -->
                        </div>
                        <!-- /.Row-->
                    </div>
                    <!-- /.Card Body-->
                </div>
                <!-- /.Card-->
            </div>
            <!-- /.Col -->
        </div>
        <!-- /.Row -->
    </div>
    <!-- /.Container -->
            
    <!-- Modals -->
    <!-- Modal cancelar cambio de perfil -->
    @include('components.modal', [
        'modal_id' => 'cancelarModificarPerfil',
        'mainTitle' => "¿Está seguro que desea cancelar las modificaciones?",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "Los cambios que haya realizado no serán guardados.",
        'cancelLink' => '/profile',
    ])

    <!-- Modal cancelar cambio de contraseña -->
    @include('components.modal', [
        'modal_id' => 'cancelarCambiarContraseña',
        'mainTitle' => "Cambiar contraseña",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "¿Está seguro que desea cancelar el cambio de contraseña?",
        'cancelLink' => '/profile',
    ])
    <!-- /.Modals -->

@endsection

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

@section('content')

    <!-- Container -->
    <div class="container-fluid my-5 pb-5">

        <!-- -->
        <div class="row my-5 justify-content-center">
            <div class="col-md-10">
                <h1 class="w500 black3">Administración</h1>
            </div>
        </div>
        <!-- /. -->

        <!-- -->
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
                                <li class="list-group-item menuDivisor py-2 w500">Menú</li>
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(0)"><i class="fas fa-user-clock mr-2 p2 color7"></i><span>Solicitudes pendientes de nuevos voluntarios</span></li>
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(1)"><i class="fas fa-user-friends mr-2 p2 color7"></i><span>Listar voluntarios</span></li>
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(2)"><i class="fas fa-user-friends mr-2 p2 color7"></i><span>Listar empleados</span></li>
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(3)"><i class="fas fa-user-shield mr-2 p2 color7"></i><span>Listar administradores</span></li>
                                <li class="list-group-item menuItem color7" onclick="panelSwitch(4)"><i class="fas fa-user-plus mr-2 p2 color7"></i><span>Agregar nuevo empleado</span></li>                            
                            </ul>
                        </div>
                    </div>

                    <!-- Elementos del menu -->
                    <div class="col-md-9 card-menu">
                        <!-- Row -->
                        <div class="row justify-content-center px-4 py-4">
                            
                            <!--  -->
                            <div class="col-12 subItem">
                                <div class="row">
                                    @if(count($new_volunteers) > 0)
                                        <div class="col-12">
                                            <h1 class="h5 black3 w500 mb-4">Solicitudes de nuevos voluntarios</h1>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <h1 class="h5 black3 w500 mb-4">No hay nuevas solicitudes de voluntarios</h1>
                                        </div>
                                    @endif
                                    @foreach ($new_volunteers as $volunteer)
                                        <div class="col-12 mb-3">
                                            <div class="card bg-white2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p class="my-1 black2 w400">Nombre: {{ $volunteer->name }}<p>
                                                            <p class="my-1 black2 w400">Dni: {{ $volunteer->dni }}<p>
                                                            <p class="my-1 black2 w400">Email: {{ $volunteer->email }}<p>
                                                            <p class="my-1 black2 w400">Telefono: {{ $volunteer->phone }}<p>
                                                        </div>
                                                        <div class="col-2">
                                                            <a onclick="return confirm('Seguro deseas rechazarlo?')" href="reject_new_volunteer/{{$volunteer->id}}" class="btn btn-sm btn-danger">Rechazar</a>
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="accept_new_volunteer/{{$volunteer->id}}" class="btn btn-sm btn-success">Aceptar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /. -->

                            <!--  -->
                            <div class="col-12 subItem">
                                <div class="row">
                                    @if(count($volunteers) > 0)
                                        <div class="col-12">
                                            <h1 class="h5 black3 w500 mb-4">Voluntarios</h1>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <h1 class="h5 black3 w500 mb-4">No hay voluntarios aún</h1>
                                        </div>
                                    @endif
                                    @foreach ($volunteers as $volunteer)
                                        <div class="col-12 mb-3">
                                            <div class="card bg-white2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p class="my-1 black2 w400">Nombre: {{ $volunteer->name }}<p>
                                                            <p class="my-1 black2 w400">Dni: {{ $volunteer->dni }}<p>
                                                            <p class="my-1 black2 w400">Email: {{ $volunteer->email }}<p>
                                                            <p class="my-1 black2 w400">Telefono: {{ $volunteer->phone }}<p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /. -->

                            <!--  -->
                            <div class="col-12 subItem">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="h5 black3 w500 mb-4">Empleados</h1>
                                    </div>
                                    @foreach ($employees as $employee)
                                        <div class="col-12 mb-3">
                                            <div class="card bg-white2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="my-1 black2 w400">Nombre: {{ $employee->name }}<p>
                                                            <p class="my-1 black2 w400">Dni: {{ $employee->dni }}<p>
                                                            <p class="my-1 black2 w400">Email: {{ $employee->email }}<p>
                                                            <p class="my-1 black2 w400">Telefono: {{ $employee->phone }}<p>
                                                        </div>
                                                        @if ($employee->id <> Auth::user()->id)
                                                        <div class="col-4">
                                                            @if ($employee->isAdmin)
                                                                <a onclick="return confirm('¿Seguro deseas quitarle la administración al usuario?')" href="{{ url('/admin_to_employee/'.$employee->id) }}" class="btn btn-sm btn-deep-purple white1"><i class="fas fa-user-minus mr-2"></i>Quitar administración</a>
                                                            @else
                                                                <a onclick="return confirm('¿Seguro deseas hacer administrador al usuario?')" href="{{ url('/employee_to_admin/'.$employee->id) }}" class="btn btn-sm btn-purple"><i class="fas fa-user-shield mr-2"></i>Hacer administrador</a>
                                                            @endif
                                                        </div>
                                                        <div class="col-2">
                                                            <a onclick="return confirm('¿Seguro deseas eliminar a este usuario?')" href="{{ url('/delete_user/'.$employee->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-user-times mr-2"></i>Eliminar</a>
                                                        </div>
                                                        @else
                                                            <div class="col-6 text-right">
                                                                <p class="my-0 btn btn-small btn-light cursor-d shadow-none btn-rounded" disabled>Usted</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /. -->

                            <!--  -->
                            <div class="col-12 subItem">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="h5 black3 w500 mb-4">Administradores</h1>
                                    </div>
                                    @foreach ($admins as $admin)
                                        <div class="col-12 mb-3">
                                            <div class="card bg-white2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="my-1 black2 w400">Nombre: {{ $admin->name }}<p>
                                                            <p class="my-1 black2 w400">Dni: {{ $admin->dni }}<p>
                                                            <p class="my-1 black2 w400">Email: {{ $admin->email }}<p>
                                                            <p class="my-1 black2 w400">Telefono: {{ $admin->phone }}<p>
                                                        </div>
                                                        @if ($admin->id <> Auth::user()->id)
                                                        <div class="col-4">
                                                            <a onclick="return confirm('¿Seguro deseas hacer administrador al usuario?')" href="{{ url('/admin_to_employee/'.$admin->id) }}" class="btn btn-sm btn-deep-purple white1"><i class="fas fa-user-minus mr-2"></i>Quitar administración</a>
                                                        </div>
                                                        <div class="col-2">
                                                            <a onclick="return confirm('¿Seguro deseas eliminar a este usuario?')" href="{{ url('/delete_user/'.$admin->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-user-times mr-2"></i>Eliminar</a>
                                                        </div>
                                                        @else
                                                            <div class="col-6 text-right">
                                                                <p class="my-0 btn btn-small btn-light cursor-d shadow-none btn-rounded" disabled>Usted</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /. -->
                            
                            <!--  -->
                            <div class="col-12 subItem">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="h5 black3 w500 mb-4">Agregar empleado:</h1>
                                        <hr class="hr-white3">
                                    </div>
                                    <div class="col-6">
                                        <form method="POST" action="{{ url('/admin/new_employee') }}">
                                            <div class="form-group">
                                                <label class="w400 black2 req-tooltip">Nombre @include('components.required_tool')</label>
                                                <input type="text" name="name" class="form-control" placeholder="p ej: John Smith" required>
                                                <label class="w400 black2 req-tooltip mt-4">DNI (Solo números) @include('components.required_tool')</label>
                                                <input type="number" min="0" name="dni" class="form-control" placeholder="p ej: John Smith" required>
                                                <label class="w400 black2 req-tooltip mt-4">Telefono (Solo números) @include('components.required_tool')</label>
                                                <input type="number" min="0" name="phone" class="form-control" placeholder="p ej: John Smith" required>
                                                <label class="w400 black2 req-tooltip mt-4">Email @include('components.required_tool')</label>
                                                <input type="email" name="email" class="form-control" placeholder="p ej: John Smith" required>
                                            </div>
                                            <!-- Contraseña -->
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <label for="password" class="req-tooltip">Ingrese contraseña @include('components.required_tool')</label>
        
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
                                                <div class="col-md-12">
                                                    <label for="password-confirm" class="req-tooltip">Repita la contraseña @include('components.required_tool')</label>
        
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="row form-group pt-5">
                                                <div class="col-6 text-left">
                                                    <button class="btn btn-light black2" onclick="this.form.reset();">Cancelar</button>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-success">Aceptar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /. -->

                        </div>
                        <!-- /.Row -->
                    </div>
                    <!-- /.Elementos del menu -->
                </div>
                <!-- /.Row -->
            </div>
            <!-- Col -->
        </div>
        <!-- /.Row -->
    </div>
    <!-- Container -->

@endsection

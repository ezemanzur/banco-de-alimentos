@extends('layouts.app')

@section('title', 'Banco de alimentos')

@include('components.header')

@include('components.nav')

@if(Session::has('codigo'))
    @php
        $code = Session::get('codigo');
        Session()->forget('codigo');
    @endphp
@else
    @php
        $code = 0;   
    @endphp    
@endif

@section('onload', 'onload=panelSwitch('.$code.');')

@section('content')

    <div class="container my-5 pb-5">

        @if(!Auth::user()->isActive)
        
            <div class="row my-5">
                <div class="col-md-9">
                    
                </div>
                <div class="col-md-3 text-right">
                    <!-- Basic dropdown -->
                    <ul class="navbar-nav ml-auto btn logout-dropdown m-0 py-1 px-1 shadow-none">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#logOutModal"><i class="fas fa-power-off mr-1"></i><span>Cerrar sesión</a>
                    </div>
                    <!-- Basic dropdown -->
                </div>
            </div>

            <div class="row justify-content-center uns">
                <div class="col-md-11 uns">
                    <img src="{{ asset('img/esperando_donante.jpg') }}" class="w-100 uns">
                </div>
            </div>

        @else

        <div class="row my-5">
            <div class="col-md-9">
                <h1>Donante<span id="panel-title"></span></h1>
            </div>
            <div class="col-md-3 text-right">
                <!-- Basic dropdown -->
                <ul class="navbar-nav ml-auto btn logout-dropdown m-0 py-1 px-1 shadow-none">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <div class="dropdown-menu">
                    <a class="dropdown-item" data-toggle="modal" data-target="#logOutModal"><i class="fas fa-power-off mr-1"></i><span>Cerrar sesión</a>
                </div>
                <!-- Basic dropdown -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))                
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check-circle mr-2"></i>{{ Session::get('success') }}</strong>
                        <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::has('error'))                
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-circle mr-2"></i>{{ Session::get('error') }}</strong>
                        <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 card">
                <div class="row">
                    <!-- Menú izquierdo -->
                    <div class="col-md-3 p-0">
                        <div class="shadow-none m-0 p-0">
                            <!-- Elementos del menú -->
                            <ul class="list-group list-group-flush menu-panel">
                                <!-- Crear una donación -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(0)"><i class="fas fa-plus-square mr-2 p-2"></i><span>Crear una donación</span></li>
                                <!-- Ver donaciones vigentes -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(1)"><i class="fas fa-box-open mr-2 p-2"></i><span>Ver donaciones vigentes</span></li>
                                <!-- Ver donaciones pasadas -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(2)"><i class="fas fa-box mr-2 p-2"></i><span>Ver donaciones pasadas</span></li>
                                <!-- Ver donaciones rechazadas -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(3)"><i class="fas fa-ban mr-2 p-2"></i><span>Ver donaciones rechazadas</span></li>
                                <!-- Modificar perfil -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(4)"><i class="far fa-user-circle mr-2 p-2"></i><span>Modificar perfil</span></li>
                                <!-- Cambiar contraseña -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(5)"><i class="fas fa-unlock-alt mr-2 p-2"></i><span>Cambiar contraseña</span></li>
                                <!-- Solicitar dejar de ser donante -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(6)"><i class="far fa-times-circle mr-2 p-2"></i><span>Solicitar baja de cuenta</span></li>
                                <!-- Cerrar sesión -->
                                <a href="{{ route('logout') }}" class="list-group-item menuItem"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2 p-2"></i>
                                    {{ __('Cerrar sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>                            
                            </ul>
                        </div>
                    </div>
                    <!-- Elementos del menu -->
                    <div class="col-md-9 card-menu">
                        <div class="row justify-content-center p-4">

                            <!-- Crear donación -->
                            <div class="col-md-12 subItem">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="accordion" id="productAccordion">
                                            <div id="headingProduct">
                                                <h4 class="cursor-p add-product" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">Agregar un nuevo producto<i class="fas fa-plus-square ml-2 p-2"></i></h4>
                                            </div>
                                            <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#productAccordion">
                                                <form method="POST" action="{{route('donation.save')}}"  enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dynamic_field">
                                                            <tr>
                                                                <th>Cantidad</th>
                                                                <th>Categoria</th>
                                                                <th>vencimiento</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" name="cantidad[]" placeholder="Cantidad de productos" class="form-control name_list" /></td>
                                                                <td><select id="category" type="text" class="form-control browser-default custom-select" name="category_id[]" autofocus>
                                                                        <option selected disabled>Categoria</option>
                                                                        <option value="1">Leche 1L</option>
                                                                        <option value="2">Leche Tetra 1L</option>
                                                                        <option value="3">Arroz 1KG</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="date" name="expiration_date[]" class="form-control name_list" /></td>
                                                                <td><button type="button" name="add" id="add" class="btn btn-success">Agregar otro</button></td>
                                                            </tr>
                                                        </table>
                                                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Enviar" />
                                                    </div>

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Resumen
                                            </div>
                                            <div class="card-body">
                                                -producto<br>
                                                -producto
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ver donaciones vigentes -->
                            <div class="col-md-12 subItem">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha de creación</th>
                                                <th scope="col">Fecha de entrega</th>
                                                <th scope="col">Horario de entrega</th>
                                                <th scope="col">Dirección de retiro</th>
                                                <th scope="col">Resumen de productos</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">Cell</th>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cell</th>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Ver donaciones vigentes -->

                            <!-- Ver donaciones pasadas -->
                            <div class="col-md-12 subItem">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha de creación</th>
                                                <th scope="col">Fecha de entrega</th>
                                                <th scope="col">Horario de entrega</th>
                                                <th scope="col">Dirección de retiro</th>
                                                <th scope="col">Resumen de productos</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">Cell</th>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cell</th>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /Ver donaciones pasadas -->

                                <!-- Ver donaciones rechazadas -->
                                <div class="col-md-12 subItem">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha de creación</th>
                                                    <th scope="col">Fecha de rechazo</th>
                                                    <th scope="col">Resumen de productos</th>
                                                    <th scope="col">Razón de la cancelación</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Cell</th>
                                                    <td>Cell</td>
                                                    <td>Cell</td>
                                                    <td>Cell</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Cell</th>
                                                    <td>Cell</td>
                                                    <td>Cell</td>
                                                    <td>Cell</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Ver donaciones rechazadas -->

                                <!-- Modificar perfil -->
                                <div class="col-md-12 subItem">
                                    <!-- Información donante -->
                                    <form method="POST" action="/change_giver_profile">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="py-3">Información donante</h3>
                                                <!-- Nombre de la empresa -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="company_name" class="req-tooltip">Nombre de la empresa @include('components.required_tool')</label>

                                                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="Enterprise SRL" value="{{ $giver->first()->company_name }}" required autocomplete="company_name" autofocus>

                                                        @error('company_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- CUIT -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="company-cuit" class="req-tooltip">CUIT @include('components.required_tool')</label>

                                                        <input id="company-cuit" type="number" class="form-control @error('company-cuit') is-invalid @enderror" name="company-cuit" placeholder="xxxxxxxx" value="{{ $giver->first()->company_cuit }}" required autocomplete="company-cuit" autofocus>

                                                        @error('company-cuit')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Numero de telefono -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="company-phone" class="req-tooltip">Número de teléfono @include('components.required_tool')</label>

                                                        <input id="company-phone" type="number" class="form-control @error('company-phone') is-invalid @enderror" name="company-phone" placeholder="xxxxxxxx" value="{{ $giver->first()->company_phone }}" required autocomplete="company-phone" autofocus>

                                                        @error('company-phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Dirección -->
                                                <h4 class="mt-5 py-2">Direccion</h4>
                                                <!-- Calle y numero -->
                                                <div class="form-group row">
                                                    <!-- Calle -->
                                                    <div class="col-md-7">
                                                        <label for="address-street" class="req-tooltip">Calle @include('components.required_tool')</label>

                                                        <input id="address-street" type="text" class="form-control @error('address-street') is-invalid @enderror" name="address-street" placeholder="Avenida xx" value="{{ $giver->first()->address_street }}" required autocomplete="address-street" autofocus>

                                                        @error('address-street')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <!-- Numero -->
                                                    <div class="col-md-5">
                                                        <label for="address-number" class="req-tooltip">Número @include('components.required_tool')</label>

                                                        <input id="address-number" type="number" class="form-control @error('address-number') is-invalid @enderror" name="address-number" placeholder="xxx" value="{{ $giver->first()->address_number }}" required autocomplete="address-number" autofocus>

                                                        @error('address-number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Piso y depto -->
                                                <div class="form-group row">
                                                    <!-- Piso -->
                                                    <div class="col-md-5">
                                                        <label for="address-floor">Piso</label>

                                                        <input id="address-floor" type="number" class="form-control @error('address-floor') is-invalid @enderror" name="address-floor" placeholder="xx" value="{{ $giver->first()->address_floor }}" autocomplete="address-floor" autofocus>

                                                        @error('address-floor')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <!-- Depto -->
                                                    <div class="col-md-5">
                                                        <label for="address-apartment">Depto</label>

                                                        <input id="address-apartment" type="text" class="form-control @error('address-apartment') is-invalid @enderror" name="address-apartment" placeholder="xx" value="{{ $giver->first()->address_apartment }}" autocomplete="address-apartment" autofocus>

                                                        @error('address-apartment')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Barrio -->
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="neighborhood" class="req-tooltip">Barrio @include('components.required_tool')</label>
            
                                                        <select id="neighborhood" type="text" class="form-control browser-default custom-select @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ old('neighborhood') }}" autocomplete="neighborhood" required autofocus>
                                                            @foreach ($neighborhoods as $n)
                                                                <option value="{{ $n->neighborhood_id }}"
                                                                        @if($giver->first()->neighborhood_id == $n->neighborhood_id)
                                                                        selected
                                                                    @endif
                                                                >{{ $n->name }}</option>
                                                            @endforeach
                                                        </select>
            
                                                        @error('neighborhood')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Persona responsable -->
                                            <div class="col-md-6 bl-1">
                                                <h3 class="py-3">Persona responsable</h3>
                                                <!-- Nombre y apellido -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="name" class="req-tooltip">Nombre y apellido @include('components.required_tool')</label>

                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="John Smith" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- DNI -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="dni" class="req-tooltip">DNI (Documento Nacional de Identidad) @include('components.required_tool')</label>

                                                        <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" placeholder="xxxxxxxx" value="{{ $user->dni }}" required autocomplete="dni" autofocus>

                                                        @error('dni')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Número de teléfono -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="phone" class="req-tooltip">Número de teléfono @include('components.required_tool')</label>

                                                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="xxxxxxxx" value="{{ $user->phone }}" required autocomplete="phone" autofocus>

                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="email" class="req-tooltip">Email @include('components.required_tool')</label>

                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="johnsmith@dominio.com" value="{{ $user->email }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Botones -->
                                            <div class="col-md-12">
                                                <div class="form-group row pt-3 mb-0">
                                                    <div class="col-md-3 text-left offset-md-6">
                                                        <button type="button" class="btn btn-outline-danger btn-n m-0" data-toggle="modal" data-target="#cancelarModificarPerfil">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 text-right">
                                                        <button type="submit" class="btn btn-primary m-0">
                                                            {{ __('Guardar cambios') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /Modificar perfil -->

                                <!-- Cambiar contraseña -->
                                <div class="col-md-12 subItem">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form method="post" action="/change_password" enctype="multipart/form-data">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <label>Contraseña actual</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nueva Contraseña:</label>
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nueva Contraseña" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Repetir nueva contraseña:</label>
                                                    <input type="password" class="form-control" id="repeat_new" name="repeat_new" placeholder="Repetir Nueva Contraseña" required>
                                                </div>
                                                <br>
                                                <div class="form-group row pt-5 mb-0">
                                                    <div class="col-md-6 text-left">
                                                        <button type="button" class="btn btn-outline-danger btn-n m-0" data-toggle="modal" data-target="#cancelarCambiarContraseña">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <button type="submit" class="btn btn-primary m-0">
                                                            {{ __('Guardar cambios') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Cambiar contraseña -->
                                
                                <!-- Cambiar contraseña -->
                                <div class="col-md-12 subItem">
                                    @if(1 < 2)
                                        <form method="post">
                                            @csrf
                                            <div class="row py-4">
                                                <div class="col-md-12">
                                                    <h3>Solicitar dar de baja la cuenta</h3>
                                                    <hr>
                                                    <p>Puedes solicitar dar de baja tu cuenta como donante en con el siguiente botón.</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-danger m-0">Solicitar baja</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <div class="row py-4">
                                            <div class="col-md-12">
                                                <div class="alert bg-notify-down p-4" role="alert">
                                                    <h5>Ya se ha solicitado la baja, pronto recibirá una respuesta al email con el que se encuentra registrado.</h5>
                                                    <div class="row justify-content-center mt-2">
                                                        <i class="fas fa-envelope big-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {

            var i = 1;
            $('#add').click(function() {
                i++;


                $.ajax({
                    url: '/donation/addProductInputs',
                    method: "POST",
                    data: {
                        'i': i
                    },
                    type: 'json',
                    success: function(data) {
                        console.log('prueba');
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            $('#dynamic_field').append(data.inputs);
                        }
                    }
                });



            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <!-- Modals -->
    <!-- Modal cancelar cambio de perfil -->
    @include('components.modal', [
        'modal_id' => 'cancelarModificarPerfil',
        'mainTitle' => "¿Está seguro que desea cancelar las modificaciones?",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "Los cambios que haya realizado no serán guardados.",
        'cancelLink' => '/donante',
        'cancel' => "Si, cancelar",
        'accept' => "No, seguir",
    ])
    
    <!-- Modal cancelar cambio de contraseña -->
    @include('components.modal', [
        'modal_id' => 'cancelarCambiarContraseña',
        'mainTitle' => "Cambiar contraseña",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "¿Está seguro que desea cancelar el cambio de contraseña?",
        'cancelLink' => '/donante',
        'cancel' => "Si, cancelar",
        'accept' => "No, seguir",

    ])

        @endif

    </div>


@endsection

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

@php
    if(count($products) > 0) {
        $function_load = 'hideProductAdd(); ';
    }
    else {
        $function_load = '';
    }
    $onload = "panelSwitch(".$code.");".$function_load;
@endphp

@section('onload', 'onload='.$onload)

@section('content')

    <div class="container-fluid my-5 pb-5">

        @if(!Auth::user()->isActive)

            <div class="row justify-content-center uns">
                <div class="col-md-11 uns">
                    <img src="{{ asset('img/esperando_donante.jpg') }}" class="w-100 uns">
                </div>
            </div>

        @else

        <div class="row my-5 justify-content-center">
            <div class="col-md-9">
                <h1>Donante<span id="panel-title"></span></h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-9">
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

        <div class="row justify-content-center">
            <div class="col-md-9 card">
                <div class="row">
                    <!-- Menú izquierdo -->
                    <div class="col-md-3 p-0">
                        <div class="shadow-none m-0 p-0">
                            <!-- Elementos del menú -->
                            <ul class="list-group list-group-flush menu-panel">
                                <!-- Donaciones -->
                                <li class="list-group-item menuDivisor py-2">Donaciones</li>
                                <!-- Crear una donación -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(0)"><i class="fas fa-plus-square mr-2 p-2"></i><span>Crear una donación</span></li>
                                <!-- Ver donaciones vigentes -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(1)"><i class="fas fa-box-open mr-2 p-2"></i><span>Ver donaciones vigentes</span></li>
                                <!-- Ver donaciones pasadas -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(2)"><i class="fas fa-box mr-2 p-2"></i><span>Ver donaciones pasadas</span></li>
                                <!-- Ver donaciones rechazadas -->
                                <li class="list-group-item menuItem" onclick="panelSwitch(3)"><i class="fas fa-ban mr-2 p-2"></i><span>Ver donaciones rechazadas</span></li>                            
                            </ul>
                        </div>
                    </div>

                    <!-- Elementos del menu -->
                    <div class="col-md-9 card-menu">
                        <!-- Row -->
                        <div class="row justify-content-center px-2 py-3">
                            
                            <!-- Crear donación -->
                            <div class="col-md-12 subItem">
                                <!-- Row -->
                                <div class="row">
                                    <!-- Col 12 -->
                                    <div class="col-md-12">
                                        <!-- IF -->
                                        @if($status == 'panelA')
                                            <div class="accordion" id="productAccordion">
                                                <div id="headingProduct">
                                                    <h4 class="cursor-p add-product" onclick="hideProductAdd()">Agregar un nuevo producto<i class="fas fa-plus-square ml-2 p-2"></i></h4>
                                                </div>
                                                <div id="collapseProduct">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <!-- Carga de producto -->
                                                            <form method="POST" action="/product/save">
                                                                @csrf
                                                                <!-- Título de producto -->
                                                                <div class="row py-2">
                                                                    <div class="col-md-12">
                                                                        <label for="product-title" class="req-tooltip">Título de producto @include('components.required_tool')</label>
                                                                        <input id="product-title" type="text" class="form-control @error('product-title') is-invalid @enderror" name="product-title" placeholder="Titulo de producto" value="" required autocomplete="product-title" autofocus>
                                                                        @error('product-title')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <!-- Categoría -->
                                                                    <div class="col-md-6">
                                                                        <label for="product-category" class="req-tooltip">Categoría @include('components.required_tool')</label>
                                                                        <select id="product-category" type="text" class="form-control browser-default custom-select @error('neighborhood') is-invalid @enderror" name="product-category" value="{{ old('product-category') }}" autocomplete="product-category" required autofocus>
                                                                            <option selected disabled>Elegir</option>
                                                                            @foreach ($categories as $c)
                                                                                <option value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- Tipo de producto -->
                                                                    <div class="col-md-6">
                                                                        <label for="product-type" class="req-tooltip">Tipo @include('components.required_tool')</label>
                                                                        <select id="product-type" type="text" class="form-control browser-default custom-select @error('product-type') is-invalid @enderror" name="product-type" value="{{ old('product-type') }}" autocomplete="product-type" required autofocus>
                                                                            <option selected disabled>Elegir</option>
                                                                            @foreach ($types as $t)
                                                                                <option value="{{ $t->type_id }}">{{ $t->type_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <!-- Cantidad -->
                                                                    <div class="col-md-6">
                                                                        <label for="amount">Cantidad @include('components.required_tool')</label>
                                                                        <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" placeholder="0" min="0" value="{{ old('amount') }}" autocomplete="amount" autofocus>
                                                                        @error('amount')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <!-- Fecha de vencimiento -->
                                                                <div class="row py-2">
                                                                    <div class="col-md-6">
                                                                        <label class="req-tooltip">Fecha de vencimiento: @include('components.required_tool')</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- Default unchecked -->
                                                                        <input id="has_exp_date" class="c-checkbox" type="button"/>
                                                                        <script>
                                                                            function enable() {
                                                                                var date = document.getElementById("exp_date").disabled;
                                                                                if (date) {
                                                                                    var date = document.getElementById("exp_date").disabled= false;
                                                                                    var check = document.getElementById("has_exp_date");
                                                                                    check.classList.remove('bg-blue-new');
                                                                                }
                                                                                else {
                                                                                    var date = document.getElementById("exp_date");
                                                                                    date.valueAsDate = null;
                                                                                    date.disabled= true;
                                                                                    var check = document.getElementById("has_exp_date");
                                                                                    
                                                                                    check.classList.add('bg-blue-new');
                                                                                }
                                                                            }
                                                                            function disable() {
                                                                                var x = document.getElementById("exp_date");
                                                                                    document.getElementById("exp_date").disabled= true;
                                                                                }
                                                                                document.getElementById("has_exp_date").addEventListener("click", enable);
                                                                        </script>
                                                                        <label class="mr-2">No tiene</label>
                                                                    </div>
                                                                </div>
                                                                <!-- /.Fecha de vencimiento -->
                                                                <hr>
                                                                <!-- Fecha -->
                                                                <div class="row py-2">
                                                                    <div class="col-md-4">
                                                                        Fecha:
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input id="exp_date" type="date" class="form-control @error('exp_date') is-invalid @enderror" name="exp_date" value="" autocomplete="exp_date" autofocus>
                                                                        @error('exp_date')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <!-- /.Fecha -->
                                                                <hr>
                                                                <!-- Buttons -->
                                                                <div class="row py-2">
                                                                    <div class="col-md-6">
                                                                        <button type="button" class="btn btn-n btn-outline-danger" data-toggle="modal" data-target="#cancelarDonacion">
                                                                            Cancelar producto
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <button type="submit" class="btn btn-n btn-light-blue">
                                                                            Guardar Producto
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.Buttons -->
                                                            </form>
                                                            <!-- /.Form -->
                                                        </div>
                                                        <!-- /.Col 7 -->
                                                        <div class="col-md-5 offset-md-2">
                                                            <!-- Resumen Card -->
                                                            <div class="card">
                                                                <!-- Card Header -->
                                                                <div class="card-header py-0 px-2">
                                                                    Resumen
                                                                </div>
                                                                <!-- Card Body -->
                                                                <div class="card-body p-3 border-none shadow-none">
                                                                    <ul class="list-group p-0">
                                                                        @forelse ($products as $p)
                                                                            <li class="list-group-item p-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <i class="fas fa-dot-circle"></i>
                                                                                        {{ $p->name.' , Cantidad: '.$p->amount.'.' }}
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <form class="modifyAmountForm p-0 m-0" id="modifyAmount{{ $p->product_id }}" method="post" action="product/update_amount">
                                                                                            @csrf
                                                                                            <div class="row">
                                                                                                <div class="col-md-5">
                                                                                                    <input id="amount" type="number" value={{ $p->amount }} class="form-control @error('amount') is-invalid @enderror" name="amount" autocomplete="amount" required autofocus>
                                                                                                    <input id="product_id" type="hidden" value={{ $p->product_id }} name="product_id" required>
                                                                                                </div>
                                                                                                <div class="col-md-7">
                                                                                                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <a class="col-md-1 text-right cursor-p" onclick="showModifyAmount('modifyAmount{{ $p->product_id }}')">
                                                                                        <i class="fas fa-edit"></i>
                                                                                    </a>
                                                                                    <div class="col-md-2">
                                                                                        @if(count($products) > 1)
                                                                                            <a href="/product/delete/{{ $p->product_id }}" class="close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </a>
                                                                                        @else
                                                                                            <button type="button" class="close" data-toggle="modal" data-target="#cancelarDonacionLastProduct">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @empty
                                                                            <p>No hay productos</p>
                                                                        @endforelse
                                                                    </ul>
                                                                </div>
                                                                <!-- Card Body -->
                                                            </div>
                                                            <!-- Resumen Card -->
                                                        </div>
                                                        <!-- /.Col 5 -->
                                                    </div>
                                                    <!-- /.Row -->
                                                    <hr>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-md-9 offset-md-3 text-right">
                                                            <button type="button" class="btn btn-n btn-outline-danger ml-3" data-toggle="modal" data-target="#cancelarDonacion">
                                                                Cancelar donación
                                                            </button>
                                                            @if(count($products) > 0)
                                                                <form method="POST" action="donation/end">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-n btn-lg btn-deep-orange m-0">Finalizar carga de productos<i class="fas fa-arrow-right ml-3 text-white"></i></button>
                                                                </form>
                                                            @else
                                                                <button type="button" class="btn btn-n btn-lg btn-deep-orange m-0" disabled>Finalizar carga de productos<i class="fas fa-arrow-right ml-3 text-white"></i></button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- /.Row -->
                                                </div>
                                                <!-- /.Collapse -->
                                            </div>
                                        </div>
                                        <!-- Else -->
                                        @else
                                            <!-- Coordinar la fecha de entrega -->
                                            <form method="POST" action="/donation/save">
                                                @csrf
                                                <!-- Fecha de entrega -->
                                                <div class="row">
                                                    <h5 class="req-tooltip">Coordinar fecha de entrega @include('components.required_tool')</h5>
                                                </div>
                                                <!-- Desde -->
                                                <div class="row py-3">
                                                    <div class="col-md-1 px-0 py-2">
                                                        Desde
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="date-between1" type="date" class="form-control @error('date-between1') is-invalid @enderror" name="date-between1" autocomplete="date-between1" required autofocus>
                                                        @error('date-between1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Hasta -->
                                                <div class="row py-3">
                                                    <div class="col-md-1 px-0 py-2">
                                                        Hasta
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="date-between2" type="date" class="form-control @error('date-between2') is-invalid @enderror" name="date-between2" autocomplete="date-between2" required autofocus>
                                                        @error('date-between2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Hora de entrega -->
                                                <div class="row mt-4">
                                                    <h5 class="req-tooltip">Seleccionar hora @include('components.required_tool')</h5>
                                                </div>
                                                <!-- Hora Desde -->
                                                <div class="row py-3">
                                                    <div class="col-md-1 px-0 py-2">
                                                        Desde
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="hour-between1" type="time" class="form-control @error('hour-between1') is-invalid @enderror" placeholder="00:00" name="hour-between1" autocomplete="hour-between1" required autofocus>
                                                        @error('hour-between1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Hora Hasta -->
                                                <div class="row py-3">
                                                    <div class="col-md-1 px-0 py-2">
                                                        Hasta
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="hour-between2" type="time" class="form-control @error('hour-between2') is-invalid @enderror" placeholder="00:00" name="hour-between2" autocomplete="hour-between2" required autofocus>
                                                        @error('hour-between2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row m-0 p-0">
                                                    <div class="col-md-5 offset-md-1 px-0">
                                                        <span class="formato-24">Formato(24 horas)</span>
                                                    </div>
                                                </div>     
                                                <!-- Botones y dirección -->
                                                <!-- Fecja de entrega -->
                                                <div class="row mt-4">
                                                    <h5 class="req-tooltip">Dirección de entrega @include('components.required_tool')</h5>
                                                </div>
                                                <div class="row py-4">
                                                    <div class="col-md-5 px-0">
                                                        <input type="text" class="form-control" autofocus disabled value="{{ $giver[0]->address_street.' '.$giver[0]->address_number.', '.$giver[0]->address_floor.''.$giver[0]->address_apartment }}">
                                                    </div>
                                                    <div class="col-md-2 offset-md-1">
                                                        <button type="button" class="btn btn-n btn-outline-danger m-0" data-toggle="modal" data-target="#cancelarDonacion">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <button type="submit" class="btn btn-n btn-lg btn-deep-orange m-0">Finalizar donación<i class="fas fa-arrow-right ml-3 text-white"></i></button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Resumenes -->
                                                <div class="card">
                                                    <div class="card-header py-0 px-2">
                                                        Resumen
                                                    </div>
                                                    <div class="card-body p-0 border-none shadow-none">
                                                        <ul class="list-group p-0">
                                                            @forelse ($products as $p)
                                                                <li class="list-group-item p-1 border-none"><i class="fas fa-dot-circle"></i> {{ $p->name.' , Cantidad: '.$p->amount.'.' }}</li>
                                                            @empty
                                                                <p>No hay productos</p>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                        <!-- /.IF -->
                                    </div>
                                    <!-- /.Col -->
                                </div>
                                <!-- /.Row -->
                            </div>
                            <!-- /.Crear donación -->

                            <!-- Ver donaciones vigentes -->
                            <div class="col-md-12 subItem">
                                    <div class="table-responsive resume-table">
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
                                                @php $count = 0; @endphp
                                                @forelse ($donations as $d)    
                                                    @if($d->status == 'VIGENTE')
                                                        <tr>
                                                            <th scope="row">{{ $d->created_at }}</th>
                                                            <td>
                                                                Desde: {{ $d->date_from }}<br>
                                                                Hasta:{{ $d->date_to }}
                                                            </td>
                                                            <td>
                                                                Entre: {{ $d->time_from }}<br>
                                                                Y:{{ $d->time_to }}
                                                            </td>
                                                            <td>
                                                                Calle: {{ $giver[0]->address_street}}<br>
                                                                Número: {{ $giver[0]->address_number}}<br>
                                                                @if($giver[0]->address_floor != NULL) Piso: {{ $giver[0]->address_floor }} @endif<br>
                                                                @if($giver[0]->address_apartment != NULL) Depto: {{$giver[0]->address_apartment }} @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="link" onclick="showResumeDonation({{ $count }},'donationResumeVigente')">Ver resumen</a>
                                                            </td>
                                                        </tr>
                                                        @php $count++; @endphp
                                                    @endif
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    @forelse($donations as $d)
                                        @if($d->status == 'VIGENTE')
                                            <!-- Resumen -->
                                            <div class="card my-4 donationResumeVigente">
                                                <div class="card-header py-2 px-3">
                                                    Resumen
                                                    <button type="button" class="close" onclick="hideResumeDonation('donationResumeVigente')">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card-body p-3 border-none shadow-none">
                                                    <ul class="list-group">
                                                        @forelse ($allproducts as $p)
                                                            @if($p->donation_id == $d->donation_id)
                                                                <li class="list-group-item p-1 border-none"><i class="fas fa-dot-circle"></i> {{ $p->name.' , Cantidad: '.$p->amount.'.' }}</li>
                                                            @endif
                                                        @empty
                                                            
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @empty

                                    @endforelse
                            </div>
                            <!-- Ver donaciones vigentes -->

                            <!-- Ver donaciones pasadas -->
                            <div class="col-md-12 subItem">
                                    <div class="table-responsive resume-table">
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
                                                @php $count = 0; @endphp
                                                @forelse ($donations as $d)    
                                                    @if($d->status == 'COMPLETADA')
                                                        <tr>
                                                            <th scope="row">{{ $d->created_at }}</th>
                                                            <td>
                                                                Desde: {{ $d->date_from }}<br>
                                                                Hasta:{{ $d->date_to }}
                                                            </td>
                                                            <td>
                                                                Entre: {{ $d->time_from }}<br>
                                                                Y:{{ $d->time_to }}
                                                            </td>
                                                            <td>
                                                                Calle: {{ $giver[0]->address_street}}<br>
                                                                Número: {{ $giver[0]->address_number}}<br>
                                                                @if($giver[0]->address_floor != NULL) Piso: {{ $giver[0]->address_floor }} @endif<br>
                                                                @if($giver[0]->address_apartment != NULL) Depto: {{$giver[0]->address_apartment }} @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="link" onclick="showResumeDonation({{ $count }},'donationResumeCompletada')">Ver resumen</a>
                                                            </td>
                                                        </tr>
                                                        @php $count++; @endphp
                                                    @endif
                                                @empty
                                                    <p>no hay donaciones</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    @forelse($donations as $d)
                                        @if($d->status == 'COMPLETADA')
                                            <!-- Resumen -->
                                            <div class="card my-4 donationResumeCompletada">
                                                <div class="card-header py-2 px-3">
                                                    Resumen
                                                    <button type="button" class="close" onclick="hideResumeDonation('donationResumeCompletada')">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card-body p-3 border-none shadow-none">
                                                    <ul class="list-group">
                                                        @forelse ($allproducts as $p)
                                                            @if($p->donation_id == $d->donation_id)
                                                                <li class="list-group-item p-1 border-none"><i class="fas fa-dot-circle"></i> {{ $p->name.' , Cantidad: '.$p->amount.'.' }}</li>
                                                            @endif
                                                        @empty
                                                            
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @empty

                                    @endforelse
                            </div>
                            <!-- /Ver donaciones pasadas -->

                            <!-- Ver donaciones rechazadas -->
                            <div class="col-md-12 subItem">
                                    <div class="table-responsive resume-table">
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
                                                @php $count = 0; @endphp
                                                @forelse ($donations as $d)    
                                                    @if($d->status == 'RACHAZADA')
                                                        <tr>
                                                            <th scope="row">{{ $d->created_at }}</th>
                                                            <td>
                                                                2019-10-18 15:07:01
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="link" onclick="showResumeDonation({{ $count }},'donationResumeRechazada')">Ver resumen</a>
                                                            </td>
                                                            <td>
                                                                Los productos están proximos a vencer.
                                                            </td>
                                                        </tr>
                                                        @php $count++; @endphp
                                                    @endif
                                                @empty
                                                    <p>no hay donaciones</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    @forelse($donations as $d)
                                        @if($d->status == 'RACHAZADA')
                                            <!-- Resumen -->
                                            <div class="card my-4 donationResumeRechazada">
                                                <div class="card-header py-2 px-3">
                                                    Resumen
                                                    <button type="button" class="close" onclick="hideResumeDonation('donationResumeRechazada');">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card-body p-3 border-none shadow-none">
                                                    <ul class="list-group">
                                                        @forelse ($allproducts as $p)
                                                            @if($p->donation_id == $d->donation_id)
                                                                <li class="list-group-item p-1 border-none"><i class="fas fa-dot-circle"></i> {{ $p->name.' , Cantidad: '.$p->amount.'.' }}</li>
                                                            @endif
                                                        @empty
                                                            
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @empty

                                    @endforelse
                            </div>
                            <!-- /Ver donaciones rechazadas -->

                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>
    <script>
        $(document).ready(function () {

            var i = 1;
            $('#add').click(function () {
                i++;


                $.ajax({
                    url: '/donation/addProductInputs',
                    method: "POST",
                    data: {
                        'i': i
                    },
                    type: 'json',
                    success: function (data) {
                        console.log('prueba');
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            $('#dynamic_field').append(data.inputs);
                        }
                    }
                });


            });
            $(document).on('click', '.btn_remove', function () {
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
    <!-- Modal cancelar donacion -->
    @include('components.modal', [
        'modal_id' => 'cancelarDonacion',
        'mainTitle' => "¿Está seguro que desea cancelar la donación?",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "Todos los productos que hayas agregado a la donación se eliminarán junto con la donación.",
        'cancelLink' => '/donation/delete',
        'cancel' => "Si, cancelar",
        'accept' => "No, seguir",
    ])
    @include('components.modal', [
        'modal_id' => 'cancelarDonacionLastProduct',
        'mainTitle' => "¿Está seguro que desea eliminar el producto?",
        'mainIcon' => 'fas fa-exclamation-triangle',
        'mainContent' => "Si elimina el producto ahora, se cancelara la donación completa.",
        'cancelLink' => '/donation/delete',
        'cancel' => "Si, cancelar",
        'accept' => "No, seguir",
    ])
    @endif

    </div>


@endsection

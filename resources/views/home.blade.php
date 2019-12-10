@extends('layouts.app')
@include('components.nav')
@section('header')
<style type="text/css">
    * {
        font-family: 'Lato', sans-serif;
    }
    html, body, header, .view-home {
        height: 100vh;
    }
    .view-home .container-fluid {
        padding-top: 65vh;
    }
    .view-subhome {
        height: 50vh;
        margin: 8vh 0 0 0 ;
    }
    @media (max-width: 740px) {
        html, body, header, .view-home {
            height: 1000px;
        }
        .view-home .container-fluid {
            padding-top: 35vh;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
          html, body, header, .view-home {
            height: 650px;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {
            background: #1C2331!important;
        }
    }
</style>
@endsection
@section('content')

<!-- Full Page Intro -->
<div class="view-home full-page-intro" style="background-image: url('{{ asset('img/homewallpaper.png') }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid home-container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 text-left">
                <h1 class="white1 h2-b w500 text-uppercase text-shadow">Conciencia</h1>
                <h1 class="white1 h1-b w500 text-uppercase text-shadow">Por el hambre</h1>
            </div>
            <div class="col-12 col-md-5 text-right">
                <h2 class="white1 h3-b w500 text-uppercase mb-4 mt-2 text-shadow">¡Asociate como voluntario!</h2>
                <a href="/register_volunteer" class="btn btn-home btn-rounded btn-lg">Asociate<i class="fas fa-angle-right ml-3"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Full Page Intro -->

<!-- Full Page Intro -->
<div class="view-subhome full-page-intro" style="background-image: url('{{ asset('img/homesecondwallpaper.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="mask rgba-black-light justify-content-center align-items-center h-100 my-5 py-4">
        <div class="container-fluid home-container my-4">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <h1 class="white1 h2-b w500 text-uppercase text-shadow mb-5">¿Quienes somos?</h1>
                </div>
                <div class="col-10">
                    <p class="h4 white1 text-shadow text-center" style="line-height: 120%; letter-spacing: .05em;">Somos una Organización de la Sociedad Civil (OSC), que tiene como objetivo disminuir el hambre y la desnutrición a través del recupero de alimentos.
                        Nacimos como Asociación Civil sin fines de lucro en el año 2000, como uno de los primeros Bancos de Alimentos del país.
                        Somos socios fundadores de la Red Argentina de Bancos de Alimentos, que nuclea a otros 14 Bancos constituidos en el país, 3 en formación, 2 organizaciones adherentes y 4 iniciativas de Bancos de Alimentos.
                        Defendemos el Derecho Humano a una alimentación saludable, logrado a través del esfuerzo de nuestro staff, voluntarios y la solidaridad de empresarios, productores y donantes.<p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Page Intro -->

<div class="container-fluid home-container mt-5 p-0">
    <div class="row py-5 px-0 my-0 mx-0 row-eq-height">
        <div class="col-6 py-2 px-5" style="background: #d7f0bc !important;">
            <h1 class="text-uppercase w600 black2 my-4">Nuestra misión</h1>
            <img src="{{ asset('img/icon_a.png') }}" class="icon-home">
            <style>
                .icon-home {
                    position:absolute;
                    width:80px;
                    top: 20px;
                    right: 20px;
                }
            </style>
            <div class="card mt-5 mx-5 h-100" style="margin-bottom: -60px !important;">
                <div class="card-body p-5">
                    <p class="h4 black2" style="line-height: 125%; letter-spacing: .08em;">Disminuir el hambre, la desnutrición y las malas prácticas alimentarias en la región, mediante el recupero de alimentos, para ser distribuidos a organizaciones comunitarias que presten servicio alimentario a sectores necesitados, desarrollando acciones conjuntas con la sociedad, basadas en nuestros valores y capacidades.</p>
                </div>
            </div>
        </div>
        <div class="col-6 py-2 px-5" style="background: #fcf0ad !important;">
            <h1 class="text-uppercase w600 black2 my-4">Nuestros valores</h1>
            <img src="{{ asset('img/icon_b.png') }}" class="icon-home">
            <div class="card mt-5 mx-5 h-100" style="margin-bottom: -60px !important;">
                <div class="card-body p-5">
                    <ul class="h4 black2" style="line-height: 120%; letter-spacing: .08em;">
                        <li class="black2">Compromiso social</li>
                        <li class="black2">Solidaridad</li>
                        <li class="black2">Responsabilidad</li>
                        <li class="black2">Transparencia</li>
                        <li class="black2">Educación</li>
                        <li class="black2">Respeto al prójimo</li>
                        <li class="black2">Conciencia socio ambiental</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid my-5 pt-5">
    <!-- Nuestro equipo -->
    <div class="row mt-4 py-4 justify-content-center">
        <div class="col-md-12 text-center">
                    <div class="row row-eq-height">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body row text-left px-4">
                                    <div class="col-md-12 py-4">
                                        <h1>Nuesto equipo</h1>
                                        <hr class="orange-hr">
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-4">
                                                <h6>Gastón Zappalá</h6>
                                                <b>Dirección General</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>coordinacion@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Antonela Bonora</h6>
                                                <b>Administracion</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>administracion@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Elián Soutullo</h6>
                                                <b>Voluntariado</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>voluntarios@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Luis López</h6>
                                                <b>Depósito</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>deposito@bancoalimentario.org.ar</i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-4">
                                                <h6>Dolores Puig</h6>
                                                <b>Logística</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>logistica@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Cielo Zosi</h6>
                                                <b>Comunicación Institucional</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>comunicacion@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Lucas Martínez</h6>
                                                <b>Área Social</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>social@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Carlos Ludueña</h6>
                                                <b>Recupero de Frutas y Verduras </b><br>
                                            </li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body row text-left px-4">
                                    <div class="col-md-12 py-4">
                                        <h1>Comisión directiva</h1>
                                        <hr class="orange-hr">
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="list-unstyled">
                                            <li class="mb-4">
                                                <h6>Pedro Elizalde</h6>
                                                <b>Presidente</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>presidencia@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Carlos Tau</h6>
                                                <b>Vice-Presidente</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>vicepresidencia@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Miriam Piumetti</h6>
                                                <b>Tesorera</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>tesoreria@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Mercedes Tau</h6>
                                                <b>Secretaria</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>secretaria@bancoalimentario.org.ar</i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled">
                                            <li class="mb-4">
                                                <h6>Héctor Giagante</h6>
                                                <b>Vocal</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>vocal1@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Marcelo Cabral</h6>
                                                <b>Vocal</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>vocal2@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Sebastián Laguto</h6>
                                                <b>Vocal suplente</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>vocal3@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Christian Estegui</h6>
                                                <b>Fiscal Titular</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>fiscal1@bancoalimentario.org.ar</i>
                                            </li>
                                            <li class="mb-4">
                                                <h6>Diego Principi</h6>
                                                <b>Fiscal Titular</b><br>
                                                <i class="fas fa-envelope mr-2"></i><i>fiscal2@bancoalimentario.org.ar</i>
                                            </li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                
        </div>
    </div>
</div>
@include('components.footer')
@endsection

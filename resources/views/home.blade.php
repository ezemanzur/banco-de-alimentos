@extends('layouts.app')

@include('components.header')

@include('components.nav')

@section('content')

<div class="container">
    <div class="row py-5">
        <!-- Noticias -->
        <div class="col-md-6">
            <!--Carousel Wrapper-->
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/slide1_1.jpg') }}"
                        alt="First slide">
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/slide1_2.jpg') }}"
                        alt="Second slide">
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/slide1_3.jpg') }}"
                        alt="Third slide">
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                </div>
                <!--/.Carousel Wrapper-->
        </div>
        <div class="col-md-6">
            <div class="card main-content">
                <div class="card-body text-left">
                    <!--h3>Titulo 2</h3-->
                    <p>
                        Recuperamos y recibimos donaciones de alimentos que no son comercializables, pero sí aptos para el consumo humano, con el objeto de entregarlos a entidades de bien público de la región.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Nuestro Trabajo -->
    <div class="row py-4 justify-content-center">
        <div class="col-md-11">
            <div class="card o-h">
                <div class="card-body text-center px-5 quienes-somos o-h">
                    <h2 class="mt-2 mb-4">¿Quienes somos?</h2>
                    <p>
                        Somos una Organización de la Sociedad Civil (OSC), que tiene como objetivo disminuir el hambre y la desnutrición a través del recupero de alimentos.
                        Nacimos como Asociación Civil sin fines de lucro en el año 2000, como uno de los primeros Bancos de Alimentos del país.
                        Somos socios fundadores de la Red Argentina de Bancos de Alimentos, que nuclea a otros 14 Bancos constituidos en el país, 3 en formación, 2 organizaciones adherentes y 4 iniciativas de Bancos de Alimentos.
                        Defendemos el Derecho Humano a una alimentación saludable, logrado a través del esfuerzo de nuestro staff, voluntarios y la solidaridad de empresarios, productores y donantes. 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="row py-4 row-eq-height">
        <div class="col-md-4">
            <!-- Card -->
            <div class="card h-100">

            <!-- Card image -->
            <div class="view overlay mxl-2">
                <!--Carousel Wrapper-->
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/slide2_1.jpg') }}"
                        alt="First slide">
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/slide2_2.jpg') }}"
                        alt="Second slide">
                    </div>
                    <!--/Second slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                </div>
                <!--/.Carousel Wrapper-->
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Misión</h4>
                <!-- Text -->
                <p class="card-text">Disminuir el hambre, la desnutrición y las malas prácticas alimentarias en la región, mediante el recupero de alimentos, para ser distribuidos a organizaciones comunitarias que presten servicio alimentario a sectores necesitados, desarrollando acciones conjuntas con la sociedad, basadas en nuestros valores y capacidades.</p>
            </div>

            </div>
            <!-- Card -->
        </div>

        <div class="col-md-4">
            <!-- Card -->
            <div class="card h-100">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="{{ asset('img/home_vision.jpg') }}" alt="Card image cap">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Visión</h4>
                <!-- Text -->
                <p class="card-text">Una sociedad sin hambre, nutrida, con conciencia socio-ambiental, donde no se desperdicien alimentos aptos para el consumo.</p>

            </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-4">
            <!-- Card -->
            <div class="card h-100">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="{{ asset('img/home_valores.jpg') }}" alt="Card image cap">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Valores</h4>
                <!-- Text -->
                <p class="card-text">
                    <ul>
                        <li>Compromiso social</li>
                        <li>Solidaridad</li>
                        <li>Responsabilidad</li>
                        <li>Transparencia</li>
                        <li>Educación</li>
                        <li>Respeto al prójimo</li>
                        <li>Conciencia socio ambiental</li>
                    </ul>
                </p>

            </div>

            </div>
            <!-- Card -->
        </div>
    </div>
</div>
<div class="container-fluid px-5">
    <!-- Nuestro equipo -->
    <div class="row py-4 justify-content-center">
        <div class="col-md-10">
            <div class="card nuestro-equipo">
                <div class="card-body text-center">
                    <h1 class="my-3 mb-5">Equipo</h1>
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
    </div>
</div>

@include('components.footer')

@endsection

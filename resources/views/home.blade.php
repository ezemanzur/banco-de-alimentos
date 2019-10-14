@extends('layouts.app')

@include('components.header')

@include('components.nav')

@section('content')

<div class="container">
    <div class="row py-4">
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
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                        alt="First slide">
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                        alt="Second slide">
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
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

        </div>
    </div>
    <!-- Nuestro Trabajo -->
    <div class="row py-4 justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body text-center">
                    <h3>¿Quienes somos?</h3>
                    <p>texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto</p>
                </div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="row py-4">
        <div class="col-md-4">
            <!-- Card -->
            <div class="card">

            <!-- Card image -->
            <div class="view overlay mxl-2">
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
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                        alt="First slide">
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                        alt="Second slide">
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
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

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Card title</h4>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- Button -->
                <a href="#" class="btn btn-primary">Button</a>

            </div>

            </div>
            <!-- Card -->
        </div>

        <div class="col-md-4">
            <!-- Card -->
            <div class="card">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Card title</h4>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- Button -->
                <a href="#" class="btn btn-primary">Button</a>

            </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-4">
            <!-- Card -->
            <div class="card">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Card title</h4>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- Button -->
                <a href="#" class="btn btn-primary">Button</a>

            </div>

            </div>
            <!-- Card -->
        </div>
    </div>
    <!-- Nuestro equipo -->
    <div class="row py-4 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h3>Nuestro equipo</h3>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body row text-left">
                                    <h4 class="col-md-12">Comisión directiva</h4>
                                    <div class="col-md-6">
                                        <ul>
                                            <li>nombre</li>
                                            <li>nombre</li>
                                            <li>nombre</li>
                                            <li>nombre</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li>nombre</li>
                                            <li>nombre</li>
                                            <li>nombre</li>
                                            <li>nombre</li>
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

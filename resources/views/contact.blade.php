@extends('layouts.app')
@include('components.header')
@section('content')
<!-- Container -->
<div class="container-fluid">
    <!-- Row -->
    <div class="row my-5 justify-content-center">
        <!-- Col -->
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header pb-1">
                    <h5>Formulario de contacto</h5>
                </div>
                <div class="card-body">
                    <!--Section: Contact v.2-->
                    <section class="mb-4">
                        <!--Section heading-->
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Envíanos un mensaje</h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5">
                            Si quieres comunicarte con nosotros puedes hacerlo a traves del siguiente formulario.
                        </p>

                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-9 mb-md-0 mb-5">
                                <form id="contact-form" name="contact-form" action="#" method="POST">
                                    @csrf
                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre">
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Tema">
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">

                                            <div class="md-form">
                                                <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea" placeholder="Su mensaje"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <!--Grid row-->

                                </form>

                                <div class="text-center text-md-right">
                                    <a class="btn btn-primary">Enviar mensaje</a>
                                </div>
                                <div class="status"></div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 text-center">
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                        <p>Calle 65 (ex 8) entre 124 y 125 de Berisso, Villa Arguello.</p>
                                    </li>

                                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                        <p>+54 9 0221-4224988</p>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                        </div>

                    </section>
                    <!--Section: Contact v.2-->                 
                </div>
            </div>
        </div>
        <!-- /.Col -->
    </div>
    <!-- /.Row -->
</div>
<!-- /.Container -->
@include('components.footer')
@endsection

<!-- Navbar -->
<nav class="normal-navbar navbar navbar-expand-md bg-white1 navbar-light shadow-sm uns px-5">
        <div class="container-fluid px-5 mx-5">
            <a class="navbar-brand m-0 p-0" href="{{ url('/') }}">
                <img src="{{ asset('img/artwork/logo.jpg') }}">
            </a>
            <button class="navbar-toggler btn py-2 px-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent    " aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse my-0 py-0" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mx-auto px-0 my-0">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/') }}">Qué hacemos</a>
                    </li>
                    @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Asociate
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/register_volunteer">Como voluntario</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/register">Como donante</a>
                        </div>
                    </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/') }}">Destinatarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/') }}">Donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/contacto') }}">Contacto</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mr-3">
                    @guest
                    <li class="nav-item p-0">
                        <a class="nav-link text-uppercase opacity-7" href="{{ url('/login') }}"><img src="{{ asset('img/nav-login.png') }}"></a>
                    </li>
                    @else
                        @php
                            if(Auth::user()->rol == 'giver') $link = 'donante';
                            else $link = 'empleado';
                        @endphp
                        <li class="nav-item mx-0 px-0">
                            <a class="nav-link mx-0 px-0" href="{{ url($link) }}"><i class="fas fa-tachometer-alt mr-2 black3"></i>Mi Panel</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item black3" href="{{ url('/profile') }}"><i class="fas fa-user-alt mr-2 black3"></i>Mi perfil</a>
                                @if(Auth::user()->isAdmin)
                                    <a class="dropdown-item black3" href="{{ url('/administrador') }}"><i class="fas fa-user-shield mr-2 black3"></i>Administración</a>
                                @endif
                                <a class="dropdown-item black3" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2 black3"></i>Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
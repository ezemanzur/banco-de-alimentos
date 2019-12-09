<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/artwork/logo.jpg') }}" class="img-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-login py-2 px-4 m-0" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-register py-2 px-4 m-0 ml-3" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                    </li>
                @else
                    @php
                        if(Auth::user()->rol == 'giver') {
                            $link = 'donante';
                        }
                        else
                            $link = 'empleado';
                    @endphp
                    <li class="nav-item">
                        <a class="btn btn-light black2" href="{{ url($link) }}"><i class="fas fa-tachometer-alt mr-2 color7"></i>Panel</a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle py-2 px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item color7" href="{{ url('/profile') }}"><i class="fas fa-user-alt mr-2 color7"></i>Mi perfil</a>
                            @if(Auth::user()->isAdmin)
                                <!-- Muesta el link de admin -->
                                <a class="dropdown-item color7" href="{{ url('/administrador') }}"><i class="fas fa-user-shield mr-2 color7"></i>Administración</a>
                            @endif
                            <a class="dropdown-item color7" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2 color7"></i>Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
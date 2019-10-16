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
                        <a class="btn btn-mdb-color py-2 px-4 m-0" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                @else
                    @php
                        if(Auth::user()->rol == 'giver') {
                            $link = 'donante';
                        }
                        //Ampliar
                    @endphp
                    <a class="btn btn-info m-0" href="{{ $link }}">Mi perfil</a>
                @endguest
            </ul>
        </div>
    </div>
</nav>
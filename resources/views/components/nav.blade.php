<!-- Navbar -->
<div class="top-navbar py-2">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="m-0">Banco alimentario de La plata</h1>
        </div>
    </div>
</div>
<!-- Navbar -->
<nav class="main-navbar navbar navbar-expand-md navbar-light shadow-none py-0 px-1">
    <div class="container-fluid p-0 m-0">
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
                    <a class="dropdown-item" href="register_volunteer">Como voluntario</a>
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
                <li class="nav-item p-0">
                    <a class="nav-link text-uppercase opacity-7" href="{{ url('/login') }}"><img src="{{ asset('img/nav-login.png') }}"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /.Navbar -->
<script>
	// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
	window.onscroll = function() {scrollHeader()};

	function scrollHeader() {
		if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
            document.getElementsByClassName("main-navbar")[0].classList.add("main-navbar-s");
            document.getElementsByClassName("top-navbar")[0].classList.add("top-navbar-s");
		} else {
            document.getElementsByClassName("top-navbar")[0].classList.remove("top-navbar-s");
			document.getElementsByClassName("main-navbar")[0].classList.remove("main-navbar-s");
		}
	}
</script>

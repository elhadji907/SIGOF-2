<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="assets/img/logo_sigle.png" alt="">
            <span class="d-none d-lg-block">SIGOF</span>
            {{-- Système d'information et de gestion des opérations de formation --}}
        </a>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('home') }}">
                    <span class="d-none d-md-block">Accueil</span>
                </a>
            </li>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('register-operateur') }}">
                    <span class="d-none d-md-block">Devenir opérateur</span>
                </a>
            </li>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('register-page') }}">
                    <span class="d-none d-md-block">S'inscrire</span>
                </a>
            </li>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('login-page') }}">
                    <span class="d-none d-md-block">Se Connecter</span>
                </a>
            </li>

        </ul>
    </nav>

</header>

{{-- <aside class="sidebar">

</aside> --}}

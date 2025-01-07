<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', "SIGOF | SYSTEME D'INFORMATION ET DE GESTION DES OPERATIONS DE FORMATION")</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon-onfp.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon-onfp.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <!-- Main CSS File -->
    <link href="{{ asset('asset/css/main.css') }}" rel="stylesheet">

    {{-- Pour sweetAlert --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">
        function callbackThen(response) {
            // read Promise object
            response.json().then(function(data) {
                console.log(data);
                if (data.success && data.score > 0.5) {
                    console.log('recpatcha valid');
                } else {
                    document.getElementById('registerForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        alert('erreur recpatcha');
                    });
                }
            });
        }

        function callbackCatch(error) {
            console.error('Error:', error)
        }
    </script>

    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',
    ]) !!}
    <!-- =======================================================
  * Template Name: iLanding
  * Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
  * Updated: Oct 28 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('asset/img/logo.png') }}" alt=""> -->
                {{-- <img src="{{ asset('assets/img/logo_sigle.png') }}" alt=""> --}}
                <h1 class="sitename"><b>SIGOF</b></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#accueil" class="active">Accueil</a></li>
                    <li><a href="#apropos">À propos</a></li>
                    <li><a href="#partenaires">Partenaires</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>

                    <li class="dropdown"><a><span>S'inscrire</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li> <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#registerDemandeurModal">Compte personnel</a>
                            </li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#registerOperateurModal">Compte
                                    opérateur</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Se
                connecter</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="accueil" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">

                @if ($message = Session::get('status'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                            role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                role="alert"><strong>{{ $error }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="company-badge mb-4">
                                <i class="bi bi-gear-fill me-2"></i>
                                La référence de la formation professionnelle
                            </div>

                            <h1 class="mb-4">
                                @if (!empty($une?->titre1))
                                    {{ $une?->titre1 }} <br>
                                @else
                                    M. Mouhamadou Lamine Bara LO <br>
                                @endif

                                @if (!empty($une?->titre2))
                                    <span class="accent-text">{{ $une?->titre2 }}</span>
                                @else
                                    <span class="accent-text">Directeur Général</span>
                                @endif
                            </h1>

                            <p class="mb-4 mb-md-5">
                                @if (!empty($une?->message))
                                    {{ substr($une?->message, 0, 350) }}...
                                @else
                                    
                                @endif
                            </p>
                            <div class="hero-buttons">
                                @if (!empty($une?->message))
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#enSavoirPlusModal"
                                        class="btn btn-primary me-0 me-sm-2 mx-1">En savoir plus</a>
                                @else
                                    <a href="#apropos" class="btn btn-primary me-0 me-sm-2 mx-1">En savoir plus</a>
                                @endif
                                @if (!empty($une?->video))
                                    <a href="{{ $une?->video }}" class="btn btn-link mt-2 mt-sm-0 glightbox">
                                        <i class="bi bi-play-circle me-1"></i>Lire la vidéo</a>
                                @else
                                    <a href="https://www.youtube.com/watch?v=UVn3WAv8XbM&t=49s" class="btn btn-link mt-2 mt-sm-0 glightbox">
                                        <i class="bi bi-play-circle me-1"></i>Vidéo présentation</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">

                            @if (!empty($une?->image))
                                <img class="img-fluid main-image rounded-4" alt="Image"
                                    src="{{ asset($une?->getUne()) }}">
                            @else
                                <img src="{{ asset('asset/img/dg.png') }}" alt="Hero Image"
                                    class="img-fluid main-image rounded-4">
                            @endif

                            <div class="customers-badge">
                                <div class="customer-avatars">
                                    <span class="avatar more">{{ $count_today }}</span>
                                </div>
                                <p class="mb-0 mt-2">
                                    {{ $title }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($postes as $poste)
                @endforeach
                @if (!empty($poste))
                    <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                        @foreach ($postes as $poste)
                            <div class="col-lg-4 col-md-6">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#ShowPostModal{{ $poste->id }}">
                                    <div class="stat-item">
                                        <img class="rounded-circle" alt="{{ $poste->legende }}"
                                            src="{{ asset($poste->getPoste()) }}" width="50" height="auto">
                                        <div class="stat-content">
                                            <h6>{{ $poste?->legende }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </section>

        <!-- About Section -->
        <section id="apropos" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">A PROPOS DE NOUS</span>
                        {{-- <h2 class="about-title">La référence de la formation professionnelle</h2> --}}
                        <p class="about-description">L'Office National de Formation Professionnelle (ONFP) est un
                            établissement public à caractère industriel et commercial (EPIC) créé par la Loi n°86-44 du
                            11 Août 1986. Ainsi, l'ONFP a pour mission de :</p>

                        <div class="row feature-list-wrapper">
                            <div class="col-md-12">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Aider à mettre en œuvre les objectifs
                                        sectoriels du gouvernement et d'assister les organismes publics et privés dans
                                        la réalisation de leur action ;</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Réaliser des études sur l'emploi, la
                                        qualification professionnelle, les moyens quantitatifs et qualitatifs de la
                                        formation professionnelle initiale et continue ;</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Coordonner les interventions par
                                        branche professionnelle par action prioritaire en s'appuyant sur des structures
                                        existantes ou à créer ;</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Coordonner l'action de formation
                                        professionnelle des organismes d'aides bilatérales ou multilatérales.</li>

                                </ul>
                            </div>
                        </div>

                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-6">
                                    <div class="profile d-flex align-items-center gap-3">
                                        <img src="{{ asset('asset/img/dg.png') }}" alt="DG ONFP"
                                            class="profile-image">
                                        <div>
                                            <h4 class="profile-name"><b>M. Lamine Bara LO</b></h4>
                                            <p class="profile-position">Directeur Général</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">Appelez-nous au</p>
                                            <p class="contact-number">+221 33 827 92 51</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="{{ asset('asset/img/about5.jpg') }}" alt="Image 5"
                                    class="img-fluid main-image rounded-4">
                                <img src="{{ asset('asset/img/about2.jpg') }}" alt="Image 2"
                                    class="img-fluid small-image rounded-4">
                            </div>
                            <div class="experience-badge floating">
                                <h3>{{ $anciennete }}+ <span>ans</span></h3>
                                <p>{{ __("d'expérience dans la formation professionnelle") }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- /About Section -->

        <section class="testimonials section light-background">
        </section>
        <!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">
                    @foreach ($services as $service)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card d-flex">
                                <div class="icon flex-shrink-0">
                                    <i class="bi bi-easel"></i>
                                </div>
                                <div>
                                    <h3>{{ $service?->titre }}</h3>
                                    <p>{{ $service?->name }}</p>
                                    <a href="{{ $service?->lien }}" class="read-more" target="_blank">En savoir plus
                                        <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Service Card -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_individuelles }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Demandes individuelles</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_collectives }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Demandes collectives</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_projets }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projets, Programmes</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count_operateurs }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Opérateurs agréés</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section>
        <!-- Faq Section -->
        <section class="faq-9 faq section light-background" id="faq">

            <div class="container">
                <div class="row">

                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">Réponses aux questions</h2>
                        <p class="faq-description">Vous avez une question ? Consultez les questions fréquemment posées
                        </p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">
                            <?php $i = 1; ?>
                            @foreach ($contacts as $contact)
                                @if (!empty($contact?->reponse))
                                    <div class="faq-item">
                                        <h3>{{ $contact?->message }}</h3>
                                        <div class="faq-content">
                                            <p>{{ $contact?->reponse }}</p>
                                        </div>
                                        <i class="faq-toggle bi bi-chevron-right"></i>
                                    </div>
                                    <!-- End Faq item-->
                                    <?php $i++; ?>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Faq Section -->

        <section class="stats section">
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 g-lg-5">
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="text-center">Pour nous joindre</h3>
                            <p class="text-center">Vous pouvez nous contacter via le formulaire de contact, par email
                                direct ou par
                                téléphone.</p>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>Notre localisation</h4>
                                    <p>Spres 1, lot 2 - 2 voies liberté 6, extension VDN. </p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <a href="tel:+221338279251"><i class="bi bi-telephone"></i></a>
                                </div>
                                <div class="content">
                                    <h4>Téléphone</h4>
                                    <p>+221 33 827 92 51</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <a href="mailto:onfp@onfp.sn"><i class="bi bi-envelope"></i></a>
                                </div>
                                <div class="content">
                                    <h4>Addresse e-mail</h4>
                                    <p>onfp@onfp.sn</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                            <h3>Connectez-nous ! Posez vos questions !</h3>
                            <p>
                                Bonjour et bienvenue sur notre application !

                                Nous sommes ravis de vous compter parmi nos utilisateurs. Si vous avez des questions,
                                des suggestions ou des remarques, n'hésitez pas à nous contacter. Notre équipe est là
                                pour vous assister et s'assurer que vous avez la meilleure expérience possible.
                            </p>
                            <p>
                                Cordialement,
                                L'équipe digitale
                            </p>

                            <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('contacts.store') }}">
                                @csrf
                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="emailadresse" class="form-label">Email<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="emailadresse" name="emailadresse"
                                            class="form-control form-control-sm @error('emailadresse') is-invalid @enderror"
                                            id="emailadresse" required placeholder="Votre adresse e-mail"
                                            value="{{ old('emailadresse') }}">
                                        <div class="invalid-feedback">
                                            @error('emailadresse')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="telephone" class="form-label">Téléphone<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="telephone" name="telephone"
                                            class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                            id="telephone" required placeholder="Votre téléphone"
                                            value="{{ old('telephone') }}">
                                        <div class="invalid-feedback">
                                            @error('telephone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="name" name="objet"
                                            class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                            id="objet" required placeholder="Objet" value="{{ old('objet') }}">
                                        <div class="invalid-feedback">
                                            @error('objet')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="message" class="form-label">Message<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="message" rows="4"
                                            placeholder="Ecrire votre message ici, Poser votre question, ..." required></textarea>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-sm" type="submit">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- /Contact Section -->
        <!-- Clients Section -->
        <section id="partenaires" class="clients section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Partenaires</h2>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                            },
                            "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                            },
                            "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                            },
                            "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                            }
                        }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($projets as $projet)
                            <div class="swiper-slide"><img src="{{ asset($projet?->getProjetImage()) }}"
                                    class="img-fluid" alt="">
                            </div>
                        @endforeach
                        <div class="swiper-slide"><img src="" class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section>

        <section class="testimonials section light-background">
        </section>

        {{-- Connexion --}}
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="loginModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="row g-3 needs-validation" novalidate method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="w-100 text-center">CONNEXION</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                id="email" required placeholder="Votre adresse e-mail"
                                                value="{{ old('email') }}" autofocus>
                                            <div class="invalid-feedback">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Mot de passe<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="password" name="password"
                                            class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                            id="password" required placeholder="Votre mot de passe">
                                        <div class="invalid-feedback">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Souviens-toi de
                                                moi</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <button class="btn btn-sm w-100" type="submit"
                                            style="background-color: #F28500; color: #FFFFFF">Se
                                            connecter</button>
                                    </div>

                                    <div class="col-12">
                                        @if (Route::has('password.request'))
                                            <p class="small mb-0">Mot de passe oublié !
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#forgotModal"> Réinitialiser</a>
                                            </p>
                                        @endif
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Inscription Demandeur --}}
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="registerDemandeurModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="row g-3 needs-validation contact-form" novalidate method="POST"
                            action="{{ route('register') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="w-100 text-center">Création compte personnel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row g-3">
                                    <!-- Username -->
                                    <input type="hidden" name="role" value="Demandeur">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="username" class="form-label">Username<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="username"
                                            class="form-control form-control-sm @error('username') is-invalid @enderror"
                                            id="username" required placeholder="Votre username"
                                            value="{{ old('username') }}" autocomplete="username">
                                        <div class="invalid-feedback">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Addresse E-mail -->
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="email" class="form-label">E-mail<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                            <input type="email" name="email"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                id="email" required placeholder="Votre e-mail"
                                                value="{{ old('email') }}" autocomplete="email">
                                            <div class="invalid-feedback">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mot de passe -->
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="password" class="form-label">Mot de passe<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="password" name="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            id="password" required placeholder="Votre mot de passe"
                                            value="{{ old('password') }}" autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Mot de passe de confirmation -->
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="password_confirmation" class="form-label">Confirmez mot de
                                            passe<span class="text-danger mx-1">*</span></label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" required
                                            placeholder="Confimez votre mot de passe"
                                            value="{{ old('password_confirmation') }}"
                                            autocomplete="new-password_confirmation">
                                        <div class="invalid-feedback">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox"
                                                value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">J'accepte les
                                                <button style="color: blue" type="button"
                                                    class="btn btn-default btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#largeModal">
                                                    termes et conditions
                                                    <span class="text-danger mx-1">*</span>
                                                </button>
                                            </label>
                                            <div class="invalid-feedback">
                                                @error('password_confirmation')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <button type="submit" class="btn btn-sm w-100"
                                            style="background-color: #F28500; color: #FFFFFF">Créer un compte
                                            personnel</button>
                                    </div>

                                    <div
                                        class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12 justify-content-center">
                                        <p class="small">Vous avez déjà un compte ? <a href="#"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">Se connecter</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Inscription opérateur --}}
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="registerOperateurModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="row g-3 needs-validation contact-form" novalidate method="POST"
                            action="{{ route('register') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="w-100  text-center">Création compte opérateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">

                                    <input type="hidden" name="role" value="Operateur">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="username" class="form-label">Sigle<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="username"
                                            class="form-control form-control-sm @error('username') is-invalid @enderror"
                                            id="username" required placeholder="Sigle"
                                            value="{{ old('username') }}" autocomplete="username">
                                        <div class="invalid-feedback">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="email" class="form-label">E-mail<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                id="email" required placeholder="E-mail structure"
                                                value="{{ old('email') }}" autocomplete="email">
                                            <div class="invalid-feedback">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="password" class="form-label">Mot de passe<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="password" name="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            id="password" required placeholder="Votre mot de passe"
                                            value="{{ old('password') }}" autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="password_confirmation" class="form-label">Confirmez mot de
                                            passe<span class="text-danger mx-1">*</span></label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" required
                                            placeholder="Confimez votre mot de passe"
                                            value="{{ old('password_confirmation') }}"
                                            autocomplete="new-password_confirmation">
                                        <div class="invalid-feedback">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox"
                                                value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">J'accepte les
                                                <button style="color: blue" type="button"
                                                    class="btn btn-default btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#largeModal">
                                                    termes et conditions
                                                </button>
                                                <span class="text-danger mx-1">*</span></label>
                                            <div class="invalid-feedback">
                                                @error('password_confirmation')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <button type="submit" class="btn btn-sm w-100"
                                            style="background-color: #F28500; color: #FFFFFF">Créer un compte
                                            opérateur</button>
                                    </div>

                                    <div
                                        class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12 justify-content-center">
                                        <p class="small">Vous avez déjà un compte ? <a href="#"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">Se connecter</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mot de passe oublié --}}
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="forgotModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="row g-3 needs-validation contact-form" novalidate method="POST"
                            action="{{ route('password.email') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="w-100  text-center">Réinitialisation du mot de passe
                                    par e-mail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="email" class="form-label">Email<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" required placeholder="Votre adresse e-mail"
                                                value="{{ old('email') }}" autofocus>
                                            <div class="invalid-feedback">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <button class="btn btn-sm w-100" type="submit"
                                            style="background-color: #F28500; color: #FFFFFF">Lien de
                                            réinitialisation du mot de passe par e-mail</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- En savoir plus --}}
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="enSavoirPlusModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="w-100  text-center">{{ $une?->titre1 }}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <h4>{{ $une?->titre2 }}</h4>
                                <p>{{ $une?->message }}</p>

                            </div>
                        </div>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Antennes modal --}}
        @foreach ($antennes as $antenne)
            <div
                class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
                <div class="modal fade" id="antenneModal{{ $antenne?->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <section id="pricing" class="pricing section light-background">
                                <!-- Section Title -->
                                <div class="container section-title" data-aos="fade-up">
                                    <h2>{{ $antenne?->name }}</h2>
                                    {{-- <p>{{ $antenne?->adresse }}</p> --}}
                                </div>
                                <!-- End Section Title -->
                                <div class="container" data-aos="fade-up" data-aos-delay="100">
                                    <div class="row justify-content-center">
                                        <!-- Standard Plan -->
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12"
                                            data-aos="fade-up" data-aos-delay="200">
                                            <div class="pricing-card popular">
                                                <div class="popular-badge">{{ $antenne?->code }}</div>
                                                {{-- <h3>Chef : <span
                                                        class="currency">{{ $antenne?->chef?->user?->firstname . ' ' . $antenne?->chef?->user?->name }}</span>
                                                </h3> --}}

                                                <h4>ZONE DE COUVERTURE</h4>
                                                <ul class="features-list">
                                                    @foreach ($antenne?->regions as $region)
                                                        @if (!empty($region))
                                                            <li>
                                                                <i class="bi bi-check-circle-fill"></i>
                                                                {{ 'REGION DE ' . $region?->nom }}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                <h4>CONTACT</h4>
                                                <p><i class="bi bi-telephone"></i>
                                                    {{ $antenne?->contact . ' / ' . $antenne?->chef?->user?->telephone }}
                                                </p>
                                                <p><i class="bi bi-envelope"></i>
                                                    {{ $antenne?->chef?->user?->email }}
                                                </p>
                                                <h4>ADRESSE</h4>
                                                <div class="icon-box">
                                                    <p><i class="bi bi-geo-alt"></i> {{ $antenne?->adresse }}</p>
                                                </div>
                                                {{-- <a href="#" class="btn btn-light">
                                                    En savoir plus
                                                    <i class="bi bi-arrow-right"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($postes as $poste)
            <div class="modal fade" id="ShowPostModal{{ $poste->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <section class="pricing section light-background">
                            <div class="container section-title" data-aos="fade-up">
                                <h1 class="h4 text-black mb-0">{{ $poste->legende }}</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <img src="{{ asset($poste->getPoste()) }}"
                                            class="d-block w-100 main-image rounded-4" alt="{{ $poste->legende }}">
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <p>{{ $poste->name }}</p>
                                    </div>

                                </div>
                                <div class="modal-footer mt-2">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        @endforeach
        @include('sweetalert::alert')
    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                        <span class="sitename">SIGOF</span>
                    </a>
                    <div class="footer-contact pt-0">
                        <p>Direction générale (Dakar & Thiès)</p>
                        <p>Sipres 1, lot 2</p>
                        <p>2 voies liberté 6, extension VDN</p>
                        <p class="mt-3"><strong>Téléphone:</strong> <span><a href="tel:+2211338279251">+221 33 827
                                    92 51</a></span></p>
                        <p><strong>Email:</strong> <span><a href="mailto:onfp@onfp.sn">onfp@onfp.sn</a></span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://x.com/ONFP_Officiel/" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=61566912421177" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/onfp.sn/" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/104719756/admin/page-posts/published/"
                            target="_blank"><i class="bi bi-linkedin"></i></a>
                        <a href="https://www.youtube.com/@onfp9383/featured" target="_blank"><i
                                class="bi bi-youtube"></i></a>
                        <a href="https://wa.me/221772911838" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Réseaux sociaux</h4>
                    <ul>
                        <li><a href="#accueil">Accueil</a></li>
                        <li><a href="#apropos">A propos</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#partenaires">Partenaires</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                {{-- <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Nos services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div> --}}

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Nos antennes</h4>
                    <ul>
                        @foreach ($antennes as $antenne)
                            <li><a href="#" data-bs-toggle="modal"
                                    data-bs-target="#antenneModal{{ $antenne?->id }}">{{ $antenne?->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="contact-form col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4 footer-links">
                    <h4>Connexion</h4>
                    <ul>
                        {{-- <li><a data-bs-toggle="modal" data-bs-target="#loginModal">Se connecter</a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#registerDemandeurModal">Créer un compte
                                personnel</a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#registerOperateurModal">Créer un compte
                                opérateur</a></li> --}}

                        <div class="modal-content">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            {{--  <label for="email" class="form-label">Email<span
                                                    class="text-danger mx-1">*</span></label> --}}
                                            <div class="input-group has-validation">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" required placeholder="Votre adresse e-mail"
                                                    value="{{ old('email') }}">
                                                <div class="invalid-feedback">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            {{-- <label for="password" class="form-label">Mot de passe<span
                                                    class="text-danger mx-1">*</span></label> --}}
                                            <div class="input-group has-validation">
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" required placeholder="Votre mot de passe">
                                                <div class="invalid-feedback">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Souviens-toi de
                                                    moi</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <button class="btn btn-sm w-100" type="submit"
                                                style="background-color: #F28500; color: #FFFFFF">Se
                                                connecter</button>
                                        </div>

                                        <div
                                            class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxl-12 justify-content-center">
                                            @if (Route::has('password.request'))
                                                <p class="small mb-0">Mot de passe oublié !
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#forgotModal">
                                                        Réinitialiser</a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                            </form>
                    </ul>

                    {{-- <div class="footer-links">
                        <h4>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item show_confirm_disconnect">Se
                                    déconnecter</button>
                            </form>
                        </h4>
                    </div> --}}

                </div>
            </div>
        </div>

        @include('user.termes')

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">SIGOF</strong> <span></span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Conçu par <a href="https://www.onfp.sn/" target="_blank">ONFP</a>, MAI 2024
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('asset/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('asset/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <script>
        setTimeout(function() {
            $('.alert-success').remove();
        }, 120000);
    </script>

    <script>
        setTimeout(function() {
            $('.alert-danger').remove();
        }, 120000);
    </script>

    <script>
        function myFunction() {
            var element = document.body;
            element.dataset.bsTheme =
                element.dataset.bsTheme == "light" ? "dark" : "light";
        }

        function stepFunction(event) {
            debugger;
            var element = document.getElementsByClassName(("html")[0].innerHTML);
            for (var i = 0; i < element.length; i++) {
                if (element[i] !== event.target.ariaControls) {
                    element[i].classList.remove("show");
                }
            }
        }
    </script>

</body>

</html>

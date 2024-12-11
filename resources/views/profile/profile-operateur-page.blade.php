@extends('layout.user-layout')
@section('title', 'SIGOF - Profil')
@section('space-work')
    <div class="pagetitle">
        <h1>Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item">Operateur</li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row justify-content-center">
            {{-- Début Photo de profil --}}
            <div class="col-12 col-md-4 col-lg-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                            <img class="rounded-circle w-25" alt="Profil" src="{{ asset(Auth::user()?->getImage()) }}"
                                width="50" height="auto">
                            <h2>
                                {{-- @if (isset(Auth::user()?->name))
                                    {{ Auth::user()?->civilite . ' ' . Auth::user()?->firstname . ' ' . Auth::user()?->name }}
                                @else --}}
                                {{ Auth::user()?->username }}
                                {{-- @endif --}}
                            </h2>
                            <span><a href="mailto:{{ Auth::user()?->email }}">{{ Auth::user()?->email }}</a></span>
                            <div class="social-links mt-2">
                                @isset(Auth::user()?->twitter)
                                    <a href="{{ Auth::user()?->twitter }}" class="twitter" target="_blank"><i
                                            class="bi bi-twitter" title="compte twitter"></i></a>
                                @endisset
                                @isset(Auth::user()?->facebook)
                                    <a href="{{ Auth::user()?->facebook }}" class="facebook" target="_blank"><i
                                            class="bi bi-facebook" title="compte facebook"></i></a>
                                @endisset
                                @isset(Auth::user()?->instagram)
                                    <a href="{{ Auth::user()?->instagram }}" class="instagram" target="_blank"><i
                                            class="bi bi-instagram" title="compte instagram"></i></a>
                                @endisset
                                @isset(Auth::user()?->linkedin)
                                    <a href="{{ Auth::user()?->linkedin }}" class="linkedin" target="_blank"><i
                                            class="bi bi-linkedin" title="compte linkedin"></i></a>
                                @endisset
                                @isset(Auth::user()?->web)
                                    <a href="{{ Auth::user()?->web }}" class="web" target="_blank"><i class="bi bi-globe"
                                            title="site web"></i></a>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <section class="section dashboard">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                </div>
                                <a href="{{ route('devenirOperateur') }}">
                                    <div class="card-body">
                                        <h5 class="card-title">Agréments <span>| opérateur</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-plus-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>
                                                    {{ count(Auth::user()?->operateurs) }}
                                                    {{-- @foreach (Auth::user()?->operateurs as $operateur)
                                                        @if (isset($operateur->sigle))
                                                            @if ($loop->last)
                                                                {!! $loop->count ?? '0' !!}
                                                            @endif
                                                        @else
                                                            <span class="text-primary">0</span>
                                                        @endif
                                                    @endforeach --}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
            {{-- Fin Photo de profil --}}

            {{-- Début aperçu --}}
            <div class="col-12 col-md-8 col-lg-8">
                <div class="flex items-center gap-4">
                    <div class="card">
                        @if ($message = Session::get('status'))
                            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                                role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($message = Session::get('message'))
                            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                                role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->updatePassword->get('current_password'))
                            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                role="alert">
                                <strong><x-input-error :messages="$errors->updatePassword->get('current_password')" /></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                    role="alert"><strong>{{ $error }}</strong></div>
                            @endforeach
                        @endif
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Aperçu</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier
                                        profil
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Changer le mot de passe</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#files">Fichiers</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">À propos</h5>
                                    <p class="small fst-italic">
                                        créé, {{ Auth::user()?->created_at->diffForHumans() }}
                                    </p>

                                    <div class="row">
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3 label">
                                            Informations personnelles
                                        </div>
                                        <div class="col-12 col-md-9 col-lg-9 col-sm-12 col-xs-12 col-xxl-9">
                                            @if (!empty(Auth::user()?->operateur) &&
                                                    !empty(Auth::user()?->username) &&
                                                    !empty(Auth::user()?->ninea) &&
                                                    !empty(Auth::user()?->rccm) &&
                                                    !empty(Auth::user()?->email_responsable) &&
                                                    !empty(Auth::user()?->fonction_responsable) &&
                                                    !empty(Auth::user()?->email))
                                                <span class="badge bg-success text-white">Complètes</span>
                                            @else
                                                <span class="badge bg-warning text-white">Incomplètes</span>, cliquez sur
                                                modifier profil pour complèter
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3 label">
                                            Fichiers joints
                                        </div>
                                        <div class="col-12 col-md-9 col-lg-9 col-sm-12 col-xs-12 col-xxl-9">
                                            @if (!empty($user_cin))
                                                <span class="badge bg-primary text-white">Valide</span>
                                            @else
                                                <span class="badge bg-warning text-white">Incomplètes</span>, cliquez sur
                                                l'onglet fichier pour télécharger
                                            @endif
                                        </div>
                                    </div>


                                    @isset(Auth::user()?->username)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Sigle</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->username }}</div>
                                        </div>
                                    @endisset
                                    @isset(Auth::user()?->operateur)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Opérateur</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->operateur }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->email)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8"><a
                                                    href="mailto:{{ Auth::user()?->email }}">{{ Auth::user()?->email }}</a>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->telephone)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                            <div class="col-lg-9 col-md-8"><a
                                                    href="tel:+221{{ Auth::user()?->fixe }}">{{ Auth::user()?->fixe }}</a> /
                                                <a
                                                    href="tel:+221{{ Auth::user()?->telephone }}">{{ Auth::user()?->telephone }}</a>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->adresse)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Adresse</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->adresse }}</div>
                                        </div>
                                    @endisset

                                    {{-- @isset(Auth::user()?->web)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Site web</div>
                                            <div class="col-lg-9 col-md-8"><a href="{{ Auth::user()?->web }}" class="web"
                                                    target="_blank"><i class="bi bi-globe" title="site web"></i></a></div>
                                        </div>
                                    @endisset --}}

                                    <hr>

                                    <h5 class="card-title">Responsable</h5>

                                    @isset(Auth::user()?->cin)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">CIN</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->cin }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->civilite)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Civilité</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->civilite }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->firstname)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Prénom</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->firstname }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->name)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Nom</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->name }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->date_naissance)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Date naissance</div>
                                            <div class="col-lg-9 col-md-8">
                                                {{ Auth::user()?->date_naissance->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->lieu_naissance)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Lieu naissance</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->lieu_naissance }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->situation_familiale)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Situation familiale</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->situation_familiale }}</div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->situation_professionnelle)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Situation profes.</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->situation_professionnelle }}
                                            </div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->telephone)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                            <div class="col-lg-9 col-md-8"><a
                                                    href="tel:+221{{ Auth::user()?->telephone }}">{{ Auth::user()?->telephone }}</a>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->email_responsable)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8"><a
                                                    href="mailto:{{ Auth::user()?->email_responsable }}">{{ Auth::user()?->email_responsable }}</a>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset(Auth::user()?->fonction_responsable)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Fonction</div>
                                            <div class="col-lg-9 col-md-8">{{ Auth::user()?->fonction_responsable }}
                                            </div>
                                        </div>
                                    @endisset

                                </div>
                            </div>
                            {{-- Fin aperçu --}}
                            <div class="tab-content pt-2">
                                {{-- Début Edition --}}
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <form method="post" action="{{ route('profile.updated') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <h5 class="card-title">Modification du profil</h5>
                                        <!-- Profile Edit Form -->
                                        <div class="row mb-3">
                                            <label for="profileImage"
                                                class="col-md-4 col-lg-3 col-form-label">LOGO</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img class="rounded-circle w-25" alt="Profil"
                                                    src="{{ asset(Auth::user()?->getImage()) }}" width="50"
                                                    height="auto">
                                                <div class="pt-2">
                                                    <input type="file" name="image" id="image"
                                                        class="form-control @error('image') is-invalid @enderror btn btn-primary btn-sm">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Sigle --}}
                                        <div class="row mb-3">
                                            <label for="username" class="col-md-4 col-lg-3 col-form-label">Sigle<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="username" type="text"
                                                        class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                        id="username" value="{{ $user->username ?? old('username') }}"
                                                        autocomplete="username" placeholder="Sigle">
                                                </div>
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Operateur --}}
                                        <div class="row mb-3">
                                            <label for="operateur" class="col-md-4 col-lg-3 col-form-label">Opérateur<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="operateur" type="text"
                                                        class="form-control form-control-sm @error('operateur') is-invalid @enderror"
                                                        id="operateur"
                                                        value="{{ $user?->operateur ?? old('operateur') }}"
                                                        autocomplete="operateur" placeholder="Operateur">
                                                </div>
                                                @error('operateur')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- categorie --}}
                                        <div class="row mb-3">
                                            <label for="categorie" class="col-md-4 col-lg-3 col-form-label">Catégorie<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <select name="categorie"
                                                        class="form-select  @error('categorie') is-invalid @enderror"
                                                        aria-label="Select" id="categorie"
                                                        data-placeholder="Choisir catégorie">
                                                        <option value="{{ $user?->categorie ?? old('categorie') }}">
                                                            {{ $user?->categorie ?? old('categorie') }}
                                                        </option>
                                                        <option value="Publique">
                                                            Publique
                                                        </option>
                                                        <option value="Privé">
                                                            Privé
                                                        </option>
                                                        <option value="Autre">
                                                            Autre
                                                        </option>
                                                    </select>
                                                    @error('categorie')
                                                        <span class="invalid-feedback" role="alert">
                                                            <div>{{ $message }}</div>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- categorie --}}
                                        <div class="row mb-3">
                                            <label for="categorie" class="col-md-4 col-lg-3 col-form-label">RCCM /
                                                Ninea<span class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <select name="rccm"
                                                        class="form-select form-select-sm @error('rccm') is-invalid @enderror"
                                                        aria-label="Select" id="rccm" data-placeholder="Choisir">
                                                        <option value="{{ $user?->rccm ?? old('rccm') }}">
                                                            {{ $user?->rccm ?? old('rccm') }}
                                                        </option>
                                                        <option value="Registre de commerce">
                                                            Registre de commerce
                                                        </option>
                                                        <option value="Ninea">
                                                            Ninea
                                                        </option>
                                                        <option value="Aucun">
                                                            Aucun
                                                        </option>
                                                        <option value="Autre">
                                                            Autre
                                                        </option>
                                                    </select>
                                                    @error('rccm')
                                                        <span class="invalid-feedback" role="alert">
                                                            <div>{{ $message }}</div>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- N° RCCM / Ninea --}}
                                        <div class="row mb-3">
                                            <label for="ninea" class="col-md-4 col-lg-3 col-form-label">N° RCCM /
                                                Ninea<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="ninea"
                                                    value="{{ $user?->ninea ?? old('ninea') }}"
                                                    class="form-control form-control-sm @error('ninea') is-invalid @enderror"
                                                    id="ninea" placeholder="Votre ninéa / Numéro RCCM">
                                                @error('ninea')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Statut juridique --}}
                                        <div class="row mb-3">
                                            <label for="statut" class="col-md-4 col-lg-3 col-form-label">Statut juridique<span class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <select name="statut"
                                                        class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                                        aria-label="Select" id="statut-operateur" data-placeholder="Choisir statut">
                                                        <option value="{{ $user?->statut ?? old('statut') }}">
                                                            {{ $user?->statut ?? old('statut') }}
                                                        </option>
                                                        <option value="GIE">
                                                            GIE
                                                        </option>
                                                        <option value="Association">
                                                            Association
                                                        </option>
                                                        <option value="Entreprise individuelle">
                                                            Entreprise individuelle
                                                        </option>
                                                        <option value="SA">
                                                            SA
                                                        </option>
                                                        <option value="SUARL">
                                                            SUARL
                                                        </option>
                                                        <option value="SARL">
                                                            SARL
                                                        </option>
                                                        <option value="SNC">
                                                            SNC
                                                        </option>
                                                        <option value="SCS">
                                                            SCS
                                                        </option>
                                                        <option value="Etablissement public">
                                                            Etablissement public
                                                        </option>
                                                        <option value="Autre">
                                                            Autre
                                                        </option>
                                                    @error('statut')
                                                        <span class="invalid-feedback" role="alert">
                                                            <div>{{ $message }}</div>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Email --}}
                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    id="Email" value="{{ $user->email ?? old('email') }}"
                                                    autocomplete="email" placeholder="Adresse e-mail">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Telephone fixe --}}
                                        <div class="row mb-3">
                                            <label for="fixe" class="col-md-4 col-lg-3 col-form-label">Téléphone
                                                fixe<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fixe" type="fixe"
                                                    class="form-control form-control-sm @error('fixe') is-invalid @enderror"
                                                    id="fixe" value="{{ $user->fixe ?? old('fixe') }}"
                                                    autocomplete="fixe" placeholder="N° de téléphone fixe">
                                                @error('fixe')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        {{-- Telephone portable --}}
                                        <div class="row mb-3">
                                            <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Téléphone
                                                portable<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="telephone" type="text"
                                                    class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                                    id="telephone" value="{{ $user->telephone ?? old('telephone') }}"
                                                    autocomplete="telephone" placeholder="N° de téléphone">
                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Adresse --}}
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Adresse<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adresse" type="adresse"
                                                    class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                                    id="adresse" value="{{ $user->adresse ?? old('adresse') }}"
                                                    autocomplete="adresse" placeholder="Adresse de résidence">
                                                @error('adresse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- web --}}
                                        <div class="row mb-3">
                                            <label for="web" class="col-md-4 col-lg-3 col-form-label">Site
                                                web</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="web" type="web"
                                                    class="form-control form-control-sm @error('web') is-invalid @enderror"
                                                    id="web" value="{{ $user->web ?? old('web') }}"
                                                    autocomplete="web" placeholder="lien de votre site web">
                                                @error('web')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- facebook --}}
                                        <div class="row mb-3">
                                            <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="facebook"
                                                    class="form-control form-control-sm @error('facebook') is-invalid @enderror"
                                                    id="facebook" value="{{ $user->facebook ?? old('facebook') }}"
                                                    autocomplete="facebook" placeholder="lien de votre compte facebook">
                                                @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- twitter --}}
                                        <div class="row mb-3">
                                            <label for="twitter" class="col-md-4 col-lg-3 col-form-label">X profil (ex
                                                twitter)</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="twitter"
                                                    class="form-control form-control-sm @error('twitter') is-invalid @enderror"
                                                    id="twitter" value="{{ $user->twitter ?? old('twitter') }}"
                                                    autocomplete="twitter"
                                                    placeholder="lien de votre compte x (ex twitter)">
                                                @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- instagram --}}
                                        <div class="row mb-3">
                                            <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="instagram"
                                                    class="form-control form-control-sm @error('instagram') is-invalid @enderror"
                                                    id="instagram" value="{{ $user->instagram ?? old('instagram') }}"
                                                    autocomplete="instagram" placeholder="lien de votre compte instagram">
                                                @error('instagram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- linkedin --}}
                                        <div class="row mb-3">
                                            <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="linkedin"
                                                    class="form-control form-control-sm @error('linkedin') is-invalid @enderror"
                                                    id="linkedin" value="{{ $user->linkedin ?? old('linkedin') }}"
                                                    autocomplete="linkedin" placeholder="lien de votre ompte linkedin">
                                                @error('linkedin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="card-title">Personne responsable</h5>
                                        {{-- CIN --}}
                                        <div class="row mb-3">
                                            <label for="cin" class="col-md-4 col-lg-3 col-form-label">CIN
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="cin" type="text"
                                                        class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                                        id="cin" value="{{ $user->cin ?? old('cin') }}"
                                                        autocomplete="cin" placeholder="Votre cin">
                                                </div>
                                                @error('cin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Civilité --}}
                                        <div class="row mb-3">
                                            <label for="Civilité" class="col-md-4 col-lg-3 col-form-label">Civilité<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <select name="civilite"
                                                        class="form-select form-select-sm @error('civilite') is-invalid @enderror"
                                                        aria-label="Select" id="select-field-civilite"
                                                        data-placeholder="Choisir civilité">
                                                        <option value="{{ $user->civilite ?? old('civilite') }}">
                                                            {{ $user->civilite ?? old('civilite') }}
                                                        </option>
                                                        <option value="M.">
                                                            Monsieur
                                                        </option>
                                                        <option value="Mme">
                                                            Madame
                                                        </option>
                                                    </select>
                                                    @error('civilite')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Prénom --}}
                                        <div class="row mb-3">
                                            <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Prénom<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="firstname" type="text"
                                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                                        id="firstname" value="{{ $user->firstname ?? old('firstname') }}"
                                                        autocomplete="firstname" placeholder="Votre prénom">
                                                </div>
                                                @error('firstname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Nom --}}
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nom<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    id="name" value="{{ $user->name ?? old('name') }}"
                                                    autocomplete="name" placeholder="Votre Nom">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- telephone_parent --}}
                                        <div class="row mb-3">
                                            <label for="telephone_parent"
                                                class="col-md-4 col-lg-3 col-form-label">Téléphone responsable<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="telephone_parent" type="text"
                                                    class="form-control form-control-sm @error('telephone_parent') is-invalid @enderror"
                                                    id="telephone_parent"
                                                    value="{{ $user->telephone_parent ?? old('telephone_parent') }}"
                                                    autocomplete="telephone_parent" placeholder="N° de téléphone">
                                                @error('telephone_parent')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Email --}}
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email_responsable" type="text"
                                                    class="form-control form-control-sm @error('email_responsable') is-invalid @enderror"
                                                    id="email_responsable"
                                                    value="{{ $user->email_responsable ?? old('email_responsable') }}"
                                                    autocomplete="email_responsable" placeholder="Email responsable">
                                                @error('email_responsable')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- fonction --}}
                                        <div class="row mb-3">
                                            <label for="fonction" class="col-md-4 col-lg-3 col-form-label">Fonction<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fonction_responsable" type="text"
                                                    class="form-control form-control-sm @error('fonction_responsable') is-invalid @enderror"
                                                    id="fonction_responsable"
                                                    value="{{ $user->fonction_responsable ?? old('fonction_responsable') }}"
                                                    autocomplete="fonction_responsable"
                                                    placeholder="fonction responsable">
                                                @error('fonction_responsable')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Date de naissance --}}
                                        <div class="row mb-3">
                                            <label for="date_naissance" class="col-md-4 col-lg-3 col-form-label">Date
                                                naissance</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="date" name="date_naissance"
                                                    value="{{ $user->date_naissance?->format('Y-m-d') ?? old('date_naissance') }}"
                                                    class="form-control form-control-sm @error('date_naissance') is-invalid @enderror"
                                                    id="date_naissance" placeholder="Date naissance">
                                                @error('date_naissance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Lieu naissance --}}
                                        <div class="row mb-3">
                                            <label for="lieu naissance" class="col-md-4 col-lg-3 col-form-label">Lieu
                                                naissance</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="lieu_naissance" type="text"
                                                    class="form-control form-control-sm @error('lieu_naissance') is-invalid @enderror"
                                                    id="lieu_naissance"
                                                    value="{{ $user->lieu_naissance ?? old('lieu_naissance') }}"
                                                    autocomplete="lieu_naissance" placeholder="Votre Lieu naissance">
                                                @error('lieu_naissance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Situation familiale --}}
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Situation
                                                familiale</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="situation_familiale"
                                                    class="form-select form-select-sm @error('situation_familiale') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-familiale"
                                                    data-placeholder="Choisir situation familiale">
                                                    <option
                                                        value="{{ $user->situation_familiale ?? old('situation_familiale') }}">
                                                        {{ $user->situation_familiale ?? old('situation_familiale') }}
                                                    </option>
                                                    <option value="Marié(e)">
                                                        Marié(e)
                                                    </option>
                                                    <option value="Célibataire">
                                                        Célibataire
                                                    </option>
                                                    <option value="Veuf(ve)">
                                                        Veuf(ve)
                                                    </option>
                                                    <option value="Divorsé(e)">
                                                        Divorsé(e)
                                                    </option>
                                                </select>
                                                @error('situation_familiale')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Situation professionnelle --}}
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Situation
                                                profes.</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="situation_professionnelle"
                                                    class="form-select  @error('situation_professionnelle') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-professionnelle"
                                                    data-placeholder="Choisir situation professionnelle">
                                                    <option
                                                        value="{{ $user->situation_professionnelle ?? old('situation_professionnelle') }}">
                                                        {{ $user->situation_professionnelle ?? old('situation_professionnelle') }}
                                                    </option>
                                                    <option value="Employé(e)">
                                                        Employé(e)
                                                    </option>
                                                    <option value="Informel">
                                                        Informel
                                                    </option>
                                                    <option value="Elève ou étudiant">
                                                        Elève ou étudiant
                                                    </option>
                                                    <option value="chercheur emploi">
                                                        chercheur emploi
                                                    </option>
                                                    <option value="Stage ou période essai">
                                                        Stage ou période essai
                                                    </option>
                                                    <option value="Entrepreneur ou freelance">
                                                        Entrepreneur ou freelance
                                                    </option>
                                                </select>
                                                @error('situation_professionnelle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Sauvegarder les
                                                modifications</button>
                                        </div>
                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                    {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                                                    {{--  <button form="send-verification"
                                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                        {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                                                    </button> --}}
                                                <form method="POST" action="{{ route('verification.send') }}">
                                                    @csrf

                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-outline-primary">{{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}</button>
                                                        {{--  <x-primary-button>
                                                                        {{ __('Renvoyer l\'e-mail de vérification') }}
                                                                    </x-primary-button> --}}
                                                    </div>
                                                </form>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                        <!-- End Profile Edit Form -->
                                    </form>
                                </div>
                            </div>
                            <div class="tab-content pt-2">
                                {{-- Fin Edition --}}
                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="post" action="{{ route('password.update') }}">
                                        {{-- Début Modification mot de passe --}}
                                        <div class="flex items-center gap-4">
                                            <!-- Bordered Tabs -->
                                            <div class="tab-pane fade show profile-overview" id="profile-overview">
                                                <h5 class="card-title">Modification du mot de passe</h5>
                                                <!-- Change Password Form -->
                                                @csrf
                                                @method('put')
                                                <div class="row mb-3">
                                                    <label for="update_password_current_password"
                                                        class="col-md-4 col-lg-3 col-form-label label">Mot de
                                                        passe actuel<span class="text-danger mx-1">*</span></label>
                                                    <div class="col-md-6 col-lg-6">
                                                        <input name="current_password" type="password"
                                                            class="form-control @error('current_password') is-invalid @enderror"
                                                            id="update_password_current_password"
                                                            placeholder="Votre mot de passe actuel"
                                                            autocomplete="current-password">
                                                        {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
                                                    </div>
                                                </div>
                                                <!-- Mot de passe -->
                                                <div class="row mb-3">
                                                    <label for="password"
                                                        class="col-md-4 col-lg-3 col-form-label label">Mot
                                                        de
                                                        passe<span class="text-danger mx-1">*</span></label>
                                                    <div class="col-md-6 col-lg-6">
                                                        <input type="password" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            id="password" placeholder="Votre mot de passe"
                                                            value="{{ old('password') }}" autocomplete="new-password">
                                                        <div class="invalid-feedback">
                                                            @error('password')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Mot de passe de confirmation -->
                                                <div class="row mb-3">
                                                    <label for="password_confirmation"
                                                        class="col-md-4 col-lg-3 col-form-label label">Confirmez<span
                                                            class="text-danger mx-1">*</span></label>
                                                    <div class="col-md-6 col-lg-6">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            id="password_confirmation"
                                                            placeholder="Confimez votre mot de passe"
                                                            value="{{ old('password_confirmation') }}"
                                                            autocomplete="new-password_confirmation">
                                                        <div class="invalid-feedback">
                                                            @error('password_confirmation')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Changer
                                                        le mot de
                                                        passe</button>
                                                </div>
                                                <!-- End Change Password Form -->
                                            </div>
                                        </div>
                                        {{-- Fin Modification mot de passe --}}
                                    </form><!-- End Change Password Form -->
                                </div>
                            </div><!-- End Bordered Tabs -->

                            <div class="tab-content pt-2">
                                {{-- Début Edition --}}
                                <div class="tab-pane fade files" id="files">
                                    <div class="row mb-3">
                                        <h5 class="card-title col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            {{ __('Fichiers téléchargés') }}</h5>
                                        <div class="col-12 col-md-8 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                            <table class="table table-bordered table-hover datatables" id="table-iles">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-center">N°</th>
                                                        <th>Légende</th>
                                                        <th width="10%" class="text-center">File</th>
                                                        <th width="5%" class="text-center"><i class="bi bi-gear"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($files as $file)
                                                        <tr>
                                                            <td class="text-center">{{ $i++ }}</td>
                                                            <td>{{ $file?->legende }}</td>
                                                            <td class="text-center">
                                                                <a class="btn btn-default btn-sm"
                                                                    title="télécharger le fichier joint" target="_blank"
                                                                    href="{{ asset($file->getFichier()) }}">
                                                                    <i class="bi bi-download"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <form action="{{ route('fileDestroy') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" name="idFile"
                                                                        value="{{ $file->id }}">
                                                                    <button type="submit"
                                                                        style="background:none;border:0px;"
                                                                        class="show_confirm" title="retirer"><i
                                                                            class="bi bi-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <form method="post" action="{{ route('files.update', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')

                                        <h5 class="card-title">{{ __("Ajouter d'autres fichiers") }}</h5>
                                        <span style="color:red;"><b><u>NB</u></b> : </span> <span>Seule l'acte ou arrêté de
                                            création</span> <span style="color:red;"> est obligatoire</span>
                                        <div class="row mb-3 mt-3">
                                            <label for="legende"
                                                class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4 col-form-label">Légende<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-12 col-md-8 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                                <select name="legende"
                                                    class="form-select  @error('legende') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-file"
                                                    data-placeholder="Choisir">
                                                    <option value="{{ old('legende') }}">
                                                        
                                                    </option>
                                                    @foreach ($user_files as $file)
                                                        <option value="{{ $file?->id }}">
                                                            {{ $file?->legende }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('legende')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="file"
                                                class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4 col-form-label">Fichier<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-12 col-md-8 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                                <div class="pt-2">
                                                    <input type="file" name="file" id="file"
                                                        class="form-control @error('file') is-invalid @enderror btn btn-primary btn-sm">
                                                    @error('file')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <label for="file"
                                                class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4 col-form-label"></label>
                                            <div class="col-12 col-md-8 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                                <button type="submit"
                                                    class="btn btn-outline-info btn-sm">Ajouter</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div>
                            <a href="{{ route('demandesIndividuelle') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Demandes <span>| Individuelles</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                @foreach (Auth::user()?->individuelles as $individuelle)
                                                    @if (isset($individuelle->numero) && isset($individuelle->modules_id))
                                                        @if ($loop->last)
                                                            {!! $loop->count ?? '0' !!}
                                                        @endif
                                                    @else
                                                        <span class="text-primary">0</span>
                                                    @endif
                                                @endforeach
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div>
                            <a href="{{ route('demandesCollective') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Demandes <span>| collectives</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                @foreach (Auth::user()?->collectives as $collective)
                                                    @if (isset($collective->numero))
                                                        @if ($loop->last)
                                                            {!! $loop->count ?? '0' !!}
                                                        @endif
                                                    @else
                                                        <span class="text-primary">0</span>
                                                    @endif
                                                @endforeach
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div>
                            <a href="{{ route('devenirOperateur') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Devenir <span>| opérateur</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                @foreach (Auth::user()?->operateurs as $operateur)
                                                    @if (isset($operateur->sigle))
                                                        @if ($loop->last)
                                                            {!! $loop->count ?? '0' !!}
                                                        @endif
                                                    @else
                                                        <span class="text-primary">0</span>
                                                    @endif
                                                @endforeach
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="list-group mt-5">
                        @if (isset(auth::user()?->employee->courriers) && auth::user()?->employee->courriers != '[]')
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-courriers-emp">
                                    <thead class="table-default">
                                        <tr>
                                            <th style="width:60%;">Imputations</th>
                                            <th style="width:20%;">Instructions</th>
                                            <th style="width:20%;">Suivi dossier</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (auth::user()?->employee->courriers as $courrier)
                                            <tr>
                                                <td>
                                                    @if (isset($courrier) && $courrier->type == 'arrive')
                                                        <h4><a href="{!! route('arrives.show', $courrier->id) !!}">{!! $courrier->objet ?? '' !!}</a>
                                                        </h4>
                                                    @endif
                                                    <p>{!! $courrier->message !!}</p>
                                                    <p><strong>Type de courrier : </strong> {!! $courrier->type ?? '' !!}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small>Posté le {!! Carbon\Carbon::parse($courrier->created_at)->format('d/m/Y à H:i:s') !!}</small>
                                                        <span
                                                            class="badge badge-info">{!! $courrier->user->firstname !!}&nbsp;{!! $courrier->user->name !!}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>{!! $courrier->description ?? '' !!}</p>
                                                </td>
                                                <td>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        @foreach ($courrier->employees->unique('id') as $employee)
                                                            {{ $employee->user->firstname . ' ' . $employee->user->name }}<br>
                                                        @endforeach --}}
    {{-- <a href="{!! url('courrierimputations', ['$type' => $courrier->type, '$id' => $courrier->id]) !!}" class='btn btn-warning btn-sm'
                                                            title="changer agent suivi">
                                                            <i class="fa fa-retweet"></i>
                                                        </a> --}}
    {{--      </div>


                                                </td> --}}
    {{--  <td>
                                        @forelse ($courrier->comments as $comment)
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small>Commentaire de
                                                    {!! $comment->user->firstname !!}&nbsp;{!! $comment->user->name !!} du
                                                    {!! Carbon\Carbon::parse($comment->created_at)->format('d/m/Y à H:i:s') !!}: <br>
                                                    <ul>
                                                        <li>{!! $comment->content !!}</li>
                                                    </ul>
                                                </small>
                                            @foreach ($comment->comments as $replayComment)
                                                <div class="ml-5">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small>Réponse de
                                                            {!! $comment->user->firstname !!}&nbsp;{!! $comment->user->name !!} du
                                                            {!! Carbon\Carbon::parse($replayComment->created_at)->format('d/m/Y à H:i:s') !!} : <br>
                                                            <ul>
                                                                <li>
                                                                    {!! $replayComment->content !!}</li>
                                                            </ul>
                                                        </small>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @auth
                                            @endauth
                                        @empty

                                            <div class="alert alert-info">Aucun commentaire pour ce courrier</div>
                                        @endforelse
                                    </td>  --}}
    {{--             </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info"> {{ __("Vous n'avez pas de courrier à votre nom") }} </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

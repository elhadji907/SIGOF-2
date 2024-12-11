@extends('layout.user-layout')
@section('title', $operateur?->user?->username)
@section('space-work')

    <section
        class="section profile min-vh-0 d-flex flex-column align-items-center justify-content-center py-0 section profile">
        <div class="container">
            <div class="pagetitle">
                {{-- <h1>Data Tables</h1> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active">{{ $operateur?->user?->username }}</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row justify-content-center">
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert"><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="flex items-center gap-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <span class="nav-link"><a href="{{ route('agrement') }}"
                                            class="btn btn-secondary btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Opérateur</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#module-overview">Module
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#references-overview">Références</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#equipement-overview">Equipements</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#formateur-overview">Formateurs</button>
                                </li>

                                {{-- <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#localites-overview">Localités</button>
                                </li> --}}

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#observations-overview">Observations</button>
                                </li>

                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                            {{-- Détail opérateur --}}
                            <div class="tab-content pt-0">
                                <div class="tab-pane fade profile-overview" id="profile-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Opérateur</h5>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 mb-2">
                                            <div class="label">Raison sociale</div>
                                            <div>{{ $operateur?->user?->operateur }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Sigle</div>
                                            <div>{{ $operateur?->user?->username }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Numéro agrément</div>
                                            <div>{{ $operateur?->numero_agrement }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Adresse email</div>
                                            <div><a
                                                    href="mailto:{{ $operateur?->user?->email }}">{{ $operateur?->user?->email }}</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Téléphone fixe</div>
                                            <div><a
                                                    href="tel:+221{{ $operateur?->user?->fixe }}">{{ $operateur?->user?->fixe }}</a>
                                            </div>
                                        </div>
                                        @isset($operateur?->user?->bp)
                                            <div class="col-12 col-md-4 col-lg-4 mb-2">
                                                <div class="label">Boite postale</div>
                                                <div>{{ $operateur?->user?->bp }}</div>
                                            </div>
                                        @endisset
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Catégorie</div>
                                            <div>{{ $operateur?->user?->categorie }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Statut juridique</div>
                                            <div>{{ $operateur?->statut }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Autre statut</div>
                                            <div>{{ $operateur?->autre_statut }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Siège</div>
                                            <div>{{ $operateur?->departement?->nom }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Adrese</div>
                                            <div>{{ $operateur?->user?->adresse }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">RCCM/Ninea</div>
                                            <div>{{ $operateur?->user?->rccm }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">N° RCCM/Ninea</div>
                                            <div>{{ $operateur?->user?->ninea }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Quitus</div>
                                            <div>
                                                @if (!empty($operateur?->debut_quitus))
                                                    <a class="btn btn-outline-secondary btn-sm"
                                                        title="télécharger le quitus" target="_blank"
                                                        href="{{ asset($operateur?->getQuitus()) }}">
                                                        <i class="bi bi-file-image"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <div class="label">Date délivrance quitus</div>
                                            <div>{{ $operateur?->debut_quitus?->diffForHumans() }}</div>
                                        </div>
                                    </form>
                                    <form method="post" action="#" enctype="multipart/form-data" class="row">
                                        @csrf
                                        @method('PUT')
                                        <h5 class="card-title">Personne morale</h5>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <div class="label">Civilité</div>
                                            <div>{{ $operateur?->user?->civilite }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Prénom</div>
                                            <div>{{ $operateur?->user?->firstname }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Nom</div>
                                            <div>{{ $operateur?->user?->name }}</div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Email</div>
                                            <div><a
                                                    href="mailto:{{ $operateur?->user?->email_responsable }}">{{ $operateur?->user?->email_responsable }}</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Téléphone</div>
                                            <div><a
                                                    href="tel:+221{{ $operateur?->user?->telephone }}">{{ $operateur?->user?->telephone }}</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-2">
                                            <div class="label">Fonction</div>
                                            <div>{{ $operateur?->user?->fonction_responsable }}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- Détail représentant --}}
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade profile-overview pt-3" id="references-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">EXPERIENCES ET REFERENCES PROFESSIONNELLES</h5>
                                            {{-- <h5 class="card-title">
                                                <a href="{{ route('showReference', ['id' => $operateur->id]) }}"
                                                    class="btn btn-outline-primary float-end btn-rounded btn-sm"
                                                    target="_blank">
                                                    <i class="bi bi-plus" title="Ajouter, Modifier, Supprimer"></i> </a> --}}
                                        </div>

                                        <table
                                            class="table table-bordered table-hover datatables align-middle justify-content-center table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">DENOMINATION L'ORGANISME</th>
                                                    <th scope="col">CONTACTS</th>
                                                    <th scope="col">PERIODES D'INTERVENTION</th>
                                                    <th scope="col">DESCRIPTION DES INTERVENTIONS</th>
                                                    {{-- <th class="col"><i class="bi bi-gear"></i></th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($operateur->operateureferences as $operateureference)
                                                    <tr>
                                                        <td>{{ $operateureference?->organisme }}</td>
                                                        <td>{{ $operateureference?->contact }}</td>
                                                        <td>{{ $operateureference?->periode }}</td>
                                                        <td>{{ $operateureference?->description }}</td>
                                                        {{-- <td style="text-align: center;">
                                                            <span class="d-flex mt-2 align-items-baseline"><a
                                                                    href="#"
                                                                    class="btn btn-warning btn-sm mx-1"
                                                                    title="Voir détails">
                                                                    <i class="bi bi-eye"></i></a>
                                                                <div class="filter">
                                                                    <a class="icon" href="#"
                                                                        data-bs-toggle="dropdown"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul
                                                                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                        <li>
                                                                            <button type="button"
                                                                                class="dropdown-item btn btn-sm mx-1"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#EditoperateureferenceModal{{ $operateureference->id }}">
                                                                                <i class="bi bi-pencil"
                                                                                    title="Modifier"></i> Modifier
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </span>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade profile-overview pt-3" id="equipement-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">INFRASTRUCTURES / EQUIPEMENTS</h5>
                                            {{--  <h5 class="card-title">
                                                <a href="{{ route('showEquipement', ['id' => $operateur->id]) }}"
                                                    class="btn btn-outline-primary float-end btn-rounded btn-sm"
                                                    target="_blank">
                                                    <i class="bi bi-plus" title="Ajouter, Modifier, Supprimer"></i> </a>
                                            </h5> --}}
                                        </div>
                                        <table
                                            class="table table-bordered table-hover datatables align-middle justify-content-center table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>DESIGNATION</th>
                                                    <th class="text-center">QUANTITE</th>
                                                    <th class="text-center">ETAT</th>
                                                    <th class="text-center">TYPE</th>
                                                    {{-- <th class="text-center"><i class="bi bi-gear"></i></th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($operateur->operateurequipements as $operateurequipement)
                                                    <tr>
                                                        <td>{{ $operateurequipement->designation }}</td>
                                                        <td style="text-align: center;">
                                                            {{ $operateurequipement->quantite }}</td>
                                                        <td style="text-align: center;">{{ $operateurequipement->etat }}
                                                        </td>
                                                        <td style="text-align: center;">{{ $operateurequipement->type }}
                                                        </td>
                                                        {{-- <td>
                                                            <span class="d-flex align-items-baseline">
                                                                <a href="{{ route('operateurequipements.show', $operateurequipement->id) }}"
                                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                                        class="bi bi-eye"></i></a>
                                                                <div class="filter">
                                                                    <a class="icon" href="#"
                                                                        data-bs-toggle="dropdown"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul
                                                                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                        <button class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditoperateurequipementModal{{ $operateurequipement->id }}">Modifier
                                                                        </button>
                                                                        <form
                                                                            action="{{ route('operateurequipements.destroy', $operateurequipement->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"
                                                                                title="Supprimer">Supprimer</button>
                                                                        </form>
                                                                    </ul>
                                                                </div>
                                                            </span>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade profile-overview pt-3" id="formateur-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">FORMATEURS</h5>
                                            {{-- <h5 class="card-title">
                                                <a href="{{ route('showFormateur', ['id' => $operateur->id]) }}"
                                                    class="btn btn-outline-primary float-end btn-rounded btn-sm"
                                                    target="_blank">
                                                    <i class="bi bi-plus" title="Ajouter, Modifier, Supprimer"></i> </a>
                                            </h5> --}}
                                        </div>
                                        <table
                                            class="table table-bordered table-hover datatables align-middle justify-content-center">
                                            <thead>
                                                <tr>
                                                    <th>PRENOM(S) ET NOM</th>
                                                    <th>CHAMPS PROFESSIONNELS</th>
                                                    <th class="text-center">NOMBRE D'ANNEES D'EXPERIENCE</th>
                                                    <th>REFERENCES</th>
                                                    {{-- <th class="text-center"><i class="bi bi-gear"></i></th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($operateur->operateurformateurs as $operateurformateur)
                                                    <tr>
                                                        <td>{{ $operateurformateur->name }}</td>
                                                        <td>{{ $operateurformateur->domaine }}</td>
                                                        <td style="text-align: center;">
                                                            {{ $operateurformateur->nbre_annees_experience }}</td>
                                                        <td>{{ $operateurformateur->references }}</td>
                                                        {{-- <td style="text-align: center;">
                                                            <span class="d-flex align-items-baseline">
                                                                <a href="{{ route('operateurformateurs.show', $operateurformateur->id) }}"
                                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                                        class="bi bi-eye"></i></a>
                                                                <div class="filter">
                                                                    <a class="icon" href="#"
                                                                        data-bs-toggle="dropdown"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul
                                                                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                        <button class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditoperateurformateurModal{{ $operateurformateur->id }}">Modifier
                                                                        </button>
                                                                        <form
                                                                            action="{{ route('operateurformateurs.destroy', $operateurformateur->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"
                                                                                title="Supprimer">Supprimer</button>
                                                                        </form>
                                                                    </ul>
                                                                </div>
                                                            </span>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade profile-overview pt-3" id="localites-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">LOCALITES</h5>
                                            {{-- <h5 class="card-title">
                                                <a href="{{ route('showLocalite', ['id' => $operateur->id]) }}"
                                                    class="btn btn-outline-primary float-end btn-rounded btn-sm"
                                                    target="_blank">
                                                    <i class="bi bi-plus" title="Ajouter, Modifier, Supprimer"></i> </a>
                                            </h5> --}}
                                        </div>
                                        <table
                                            class="table table-bordered table-hover datatables align-middle justify-content-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N°</th>
                                                    <th>LOCALITE</th>
                                                    <th>REGION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($operateur->operateurlocalites as $operateurlocalite)
                                                    <tr>
                                                        <td style="text-align: center;">{{ $i++ }}</td>
                                                        <td>{{ $operateurlocalite->name }}</td>
                                                        <td>{{ $operateurlocalite->region }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            {{-- Détail Modules --}}
                            {{-- class show et active pour l'affichage par défaut --}}
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview pt-3" id="module-overview">
                                    {{-- <form method="post" action="{{ url('operateurmodules') }}"
                                        enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        <div class="col-12 col-md-12 col-lg-12 mb-0">
                                            <table class="table table-bordered table-hover" id="dynamicAddRemove">

                                                <tr>
                                                    <th>MODULE OU SPECIALITE<span class="text-danger mx-1">*</span></th>
                                                    <th>CATEGORIE PROFESSIONNELLE<span class="text-danger mx-1">*</span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                                                    <td>
                                                        <input type="text" name="module" id="module_operateur"
                                                            class="form-control form-control-sm"
                                                            placeholder="Module ou spécialité" />
                                                        <div id="moduleList"></div>
                                                        {{ csrf_field() }}
                                                        <p class="small fst-italic">
                                                            <small>{{ __('Le nombre de modules est limité à deux') }}</small>
                                                            <small>
                                                                {{ __(' sauf pour les établissements publics ') }}</small>
                                                        </p>
                                                    </td>
                                                    <td><input type="text" name="categorie"
                                                            placeholder="Catégorie professionnelle"
                                                            class="form-control form-control-sm" />
                                                        <p class="small fst-italic">
                                                            <small>{{ __("Préciser la catégorie professionnelle,l'emploi ou le métier correspondant lorsqu'il s'agit") }}</small><br>
                                                            <small>{{ __("d'une pré-qualification ou qualification") }}</small>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>DOMAINE<span class="text-danger mx-1">*</span></th>
                                                    <th>QUALIFICATION CORRESPONDANTE
                                                        <span class="text-danger mx-1">*</span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="domaine"
                                                            placeholder="Domaine d'intervention"
                                                            class="form-control form-control-sm" />
                                                    </td>
                                                    <td>
                                                        <select name="niveau_qualification"
                                                            class="form-select form-select-sm @error('niveau_qualification') is-invalid @enderror"
                                                            aria-label="Select" id="select-field-civilite"
                                                            data-placeholder="Choisir qualification">
                                                            <option value="">
                                                                {{ old('niveau_qualification') }}
                                                            </option>
                                                            <option value="Initiation">
                                                                Initiation
                                                            </option>
                                                            <option value="Pré-qualification">
                                                                Pré-qualification
                                                            </option>
                                                            <option value="Qualification">
                                                                Qualification
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-success btn-sm"><i
                                                        class="bi bi-printer"></i> Enregistrer</button>
                                            </div>
                                        </div>

                                    </form> --}}
                                    <!-- End module -->

                                    <div class="col-12 col-md-12 col-lg-12 mb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">DOMAINES DE COMPETENCES OU PROGRAMMES DE FORMATION</h5>
                                            <h5>Type : <span
                                                    class="{{ $operateur->type_demande }} btn-sm">{{ $operateur->type_demande }}</span>
                                            </h5>
                                            <span class="card-title d-flex align-items-baseline">Statut
                                                :&nbsp;
                                                <span class="{{ $operateur->statut_agrement }} text-white">
                                                    {{ $operateur?->statut_agrement }}</span>
                                                @if (auth()->user()->hasRole('super-admin|admin'))
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                            {{-- Validation automatique --}}
                                                            <form
                                                                action="{{ route('validateOperateur', ['id' => $operateur->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="show_confirm_valider btn btn-sm mx-1"><i
                                                                        class="bi bi-check2-circle"
                                                                        title="Valider"></i>&nbsp;Retenu</button>
                                                            </form>
                                                            {{--   <form
                                                            action="{{ route('agreerOperateur', ['id' => $operateur->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="show_confirm_valider btn btn-sm mx-1"><i
                                                                    class="bi bi-check2-circle"
                                                                    title="Valider"></i>&nbsp;Agréer</button>
                                                        </form>
                                                        <div>
                                                            <button class="btn btn-sm mx-1" data-bs-toggle="modal"
                                                                data-bs-target="#ReserveAgrementModal{{ $operateur->id }}"><i
                                                                    class="bi bi-chat-square-text"
                                                                    title="Justification"></i>&nbsp;Sous réserve
                                                            </button>
                                                        </div> --}}
                                                            {{-- @isset($operateur->motif) --}}
                                                            <button class="btn btn-sm mx-1" data-bs-toggle="modal"
                                                                data-bs-target="#RejetAgrementModal{{ $operateur->id }}"><i
                                                                    class="bi bi-trash"
                                                                    title="Justification"></i>&nbsp;Non
                                                                retenu
                                                            </button>
                                                            {{-- @endisset --}}
                                                        </ul>
                                                    </div>
                                                @endif
                                            </span>
                                        </div>
                                        {{-- <form method="post" action="#" enctype="multipart/form-data"
                                            class="row g-3"> --}}
                                        <div class="row g-3">
                                            <table
                                                class="table table-bordered table-hover datatables align-middle justify-content-center"
                                                id="table-operateurModules">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">DOMAINE</th>
                                                        <th scope="col">MODULE</th>
                                                        <th scope="col">CATEGORIE</th>
                                                        <th scope="col">QUALIFICATION</th>
                                                        <th class="text-center">STATUT</th>
                                                        @if (auth()->user()->hasRole('super-admin|admin'))
                                                            <th class="text-center"><i class="bi bi-gear"></i></th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($operateur->operateurmodules as $operateurmodule)
                                                        <tr>
                                                            <td style="text-align: center;">{{ $i++ }}</td>
                                                            <td>{{ $operateurmodule?->domaine }}</td>
                                                            <td>{{ $operateurmodule?->module }}</td>
                                                            <td>{{ $operateurmodule?->categorie }}</td>
                                                            <td>{{ $operateurmodule?->niveau_qualification }}</td>
                                                            <td style="text-align: center;">
                                                                <span
                                                                    class="{{ $operateurmodule?->statut }}">{{ $operateurmodule?->statut }}</span>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <span
                                                                    class="d-flex align-items-baseline justify-content-center">
                                                                    <a href="{{ route('operateurmodules.show', $operateurmodule->id) }}"
                                                                        class="btn btn-primary btn-sm"
                                                                        title="voir détails"><i class="bi bi-eye"></i></a>
                                                                    @if (auth()->user()->hasRole('super-admin|admin'))
                                                                        <div class="filter">
                                                                            <a class="icon" href="#"
                                                                                data-bs-toggle="dropdown"><i
                                                                                    class="bi bi-three-dots"></i></a>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                                {{--  <form
                                                                                action="{{ route('validation-operateur-modules.update', $operateurmodule->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button
                                                                                    class="show_confirm_valider dropdown-item btn btn-sm mx-1">Agréer</button>
                                                                            </form> --}}
                                                                                {{-- <button class="dropdown-item btn btn-sm mx-1"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#AddRegionModal{{ $operateurmodule->id }}">Rejeter
                                                                            </button> --}}
                                                                                <button
                                                                                    class="dropdown-item btn btn-sm mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#EditOperateurmoduleModal{{ $operateurmodule->id }}">Modifier
                                                                                </button>
                                                                                <form
                                                                                    action="{{ route('operateurmodules.destroy', $operateurmodule->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="dropdown-item show_confirm"
                                                                                        title="Supprimer">Supprimer</button>
                                                                                </form>
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- Détail Observations --}}
                            <div class="tab-content">
                                <div class="tab-pane fade profile-overview pt-0" id="observations-overview">
                                    <div class="d-flex justify-content-between align-items-center mt-0">
                                        <h5 class="card-title">Observations</h5>
                                        <span>Visite conformité : <span
                                                class="{{ $operateur?->visite_conformite }}">{{ $operateur?->visite_conformite }}</span></span>
                                        <a href="#" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                            data-bs-target="#addobservations" title="Ajouter">Conformité</a>
                                    </div>
                                    @if (!empty($operateur?->observations))
                                        <textarea name="observation" id="observation" rows="10" @readonly(true)
                                            class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ $operateur?->observations ?? old('observation') }}</textarea>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Edit Operateur-->
        <!-- Edit Operateur Module -->
        @foreach ($operateur->operateurmodules as $operateurmodule)
            <div class="modal fade" id="EditOperateurmoduleModal{{ $operateurmodule->id }}" tabindex="-1"
                role="dialog" aria-labelledby="EditOperateurmoduleModalLabel{{ $operateurmodule->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        {{-- <form method="POST" action="#">
                            @csrf --}}
                        <form method="post" action="{{ route('operateurmodules.update', $operateurmodule->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="modal-header" id="EditOperateurmoduleModalLabel{{ $operateurmodule->id }}">
                                <h5 class="modal-title">Modification module
                                    opérateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{ $operateurmodule->id }}">

                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="module" class="form-label">Module<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="module" id="module_operateur_edit"
                                        value="{{ $operateurmodule->module ?? old('module') }}"
                                        class="form-control form-control-sm @error('module') is-invalid @enderror"
                                        placeholder="module">
                                    <div id="moduleListEdit"></div>
                                    {{ csrf_field() }}
                                    @error('module')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="domaine" class="form-label">Domaine<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="domaine"
                                        value="{{ $operateurmodule->domaine ?? old('domaine') }}"
                                        class="form-control form-control-sm @error('domaine') is-invalid @enderror"
                                        placeholder="domaine">
                                    @error('domaine')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="categorie" class="form-label">Catégorie<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="categorie"
                                        value="{{ $operateurmodule->categorie ?? old('categorie') }}"
                                        class="form-control form-control-sm @error('categorie') is-invalid @enderror"
                                        placeholder="categorie">
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="niveau_qualification" class="form-label">Niveau de qualification<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="niveau_qualification" class="form-select selectpicker"
                                        data-live-search="true @error('niveau_qualification') is-invalid @enderror"
                                        aria-label="Select" id="select-field-niveau_qualification-update"
                                        data-placeholder="Choisir niveau qualification">
                                        <option value="{{ $operateurmodule->niveau_qualification }}">
                                            {{ $operateurmodule->niveau_qualification ?? old('niveau_qualification') }}
                                        </option>
                                        <option value="Initiation">
                                            Initiation
                                        </option>
                                        <option value="Pré-qualification">
                                            Pré-qualification
                                        </option>
                                        <option value="Qualification">
                                            Qualification
                                        </option>
                                    </select>
                                    @error('niveau_qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                    Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Edit Operateur Module-->
        <!-- The Modal Delete -->
        @foreach ($operateur->operateurmodules as $operateurmodule)
            <div class="modal" id="myModal{{ $operateurmodule->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Êtes-vous sûre de bien vouloir supprimer ?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <form method="post" action="{{ route('operateurmodules.destroy', $operateurmodule->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Non</button>
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Oui
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- @foreach ($operateur->operateurmodules as $operateurmodule)
            <div class="modal fade" id="AddRegionModal{{ $operateurmodule->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post"
                            action="{{ route('validation-operateur-modules.destroy', $operateurmodule->id) }}"
                            enctype="multipart/form-data" class="row">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title">Rejet module</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="motif" class="form-label">Motifs du rejet<span
                                        class="text-danger mx-1">*</span></label>
                                <textarea name="motif" id="motif" rows="5"
                                    class="form-control form-control-sm @error('motif') is-invalid @enderror"
                                    placeholder="Enumérer les motifs du rejet">{{ $operateurmodule?->motif ?? old('motif') }}</textarea>
                                @error('motif')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-printer"></i>
                                    Rejeter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}
        {{-- Agrément sous réserve --}}
        {{--  @foreach ($operateurs as $operateur)
            <div class="modal fade" id="ReserveAgrementModal{{ $operateur->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="{{ route('validation-operateur.update', $operateur->id) }}"
                            enctype="multipart/form-data" class="row">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Rejet opérateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="motif" class="form-label">Motifs de la réserve<span
                                        class="text-danger mx-1">*</span></label>
                                <textarea name="motif" id="motif" rows="5"
                                    class="form-control form-control-sm @error('motif') is-invalid @enderror"
                                    placeholder="Enumérer les motifs de l'agrément sous réserve">{{ $operateur?->motif ?? old('motif') }}</textarea>
                                @error('motif')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-printer"></i>
                                    Rejeter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}
        {{-- Agrément rejeter --}}
        @foreach ($operateurs as $operateur)
            <div class="modal fade" id="RejetAgrementModal{{ $operateur->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="{{ route('nonRetenu', ['id' => $operateur->id]) }}"
                            enctype="multipart/form-data" class="row">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Rejet demande agrément</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="motif" class="form-label">Motifs...<span
                                        class="text-danger mx-1">*</span></label>
                                <textarea name="motif" id="motif" rows="5"
                                    class="form-control form-control-sm @error('motif') is-invalid @enderror"
                                    placeholder="Enumérer les motifs du rejet">{{ $operateur?->motif ?? old('motif') }}</textarea>
                                @error('motif')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-printer"></i>
                                    Rejeter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Add References -->
        {{-- <div class="modal fade" id="AddRefModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="{{ url('operateureferences') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title"> EXPERIENCES ET REFERENCES PROFESSIONNELLES </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="organisme" value="{{ old('organisme') }}"
                                    class="form-control form-control-sm @error('organisme') is-invalid @enderror"
                                    id="organisme" placeholder="Dénomination de l'organisme" autofocus>
                                @error('organisme')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Dénomination de l'organisme<span
                                        class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min="0" name="contact" value="{{ old('contact') }}"
                                    class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                    id="contact" placeholder="Contact">
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Contact<span class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="periode" value="{{ old('periode') }}"
                                    class="form-control form-control-sm @error('periode') is-invalid @enderror"
                                    id="periode" placeholder="Période">
                                @error('periode')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Période<span class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    placeholder="Ajouter les membres du jury">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Description<span class="text-danger mx-1">*</span></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <!-- End Add References-->
        <!-- Edit References -->
        {{-- @foreach ($operateureferences as $operateureference)
            <div class="modal fade" id="EditoperateureferenceModal{{ $operateureference->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="{{ route('operateureferences.update', $operateureference->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="modal-header">
                                <h5 class="modal-title"> EXPERIENCES ET REFERENCES PROFESSIONNELLES </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="organisme"
                                        value="{{ $operateureference->organisme ?? old('organisme') }}"
                                        class="form-control form-control-sm @error('organisme') is-invalid @enderror"
                                        id="organisme" placeholder="Dénomination de l'organisme" autofocus>
                                    @error('organisme')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Dénomination de l'organisme<span
                                            class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" min="0" name="contact"
                                        value="{{ $operateureference->contact ?? old('contact') }}"
                                        class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                        id="contact" placeholder="Contact">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Contact<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="periode"
                                        value="{{ $operateureference->periode ?? old('periode') }}"
                                        class="form-control form-control-sm @error('periode') is-invalid @enderror"
                                        id="periode" placeholder="Période">
                                    @error('periode')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Période<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="description" id="description" cols="30" rows="5"
                                        class="form-control form-control-sm @error('description') is-invalid @enderror"
                                        placeholder="Ajouter les membres du jury">{{ $operateureference->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Description<span class="text-danger mx-1">*</span></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                    Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}
        <!-- End Edit References-->

        <div class="modal fade" id="addobservations" tabindex="-1" role="dialog"
            aria-labelledby="addobservationsLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Observations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('observations', ['id' => $operateur->id]) }}"
                        enctype="multipart/form-data" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row g-3">


                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="visite_conformite" class="form-label">Visite conformité<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="visite_conformite"
                                        class="form-select form-select-sm @error('visite_conformite') is-invalid @enderror"
                                        aria-label="Select" id="select-field-visite_conformite"
                                        data-placeholder="Choisir">
                                        <option value="{{ $operateur?->visite_conformite ?? old('visite_conformite') }}">
                                            {{ $operateur?->visite_conformite ?? old('visite_conformite') }}
                                        </option>
                                        <option value="Oui">
                                            Oui
                                        </option>
                                        <option value="Non">
                                            Non
                                        </option>
                                    </select>
                                    @error('visite_conformite')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="observation" class="form-label">Observations<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="observation" id="observation" rows="10"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ $operateur?->observations ?? old('observation') }}</textarea>
                                    @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-operateurModules', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [0, 'asc']
            ],
            language: {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
                "select": {
                    "rows": {
                        _: "%d lignes sÃ©lÃ©ctionnÃ©es",
                        0: "Aucune ligne sÃ©lÃ©ctionnÃ©e",
                        1: "1 ligne sÃ©lÃ©ctionnÃ©e"
                    }
                }
            }
        });
    </script>
@endpush

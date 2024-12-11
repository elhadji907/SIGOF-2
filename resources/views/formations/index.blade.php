@extends('layout.user-layout')
@section('title', 'ONFP - Formations')
@section('space-work')

    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Données</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card customers-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Formations<span> | {{ date('d/m/Y') }}</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-calendar-date-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <span class="text-primary">{{ $count_today ?? '0' }}</span>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold">Aujourd'hui</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Formations<span> | individuelles</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <span
                                                    class="text-primary">{{ $individuelles_formations_count ?? '0' }}</span>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold"></span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card revenue-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Formations<span> | collectives</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <span class="text-primary">{{ $collectives_formations_count ?? '0' }}</span>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold"></span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Formations <span>| Toutes</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <span class="text-primary">{{ count($formations) ?? '0' }}</span>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold">Toutes</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
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
                            role="alert">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="pt-0">
                            <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                                data-bs-target="#AddFormationModal">
                                <i class="bi bi-folder-plus" title="Ajouter"></i>
                            </button>
                        </div> --}}
                        <div class="d-flex justify-content-between align-items-center">
                            @can('formation-create')
                                <h5 class="card-title">{{ $title }}</h5>
                                @can('formation-create')
                                    <span class="d-flex align-items-baseline">
                                        <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                                            data-bs-target="#AddFormationModal" title="Ajouter">Ajouter</a>
                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li>
                                                    <button type="button" class="dropdown-item btn btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#generate_rapportFormation"></i>Rechercher
                                                        plus</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </span>
                                @endcan
                            @endcan
                        </div>
                        {{-- <h5 class="card-title">Liste des formations</h5> --}}
                        {{-- <p>Le tableau des demandes formations</p> --}}
                        <!-- Table with stripped rows -->
                        <table class="table datatables" id="table-formations">
                            <thead>
                                <tr>
                                    <th width='6%' class="text-center">Code</th>
                                    <th width='15%'>Type formation</th>
                                    <th>Bénéficiaires</th>
                                    <th width='15%'>Localité</th>
                                    <th width='5%'>Modules</th>
                                    <th width='17%'>Type certification</th>
                                    {{-- <th>Niveau qualification</th> --}}
                                    {{-- <th>Effectif</th> --}}
                                    <th width='5%' class="text-center">Statut</th>
                                    <th width='5%'><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($formations as $formation)
                                    <tr>
                                        <td style="text-align: center">{{ $formation?->code }}</td>
                                        <td>{{ $formation->types_formation?->name }}</td>
                                        <td>{{ $formation?->name }}</td>
                                        <td>{{ $formation->departement?->region?->nom }}</td>
                                        <td>
                                            @isset($formation?->module?->name)
                                                {{ $formation?->module?->name }}
                                            @endisset
                                            @isset($formation?->collectivemodule?->module)
                                                {{ $formation?->collectivemodule?->module }}
                                            @endisset
                                        </td>
                                        <td>{{ $formation->type_certification }}</td>
                                        {{-- <td>{{ $formation->niveau_qualification }}</td> --}}
                                        {{--   <td class="text-center">
                                            @foreach ($formation->individuelles as $individuelle)
                                                @if ($loop->last)
                                                    <a class="text-primary fw-bold"
                                                        href="{{ route('formations.show', $formation->id) }}">{!! $loop->count ?? '0' !!}</a>
                                                @endif
                                            @endforeach
                                        </td> --}}
                                        <td class="text-center"><a><span
                                                    class="{{ $formation?->statut }}">{{ $formation?->statut }}</span></a>
                                        </td>
                                        <td>
                                            @can('formation-show')
                                                <span class="d-flex align-items-baseline"><a
                                                        href="{{ route('formations.show', $formation->id) }}"
                                                        class="btn btn-primary btn-sm" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            @can('formation-update')
                                                                <li>
                                                                    <a class="dropdown-item btn btn-sm"
                                                                        href="{{ route('formations.edit', $formation->id) }}"
                                                                        class="mx-1" title="Modifier"><i
                                                                            class="bi bi-pencil"></i>Modifier</a>
                                                                    {{-- <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditFormationModal{{ $formation->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button> --}}
                                                                </li>
                                                            @endcan
                                                            @can('formation-delete')
                                                                <li>
                                                                    <form
                                                                        action="{{ route('formations.destroy', $formation->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item show_confirm"
                                                                            title="Supprimer"><i
                                                                                class="bi bi-trash"></i>Supprimer</button>
                                                                    </form>
                                                                </li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </span>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="AddFormationModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        {{-- <form method="POST" action="{{ route('addRegion') }}">
                        @csrf --}}
                        <form method="post" action="{{ route('formations.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Créer une nouvelle
                                    formation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div> --}}

                            <div class="card-header text-center bg-gradient-default">
                                <h1 class="h4 text-black mb-0">CRÉER FORMATION</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                        <label for="name" class="form-label">Bénéficiaires<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="name" id="name" rows="1"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Bénéficiaires">{{ old('name') }}</textarea>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="region" class="form-label">Région<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="region" class="form-select  @error('region') is-invalid @enderror"
                                            aria-label="Select" id="select-field-region" data-placeholder="Choisir région">
                                            <option value="">
                                                {{ old('region') }}
                                            </option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">
                                                    {{ $region->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}


                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="code" class="form-label">Code<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="code"
                                                value="{{ $numFormation ?? old('code') }}"
                                                class="form-control form-control-sm @error('code') is-invalid @enderror"
                                                id="code" placeholder="code">
                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="departement" class="form-label">Département<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="departement"
                                            class="form-select  @error('departement') is-invalid @enderror"
                                            aria-label="Select" id="select-field-departement-modal"
                                            data-placeholder="Choisir département">
                                            <option value="{{ old('departement') }}">
                                                {{ old('departement') }}
                                            </option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->nom }}">
                                                    {{ $departement->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departement')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="lieu" class="form-label">Lieu formation<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="lieu" value="{{ old('lieu') }}"
                                            class="form-control form-control-sm @error('lieu') is-invalid @enderror"
                                            id="lieu" placeholder="Lieu formation">
                                        @error('lieu')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="module" class="form-label">Module<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="module" class="form-select  @error('module') is-invalid @enderror"
                                            aria-label="Select" id="select-field-module-modal"
                                            data-placeholder="Choisir module">
                                            <option value="">
                                                {{ old('module') }}
                                            </option>
                                            @foreach ($modules as $module)
                                                <option value="{{ $module->id }}">
                                                    {{ $module->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('module')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{--  <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="operateur" class="form-label">Opérateur<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="operateur"
                                            class="form-select  @error('operateur') is-invalid @enderror"
                                            aria-label="Select" id="select-field-operateur"
                                            data-placeholder="Choisir operateur">
                                            <option value="">
                                                {{ old('operateur') }}
                                            </option>
                                            @foreach ($operateurs as $operateur)
                                                <option value="{{ $operateur->id }}">
                                                    {{ $operateur->sigle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('operateur')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="types_formation" class="form-label">Type formation<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="types_formation"
                                            class="form-select  @error('types_formation') is-invalid @enderror"
                                            aria-label="Select" id="select-field-types_formation"
                                            data-placeholder="Choisir type formation">
                                            <option value="{{ old('types_formation') }}">
                                                {{ old('types_formation') }}
                                            </option>
                                            @foreach ($types_formations as $types_formation)
                                                <option value="{{ $types_formation->name }}">
                                                    {{ $types_formation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('types_formation')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="type_certification" class="form-label">Type certification<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="type_certification"
                                            class="form-select  @error('type_certification') is-invalid @enderror"
                                            aria-label="Select" id="select-field-type_certification"
                                            data-placeholder="Choisir niveau de qualification">
                                            <option value="{{ old('type_certification') }}">
                                                {{ old('type_certification') }}
                                            </option>
                                            <option value="Titre">
                                                Titre
                                            </option>
                                            <option value="Attestation">
                                                Attestation
                                            </option>
                                        </select>
                                        @error('type_certification')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_debut" class="form-label">Date début</label>
                                        <input type="date" name="date_debut" value="{{ old('date_debut') }}"
                                            class="form-control form-control-sm @error('date_debut') is-invalid @enderror"
                                            id="date_debut" placeholder="Date début">
                                        @error('date_debut')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_fin" class="form-label">Date fin</label>
                                        <input type="date" name="date_fin" value="{{ old('date_fin') }}"
                                            class="form-control form-control-sm @error('date_fin') is-invalid @enderror"
                                            id="date_fin" placeholder="Date début">
                                        @error('date_fin')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    {{--  <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="titre" class="form-label">Titre (convention)</label>
                                        <input type="text" name="titre" value="{{ old('titre') }}"
                                            class="form-control form-control-sm @error('titre') is-invalid @enderror"
                                            id="titre"
                                            placeholder="Ex: 4ème catégorie de la convention collective ...">
                                        @error('titre')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="lettre_mission" class="form-label">N° lettre de mission</label>
                                        <input type="text" name="lettre_mission" value="{{ old('lettre_mission') }}"
                                            class="form-control form-control-sm @error('lettre_mission') is-invalid @enderror"
                                            id="lettre_mission" placeholder="N°000875 du 05/08/2024">
                                        @error('lettre_mission')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="numero_convention" class="form-label">Référence convention</label>
                                        <input type="text" name="numero_convention"
                                            value="{{ old('numero_convention') }}"
                                            class="form-control form-control-sm @error('numero_convention') is-invalid @enderror"
                                            id="numero_convention"
                                            placeholder="Ex: 000743/ONFP/DG/DIOF/mb du 14 juillet 2023">
                                        @error('numero_convention')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="effectif_prevu" class="form-label">Effectif prévu</label>
                                        <input type="number" name="effectif_prevu" min="0" max="25"
                                            value="{{ old('effectif_prevu') }}"
                                            class="form-control form-control-sm @error('effectif_prevu') is-invalid @enderror"
                                            id="effectif_prevu" placeholder="Effectif prévu">
                                        @error('effectif_prevu')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="prevue_h" class="form-label">Effectif prévu homme</label>
                                        <input type="number" name="prevue_h" min="0" max="25"
                                            value="{{ old('prevue_h') }}"
                                            class="form-control form-control-sm @error('prevue_h') is-invalid @enderror"
                                            id="prevue_h" placeholder="Effectif homme">
                                        @error('prevue_h')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="prevue_f" class="form-label">Effectif prévu femme</label>
                                        <input type="number" name="prevue_f" min="0" max="25"
                                            value="{{ old('prevue_f') }}"
                                            class="form-control form-control-sm @error('prevue_f') is-invalid @enderror"
                                            id="prevue_f" placeholder="Effectif femme">
                                        @error('prevue_f')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="frais_operateurs" class="form-label">Frais opérateur</label>
                                        <input type="number" name="frais_operateurs" min="0" step="0.001"
                                            value="{{ old('frais_operateurs') }}"
                                            class="form-control form-control-sm @error('frais_operateurs') is-invalid @enderror"
                                            id="frais_operateurs" placeholder="Frais opérateur">
                                        @error('frais_operateurs')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="frais_add" class="form-label">Frais additionels</label>
                                        <input type="number" name="frais_add" min="0" step="0.001"
                                            value="{{ old('frais_add') }}"
                                            class="form-control form-control-sm @error('frais_add') is-invalid @enderror"
                                            id="frais_add" placeholder="Frais additionels">
                                        @error('frais_add')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="autes_frais" class="form-label">Autres frais</label>
                                        <input type="number" name="autes_frais" min="0" step="0.001"
                                            value="{{ old('autes_frais') }}"
                                            class="form-control form-control-sm @error('autes_frais') is-invalid @enderror"
                                            id="autes_frais" placeholder="Autres frais">
                                        @error('autes_frais')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="projet" class="form-label">Projet</label>
                                        <select name="projet" class="form-select  @error('projet') is-invalid @enderror"
                                            aria-label="Select" id="select-field-projet"
                                            data-placeholder="Choisir projet">
                                            <option value="">
                                                {{ old('projet') }}
                                            </option>
                                            @foreach ($projets as $projet)
                                                <option value="{{ $projet?->id }}">
                                                    {{ $projet?->sigle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('projet')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="programme" class="form-label">Programme</label>
                                        <select name="programme"
                                            class="form-select  @error('programme') is-invalid @enderror"
                                            aria-label="Select" id="select-field-programme"
                                            data-placeholder="Choisir programme">
                                            <option value="">
                                                {{ old('programme') }}
                                            </option>
                                            @foreach ($programmes as $programme)
                                                <option value="{{ $programme?->id }}">
                                                    {{ $programme?->sigle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('programme')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="col-12 col-md-4 col-lg-4 mb-0">
                                        <label for="choixoperateur" class="form-label">Choix opérateurs</label>
                                        <select name="choixoperateur"
                                            class="form-select  @error('choixoperateur') is-invalid @enderror"
                                            aria-label="Select" id="select-field-choixoperateurs"
                                            data-placeholder="Choisir choix operateurs">
                                            <option value="">
                                                {{ old('choixoperateur') }}
                                            </option>
                                            @foreach ($choixoperateurs as $choixoperateur)
                                                <option value="{{ $choixoperateur?->id }}">
                                                    {{ $choixoperateur?->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('choixoperateur')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div> --}}

                                </div>
                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-printer"></i>
                                        Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Formation -->
        {{--  @foreach ($formations as $formation)
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                <div class="modal fade" id="EditFormationModal{{ $formation->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="EditFormationModalLabel{{ $formation->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <form method="post" action="{{ route('formations.update', $formation->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="modal-header" id="EditFormationModalLabel{{ $formation->id }}">
                                    <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier
                                        formation
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $formation->id }}">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-12 col-lg-12 mb-0">
                                            <label for="name" class="form-label">Bénéficiaires<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="name" id="name" rows="1"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Bénéficiaires">{{ $formation?->name ?? old('name') }}</textarea>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-0">
                                            <label for="departement" class="form-label">Département<span
                                                    class="text-danger mx-1">*</span></label>

                                            <select name="departement"
                                                class="form-select  @error('departement') is-invalid @enderror"
                                                aria-label="Select" id="select-field-departement-modal-update"
                                                data-placeholder="Choisir localité">
                                                <option value="{{ $formation->departement->id }}">
                                                    {{ $formation->departement->nom ?? old('departement') }}
                                                </option>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}">
                                                        {{ $departement->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('departement')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 mb-0">
                                            <label for="lieu" class="form-label">Lieu exact<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="lieu" value="{{ old('lieu') }}"
                                                class="form-control form-control-sm @error('lieu') is-invalid @enderror"
                                                id="lieu" placeholder="Lieu exact">
                                            @error('lieu')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4 mb-0">
                                            <label for="types_formation" class="form-label">Type formation<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="types_formation"
                                                class="form-select  @error('types_formation') is-invalid @enderror"
                                                aria-label="Select" id="select-field-types_formation-update"
                                                data-placeholder="Choisir type formation">
                                                <option value="">
                                                    {{ old('types_formation') }}
                                                </option>
                                                @foreach ($types_formations as $types_formation)
                                                    <option value="{{ $types_formation->id }}">
                                                        {{ $types_formation->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('types_formation')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 mb-0">
                                            <label for="niveau_qualification" class="form-label">Niveau qualification<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="niveau_qualification"
                                                class="form-select  @error('niveau_qualification') is-invalid @enderror"
                                                aria-label="Select" id="select-field-niveau_qualification-update"
                                                data-placeholder="Choisir niveau de qualification">
                                                <option value="{{ old('niveau_qualification') }}">
                                                    {{ old('niveau_qualification') }}
                                                </option>
                                                <option value="Titre qualification">
                                                    Titre qualification
                                                </option>
                                                <option value="Renforcement capacité">
                                                    Renforcement capacité
                                                </option>
                                            </select>
                                            @error('niveau_qualification')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 mb-0">
                                            <label for="date_debut" class="form-label">Date début</label>
                                            <input type="date" name="date_debut" value="{{ old('date_debut') }}"
                                                class="form-control form-control-sm @error('date_debut') is-invalid @enderror"
                                                id="date_debut" placeholder="Date début">
                                            @error('date_debut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 mb-0">
                                            <label for="titre" class="form-label">Titre (convention)</label>
                                            <input type="text" name="titre" value="{{ old('titre') }}"
                                                class="form-control form-control-sm @error('titre') is-invalid @enderror"
                                                id="titre"
                                                placeholder="Ex: 4ème catégorie de la convention collective ...">
                                            @error('titre')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                        Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}

        <div class="modal fade" id="generate_rapportFormation" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapportFormationLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer rapports formations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('formations.reports') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        {{-- <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="region" class="form-label">Région<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="region"
                                                    class="form-select  @error('region') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-formation-region-rapport"
                                                    data-placeholder="Choisir la région">
                                                    <option value="Toutes">Toutes</option>
                                                    @foreach ($regions as $region)
                                                        <option value="{{ $region->id }}">
                                                            {{ $region->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('region')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="annee" class="form-label">Année<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="annee"
                                                    class="form-select form-select-sm @error('annee') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-formation-annee-rapport"
                                                    data-placeholder="Choisir année">
                                                    <option value="{{ old('annee') }}">
                                                        {{ old('annee') }}
                                                    </option>
                                                    @foreach ($formations_annee as $anneeformation)
                                                        <option value="{{ $anneeformation->annee }}">
                                                            {{ $anneeformation->annee }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('annee')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="region" class="form-label">Statut<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="statut"
                                                    class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-formation-region-rapport"
                                                    data-placeholder="Choisir statut">
                                                    <option value="{{ old('statut') }}">
                                                        {{ old('statut') }}
                                                    </option>
                                                    <option value="Tous">Tous</option>
                                                    @foreach ($formations_statut as $statutformation)
                                                        <option value="{{ $statutformation->statut }}">
                                                            {{ $statutformation->statut }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('statut')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Afficher</button>
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
        new DataTable('#table-formations', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [0, 'desc']
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

@extends('layout.user-layout')
@section('title', 'ONFP - Liste des modules')
@section('space-work')
    @can('module-view')
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="pagetitle">
                        {{-- <h1>Data Tables</h1> --}}
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                                <li class="breadcrumb-item">Tables</li>
                                <li class="breadcrumb-item active">Données</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
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
                    <div class="card">
                        <div class="card-body">
                            {{-- @can('role-create') --}}
                            {{-- <div class="pt-1">
                            <a href="{{ route('modules.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-person-plus" title="Ajouter"></i> </a>
                        </div> --}}
                            {{-- @endcan --}}
                            {{-- <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                            data-bs-target="#AddIndividuelModal">
                            <i class="bi bi-plus" title="Ajouter"></i>
                        </button> --}}
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{ $title }}</h5>
                                @can('module-create')
                                    <span class="d-flex align-items-baseline">
                                        <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                                            data-bs-target="#AddIndividuelModal" title="Générer rapports">Ajouter</a>
                                        {{-- <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li>
                                                <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#generate_rapport_module_region"></i>Rechercher</button>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    </span>
                                @endcan
                            </div>
                            <table class="table datatables align-middle justify-content-center" id="table-modules">
                                <thead>
                                    <tr>
                                        <th>Modules</th>
                                        <th>Domaines</th>
                                        <th>Secteurs</th>
                                        <th class="text-center" scope="col">Formations</th>
                                        <th class="text-center" scope="col">Effectif</th>
                                        <th class="text-center" scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td>{{ $module->name }}</td>
                                            <td>{{ $module?->domaine?->name }}</td>
                                            <td>{{ $module?->domaine?->secteur?->name }}</td>
                                            <td style="text-align: center;">
                                                @foreach ($module->formations as $formation)
                                                    @if ($loop->last)
                                                        <a href="{{ url('formations/' . $formation->id) }}"><span
                                                                class="badge bg-info">{{ $loop->count }}</span></a>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td style="text-align: center;">
                                                @foreach ($module->individuelles as $individuelle)
                                                    @if ($loop->last)
                                                        <a href="{{ url('modules/' . $module->id) }}"><span
                                                                class="badge bg-info">{{ $loop->count }}</span></a>
                                                    @endif
                                                @endforeach
                                            </td>
                                            {{-- <td style="text-align: center;">
                                            <span class="d-flex mt-2 align-items-baseline">
                                                <a href="{{ url('modules/' . $module->id) }}"
                                                    class="btn btn-success btn-sm mx-1" title="Voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                            </span>
                                        </td> --}}
                                            <td style="text-align: center;">
                                                @can('module-show')
                                                    <span class="d-flex mt-2 align-items-baseline"><a
                                                            href="{{ url('modules/' . $module->id) }}"
                                                            class="btn btn-success btn-sm mx-1" title="Voir détails">
                                                            <i class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('module-update')
                                                                    <li>
                                                                        <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditRegionModal{{ $module->id }}">
                                                                            <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                        </button>
                                                                    </li>
                                                                @endcan
                                                                @can('module-delete')
                                                                    <li>
                                                                        <form action="{{ url('modules', $module->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item show_confirm"><i
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
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="AddIndividuelModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ route('addModule') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un nouveau module
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-12 col-md-6 col-lg-6 mb-0">
                                        <label for="name" class="form-label">Module</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                            id="name" placeholder="Module">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 mb-0 pb-5">
                                        <label for="domaine" class="form-label">Domaine<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="domaine" class="form-select  @error('domaine') is-invalid @enderror"
                                            aria-label="Select" id="select-field-domaine-indiv"
                                            data-placeholder="Choisir domaine">
                                            <option value="">
                                                {{ old('domaine') }}
                                            </option>
                                            @foreach ($domaines as $domaine)
                                                <option value="{{ $domaine->id }}">
                                                    {{ $domaine->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('domaine')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                        Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

            <div class="modal fade" id="AddIndividuelModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ url('addModule') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un nouveau module
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                                        placeholder="Nom du module" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Module</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="domaine" class="form-select  @error('domaine') is-invalid @enderror"
                                        aria-label="Select" id="select-field-domaine-indiv"
                                        data-placeholder="Choisir domaine">
                                        <option value="">
                                            {{ old('domaine') }}
                                        </option>
                                        @foreach ($domaines as $domaine)
                                            <option value="{{ $domaine?->id }}">
                                                {{ $domaine?->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('domaine')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Domaine</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                    Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Module -->
            @foreach ($modules as $module)
                <div class="modal fade" id="EditRegionModal{{ $module->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="EditRegionModalLabel{{ $module->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="{{ route('modules.update', $module->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="modal-header" id="EditRegionModalLabel{{ $module->id }}">
                                    <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier module</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $module->id }}">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" value="{{ $module->name ?? old('name') }}"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                            id="name" placeholder="Module" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                        <label for="floatingInput">Module</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select name="domaine" class="form-select  @error('domaine') is-invalid @enderror"
                                            aria-label="Select" id="select-field-domaine-module"
                                            data-placeholder="Choisir domaine">
                                            <option value="{{ $module?->domaine?->id }}">
                                                {{ $module?->domaine?->name ?? old('domaine') }}
                                            </option>
                                            @foreach ($domaines as $domaine)
                                                <option value="{{ $domaine?->id }}">
                                                    {{ $domaine?->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('domaine')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                        <label for="floatingInput">Domaine</label>
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
            {{-- <div class="modal fade" id="generate_rapport_module_region" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapport_module_regionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer une recherche<span class="text-danger mx-1">*</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('modules.report') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="form-group">
                                        <label for="region" class="form-label">Région</label>
                                        <select name="region" class="form-select  @error('region') is-invalid @enderror"
                                            aria-label="Select" id="select-field-region-module-rapport"
                                            data-placeholder="Choisir la région">
                                            <option value="">Toutes</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->nom }}">
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
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="form-group">
                                        <label for="statut" class="form-label">Statut<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="statut"
                                            class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                            aria-label="Select" id="select-field-statut-report"
                                            data-placeholder="Choisir statut">
                                            <option value="{{ old('statut') }}">
                                                {{ old('statut') }}
                                            </option>
                                            <option value="nouvelle">
                                                nouvelle
                                            </option>
                                            <option value="attente">
                                                attente
                                            </option>
                                            <option value="former">
                                                former
                                            </option>
                                            <option value="rejeter">
                                                rejeter
                                            </option>
                                            <option value="retenu">
                                                retenu
                                            </option>
                                        </select>
                                        @error('statut')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        </section>
    @endcan
@endsection
@push('scripts')
    <script>
        new DataTable('#table-modules', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [4, 'desc']
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

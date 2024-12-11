@extends('layout.user-layout')
@section('title', 'Générer rapport operateurs')
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                @can('user-view')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Générer rapport opérateurs</li>
            </ol>
        </nav>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif
    <div class="d-flex justify-content-between align-items-center mt-3">
        <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('home') }}" class="btn btn-success btn-sm"
                title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
            <p> | Tableau de bord</p>
        </span>
        {{-- @isset($operateurs)
            <span class="page-title badge bg-primary">{{ $title }}</span>
        @endisset --}}
        @can('rapport-operateur-view')
            <span class="d-flex align-items-baseline">
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#generate_rapport_module_region" title="Générer rapports">Générer rapport</a>
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport"></i>Par région</button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport_module"></i>Par module</button>
                        </li>
                        {{-- <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport_module_region"></i>rapport module/région</button>
                        </li> --}}
                    </ul>
                </div>
            </span>
        @endcan
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @isset($operateurs)
                    {{-- <div class="pb-2">
                        <span class="page-title badge bg-info">{{ $title }}</span>
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <div class="table-responsive">
                                <table class="table datatables align-middle" id="table-operateur">
                                    <thead>
                                        <tr>
                                            <th width="15%" class="text-center">N° agrément</th>
                                            <th width="45%">Opérateurs</th>
                                            <th width="10%" class="text-center">Sigle</th>
                                            <th width="5%" class="text-center">Modules</th>
                                            <th width="5%" class="text-center">Formations</th>
                                            <th width="15%" class="text-center">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($operateurs as $operateur)
                                            @if (!empty($operateur?->numero_agrement))
                                                <tr>

                                                    <td>{{ $operateur?->numero_agrement }}</td>
                                                    <td>{{ $operateur?->user?->operateur }}</td>
                                                    <td style="text-align: center;">{{ $operateur?->user?->username }}</td>
                                                    <td style="text-align: center;">
                                                        @foreach ($operateur->operateurmodules as $operateurmodule)
                                                            @if ($loop->last)
                                                                <a href="#"><span
                                                                        class="badge bg-info">{{ $loop->count }}</span></a>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        @foreach ($operateur->formations as $formation)
                                                            @if ($loop->last)
                                                                <a href="#"><span
                                                                        class="badge bg-info">{{ $loop->count }}</span></a>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td style="text-align: center;"><span
                                                            class="{{ $operateur->statut_agrement }}">
                                                            {{ $operateur?->statut_agrement }}</span></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Rapport des ventes -->
                @endisset
            </div>
        </div>
        <div class="modal fade" id="generate_rapport" tabindex="-1" role="dialog" aria-labelledby="generate_rapportLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer un rapport operateurs par région</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('operateurs.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="region" class="form-label">Région<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="hidden" value="1" name="valeur_region">
                                                <select name="region"
                                                    class="form-select  @error('region') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-region-rapport"
                                                    data-placeholder="Choisir la région">
                                                    <option value="">Toutes</option>
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
                                                {{-- <input type="text" name="region" class="form-control region"> --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="statut" class="form-label">Statut<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="statut"
                                                    class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-statut-rapport"
                                                    data-placeholder="Choisir statut">
                                                    <option value="{{ old('statut') }}">
                                                        {{ old('statut') }}
                                                    </option>
                                                    <option value="agréer">
                                                        agréer
                                                    </option>
                                                    <option value="nouveau">
                                                        nouveau
                                                    </option>
                                                    <option value="rejeter">
                                                        rejeter
                                                    </option>
                                                    <option value="sous réserve">
                                                        sous réserve
                                                    </option>
                                                    <option value="retenu">
                                                        retenu
                                                    </option>
                                                    <option value="attente">
                                                        attente
                                                    </option>
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="generate_rapport_module" tabindex="-1" role="dialog"
            aria-labelledby="generate_rappor_moduleLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer un rapport operateurs par module</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('operateurs.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="module" class="form-label">Module<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="hidden" value="1" name="valeur_module">
                                                {{-- <input type="text" name="module" id="module_operateur"
                                                    class="form-control form-control-sm"
                                                    placeholder="Module ou spécialité" />
                                                <div id="moduleList"></div>
                                                {{ csrf_field() }} --}}
                                                <input type="text" name="module" placeholder="module..."
                                                    class="form-control form-control-sm module">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="region" class="form-label">Statut<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="statut"
                                                    class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-statut-rappor"
                                                    data-placeholder="Choisir statut">
                                                    <option value="{{ old('statut') }}">
                                                        {{ old('statut') }}
                                                    </option>
                                                    <option value="agréer">
                                                        agréer
                                                    </option>
                                                    <option value="nouveau">
                                                        nouveau
                                                    </option>
                                                    <option value="rejeter">
                                                        rejeter
                                                    </option>
                                                    <option value="sous réserve">
                                                        sous réserve
                                                    </option>
                                                    <option value="retenu">
                                                        retenu
                                                    </option>
                                                    <option value="attente">
                                                        attente
                                                    </option>
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="generate_rapport_module_region" tabindex="-1" role="dialog"
            aria-labelledby="generate_rappor_module_regionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer rapport opérateurs par module et région</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('operateurs.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="module" class="form-label">Module<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="text" name="module" id="module_operateur"
                                                    class="form-control form-control-sm"
                                                    placeholder="Module ou spécialité" />
                                                <div id="moduleList"></div>
                                                {{ csrf_field() }}
                                                {{-- <input type="text" name="module" placeholder="module..."
                                                    class="form-control form-control-sm module"> --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="region" class="form-label">Région<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="region"
                                                    class="form-select  @error('region') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-region-module-rapport"
                                                    data-placeholder="Choisir la région">
                                                    <option value="">Toutes</option>
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
                                                {{-- <input type="text" name="region" class="form-control region"> --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="region" class="form-label">Statut<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="statut"
                                                    class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-statut-rappo"
                                                    data-placeholder="Choisir statut">
                                                    <option value="{{ old('statut') }}">
                                                        {{ old('statut') }}
                                                    </option>
                                                    <option value="agréer">
                                                        agréer
                                                    </option>
                                                    <option value="nouveau">
                                                        nouveau
                                                    </option>
                                                    <option value="rejeter">
                                                        rejeter
                                                    </option>
                                                    <option value="sous réserve">
                                                        sous réserve
                                                    </option>
                                                    <option value="retenu">
                                                        retenu
                                                    </option>
                                                    <option value="attente">
                                                        attente
                                                    </option>
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
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
        new DataTable('#table-operateur', {
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

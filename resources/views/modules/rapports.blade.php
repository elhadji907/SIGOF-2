@extends('layout.user-layout')
@section('title', 'Générer rapport modules de formation')
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                @can('user-view')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Générer rapport modules</li>
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
        {{-- @isset($individuelles)
            <span class="page-title">{{ $title }}</span>
        @endisset --}}
        @can('rapport-operateur-view')
            <span class="d-flex align-items-baseline">
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#generate_rapport_module_region" title="Générer rapports">Générer rapport</a>
                {{-- <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    </ul>
                </div> --}}
            </span>
        @endcan
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @isset($individuelles)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <div class="table-responsive">
                                <table class="table datatables align-middle" id="table-operateur">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">CIN</th>
                                            <th>Prénom</th>
                                            <th>NOM</th>
                                            <th>Date naissance</th>
                                            <th>Lieu naissance</th>
                                            <th width="20%">Module</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($individuelles as $individuelle)
                                            @if (!empty($individuelle?->numero))
                                                <tr>
                                                    <td style="text-align: center">{{ $individuelle?->numero }}</td>
                                                    <td style="text-align: center">{{ $individuelle->user?->cin }}</td>
                                                    <td>{{ $individuelle->user?->firstname }}</td>
                                                    <td>{{ $individuelle->user?->name }}</td>
                                                    <td>{{ $individuelle->user->date_naissance?->format('d/m/Y') }}</td>
                                                    <td>{{ $individuelle->user->lieu_naissance }}</td>
                                                    <td>{{ $individuelle?->module?->name }}</td>
                                                    {{-- <td>{{ $individuelle?->departement?->nom }}</td> --}}
                                                    <td>
                                                        <span class="{{ $individuelle?->statut }}">
                                                            {{ $individuelle?->statut }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="d-flex align-items-baseline"><a
                                                                href="{{ route('individuelles.show', $individuelle->id) }}"
                                                                class="btn btn-primary btn-sm" title="voir détails"><i
                                                                    class="bi bi-eye"></i></a>
                                                        </span>
                                                    </td>
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
        <div class="modal fade" id="generate_rapport_module_region" tabindex="-1" role="dialog"
            aria-labelledby="generate_rappor_module_regionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer rapport modules demandés</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('modules.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="module" class="form-label">Module<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="text" name="module" value="{{ old('module_name') }}"
                                                    class="form-control form-control-sm @error('module_name') is-invalid @enderror"
                                                    id="module_name" placeholder="module..." autofocus>
                                                <div id="countryList"></div>
                                                {{ csrf_field() }}
                                                @error('module')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
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
                                                    <option value="nouvelle">
                                                        nouvelle
                                                    </option>
                                                    <option value="attente">
                                                        attente
                                                    </option>
                                                    <option value="retenu">
                                                        retenu
                                                    </option>
                                                    <option value="former">
                                                        former
                                                    </option>
                                                    <option value="rejeter">
                                                        rejeter
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

@extends('layout.user-layout')
@section('title', 'Générer rapport des formés')
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                @can('user-view')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Générer des rapports</li>
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
        @if (!empty($formes))
            <span class="page-title badge bg-primary">{{ $title }}</span>
        @endif
        @can('rapport-formes-view')
            <button type="button" class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#generate_rapport_module_region"></i>Générer rapport</button>
        @endcan
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @if (!empty($formes))
                    {{-- <div class="pb-2">
                        <span class="page-title badge bg-info">{{ $title }}</span>
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatables align-middle" id="table-formes">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">N°</th> --}}
                                            <th class="text-center">CIN</th>
                                            <th>Prénom</th>
                                            <th>NOM</th>
                                            <th>Date naissance</th>
                                            <th>Lieu naissance</th>
                                            <th width="20%">Module</th>
                                            {{-- <th class="text-center">Statut</th> --}}
                                            <th>Région</th>
                                            <th>Projet</th>
                                            <th class="text-center">Appréciation</th>
                                            <th class="text-center">Date</th>
                                            @can('rapport-suivi-formes-view')
                                                <th class="text-center" width="5%">Suivi</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($formes as $individuelle)
                                            @if (!empty($individuelle?->user?->cin))
                                                <tr>
                                                    {{-- <td style="text-align: center">{{ $i++ }}</td> --}}
                                                    <td style="text-align: center">{{ $individuelle?->user?->cin }}</td>
                                                    <td>{{ $individuelle?->user?->firstname }}</td>
                                                    <td>{{ $individuelle?->user?->name }}</td>
                                                    <td>{{ $individuelle?->user?->date_naissance?->format('d/m/Y') }}</td>
                                                    <td>{{ $individuelle?->user?->lieu_naissance }}</td>
                                                    <td>{{ $individuelle?->module?->name }}</td>
                                                    <td>{{ $individuelle?->region?->nom }}</td>
                                                    <td>{{ $individuelle?->projet?->sigle }}</td>
                                                    <td style="text-align: center">{{ $individuelle?->appreciation }}
                                                    </td>
                                                    {{--  <td>
                                                        <span class="{{ $individuelle->statut }}">
                                                            {{ $individuelle->statut }}
                                                        </span>
                                                    </td> --}}
                                                    <td style="text-align: center">
                                                        {{ date_format(date_create($individuelle?->formation?->date_debut), 'd/m/Y') }}
                                                    </td>
                                                    {{-- <td style="text-align: center">
                                                        {{ date_format(date_create($individuelle?->formation?->date_fin), 'd/m/Y') }}
                                                    </td> --}}
                                                    @can('rapport-suivi-formes-view')
                                                        <td>
                                                            @if (empty($individuelle?->suivi))
                                                                {{-- <button type="button"
                                                                    class="show_confirm_suivi btn btn-dark rounded-pill btn-sm float-center">Suivre</button> --}}
                                                                {{--  <button type="button"
                                                                    class="btn btn-dark rounded-pill btn-sm float-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#generate_suivi">Suivre</button> --}}
                                                                <form action="{{ route('SuivreFormes', $individuelle?->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button
                                                                        class="show_confirm_suivi btn btn-dark rounded-pill btn-sm float-center">Suivre</button>
                                                                </form>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-success rounded-pill btn-sm float-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#generate_suivi{{ $individuelle?->id }}">Suivi</button>

                                                                {{-- <button type="button"
                                                                    class="btn btn-success rounded-pill btn-sm float-center">Suivi</button> --}}
                                                            @endif
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Rapport des ventes -->
                @endif
            </div>
        </div>
        <div class="modal fade" id="generate_rapport_module_region" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapport_module_regionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer rapport formés</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('formes.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="from_date" class="form-label">De<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="date" name="from_date"
                                                    class="form-control form-control-sm @error('from_date') is-invalid @enderror from_date">
                                            </div>
                                            @error('from_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="from_date" class="form-label">À<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="date" name="to_date"
                                                    class="form-control form-control-sm @error('to_date') is-invalid @enderror to_date">
                                            </div>
                                            @error('to_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="module" class="form-label">Module</label>
                                                <input type="text" name="module" value="{{ old('module_name') }}"
                                                    class="form-control form-control-sm @error('module_name') is-invalid @enderror"
                                                    id="module_name" placeholder="Nom du module" autofocus>
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
                                                <label for="region" class="form-label">Région</label>
                                                <select name="region"
                                                    class="form-select  @error('region') is-invalid @enderror"
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
                                                <label for="projet" class="form-label">Projet</label>
                                                <select name="projet"
                                                    class="form-select  @error('projet') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-projet-module-rapport"
                                                    data-placeholder="Choisir projet">
                                                    <option value="">Toutes</option>
                                                    @foreach ($projets as $projet)
                                                        <option value="{{ $projet->sigle }}">
                                                            {{ $projet->sigle }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('projet')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
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
                    </form>
                </div>
            </div>
        </div>
        @if (!empty($formes))
            @foreach ($formes as $individuelle)
                <div class="modal fade" id="generate_suivi{{ $individuelle?->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="generate_suiviLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    {{ $individuelle?->user?->civilite . ' ' . $individuelle?->user?->firstname . ' ' . $individuelle?->user?->name }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="post" action="#">
                                @csrf
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                                    <div class="form-group">
                                                        @if (!empty($individuelle?->informations_suivi))
                                                            <h5><u><b>Informations</b></u>:</h5>
                                                            <label for="informations_suivi" class="form-label">
                                                                {{ $individuelle?->informations_suivi }}
                                                            </label>
                                                        @else
                                                            <div class="alert alert-info">Aucune
                                                                réponse à ce commentaire</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    {{-- <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-primary btn-block submit_rapport btn-sm">Enregistrer</button>
                                </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
@endsection

@push('scripts')
    <script>
        new DataTable('#table-formes', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            /* "order": [
                [0, 'ASC']
            ], */
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

@extends('layout.user-layout')
@section('title', 'Générer rapport demandes collectives')
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                @can('user-view')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Générer rapport demandes collectives</li>
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
        {{--  @isset($collectives)
            <span class="page-title">{{ $title }}</span>
        @endisset --}}
        @can('rapport-collective-view')
            <button type="button" class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#generate_rapport"></i>Générer un rapport</button>
        @endcan
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @isset($collectives)
                    {{-- <div class="pb-2">
                        <span class="page-title badge bg-info">{{ $title }}</span>
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <div class="table-responsive">
                                <table class="table datatables align-middle" id="table-collective">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom structure</th>
                                            <th>E-mail</th>
                                            <th>Téléphone</th>
                                            <th>Localité</th>
                                            <th class="text-center">Modules</th>
                                            <th class="text-center">Statut juridique</th>
                                            <th class="text-center">Effectif</th>
                                            <th class="text-center">Statut</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collectives as $collective)
                                            @if (!empty($collective?->numero))
                                                <tr>
                                                    <td>{{ $collective?->numero }}
                                                    </td>
                                                    <td>{{ $collective?->name }}
                                                        @isset($collective?->sigle)
                                                            {{ '(' . $collective?->sigle . ')' }}
                                                        @endisset
                                                    </td>
                                                    <td><a href="mailto:{{ $collective->email }}">{{ $collective->email }}</a>
                                                    </td>
                                                    <td><a
                                                            href="tel:+221{{ $collective->telephone }}">{{ $collective->telephone }}</a>
                                                    </td>
                                                    <td>{{ $collective->departement?->region?->nom }}</td>
                                                    <td class="text-center">{{ count($collective?->collectivemodules) }}</td>
                                                    <td class="text-center">{{ $collective?->statut_juridique }}</td>
                                                    <td class="text-center">{{ count($collective?->listecollectives) }}</td>
                                                    <td>
                                                        <span
                                                            class="{{ $collective?->statut_demande }}">{{ $collective?->statut_demande }}</span>
                                                    </td>
                                                    <td>{{ date_format(date_create($collective?->created_at), 'd/m/Y') }}
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
        <div class="modal fade" id="generate_rapport" tabindex="-1" role="dialog" aria-labelledby="generate_rapportLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer rapport demandes collectives</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('collectives.rapport') }}">
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
                                                <label for="to_date" class="form-label">À<span
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
                                            <label for="statut" class="form-label">Statut juridique</label>
                                            <div class="form-group">
                                                <select name="statut"
                                                    class="form-select  @error('statut') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-statut-collective"
                                                    data-placeholder="Choisir statut">
                                                    <option value="{{ old('statut') }}">
                                                        {{ old('statut') }}
                                                    </option>
                                                    <option value="GIE">
                                                        GIE
                                                    </option>
                                                    <option value="Association">
                                                        Association
                                                    </option>
                                                    <option value="Entreprise">
                                                        Entreprise
                                                    </option>
                                                    <option value="Institution publique">
                                                        Institution publique
                                                    </option>
                                                    <option value="Institution privée">
                                                        Institution privée
                                                    </option>
                                                    <option value="Autre">
                                                        Autre
                                                    </option>
                                                </select>
                                            </div>
                                            @error('statut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
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
        new DataTable('#table-collective', {
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

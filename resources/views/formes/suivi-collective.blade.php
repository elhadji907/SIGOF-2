@extends('layout.user-layout')
@section('title', $title)
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                @can('user-view')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Suivi des formé</li>
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
    {{-- <div class="d-flex justify-content-between align-items-center mt-3"> --}}
    <div class="align-items-center">
        <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('home') }}" class="btn btn-success btn-sm"
                title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
            <p> | Tableau de bord</p>
        </span>
        {{--  @can('rapport-formes-view')
            <button type="button" class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#generate_rapport_module_region"></i>Générer rapport suivi</button>
        @endcan --}}
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                <div class="pb-0">
                    @if (empty($formes))
                        <h4 class="card-title">Aucun bénéficiaire suivi pour le moment</h4>
                    @endif
                </div>
                @if (!empty($formes))
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <div class="table-responsive">
                                <table class="table datatables align-middle" id="table-formes">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col" class="text-center">N°</th>
                                            <th scope="col" class="text-center">CIN</th> --}}
                                            <th scope="col">Civilité</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Date naissance</th>
                                            <th scope="col">Lieu naissance</th>
                                            <th scope="col" width="5%">Téléphone</th>
                                            <th scope="col">Module</th>
                                            <th scope="col">Niveau étude</th>
                                            {{-- <th scope="col" class="text-center">Statut</th> --}}
                                            <th scope="col" class="text-center">Informations</th>
                                            <th class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($formes as $listecollective)
                                            @if (!empty($listecollective?->cin))
                                                <tr>
                                                    {{-- <td class="text-center">{{ $i++ }}</td>
                                                    <td class="text-center">{{ $listecollective?->cin }}</td> --}}
                                                    <td>{{ $listecollective?->civilite }}</td>
                                                    <td>{{ $listecollective?->prenom }}</td>
                                                    <td>{{ $listecollective?->nom }}</td>
                                                    <td>{{ $listecollective?->date_naissance->format('d/m/Y') }}
                                                    </td>
                                                    <td>{{ $listecollective?->lieu_naissance }}</td>
                                                    <td>{{ $listecollective?->telephone }}</td>
                                                    <td>{{ $listecollective?->collectivemodule?->module }}</td>
                                                    <td>{{ $listecollective?->niveau_etude }}</td>
                                                    {{-- <td class="text-center">
                                                        <span
                                                            class="{{ $listecollective?->statut }}">{{ $listecollective?->statut }}</span>
                                                    </td> --}}
                                                    <td class="text-center">{{ $listecollective?->informations_suivi }}
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-outline-primary btn-sm float-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#generate_suivi{{ $listecollective?->id }}"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @foreach ($formes as $listecollective)
            <div class="modal fade" id="generate_suivi{{ $listecollective?->id }}" tabindex="-1" role="dialog"
                aria-labelledby="generate_suiviLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ $listecollective?->civilite . ' ' . $listecollective?->prenom . ' ' . $listecollective?->nom }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('FormeColSuivi') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id"
                                                        value="{{ $listecollective?->id }}">
                                                    {{-- <label for="informations_suivi" class="form-label">Documenter</label> --}}
                                                    <textarea name="informations_suivi" id="informations_suivi" rows="5"
                                                        class="form-control form-control-sm @error('informations_suivi') is-invalid @enderror" placeholder="Ecrire ici...">{{ $listecollective?->informations_suivi ?? old('informations_suivi') }}</textarea>
                                                    @error('informations_suivi')
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
                                        class="btn btn-primary btn-block submit_rapport btn-sm">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection

@push('scripts')
    <script>
        new DataTable('#table-formes', {
            layout: {
                topStart: {
                    buttons: ['excel'],
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

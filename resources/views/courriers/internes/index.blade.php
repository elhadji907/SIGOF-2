@extends('layout.user-layout')
@section('title', 'ONFP - courriers internes')
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Liste des courriers internes</li>
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
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('courriers.index') }}"
                                class="btn btn-success btn-sm" title="retour"><i
                                    class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                        </span>
                        <div class="d-flex justify-content-between align-items-center mt-0">
                            <h5 class="card-title">{{ $title }}</h5>
                            <span class="d-flex align-items-baseline">
                                <a href="#" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                    data-bs-target="#addCourrierArrive" title="Ajouter">Ajouter</a>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li>
                                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#generate_rapport"></i>Rechercher
                                                plus</button>
                                        </li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        @isset($internes)
                            <table class="table datatables align-middle" id="table-internes">
                                <thead>
                                    <tr>
                                        <th class="text-center" width='8%'>N°</th>
                                        <th class="text-center" width='12%'>Date arrivé</th>
                                        <th>Expéditeur</th>
                                        <th>Objet</th>
                                        <th width='2%'>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($internes as $interne)
                                        <tr>
                                            <td style="text-align: center;">{{ $interne?->numero }}</td>
                                            <td style="text-align: center;">
                                                {{ $interne?->courrier?->date_recep?->format('d/m/Y') }} </td>
                                            <td>{{ $interne?->courrier?->expediteur }}</td>
                                            <td>{{ $interne?->courrier?->objet }}</td>
                                            <td>
                                                <span class="d-flex align-items-baseline"><a href="#"
                                                        class="btn btn-success btn-sm" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li><a class="dropdown-item btn btn-sm"
                                                                    href="{{ route('internes.edit', $interne?->id) }}"
                                                                    class="mx-1"><i class="bi bi-pencil"></i> Modifier</a>
                                                            </li>
                                                            @can('interne-delete')
                                                                <li>
                                                                    <form action="{{ route('internes.destroy', $interne?->id) }}"
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addCourrierArrive" tabindex="-1" role="dialog"
            aria-labelledby="addCourrierArriveLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    
                    <div class="card-header text-center bg-gradient-default">
                        <h1 class="h4 text-black mb-0">Ajouter un nouveau courrier interne</h1>
                    </div>
                    {{-- <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau courrier interne</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> --}}
                    <form method="post" action="{{ route('internes.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="date_arrivee" class="form-label">Date arrivée<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_arrivee" value="{{ old('date_arrivee') }}"
                                        class="form-control form-control-sm @error('date_arrivee') is-invalid @enderror"
                                        id="date_arrivee" placeholder="Date arrivée">
                                    @error('date_arrivee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="numero_interne" class="form-label">Numéro<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_interne"
                                            value="{{ $numCourrier ?? old('numero_interne') }}"
                                            class="form-control form-control-sm @error('numero_interne') is-invalid @enderror"
                                            id="numero_interne" placeholder="Numéro de correspondance">
                                        @error('numero_interne')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_correspondance" class="form-label">Date correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_correspondance"
                                        value="{{ old('date_correspondance') }}"
                                        class="form-control form-control-sm @error('date_correspondance') is-invalid @enderror"
                                        id="date_correspondance" placeholder="nom">
                                    @error('date_correspondance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_correspondance" class="form-label">Numéro correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="text" min="0" name="numero_correspondance"
                                            value="{{ old('numero_correspondance') }}"
                                            class="form-control form-control-sm @error('numero_correspondance') is-invalid @enderror"
                                            id="numero_correspondance" placeholder="Numéro de correspondance">
                                        @error('numero_correspondance')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="annee" class="form-label">Année<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="2024" name="annee"
                                        value="{{ $anneeEnCours ?? old('annee') }}"
                                        class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                        id="annee" placeholder="Année">
                                    @error('annee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="expediteur" class="form-label">Expéditeur<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="expediteur" id="expediteur" rows="1"
                                        class="form-control form-control-sm @error('expediteur') is-invalid @enderror" placeholder="Expéditeur">{{ old('expediteur') }}</textarea>
                                    @error('expediteur')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="objet" id="objet" rows="1"
                                        class="form-control form-control-sm @error('objet') is-invalid @enderror" placeholder="Objet">{{ old('objet') }}</textarea>
                                    @error('objet')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="reference" class="form-label">Référence</label>
                                    <input type="text" name="reference" value="{{ old('reference') }}"
                                        class="form-control form-control-sm @error('reference') is-invalid @enderror"
                                        id="reference" placeholder="Référence">
                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_reponse" class="form-label">Numéro réponse</label>
                                    <input type="number" min="0" name="numero_reponse"
                                        value="{{ old('numero_reponse') }}"
                                        class="form-control form-control-sm @error('numero_reponse') is-invalid @enderror"
                                        id="numero_reponse" placeholder="Numéro réponse">
                                    @error('numero_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                {{--  <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_reponse" class="form-label">Date réponse</label>
                                    <input type="date" min="0" name="date_reponse"
                                        value="{{ old('date_reponse') }}"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror"
                                        id="date_reponse" placeholder="Numéro réponse">
                                    @error('date_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="observation" class="form-label">Observations</label>
                                    <textarea name="observation" id="observation" rows="1"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ old('observation') }}</textarea>
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

        <div class="modal fade" id="generate_rapport" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapportLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer une recherche<span class="text-danger mx-1">*</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('internes.report') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="numero" class="form-label">Numero</label>
                                                <input type="text" name="numero" value="{{ old('numero') }}"
                                                    class="form-control form-control-sm @error('numero') is-invalid @enderror"
                                                    id="numero" placeholder="Numero">
                                                @error('numero')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="objet" class="form-label">Objet</label>
                                                <input type="text" name="objet" value="{{ old('objet') }}"
                                                    class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                                    id="objet" placeholder="Objet">
                                                @error('objet')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="expediteur" class="form-label">Expéditeur</label>
                                                <input type="text" name="expediteur" value="{{ old('expediteur') }}"
                                                    class="form-control form-control-sm @error('expediteur') is-invalid @enderror"
                                                    id="expediteur" placeholder="Expéditeur">
                                                @error('expediteur')
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Rechercher</button>
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
        new DataTable('#table-internes', {
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

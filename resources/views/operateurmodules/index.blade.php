@extends('layout.user-layout')
@section('title', 'ONFP - Liste des opérateurs')
@section('space-work')

    <section class="section register">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
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
                        <h5 class="card-title">Liste des modules opérateurs</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatables table-bordered table-hover align-middle justify-content-center" id="table-operateurModules">
                            <thead>
                                <tr>
                                    <th class="text-center">DOMAINE</th>
                                    <th class="text-center">MODULE</th>
                                    <th class="text-center">CATEGORIE</th>
                                    <th class="text-center">QUALIFICATION</th>
                                    <th class="text-center">OPERATEUR</th>
                                    <th class="text-center">STATUT</th>
                                    {{-- <th>Formations</th> --}}
                                    <th class="text-center"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($operateurmodules as $operateurmodule)
                                    <tr>
                                        <td style="text-align: center;">{{ $operateurmodule?->domaine }}</td>
                                        <td style="text-align: center;">{{ $operateurmodule?->module }}</td>
                                        <td style="text-align: center;">{{ $operateurmodule?->categorie }}</td>
                                        <td style="text-align: center;">{{ $operateurmodule?->niveau_qualification }}</td>
                                        <td style="text-align: center;">{{ $operateurmodule?->operateur?->user?->username }}</td>
                                        <td style="text-align: center;">
                                            <span
                                                class="{{ $operateurmodule?->statut }}">{{ $operateurmodule?->statut }}</span>
                                        </td>                                        
                                        <td>
                                            <span class="d-flex align-items-baseline justify-content-center"><a
                                                    href="{{ route('operateurmodules.show', $operateurmodule->id) }}"
                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li>
                                                            <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditOperateurmoduleModal{{ $operateurmodule->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button>
                                                        </li>
                                                        {{-- <li>
                                                            <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#myModal{{ $operateurmodule->id }}">
                                                                <i class="bi bi-trash" title="Supprimer"></i> Supprimer
                                                            </button>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </span>
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

        <!-- Edit Operateur Module -->
        @foreach ($operateurmodules as $operateurmodule)
            <div class="modal fade" id="EditOperateurmoduleModal{{ $operateurmodule->id }}" tabindex="-1" role="dialog"
                aria-labelledby="EditOperateurmoduleModalLabel{{ $operateurmodule->id }}" aria-hidden="true">
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
                                <input type="hidden" name="operateur" value="{{ $operateurmodule->operateur->id }}">
                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="module" class="form-label">Module<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="module"
                                        value="{{ $operateurmodule->module ?? old('module') }}"
                                        class="form-control form-control-sm @error('module') is-invalid @enderror"
                                        placeholder="module">
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
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Edit Operateur Module-->
        <!-- The Modal Delete -->
        @foreach ($operateurmodules as $operateurmodule)
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
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                        Non</button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Oui
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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

@extends('layout.user-layout')
@section('title', 'ONFP - Formations '.$onfpevaluateur?->name)
@section('space-work')

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
                        <div class="pt-0">
                            {{-- <a href="#" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-plus" title="Ajouter"></i> Ajouter</a> --}}
                            <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                                data-bs-target="#AddFormationModal">
                                <i class="bi bi-folder-plus" title="Ajouter"></i>
                            </button>
                        </div>
                        <h5 class="card-title">Liste des formations de {{ $onfpevaluateur->name }}</h5>
                        {{-- <p>Le tableau des demandes formations</p> --}}
                        <!-- Table with stripped rows -->
                        <table class="table datatables" id="table-formations">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Intitulé formation</th>
                                    <th>Localité</th>
                                    <th>Modules</th>
                                    {{-- <th>Niveau qualification</th> --}}
                                    {{-- <th>Effectif</th> --}}
                                    <th class="text-center">Statut</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($onfpevaluateur->formations as $formation)
                                    <tr>
                                        <td>{{ $formation?->code }}</td>
                                        <td><a href="#">{{ $formation->types_formation?->name }}</a></td>
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
                                        <td class="text-center"><a href="#"><span
                                                    class="{{ $formation?->statut }}">{{ $formation?->statut }}</span></a>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-baseline"><a
                                                    href="{{ route('onfpevaluateurs.show', $onfpevaluateur->id) }}"
                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li>
                                                            <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditonfpevaluateurModal{{ $onfpevaluateur->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button>
                                                        </li>
                                                       {{--  <li>
                                                            <form
                                                                action="{{ route('onfpevaluateurs.destroy', $onfpevaluateur->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item show_confirm"
                                                                    title="Supprimer"><i
                                                                        class="bi bi-trash"></i>Supprimer</button>
                                                            </form>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="AddFormationModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ route('formations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Créer une nouvelle
                                    formation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12 col-lg-12 mb-0">
                                        <label for="name" class="form-label">Intitulé formation<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="name" id="name" rows="1"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Intitulé formation">{{ old('name') }}</textarea>
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
                                            aria-label="Select" id="select-field-departement-modal"
                                            data-placeholder="Choisir département">
                                            <option value="">
                                                {{ old('departement') }}
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
                                            aria-label="Select" id="select-field-types_formation"
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
                                            aria-label="Select" id="select-field-niveau_qualification"
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
                                <div class="modal-footer mt-5">
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
        </div>

        <!-- Edit onfpevaluateur -->
        @foreach ($onfpevaluateurs as $onfpevaluateur)
            <div class="modal fade" id="EditonfpevaluateurModal{{ $onfpevaluateur->id }}" tabindex="-1" role="dialog"
                aria-labelledby="EditonfpevaluateurModalLabel{{ $onfpevaluateur->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('onfpevaluateurs.update', $onfpevaluateur->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="modal-header" id="EditonfpevaluateurModalLabel{{ $onfpevaluateur->id }}">
                                <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier région</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="id" value="{{ $onfpevaluateur->id }}">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="matricule"
                                        value="{{ $onfpevaluateur->matricule ?? old('matricule') }}"
                                        class="form-control form-control-sm @error('matricule') is-invalid @enderror"
                                        id="matricule" placeholder="Matricule" autofocus>
                                    @error('matricule')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Matricule</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ $onfpevaluateur->name ?? old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" placeholder="Ingénieur" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Ingénieur<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="initiale" value="{{ $onfpevaluateur->initiale ?? old('initiale') }}"
                                        class="form-control form-control-sm @error('initiale') is-invalid @enderror"
                                        id="initiale" placeholder="initiale">
                                    @error('initiale')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Initiale<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="specialite"
                                        value="{{ $onfpevaluateur->specialite ?? old('specialite') }}"
                                        class="form-control form-control-sm @error('specialite') is-invalid @enderror"
                                        id="specialite" placeholder="specialite">
                                    @error('specialite')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Spécialité</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="fonction"
                                        value="{{ $onfpevaluateur->fonction ?? old('fonction') }}"
                                        class="form-control form-control-sm @error('fonction') is-invalid @enderror"
                                        id="fonction" placeholder="fonction">
                                    @error('specialite')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Fonction<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" value="{{ $onfpevaluateur->email ?? old('email') }}"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        id="email" placeholder="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Email<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="telephone"
                                        value="{{ $onfpevaluateur->telephone ?? old('telephone') }}"
                                        class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                        id="telephone" placeholder="Telephone">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Telephone<span class="text-danger mx-1">*</span></label>
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
        <!-- End Edit onfpevaluateur-->
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

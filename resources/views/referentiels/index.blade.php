@extends('layout.user-layout')
@section('title', 'ONFP - Liste des referentiels')
@section('space-work')
    @can('referentiel-view')
        <section class="section register">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                                <li class="breadcrumb-item">Tables</li>
                                <li class="breadcrumb-item active">Données</li>
                            </ol>
                        </nav>
                    </div>
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
                            @can('referentiel-create')
                                <div class="pt-1">
                                    <button type="button" class="btn btn-primary btn-sm float-end btn-rounded"
                                        data-bs-toggle="modal" data-bs-target="#AddRefModal">Ajouter
                                    </button>
                                </div>
                            @endcan
                            <h5 class="card-title">Référentiels</h5>
                            <table class="table datatables align-middle justify-content-center" id="table-files">
                                <thead>
                                    <tr>
                                        {{-- <th width="5%" class="text-center">N°</th> --}}
                                        <th width="18%">Niveau qualif.</th>
                                        <th>Titre</th>
                                        <th>Catégorie</th>
                                        <th>Convention</th>
                                        <th width="35%">Référence</th>
                                        <th width="2%" class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($referentiels as $referentiel)
                                        <tr>
                                            {{-- <td style="text-align: center;">{{ $i++ }}</td> --}}
                                            <td>{{ $referentiel?->intitule }}</td>
                                            <td>{{ $referentiel?->titre }}</td>
                                            <td>{{ $referentiel?->categorie }}</td>
                                            <td>{{ $referentiel?->convention?->name }}</td>
                                            <td>{{ $referentiel?->reference }}</td>
                                            <td style="text-align: center;">
                                                @can('referentiel-show')
                                                    <span class="d-flex align-items-baseline"><a href="#"
                                                            class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                            <i class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('referentiel-update')
                                                                    <li>
                                                                        <a class="dropdown-item btn btn-sm mx-1"
                                                                            href="{{ route('referentiels.edit', $referentiel->id) }}"
                                                                            class="mx-1"><i class="bi bi-pencil"></i> Modifier</a>
                                                                        {{-- <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditFileModal{{ $referentiel->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button> --}}
                                                                    </li>
                                                                @endcan
                                                                @can('referentiel-delete')
                                                                    <li>
                                                                        <form action="{{ url('referentiels', $referentiel->id) }}"
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
            <div class="modal fade" id="AddRefModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ url('referentiels') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un nouveau référentiel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="intitule" class="form-label">Intitulé<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="intitule" id="intitule" rows="1"
                                            class="form-control form-control-sm @error('intitule') is-invalid @enderror" placeholder="Intitulé">{{ old('intitule') }}</textarea>
                                        @error('intitule')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="titre" class="form-label">Titre<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="titre" id="titre" rows="1"
                                            class="form-control form-control-sm @error('titre') is-invalid @enderror" placeholder="Titre">{{ old('titre') }}</textarea>
                                        @error('titre')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="categorie" class="form-label">Catégorie<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="categorie" id="category" rows="1"
                                            class="form-control form-control-sm @error('categorie') is-invalid @enderror" placeholder="Catégorie">{{ old('categorie') }}</textarea>
                                        @error('categorie')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="convention" class="form-label">Convention<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="convention"
                                            class="form-select  @error('convention') is-invalid @enderror" aria-label="Select"
                                            id="select-field-convention" data-placeholder="Choisir convention">
                                            <option value="{{ old('convention') }}">{{ old('convention') }}</option>
                                            @foreach ($conventions as $convention)
                                                <option value="{{ $convention->name }}">
                                                    {{ $convention->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('convention')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="reference" class="form-label">Référence<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="reference" id="reference" rows="2"
                                            class="form-control form-control-sm @error('reference') is-invalid @enderror" placeholder="Référence">{{ old('reference') }}</textarea>
                                        @error('reference')
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
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- @foreach ($referentiels as $referentiel)
            <div class="modal fade" id="EditFileModal{{ $referentiel?->id }}" tabindex="-1" role="dialog"
                aria-labelledby="EditFileModalLabel{{ $referentiel?->id }}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ route('referentiels.update', $referentiel?->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="modal-header" id="EditFileModalLabel{{ $referentiel?->id }}">
                                <h5 class="modal-title">Modification du référentiel {{ $referentiel?->intitule }}
                                </h5>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{ $referentiel?->id }}">

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="intitule" class="form-label">Intitulé<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="intitule" id="intitule" rows="1"
                                        class="form-control form-control-sm @error('intitule') is-invalid @enderror" placeholder="Intitulé">{{ $referentiel?->intitule ?? old('intitule') }}</textarea>
                                    @error('intitule')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="titre" class="form-label">Titre<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="titre" id="titre" rows="1"
                                        class="form-control form-control-sm @error('titre') is-invalid @enderror" placeholder="Titre">{{ $referentiel?->titre ?? old('titre') }}</textarea>
                                    @error('titre')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="categorie" class="form-label">Catégorie<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="categorie" id="category" rows="1"
                                        class="form-control form-control-sm @error('categorie') is-invalid @enderror" placeholder="Catégorie">{{ $referentiel?->categorie ?? old('categorie') }}</textarea>
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="convention" class="form-label">Convention<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="convention"
                                        class="form-select  @error('convention') is-invalid @enderror" aria-label="Select"
                                        id="select-field-convention-update" data-placeholder="Choisir la localité">
                                        <option value="{{ $referentiel?->convention?->name ?? old('convention') }}">{{ $referentiel?->convention?->name ?? old('convention') }}</option>
                                        @foreach ($conventions as $convention)
                                            <option value="{{ $convention->name }}">
                                                {{ $convention->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('convention')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="reference" class="form-label">Référence<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="reference" id="reference" rows="2"
                                        class="form-control form-control-sm @error('reference') is-invalid @enderror" placeholder="Référence">{{ $referentiel?->reference ?? old('reference') }}</textarea>
                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}
        </section>
    @endcan

@endsection
@push('scripts')
    <script>
        new DataTable('#table-files', {
            layout: {
                topStart: {
                    buttons: ['excel'],
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

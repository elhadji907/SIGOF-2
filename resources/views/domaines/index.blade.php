@extends('layout.user-layout')
@section('title', 'ONFP - Liste des domaines')
@section('space-work')
    @can('domaine-view')
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
                            @can('domaine-create')
                                <button type="button" class="btn btn-primary btn-sm float-end btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#AddIndividuelModal">
                                    <i class="bi bi-person-plus" title="Ajouter"></i>
                                </button>
                            @endcan
                            <h5 class="card-title">Domaines</h5>
                            <table class="table datatables align-middle justify-content-center" id="table-domaines">
                                <thead>
                                    <tr>
                                        <th>Domaine</th>
                                        <th>Secteur</th>
                                        <th class="text-center" scope="col">Effectif</th>
                                        <th class="text-center" scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($domaines as $domaine)
                                        <tr>
                                            <td>{{ $domaine->name }}</td>
                                            <td>{{ $domaine?->secteur?->name }}</td>
                                            <td style="text-align: center;">
                                                @foreach ($domaine->modules as $module)
                                                    @if ($loop->last)
                                                        <a href="{{ url('domaines/' . $domaine->id) }}"><span
                                                                class="badge bg-info">{{ $loop->count }}</span></a>
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td style="text-align: center;">
                                                @can('domaine-create')
                                                    <span class="d-flex mt-2 align-items-baseline"><a
                                                            href="{{ url('domaines/' . $domaine->id) }}"
                                                            class="btn btn-success btn-sm mx-1" title="Voir détails">
                                                            <i class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('domaine-create')
                                                                    <li>
                                                                        <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditRegionModal{{ $domaine->id }}">
                                                                            <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                        </button>
                                                                    </li>
                                                                @endcan
                                                                @can('domaine-create')
                                                                    <li>
                                                                        <form action="{{ url('domaines', $domaine->id) }}"
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

            <div class="modal fade" id="AddIndividuelModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ url('addDomaine') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un nouveau domaine
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                                        placeholder="Nom du domaine" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Domaine</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="secteur" class="form-select  @error('secteur') is-invalid @enderror"
                                        aria-label="Select" id="select-field-secteur-indiv" data-placeholder="Choisir secteur">
                                        <option value="">
                                            {{ old('secteur') }}
                                        </option>
                                        @foreach ($secteurs as $secteur)
                                            <option value="{{ $secteur->id }}">
                                                {{ $secteur->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('secteur')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Secteur</label>
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
            @foreach ($domaines as $domaine)
                <div class="modal fade" id="EditRegionModal{{ $domaine->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="EditRegionModalLabel{{ $domaine->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="{{ route('domaines.update', $domaine->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="modal-header" id="EditRegionModalLabel{{ $domaine->id }}">
                                    <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier domaine
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $domaine->id }}">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" value="{{ $domaine->name ?? old('name') }}"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                            id="name" placeholder="domaine" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                        <label for="floatingInput">domaine</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select name="secteur" class="form-select  @error('secteur') is-invalid @enderror"
                                            aria-label="Select" id="select-field-domaine" data-placeholder="Choisir domaine">
                                            <option value="{{ $domaine?->secteur?->id }}">
                                                {{ $domaine?->secteur?->name ?? old('secteur') }}
                                            </option>
                                            @foreach ($secteurs as $secteur)
                                                <option value="{{ $secteur->id }}">
                                                    {{ $secteur->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('secteur')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                        <label for="floatingInput">Secteur</label>
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
        </section>
    @endcan
@endsection
@push('scripts')
    <script>
        new DataTable('#table-domaines', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [2, 'desc']
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

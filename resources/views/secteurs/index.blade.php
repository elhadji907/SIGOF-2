@extends('layout.user-layout')
@section('title', 'ONFP - Liste des secteurs')
@section('space-work')
    @can('secteur-view')
        <section class="section register">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
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
                            {{-- @can('role-create') --}}
                            <div class="pt-1">
                                {{-- <a href="{{ route('secteurs.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-person-plus" title="Ajouter"></i> </a> --}}
                                @can('secteur-create')
                                    <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                                        data-bs-target="#AddSecteurModal">
                                        <i class="bi bi-person-plus" title="Ajouter"></i>
                                    </button>
                                @endcan
                            </div>
                            {{-- @endcan --}}
                            <h5 class="card-title">Secteurs</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatables align-middle justify-content-center" id="table-secteurs">
                                <thead>
                                    <tr>
                                        <th class="text-center"  width="5%">N°</th>
                                        <th width="80%">Secteurs</th>
                                        <th class="text-center"  width="15%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($secteurs as $secteur)
                                        <tr>
                                            <td style="text-align: center;">{{ $i++ }}</td>
                                            <td>{{ $secteur->name }}</td>
                                            <td style="text-align: center;">
                                                @can('secteur-show')
                                                    <span class="d-flex mt-2 align-items-baseline"><a href="#"
                                                            class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                            <i class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('secteur-update')
                                                                    <li>
                                                                        <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditSecteurModal{{ $secteur->id }}">
                                                                            <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                        </button>
                                                                    </li>
                                                                @endcan
                                                                @can('secteur-delete')
                                                                    <li>
                                                                        <form action="{{ url('secteurs', $secteur->id) }}"
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
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- Add secteur -->
            <div class="modal fade" id="AddSecteurModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{-- <form method="POST" action="{{ route('addsecteur') }}">
                        @csrf --}}
                        <form method="post" action="{{ url('secteurs') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un secteur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="secteur" value="{{ old('secteur') }}"
                                        class="form-control form-control-sm @error('secteur') is-invalid @enderror"
                                        id="secteur" placeholder="Nom secteur" autofocus>
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
            <!-- End Add secteur-->

            <!-- Edit secteur -->
            @foreach ($secteurs as $secteur)
                <div class="modal fade" id="EditSecteurModal{{ $secteur->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="EditSecteurModalLabel{{ $secteur->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{-- <form method="POST" action="{{ route('updatesecteur') }}">
                            @csrf --}}
                            <form method="post" action="{{ route('secteurs.update', $secteur->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="modal-header" id="EditSecteurModalLabel{{ $secteur->id }}">
                                    <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier Secteur
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $secteur->id }}">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" value="{{ $secteur->name ?? old('name') }}"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                            id="name" placeholder="Secteur" autofocus>
                                        @error('name')
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
            <!-- End Add secteur-->
        </section>
    @endcan

@endsection
@push('scripts')
    <script>
        new DataTable('#table-secteurs', {
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

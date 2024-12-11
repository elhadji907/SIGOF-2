@extends('layout.user-layout')
@section('title', 'ONFP - Liste des fichiers')
@section('space-work')

    <section class="section register">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
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
                            {{-- <a href="{{ route('files.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-person-plus" title="Ajouter"></i> </a> --}}

                            <button type="button" class="btn btn-primary btn-sm float-end btn-rounded"
                                data-bs-toggle="modal" data-bs-target="#AddFileModal">Ajouter
                            </button>
                        </div>
                        {{-- @endcan --}}
                        <h5 class="card-title">Fichiers</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatables align-middle justify-content-center" id="table-files">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center" scope="col">N°</th>
                                    <th>Légende</th>
                                    <th>Sigle</th>
                                    <th>File</th>
                                    <th>User</th>
                                    <th width="2%" class="text-center" scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($files as $file)
                                    <tr>
                                        <td style="text-align: center;">{{ $i++ }}</td>
                                        <td>{{ $file?->legende }}</td>
                                        <td>{{ $file?->sigle }}</td>
                                        <td>
                                            @if (!empty($file?->file))
                                                <a class="btn btn-default btn-sm" title="télécharger le fichier joint"
                                                    target="_blank" href="{{ asset($file?->getFichier()) }}">
                                                    <i class="bi bi-download"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $file?->user?->firstname . ' ' . $file?->user?->name }}
                                            @if (!empty($file?->user?->cin))
                                                {{ ' (' . $file?->user?->cin . ')' }}
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <span class="d-flex mt-2 align-items-baseline"><a href="#"
                                                    class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                    <i class="bi bi-eye"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li>
                                                            <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditFileModal{{ $file->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('files', $file->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item show_confirm"><i
                                                                        class="bi bi-trash"></i>Supprimer</button>
                                                            </form>
                                                        </li>
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
        <!-- Add file -->
        <div class="modal fade" id="AddFileModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="{{ url('files') }}" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un file</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="legende" class="form-label">Légende<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="legende" class="form-select  @error('legende') is-invalid @enderror"
                                        aria-label="Select" id="select-field-legende-add" data-placeholder="Choisir">
                                        <option value="{{ old('legende') }}">{{ old('legende') }}</option>
                                        @foreach ($files as $file)
                                            <option value="{{ $file?->legende }}">
                                                {{ $file?->legende }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('legende')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="user" class="form-label">Utilisateur<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="user" class="form-select  @error('user') is-invalid @enderror"
                                        aria-label="Select" id="select-field-user-add" data-placeholder="Choisir">
                                        <option value="{{ old('user') }}">{{ old('user') }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user?->id }}">
                                                {{ $user?->firstname . ' ' . $user?->name }}
                                                @if (!@empty($user?->cin))
                                                    {{ ' (' . $user?->cin . ')' }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
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
        <!-- End Add file-->

        <!-- Edit file -->
        @foreach ($files as $file)
            <div class="modal fade" id="EditFileModal{{ $file->id }}" tabindex="-1" role="dialog"
                aria-labelledby="EditFileModalLabel{{ $file->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('files.update', $file->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="modal-header" id="EditFileModalLabel{{ $file->id }}">
                                <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier file
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{ $file->id }}">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ $file->name ?? old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" placeholder="file" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">file</label>
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
        <!-- End Add file-->
    </section>

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

@extends('layout.user-layout')
@section('title', 'ONFP - Liste des evaluateurs')
@section('space-work')
    <section class="section register">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10">
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
                        {{-- @can('role-create') --}}
                        <div class="pt-0">
                            {{-- <a href="{{ route('evaluateurs.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-person-plus" title="Ajouter"></i> </a> --}}
                            @can('evaluateur-create')
                                <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#AddevaluateurModal">
                                    <i class="bi bi-person-plus" title="Ajouter"></i>
                                </button>
                            @endcan
                        </div>
                        {{-- @endcan --}}
                        <h5 class="card-title">Evaluateurs</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatables align-middle justify-content-center" id="table-evaluateurs">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center" scope="col">N°</th>
                                    <th>Matricule</th> --}}
                                    <th>Name</th>
                                    <th>Fonction</th>
                                    {{-- <th>Spécialité</th> --}}
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Formations</th>
                                    <th class="text-center" scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($evaluateurs as $evaluateur)
                                    <tr>
                                        {{-- <td style="text-align: center;">{{ $i++ }}</td>
                                        <td>{{ $evaluateur->matricule }}</td> --}}
                                        <td>{{ $evaluateur->name }}</td>
                                        <td>{{ $evaluateur->fonction }}</td>
                                        {{-- <td>{{ $evaluateur->specialite }}</td> --}}
                                        <td><a href="mailto:{{ $evaluateur->email }}">{{ $evaluateur->email }}</a></td>
                                        <td><a href="tel:+221{{ $evaluateur->telephone }}">{{ $evaluateur->telephone }}</a>
                                        </td>
                                        <td>{{ $evaluateur->adresse }}</td>
                                        <td style="text-align: center;">
                                            @foreach ($evaluateur->formations as $formation)
                                                @if ($loop->last)
                                                    <a class="text-primary fw-bold"
                                                        href="#">{!! $loop->count ?? '0' !!}</a>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td style="text-align: center;">
                                            @can('evaluateur-show')
                                                <span class="d-flex mt-2 align-items-baseline"><a
                                                        href="{{ route('evaluateurs.show', $evaluateur->id) }}"
                                                        class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                        <i class="bi bi-eye"></i></a>
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            @can('evaluateur-update')
                                                                <li>
                                                                    <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#EditevaluateurModal{{ $evaluateur->id }}">
                                                                        <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                    </button>
                                                                </li>
                                                            @endcan
                                                            @can('evaluateur-delete')
                                                                <li>
                                                                    <form action="{{ url('evaluateurs', $evaluateur->id) }}"
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
        <!-- Add evaluateur -->
        <div class="modal fade" id="AddevaluateurModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {{-- <form method="POST" action="{{ route('addevaluateur') }}">
                        @csrf --}}
                    <form method="post" action="{{ url('evaluateurs') }}" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i>Ajouter un évaluateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nom évaluateur" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Evaluateur<span class="text-danger mx-1">*</span></label>
                            </div>
                            {{-- <div class="form-floating mb-3">
                                <input type="text" name="specialite" value="{{ old('specialite') }}"
                                    class="form-control form-control-sm @error('specialite') is-invalid @enderror"
                                    id="specialite" placeholder="specialite">
                                @error('specialite')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Spécialité</label>
                            </div> --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="fonction" value="{{ old('fonction') }}"
                                    class="form-control form-control-sm @error('fonction') is-invalid @enderror"
                                    id="fonction" placeholder="fonction">
                                @error('fonction')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Fonction<span class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="email" value="{{ old('email') }}"
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
                                <input type="number" name="telephone" min="0" value="{{ old('telephone') }}"
                                    class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                    id="telephone" placeholder="7xxxxxxxx">
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Telephone<span class="text-danger mx-1">*</span></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="adresse" value="{{ old('adresse') }}"
                                    class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                    id="adresse" placeholder="adresse">
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Adresse<span class="text-danger mx-1">*</span></label>
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
        <!-- End Add evaluateur-->

        <!-- Edit evaluateur -->
        @foreach ($evaluateurs as $evaluateur)
            <div class="modal fade" id="EditevaluateurModal{{ $evaluateur->id }}" tabindex="-1" role="dialog"
                aria-labelledby="EditevaluateurModalLabel{{ $evaluateur->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="{{ route('evaluateurs.update', $evaluateur->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="modal-header" id="EditevaluateurModalLabel{{ $evaluateur->id }}">
                                <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier évaluateur
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="id" value="{{ $evaluateur->id }}">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ $evaluateur->name ?? old('name') }}"
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
                                    <input type="text" name="fonction"
                                        value="{{ $evaluateur->fonction ?? old('fonction') }}"
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
                                    <input type="text" name="email"
                                        value="{{ $evaluateur->email ?? old('email') }}"
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
                                    <input type="number" min="0" name="telephone"
                                        value="{{ $evaluateur->telephone ?? old('telephone') }}"
                                        class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                        id="telephone" placeholder="7xxxxxxxx">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Telephone<span class="text-danger mx-1">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="adresse"
                                        value="{{ $evaluateur->adresse ?? old('adresse') }}"
                                        class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                        id="adresse" placeholder="adresse">
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Adresse<span class="text-danger mx-1">*</span></label>
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
        <!-- End Edit evaluateur-->
    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-evaluateurs', {
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

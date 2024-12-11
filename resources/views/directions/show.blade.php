@extends('layout.user-layout')
@section('title', $direction->name)
@section('space-work')

    <section
        class="section profile min-vh-0 d-flex flex-column align-items-center justify-content-center py-0 section profile">
        <div class="container">
            <div class="pagetitle">
                {{-- <h1>Data Tables</h1> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active">{{ $direction?->name }}</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row justify-content-center">
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
                <div class="flex items-center gap-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <span class="nav-link"><a href="{{ route('directions.index', $direction->id) }}"
                                            class="btn btn-secondary btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>
                                    </span>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Direction</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#module-overview">Agents
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#references-overview">Chef</button>
                                </li>

                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                            {{-- Détail Direction --}}
                            <div class="tab-content pt-0">
                                <div class="tab-pane fade profile-overview" id="profile-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Direction</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Direction</div>
                                            <div class="col-lg-9 col-md-8">{{ $direction?->name }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Sigle</div>
                                            <div class="col-lg-9 col-md-8">{{ $direction?->sigle }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Type</div>
                                            <div class="col-lg-9 col-md-8">{{ $direction?->type }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Chef</div>
                                            <div class="col-lg-9 col-md-8">
                                                {{ $direction?->chef?->user?->firstname . ' ' . $direction?->chef?->user?->name }}
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            {{-- Détail représentant --}}
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade profile-overview pt-3" id="references-overview">
                                    <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Responsable du service</h5>
                                            <div class="pt-1">
                                                <a href="{{ url('directionChef', ['$iddirection' => $direction->id]) }}"
                                                    class="btn btn-primary float-end btn-sm">
                                                    <i class="bi bi-plus" title="Ajouter chef"></i> </a>
                                            </div>
                                        </div>

                                        <table
                                            class="table table-bordered table-hover datatables align-middle justify-content-center table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Matricule</th>
                                                    <th>Prénom & Nom</th>
                                                    <th>Contact</th>
                                                    <th>Fonction</th>
                                                    <th class="text-center"><i class="bi bi-gear"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                    <tr>
                                                        <td>{{ $direction?->chef?->matricule }}</td>
                                                        <td>{{ $direction?->chef?->user->civilite . ' ' . $direction?->chef?->user->firstname . ' ' . $direction?->chef?->user->name }}
                                                        </td>
                                                        <td>{{ $direction?->chef?->user->telephone }}</td>
                                                        <td>{{ $direction?->chef?->fonction->name }}</td>
                                                        <td>
                                                            <span class="d-flex mt-2 align-items-baseline"><a
                                                                    href="{{ url('employes/' . $direction?->chef?->id) }}"
                                                                    class="btn btn-warning btn-sm mx-1"
                                                                    title="Donner permission"><i class="bi bi-eye"></i></a>
                                                                <div class="filter">
                                                                    <a class="icon" href=""
                                                                        data-bs-toggle="dropdown"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul
                                                                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                        <li><a class="dropdown-item btn btn-sm mx-1"
                                                                                href="{{ url('employes/' . $direction?->chef?->id . '/edit') }}"
                                                                                class="mx-1"><i class="bi bi-pencil"></i>
                                                                                Modifier</a>
                                                                        </li>
                                                                        <li>
                                                                            <form
                                                                                action="{{ url('employes', $direction?->chef?->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="dropdown-item show_confirm"><i
                                                                                        class="bi bi-trash"></i>Supprimer</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </span>
                                                        </td>

                                                    </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active profile-overview" id="module-overview">

                                    <div class="col-12 col-md-12 col-lg-12 mb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Liste des agents</h5>
                                            <h5 class="card-title">
                                                <div class="pt-1">
                                                    <a href="{{ url('directionAgent', ['$iddirection' => $direction->id]) }}"
                                                        class="btn btn-primary float-end btn-sm">
                                                        <i class="bi bi-plus" title="Ajouter agent"></i> </a>
                                                </div>
                                            </h5>
                                        </div>
                                        <div class="row g-3">
                                            <table
                                                class="table table-bordered table-hover datatables align-middle justify-content-center"
                                                id="table-directions">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Matricule</th>
                                                        <th>Prénom & Nom</th>
                                                        <th>Contact</th>
                                                        <th>Fonction</th>
                                                        <th class="text-center"><i class="bi bi-gear"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($direction->employees as $employe)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $employe->matricule }}</td>
                                                            <td>{{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name }}
                                                            </td>
                                                            <td>{{ $employe->user->telephone }}</td>
                                                            <td>{{ $employe->fonction->name }}</td>
                                                            <td>
                                                                <span class="d-flex mt-2 align-items-baseline"><a
                                                                        href="{{ url('employes/' . $employe->id) }}"
                                                                        class="btn btn-warning btn-sm mx-1"
                                                                        title="Donner permission"><i
                                                                            class="bi bi-eye"></i></a>
                                                                    <div class="filter">
                                                                        <a class="icon" href=""
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="bi bi-three-dots"></i></a>
                                                                        <ul
                                                                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                            <form action="{{ route('retirerEmploye') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            {{-- @method('PUT') --}}
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $employe->id }}">
                                                                            <button
                                                                                class="show_confirm_valider btn btn-sm mx-1">&nbsp;&nbsp;Retirer</button>
                                                                        </form>
                                                                            <li><a class="dropdown-item btn btn-sm mx-1"
                                                                                    href="{{ url('employes/' . $employe->id . '/edit') }}"
                                                                                    class="mx-1">
                                                                                    Modifier</a>
                                                                            </li>
                                                                            <li>
                                                                                <form
                                                                                    action="{{ url('employes', $employe->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="dropdown-item show_confirm">Supprimer</button>
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
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-directions', {
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

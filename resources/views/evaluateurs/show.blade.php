@extends('layout.user-layout')
@section('title', 'ONFP - Formations '.$evaluateur->name)
@section('space-work')

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
                        <span class="d-flex align-items-baseline"><a href="{{ route('evaluateurs.index') }}"
                                class="btn btn-success btn-sm" title="retour"><i
                                    class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                            <p> | retour</p>
                        </span>
                        <h5 class="card-title">Liste des formations de {{ $evaluateur->name }}</h5>
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
                                @foreach ($evaluateur->formations as $formation)
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
                                                    href="{{ route('evaluateurs.show', $evaluateur->id) }}"
                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li>
                                                            <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditevaluateurModal{{ $evaluateur->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('evaluateurs.destroy', $evaluateur->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item show_confirm"
                                                                    title="Supprimer"><i
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
                    </div>
                </div>

            </div>
        </div>
        

    
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

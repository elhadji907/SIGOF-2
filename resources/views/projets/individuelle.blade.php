@extends('layout.user-layout')
@section('title', 'Base de données des demandeurs du ' . $projet->type_projet . ' ' . $projet?->sigle)
@section('space-work')
    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">{{ $projet->type_projet . ' ' . $projet?->sigle }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
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
                @if (!empty($projet))
                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('projets.index') }}"
                            class="btn btn-info btn-sm" title="retour"><i
                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                        <p> | retour</p>
                    </span>
                    <h4 class="card-title">Base de données des demandeurs du
                        {{ $projet->type_projet . ' ' . $projet->sigle }}</h4>
                    <table class="table datatables align-middle" id="table-individuelles">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">N°</th> --}}
                                <th class="text-center">CIN</th>
                                <th>Prénom</th>
                                <th>NOM</th>
                                <th>Date naissance</th>
                                <th width="15%">Lieu naissance</th>
                                <th width="25%">Module</th>
                                @if (!empty($region))
                                    <th>{{ $region }}</th>
                                @elseif (!empty($departement))
                                    <th>{{ $departement }}</th>
                                @elseif (!empty($arrondissement))
                                    <th>{{ $arrondissement }}</th>
                                @elseif (!empty($commune))
                                    <th>{{ $commune }}</th>
                                @else
                                    <th></th>
                                @endif
                                <th class="text-center">Statut</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($projet?->individuelles as $individuelle)
                                @if (!empty($individuelle?->numero))
                                    <tr>
                                        {{-- <td style="text-align: center">{{ $individuelle?->numero }}</td> --}}
                                        <td style="text-align: center">{{ $individuelle?->user?->cin }}</td>
                                        <td>{{ $individuelle?->user?->firstname }}</td>
                                        <td>{{ $individuelle?->user?->name }}</td>
                                        <td>{{ $individuelle?->user?->date_naissance?->format('d/m/Y') }}</td>
                                        <td>{{ $individuelle?->user?->lieu_naissance }}</td>
                                        <td>{{ $individuelle?->module?->name }}</td>
                                        @if (!empty($region))
                                            <td>{{ $individuelle?->departement?->region?->nom }}</td>
                                        @elseif (!empty($departement))
                                            <td>{{ $individuelle?->departement?->nom }}</td>
                                        @elseif (!empty($arrondissement))
                                            <td>{{ $individuelle?->arrondissement?->nom }}</td>
                                        @elseif (!empty($commune))
                                            <td>{{ $individuelle?->commune->nom }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>
                                            <span class="{{ $individuelle?->statut }}">
                                                {{ $individuelle?->statut }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-baseline"><a
                                                    href="{{ route('individuelles.show', $individuelle?->id) }}"
                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li><a class="dropdown-item btn btn-sm"
                                                                href="{{ route('individuelles.edit', $individuelle?->id) }}"
                                                                class="mx-1" title="Modifier"><i
                                                                    class="bi bi-pencil"></i>Modifier</a>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('individuelles.destroy', $individuelle?->id) }}"
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        new DataTable('#table-individuelles', {
            layout: {
                topStart: {
                    buttons: ['csv', 'excel'],
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

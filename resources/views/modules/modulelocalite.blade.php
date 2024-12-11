@extends('layout.user-layout')
@section('title', $module->name . ' ' . $localite->nom)
@section('space-work')
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
                <div class="card">
                    <div class="card-body">
                        <div class="pt-1">
                            @if (isset($demandeur->numero_dossier))
                                <a href="{{ route('individuelles.create') }}"
                                    class="btn btn-primary float-end btn-rounded"><i class="fas fa-plus"></i>
                                    <i class="bi bi-person-plus" title="Ajouter"></i> </a>
                            @else
                                <a class="btn btn-primary float-end btn-rounded"
                                    href="{{ route('demandeurs.show', Auth::user()?->id) }}"><i class="bi bi-person-plus"
                                        title="Ajouter"></i> </a></a>
                            @endif
                        </div>
                        <h5 class="card-title">{{ $localite->nom . ': ' . $module->name }}</h5>
                        {{-- <p>Le tableau des demandes individuelles</p> --}}
                        <!-- Table with stripped rows -->
                        <table class="table datatables align-middle justify-content-center" id="table-modules">
                            <thead>
                                <tr>
                                    {{--  <th class="text-center">N°</th> --}}
                                    <th class="text-center">CIN</th>
                                    <th>Prénom</th>
                                    <th>NOM</th>
                                    <th>Date naissance</th>
                                    <th>Lieu naissance</th>
                                    <th>Département</th>
                                    <th>Telephone</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($individuelles as $individuelle)
                                    @isset($individuelle?->numero)
                                        <tr>
                                            {{--  <td>{{ $individuelle?->numero }}
                                            </td> --}}
                                            <td>{{ $individuelle?->user?->cin }}</td>
                                            <td>{{ $individuelle?->user?->firstname }}</td>
                                            <td>{{ $individuelle?->user?->name }}</td>
                                            <td>{{ $individuelle?->user->date_naissance?->format('d/m/Y') }}</td>
                                            <td>{{ $individuelle?->user->lieu_naissance }}</td>
                                            <td>{{ $individuelle?->departement?->nom }}</td>
                                            <td><a
                                                    href="tel:+221{{ $individuelle?->user->telephone }}">{{ $individuelle?->user->telephone }}</a>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ url('modulelocalitestatut', ['$idlocalite' => $individuelle->departement->region->id, '$idmodule' => $module?->id, '$statut' => $individuelle->statut]) }}">
                                                    <span
                                                        class="{{ $individuelle?->statut }}">{{ $individuelle?->statut }}</span>
                                                    {{--   @isset($individuelle?->statut)
                                                        @if ($individuelle?->statut == 'Attente')
                                                            {{ $individuelle?->statut }}
                                                        @endif
                                                        @if ($individuelle?->statut == 'Validée')
                                                            {{ $individuelle?->statut }}
                                                        @endif
                                                        @if ($individuelle?->statut == 'Rejetée')
                                                            {{ $individuelle?->statut }}
                                                        @endif
                                                    @endisset --}}
                                                </a>
                                            </td>
                                            <td>
                                                @can('individuelle-show')
                                                    <span class="d-flex align-items-baseline"><a
                                                            href="{{ route('individuelles.show', $individuelle->id) }}"
                                                            class="btn btn-primary btn-sm" title="voir détails"><i
                                                                class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('individuelle-update')
                                                                    <li><a class="dropdown-item btn btn-sm"
                                                                            href="{{ route('individuelles.edit', $individuelle->id) }}"
                                                                            class="mx-1" title="Modifier"><i
                                                                                class="bi bi-pencil"></i>Modifier</a>
                                                                    </li>
                                                                @endcan

                                                                @can('individuelle-delete')
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('individuelles.destroy', $individuelle->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item show_confirm"
                                                                                title="Supprimer"><i
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
                                    @endisset
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        new DataTable('#table-modules', {
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

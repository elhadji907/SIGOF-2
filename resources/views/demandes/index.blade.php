@extends('layout.user-layout')
@section('title', 'ONFP - liste des demandeurs')
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
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="pt-1">
                            <a href="{{ route('demandeurs.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-person-plus" title="Ajouter"></i> </a>
                        </div> --}}
                        <h5 class="card-title">Liste de demandeurs</h5>
                        {{-- <p>Le tableau des demandeurs</p> --}}
                        <!-- Table with stripped rows -->
                        <table class="table datatables justify-content-center" id="table-demandeurs">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>NOM</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Demandes</th>
                                    <th class="text-center"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($demandeurs as $demandeur)
                                    @isset($demandeur?->numero_dossier)
                                        <tr>
                                            <td>{{ $demandeur?->numero_dossier }}</td>
                                            <td>{{ $demandeur->user?->firstname . ' ' . $demandeur->user?->name }} </td>
                                            <td>{{ $demandeur->user->adresse }}
                                            <td>{{ $demandeur->user->telephone }}
                                            </td>
                                            <td class="text-center">
                                                @if ($demandeur?->type == 'individuelle')
                                                    @foreach ($demandeur?->individuelles as $individuelle)
                                                        @if ($loop->last)
                                                            <a class="text-primary fw-bold"
                                                                href="{{ route('demandeurs.show', $individuelle->demandeur->id) }}">{!! $loop->count ?? '0' !!}</a>
                                                        @endif
                                                    @endforeach
                                                @elseif ($demandeur?->type == 'collective')
                                                    @foreach ($demandeur?->collectives as $collective)
                                                        @if ($loop->last)
                                                            <a class="text-primary fw-bold"
                                                                href="{{ route('demandeurs.show', $collective->demandeur->id) }}">{!! $loop->count ?? '0' !!}</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <span class="d-flex align-items-baseline"><a
                                                        href="{{ route('demandeurs.show', $demandeur->id) }}"
                                                        class="btn btn-success btn-sm" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                    {{--  <div class="filter">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li><a class="dropdown-item btn btn-sm"
                                                            href="{{ route('demandeurs.edit', $demandeur->id) }}"
                                                            class="mx-1" title="Modifier"><i
                                                                class="bi bi-pencil"></i>Modifier</a>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('demandeurs.destroy', $demandeur->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item show_confirm"
                                                                title="Supprimer"><i
                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                                </span>
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
        new DataTable('#table-demandeurs', {
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

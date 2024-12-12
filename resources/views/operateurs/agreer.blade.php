@extends('layout.user-layout')
@section('title', 'ONFP - ' . $title)
@section('space-work')

    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Opérateurs agréés</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 p-2">
                                {{-- <h5 class="card-title"> --}}
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('operateurs.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <h5> | {{ $title }}</h5>
                                </span>
                                {{-- </h5> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatables table-bordered table-hover table-striped" id="table-operateurs">
                                <thead>
                                    <tr>
                                        <th width="15%" class="text-center">N° agrément</th>
                                        <th>Opérateurs</th>
                                        <th>Sigle</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Adresse</th>
                                        @can('operateur-show')
                                            <th width="2%"><i class="bi bi-gear"></i></th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($operateurs as $operateur)
                                        <tr>
                                            <td>{{ $operateur?->numero_agrement }}</td>
                                            <td>{{ $operateur?->user?->operateur }}</td>
                                            <td>{{ $operateur?->user?->username }}</td>
                                            <td><a
                                                    href="mailto:{{ $operateur?->user?->email }}">{{ $operateur?->user?->email }}</a>
                                            </td>
                                            <td><a
                                                    href="tel:+{{ $operateur?->user?->telephone }}">{{ $operateur?->user?->telephone }}</a>
                                            </td>
                                            <td>{{ $operateur?->user?->adresse }}</td>
                                            @can('operateur-show')
                                                <td>
                                                    <span class="d-flex align-items-baseline"><a
                                                            href="{{ route('operateurs.show', $operateur->id) }}"
                                                            class="btn btn-primary btn-sm" title="voir détails"><i
                                                                class="bi bi-eye"></i></a>
                                                        {{-- <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('operateur-update')
                                                                    <li>
                                                                        <a class="dropdown-item btn btn-sm"
                                                                            href="{{ route('operateurs.edit', $operateur->id) }}"
                                                                            class="mx-1" title="Modifier"><i
                                                                                class="bi bi-pencil"></i>Modifier</a>
                                                                    </li>
                                                                @endcan
                                                                @can('operateur-delete')
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('operateurs.destroy', $operateur->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"
                                                                                title="Supprimer"><i
                                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                                        </form>
                                                                    </li>
                                                                @endcan
                                                            </ul>
                                                        </div> --}}
                                                    </span>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-operateurs', {
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

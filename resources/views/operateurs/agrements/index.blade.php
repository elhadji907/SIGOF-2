@extends('layout.user-layout')
@section('title', 'ONFP - traitement dossiers agrément operateurs')
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

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div> --}}
                            {{-- {{ route('commissionagrements.show', $commissionagrement->id) }} --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Operateurs <span>| Nouvelle</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{ $operateur_new }}
                                            </h6>
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_new, 2, ',', ' ') . '%' }}</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            {{-- {{ route('showAgreer', ['id' => $commissionagrement->id]) }} --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Opérateurs <span>| Renouvellement</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{ $operateur_renew }}
                                            </h6>
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_renew, 2, ',', ' ') . '%' }}</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card revenue-card">
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Opérateurs <span>| Retenus</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                    {{--  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card customers-card">
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Opérateurs <span>| Non retenus</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

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
                            role="alert"><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Traitement dossiers agrément opérateurs</h5>
                        <table class="table datatables table-bordered table-hover align-middle table-striped"
                            id="table-operateurs">
                            <thead>
                                <tr>
                                    {{-- <th width="15%">N° courrier</th> --}}
                                    @can('afficher-dossier-operateur')
                                        <th width="5%" class="text-center">Dossier</th>
                                    @endcan
                                    <th width="5%" class="text-center">Année</th>
                                    <th width="5%" class="text-center">Type</th>
                                    <th width="55%" class="text-center">Opérateurs</th>
                                    <th width="10%" class="text-center">Sigle</th>
                                    <th width="15%" class="text-center">Statut</th>
                                    <th width="5%"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($operateurs as $operateur)
                                    {{-- @isset($operateur?->numero_agrement) --}}
                                    <tr>
                                        {{-- <td>{{ $operateur?->courrier?->numero }}</td> --}}
                                        @can('afficher-dossier-operateur')
                                            <td class="text-center">{{ $operateur?->numero_dossier }}</td>
                                        @endcan
                                        <td style="text-align: center">{{ $operateur?->annee_agrement?->format('Y') }}</td>
                                        <td style="text-align: center"><span class="{{ $operateur->type_demande }}">
                                                {{ $operateur?->type_demande }}</span></td>
                                        <td>{{ $operateur?->user?->operateur }}</td>
                                        <td>{{ $operateur?->user?->username }}</td>
                                        <td style="text-align: center"><span class="{{ $operateur->statut_agrement }}">
                                                {{ $operateur?->statut_agrement }}</span></td>
                                        <td>
                                            @can('agrement-show')
                                                <span class="d-flex align-items-baseline"><a
                                                        href="{{ route('showAgrement', ['id' => $operateur->id]) }}"
                                                        class="btn btn-primary btn-sm" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                    {{-- <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li>

                                                            <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#EditOperateurModal{{ $operateur->id }}">
                                                                <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('operateurs.destroy', $operateur->id) }}"
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
                                            @endcan
                                        </td>
                                    </tr>
                                    {{-- @endisset --}}
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
        new DataTable('#table-operateurs', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [4, 'desc']
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

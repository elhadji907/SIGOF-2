@extends('layout.user-layout')
@section('title', $commissionagrement?->commission)
@section('space-work')
    <section class="section dashboard">
        <div class="pagetitle">
            {{-- <h1>Data Tables</h1> --}}
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">{{ $commissionagrement?->commission }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
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
                            <a href="{{ route('commissionagrements.show', $commissionagrement->id) }}">
                                <div class="card-body">
                                    <h5 class="card-title">Operateurs <span>| Total</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{ count($commissionagrement?->operateurs) }}
                                            </h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}
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
                            <a href="{{ route('showAgreer', ['id' => $commissionagrement->id]) }}">
                                <div class="card-body">
                                    <h5 class="card-title">Opérateurs <span>| agréés</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{ $operateurs_agreer_count }}
                                            </h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card revenue-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="{{ route('showReserve', ['id' => $commissionagrement->id]) }}">
                                <div class="card-body">
                                    <h5 class="card-title">Opérateurs <span>| Sous réserve</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{ $operateurs_reserve_count }}
                                            </h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card customers-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="{{ route('showRejeter', ['id' => $commissionagrement->id]) }}">
                                <div class="card-body">
                                    <h5 class="card-title">Opérateurs <span>| Rejetés</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                {{ $operateurs_rejeter_count }}
                                            </h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
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
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="d-flex mt-0 align-items-baseline"><a
                                    href="{{ route('commissionagrements.index', $commissionagrement->id) }}"
                                    class="btn btn-success btn-sm" title="retour"><i
                                        class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                <p> | {{ $commissionagrement?->commission }}</p>
                            </span>
                            <h5 class="card-title">
                                <a href="{{ route('addopCommission', ['id' => $commissionagrement->id]) }}"
                                    class="btn btn-success btn-sm" title="ajouter"><i class="bi bi-plus"></i></a>
                            </h5>
                        </div>
                        {{-- <form method="post"
                            action="{{ url('commisionagrement', ['$idcommissionagrement' => $commissionagrement->id]) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT') --}}
                            <div class="row mb-0">
                                <div class="form-check col-md-12 pt-5">
                                    <table class="table datatables align-middle" id="table-operateurs">
                                        <thead>
                                            <tr>
                                                @can('afficher-dossier-operateur')
                                                    <th width="5%" class="text-center">Dossier</th>
                                                @endcan
                                                <th width="15%">N° agrément</th>
                                                <th width="50%">Opérateurs</th>
                                                <th width="10%">Sigle</th>
                                                <th class="text-center">Modules</th>
                                                <th width="15%" class="text-center">Statut</th>
                                                <th><i class="bi bi-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($operateurs as $operateur)
                                                @isset($operateur?->numero_agrement)
                                                    <tr>
                                                        @can('afficher-dossier-operateur')
                                                            <td class="text-center">{{ $operateur?->numero_dossier }}</td>
                                                        @endcan
                                                        <td>{{ $operateur?->numero_agrement }}</td>
                                                        <td>{{ $operateur?->user?->operateur }}</td>
                                                        <td>{{ $operateur?->user?->username }}</td>
                                                        <td style="text-align: center;">
                                                            @foreach ($operateur?->operateurmodules as $operateurmodule)
                                                                @if ($loop->last)
                                                                    <a href="#"><span
                                                                            class="badge bg-info">{{ $loop->count }}</span></a>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <span
                                                                class="{{ $operateur->statut_agrement }}">{{ $operateur->statut_agrement }}</span>
                                                        </td>
                                                        <td>
                                                            <span class="d-flex align-items-baseline"><a
                                                                    href="{{ route('agrements', ['id' => $operateur?->id]) }}"
                                                                    class="btn btn-primary btn-sm"
                                                                    title="voir détails"><i class="bi bi-eye"></i></a>
                                                                <div class="filter">
                                                                    <a class="icon" href="#"
                                                                        data-bs-toggle="dropdown"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul
                                                                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                        {{--  <li>
                                                                            <button type="button"
                                                                                class="dropdown-item btn btn-sm mx-1"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#EditOperateurModal{{ $operateur?->id }}">
                                                                                <i class="bi bi-pencil" title="Modifier"></i>
                                                                                Modifier
                                                                            </button>
                                                                        </li> --}}
                                                                        <form
                                                                            action="{{ route('retirerOperateur', ['id' => $operateur->id]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button
                                                                                class="show_confirm_retirer btn btn-sm mx-1"><i
                                                                                    class="bi bi-reply-fill"
                                                                                    title="Retirer"></i>&nbsp;Retirer</button>
                                                                        </form>
                                                                       
                                                                    </ul>
                                                                </div>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endisset
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        new DataTable('#table-operateurs', {
            /* layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            }, */
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Tout"]
            ],
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

@extends('layout.user-layout')
@section('title', 'Oprérateur agréés, ' . $commissionagrement?->commission)
@section('space-work')
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
                                    href="{{ route('commissionagrements.show', $commissionagrement->id) }}"
                                    class="btn btn-success btn-sm" title="retour"><i
                                        class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                <p> | {{ $commissionagrement?->commission }}</p>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                                {{ count($operateurs) . ' opérateur(s) agréé(s)' . ' pour un total de ' . count($operateurmodules) . ' modules dont ' . $count_operateurmodules_distinct . ' modules distincts' }}
                            </h5>
                            @if (auth()->user()->hasRole('super-admin|admin'))
                                <span class="d-flex align-items-baseline">
                                    <a href="#" class="btn btn-secondary btn-sm float-end" data-bs-toggle="modal"
                                        data-bs-target="#AddUserModal" title="Générer">Générer lettres</a>
                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li>
                                                <form action="{{ route('lettreAgrement') }}" method="post" target="_blank">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $commissionagrement->id }}">
                                                    <input type="hidden" name="value2" value="50">
                                                    <input type="hidden" name="value1" value="0">
                                                    <button type="submit" class="dropdown-item btn btn-sm">De 01 à
                                                        50</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('lettreAgrement') }}" method="post" target="_blank">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $commissionagrement->id }}">
                                                    <input type="hidden" name="value2" value="100">
                                                    <input type="hidden" name="value1" value="50">
                                                    <button type="submit" class="dropdown-item btn btn-sm">De 50 à
                                                        100</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('lettreAgrement') }}" method="post" target="_blank">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $commissionagrement->id }}">
                                                    <input type="hidden" name="value2" value="150">
                                                    <input type="hidden" name="value1" value="100">
                                                    <button type="submit" class="dropdown-item btn btn-sm">De 100 à
                                                        150</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('lettreAgrement') }}" method="post"
                                                    target="_blank">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $commissionagrement->id }}">
                                                    <input type="hidden" name="value2"
                                                        value="{{ count($commissionagrement->operateurs) }}">
                                                    <input type="hidden" name="value1" value="150">
                                                    <button type="submit" class="dropdown-item btn btn-sm">De 150 à
                                                        {{ count($commissionagrement->operateurs) }}</button>
                                                </form>
                                            </li>
                                            {{-- <li>
                                                <form action="{{ route('lettreAgrement') }}" method="post"
                                                    target="_blank">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $commissionagrement->id }}">
                                                    <input type="hidden" name="value2" value="250">
                                                    <input type="hidden" name="value1" value="201">
                                                    <button type="submit" class="dropdown-item btn btn-sm">De 200 à
                                                        250</button>
                                                </form>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </span>
                            @endif

                        </div>
                        {{-- <h5> Opérateurs:
                            <span class="badge bg-secondary">{{ count($operateurs) }}</span>
                        </h5> --}}
                        <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-0">
                                <div class="form-check col-md-12 pt-5">
                                    <table class="table datatables align-middle" id="table-operateurs">
                                        <thead>
                                            <tr>
                                                <th width="35%">Opérateurs</th>
                                                <th width="15%">Adresse</th>
                                                <th width="10%">Domaine</th>
                                                <th width="15%">Modules</th>
                                                <th width="15%">Niveau qualification</th>
                                                <th width="15%">N° agrément</th>
                                                {{-- <th width="15%" class="text-center">Statut</th> --}}
                                                <th><i class="bi bi-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($operateurmodules as $operateurmodule)
                                                {{-- @isset($operateur?->numero_agrement) --}}
                                                <tr>
                                                    <td>{{ $operateurmodule?->operateur?->user?->operateur . ' (' . $operateurmodule?->operateur?->user?->username . ')' }}
                                                    </td>
                                                    <td>{{ $operateurmodule?->operateur?->user?->adresse }}</td>
                                                    <td>{{ $operateurmodule?->domaine }}</td>
                                                    <td>{{ $operateurmodule?->module }}</td>
                                                    <td>{{ $operateurmodule?->niveau_qualification }}</td>
                                                    <td>{{ $operateurmodule?->operateur?->numero_agrement }}</td>
                                                    {{-- <td style="text-align: center;">
                                                            @foreach ($operateur?->operateurmodules as $operateurmodule)
                                                                @if ($loop->last)
                                                                    <a href="#"><span
                                                                            class="badge bg-info">{{ $loop->count }}</span></a>
                                                                @endif
                                                            @endforeach
                                                        </td> --}}
                                                    {{-- <td class="text-center">
                                                            <span
                                                                class="{{ $operateur->statut_agrement }}">{{ $operateur->statut_agrement }}</span>
                                                        </td> --}}
                                                    <td>
                                                        <span class="d-flex align-items-baseline"><a
                                                                href="{{ route('agrements', ['id' => $operateurmodule?->operateur?->id]) }}"
                                                                class="btn btn-primary btn-sm" target="_blank"
                                                                title="voir détails"><i class="bi bi-eye"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                {{-- @endisset --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </form>
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
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Tout"]
            ],
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

@extends('layout.user-layout')
@section('title', 'Oprérateur non agréés, ' . $commissionagrement?->commission)
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
                        {{-- <h5> Statut:
                            <span class="badge bg-danger">rejeter</span>
                        </h5>
                        <h5> Opérateurs:
                            <span class="badge bg-secondary">{{ count($operateurs) }}</span>
                        </h5> --}}
                        <h5 class="card-title">
                            {{ count($operateurs) . ' opérateur(s) non agréé(s)' }}
                        </h5>
                        <form method="post" action="#" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-0">
                                <div class="form-check col-md-12 pt-5">
                                    <table class="table datatables align-middle" id="table-operateurs">
                                        <thead>
                                            <tr>
                                                <th width="30%">Opérateurs</th>
                                                <th width="20%">Adresse</th>
                                                <th>Email</th>
                                                <th>Télephone</th>
                                                {{-- <th>Domaine</th>
                                                <th>Niveau qualification</th> --}}
                                                {{-- <th>Modules</th> --}}
                                                {{-- <th>N° agrément</th> --}}
                                                {{-- <th class="text-center">Modules</th> --}}
                                                {{-- <th width="15%" class="text-center">Statut</th> --}}
                                                <th width="25%">Motif</th>
                                                <th width="5%"><i class="bi bi-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($operateurs as $operateur)
                                                @isset($operateur?->numero_agrement)
                                                    <tr>
                                                        <td>{{ $operateur?->user?->operateur . ' (' . $operateur?->user?->username . ')' }}</td>
                                                        <td>{{ $operateur?->user?->adresse }}</td>
                                                        <td>{{ $operateur?->user?->email }}</td>
                                                        <td>{{ $operateur?->user?->telephone }}</td>
                                                        {{-- <td>{{ count($operateur?->operateurmodules) }}</td> --}}
                                                        {{-- <td>{{ $operateur?->numero_agrement }}</td> --}}
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
                                                        <td>{{ $operateur?->motif }}</td>
                                                        <td>
                                                            <span class="d-flex align-items-baseline"><a
                                                                    href="{{ route('agrements', ['id' => $operateur?->id]) }}"
                                                                    class="btn btn-primary btn-sm" target="_blank"
                                                                    title="voir détails"><i class="bi bi-eye"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endisset
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

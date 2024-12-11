@extends('layout.user-layout')
@section('title', 'Détails localités')
@section('space-work')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pt-1">
                            <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('localites.index') }}"
                                    class="btn btn-success btn-sm" title="retour"><i
                                        class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                <p> | Liste des localités</p>
                            </span>
                        </div>
                        <h5 class="card-title">Région : {{ $localite?->nom }}</h5>
                        <table class="table datatables align-middle justify-content-center" id="table-modules">
                            <thead>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">CIN</th>
                                    <th>Prénom</th>
                                    <th>NOM</th>
                                    <th>Date naissance</th>
                                    <th>Lieu naissance</th>
                                    <th>Module</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($localite->individuelles as $individuelle)
                                    @isset($individuelle?->numero)
                                        <tr>
                                            {{-- <span class="badge bg-default text-dark"></span> --}}
                                            <td>{{ $individuelle?->numero }}
                                            </td>
                                            <td>{{ $individuelle?->user?->cin }}</td>
                                            <td>{{ $individuelle?->user?->firstname }}</td>
                                            <td>{{ $individuelle?->user?->name }}</td>
                                            <td>{{ $individuelle?->user->date_naissance?->format('d/m/Y') }}</td>
                                            <td>{{ $individuelle?->user->lieu_naissance }}</td>
                                            <td>{{ $individuelle->module?->name }}</td>
                                            <td>
                                                
                                                <a
                                                    href="{{ url('regionstatut', ['$idlocalite' => $individuelle->departement->region->id, 'statut' => $individuelle?->statut]) }}">
                                                    <span
                                                        class="{{ $individuelle?->statut }}">{{ $individuelle?->statut }}</span>
                                                </a>
                                               {{--  @isset($individuelle?->statut)
                                                    @if ($individuelle?->statut == 'Attente')
                                                    <span class="badge bg-secondary text-white">{{ $individuelle?->statut }}
                                                        </span>
                                                    @endif
                                                    @if ($individuelle?->statut == 'Validée')
                                                        <span class="badge bg-success text-white">{{ $individuelle?->statut }}
                                                        </span>
                                                    @endif
                                                    @if ($individuelle?->statut == 'Rejetée')
                                                        <span class="badge bg-danger text-white">{{ $individuelle?->statut }}
                                                        </span>
                                                    @endif
                                                @endisset --}}
                                            </td>
                                            <td>
                                                <span class="d-flex align-items-baseline"><a
                                                        href="{{ route('individuelles.show', $individuelle->id) }}"
                                                        class="btn btn-primary btn-sm" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li><a class="dropdown-item btn btn-sm"
                                                                    href="{{ route('individuelles.edit', $individuelle->id) }}"
                                                                    class="mx-1" title="Modifier"><i
                                                                        class="bi bi-pencil"></i>Modifier</a>
                                                            </li>
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
                                                        </ul>
                                                    </div>
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

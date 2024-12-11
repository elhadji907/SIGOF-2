@extends('layout.user-layout')
@section('title', 'ONFP - Formations')
@section('space-work')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Données</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CONVENTIONS & DETF</h4>
                        <table class="table datatables" id="table-formations">
                            <thead>
                                <tr>
                                    <th width='10%' class="text-center">N° Conv.</th>
                                    <th width='10%' class="text-center">Date Conv.</th>
                                    {{-- <th width='15%'>Type formation</th> --}}
                                    <th>Bénéficiaires</th>
                                    <th width='15%'>Région</th>
                                    <th width='20%'>Modules</th>
                                    <th width='10%'>Scan Conv.</th>
                                    <th width='10%'>Scan DETF</th>
                                    <th width='5%' class="text-center">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($conventions as $formation)
                                    <tr>
                                        <td style="text-align: center">{{ $formation?->numero_convention }}</td>
                                        <td style="text-align: center">{{ $formation?->date_convention?->format('d/m/Y') }}
                                        </td>
                                       {{--  <td><a>{{ $formation->types_formation?->name }}</a></td> --}}
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
                                        <td style="text-align: center">
                                            @if (!empty($formation?->file_convention))
                                                <a class="btn btn-outline-secondary btn-sm" title="Convention"
                                                    target="_blank" href="{{ asset($formation->getFileConvention()) }}">
                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                </a>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            @if (!empty($formation?->detf_file))
                                                <a class="btn btn-outline-secondary btn-sm" title="DETF"
                                                    target="_blank" href="{{ asset($formation->getFileDetf()) }}">
                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                </a>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
                                        </td>
                                        <td class="text-center"><a><span
                                                    class="{{ $formation?->statut }}">{{ $formation?->statut }}</span></a>
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

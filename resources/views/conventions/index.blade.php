@extends('layout.user-layout')
@section('title', 'ONFP - Liste des conventions')
@section('space-work')
    @can('convention-view')
        <section class="section register">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                                <li class="breadcrumb-item">Tables</li>
                                <li class="breadcrumb-item active">Données</li>
                            </ol>
                        </nav>
                    </div>
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
                            @can('convention-create')
                                <div class="pt-1">
                                    <button type="button" class="btn btn-primary btn-sm float-end btn-rounded"
                                        data-bs-toggle="modal" data-bs-target="#AddConvModal">Ajouter
                                    </button>
                                </div>
                            @endcan
                            <h5 class="card-title">Conventions collectives des branches professionnelles</h5>
                            <table class="table datatables align-middle justify-content-center" id="table-files">
                                <thead>
                                    <tr>
                                        <th width="5%" class="text-center">N°</th>
                                        <th>Convention</th>
                                        <th width="2%" class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($conventions as $convention)
                                        <tr>
                                            <td style="text-align: center;">{{ $i++ }}</td>
                                            <td>{{ $convention?->name }}</td>
                                            <td style="text-align: center;">
                                                @can('convention-show')
                                                    <span class="d-flex align-items-baseline"><a href="#"
                                                            class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                            <i class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                @can('convention-update')
                                                                    <li>
                                                                        <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditFileModal{{ $convention->id }}">
                                                                            <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                        </button>
                                                                    </li>
                                                                @endcan

                                                                @can('convention-delete')
                                                                    <li>
                                                                        <form action="{{ url('conventions', $convention->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item show_confirm"><i
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="AddConvModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ url('conventions') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter une nouvelle convention</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="convention" class="form-label">Covention<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="name" id="convention" rows="1"
                                            class="form-control form-control-sm @error('convention') is-invalid @enderror" placeholder="Covention">{{ old('convention') }}</textarea>
                                        @error('convention')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach ($conventions as $convention)
                <div class="modal fade" id="EditFileModal{{ $convention?->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="EditFileModalLabel{{ $convention?->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <form method="post" action="{{ route('conventions.update', $convention?->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="modal-header" id="EditFileModalLabel{{ $convention?->id }}">
                                    <h5 class="modal-title">Modification de la convention {{ $convention?->intitule }}
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $convention?->id }}">

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="convention" class="form-label">Convention<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="name" id="convention" rows="1"
                                            class="form-control form-control-sm @error('convention') is-invalid @enderror" placeholder="Convention">{{ $convention?->name ?? old('convention') }}</textarea>
                                        @error('convention')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endcan
@endsection
@push('scripts')
    <script>
        new DataTable('#table-files', {
            layout: {
                topStart: {
                    buttons: ['excel'],
                }
            },
            "order": [
                [0, 'asc']
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

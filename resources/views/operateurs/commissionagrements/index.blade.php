@extends('layout.user-layout')
@section('title', 'ONFP - Liste des agréments')
@section('space-work')

    <section class="section register">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="pagetitle">
                    {{-- <h1>Data Tables</h1> --}}
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item active">Commisions</li>
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
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert"><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        @can('commission-create')
                            <div class="pt-1">
                                <button type="button" class="btn btn-primary btn-sm float-end btn-rounded"
                                    data-bs-toggle="modal" data-bs-target="#AddagrementModal">
                                    Ajouter
                                </button>
                            </div>
                        @endcan
                        {{-- @endcan --}}
                        <h5 class="card-title">COMMISIONS AGREMENTS</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatables align-middle justify-content-center" id="table-agrements">
                            <thead>
                                <tr>
                                    <th width="52%">Commission agrément</th>
                                    <th width="8%" class="text-center">Session</th>
                                    <th width="5%" class="text-center">Année</th>
                                    <th width="5%" class="text-center">Date début</th>
                                    <th width="5%" class="text-center">Date pv</th>
                                    <th width="22%">Lieu</th>
                                    <th width="5%" class="text-center">Operateurs</th>
                                    <th width="3%" class="text-center" scope="col"><i class="bi bi-gear"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($commissionagrements as $commissionagrement)
                                    <tr>
                                        <td>{{ $commissionagrement?->commission }}</td>
                                        <td style="text-align: center;">{{ $commissionagrement?->session }}</td>
                                        <td style="text-align: center;">{{ $commissionagrement?->annee }}</td>
                                        <td style="text-align: center;">{{ $commissionagrement?->date?->format('d/m/Y') }}
                                        </td>
                                        <td style="text-align: center;">{{ $commissionagrement?->description }}
                                        </td>
                                        <td>{{ $commissionagrement?->lieu }}</td>
                                        <td style="text-align: center;">
                                            {{-- <span class="badge bg-info">{{ count($commissionagrement?->operateurs) }}</span> --}}
                                            @foreach ($commissionagrement->operateurs as $operateur)
                                                @if ($loop->last)
                                                    <span class="badge bg-info">{{ $loop->count }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td style="text-align: center;">
                                            @can('commission-show')
                                                <span class="d-flex mt-2 align-items-baseline"><a
                                                        href="{{ route('commissionagrements.show', $commissionagrement->id) }}"
                                                        class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                        <i class="bi bi-eye"></i></a>
                                                    @if (auth()->user()->hasRole('super-admin|admin'))
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                <form action="{{ route('ficheSynthese') }}" method="post"
                                                                    target="_blank">
                                                                    @csrf
                                                                    {{-- @method('PUT') --}}
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $commissionagrement->id }}">
                                                                    <button type="submit"
                                                                        class="dropdown-item btn btn-sm mx-1"><i
                                                                            class="bi bi-file-earmark-pdf-fill"
                                                                            title="Fiche synthèse"></i>Fiche synthèse</button>
                                                                </form>
                                                                @can('commission-update')
                                                                    <li>
                                                                        <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditagrementModal{{ $commissionagrement->id }}">
                                                                            <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                        </button>
                                                                    </li>
                                                                @endcan
                                                                @can('commission-delete')
                                                                    <li>
                                                                        <form
                                                                            action="{{ url('commissionagrements', $commissionagrement->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"><i
                                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                                        </form>
                                                                    </li>
                                                                @endcan
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </span>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
        <!-- Add agrement -->
        <div class="modal fade" id="AddagrementModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {{-- <form method="POST" action="{{ route('addagrement') }}">
                        @csrf --}}
                    <form method="post" action="{{ route('commissionagrements.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">AJOUTER COMMISSION</h1>
                        </div>
                        {{--  <div class="modal-header">
                            <h5 class="modal-title">Ajouter un agrément</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> --}}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="floatingInput">Commission<span class="text-danger mx-1">*</span></label>
                                <input type="text" name="commission" value="{{ old('commission') }}"
                                    class="form-control form-control-sm @error('commission') is-invalid @enderror"
                                    id="commission" placeholder="Commission">
                                @error('commission')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="floatingInput">Session<span class="text-danger mx-1">*</span></label>
                                <select name="session" class="form-select  @error('session') is-invalid @enderror"
                                    aria-label="Select" id="select-field" data-placeholder="Choisir session">
                                    <option value="">
                                        {{ old('session') }}
                                    </option>
                                    <option value="Normale">
                                        Normale
                                    </option>
                                    <option value="Remplacement">
                                        Remplacement
                                    </option>
                                </select>
                                @error('session')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="floatingInput">Année<span class="text-danger mx-1">*</span></label>
                                <input type="number" min="2020" name="annee" value="{{ old('annee') }}"
                                    class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                    id="annee" placeholder="Ex: 2024">
                                @error('annee')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">Date début</label>
                                <input type="date" name="date" value="{{ old('date') }}"
                                    class="form-control form-control-sm @error('date') is-invalid @enderror"
                                    id="date" placeholder="Date commission">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">Lieu et date commission</label>
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    id="description" placeholder="Ex: Fait à Dakar, le 10/12/2024">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">Lieu</label>
                                <input type="text" name="lieu" value="{{ old('lieu') }}"
                                    class="form-control form-control-sm @error('lieu') is-invalid @enderror"
                                    id="lieu" placeholder="lieu">
                                @error('lieu')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add agrement-->

        <!-- Edit agrement -->
        @foreach ($commissionagrements as $commissionagrement)
            <div class="modal fade" id="EditagrementModal{{ $commissionagrement->id }}" tabindex="-1" role="dialog"
                aria-labelledby="EditagrementModalLabel{{ $commissionagrement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="{{ route('commissionagrements.update', $commissionagrement->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="card-header text-center bg-gradient-default">
                                <h1 class="h4 text-black mb-0">MODIFICATION COMMISSION</h1>
                            </div>
                            {{-- <div class="modal-header" id="EditagrementModalLabel{{ $commissionagrement->id }}">
                                <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier région</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div> --}}
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="floatingInput">Commission<span class="text-danger mx-1">*</span></label>
                                    <input type="text" name="commission"
                                        value="{{ $commissionagrement->commission ?? old('commission') }}"
                                        class="form-control form-control-sm @error('commission') is-invalid @enderror"
                                        id="commission" placeholder="Commission">
                                    @error('commission')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="floatingInput">Session<span class="text-danger mx-1">*</span></label>
                                    <select name="session" class="form-select  @error('session') is-invalid @enderror"
                                        aria-label="Select" id="select-field" data-placeholder="Choisir session">
                                        <option value="{{ $commissionagrement->session ?? old('session') }}">
                                            {{ $commissionagrement->session ?? old('session') }}
                                        </option>
                                        <option value="Normale">
                                            Normale
                                        </option>
                                        <option value="Remplacement">
                                            Remplacement
                                        </option>
                                    </select>
                                    @error('session')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="floatingInput">Année<span class="text-danger mx-1">*</span></label>
                                    <input type="number" min="2020" name="annee"
                                        value="{{ $commissionagrement->annee ?? old('annee') }}"
                                        class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                        id="annee" placeholder="Ex: 2024">
                                    @error('annee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="floatingInput">Date commission</label>
                                    <input type="date" name="date"
                                        value="{{ $commissionagrement?->date?->format('Y-m-d') ?? old('date') }}"
                                        class="form-control form-control-sm @error('date') is-invalid @enderror"
                                        id="date" placeholder="Date commission">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="floatingInput">Lieu et date commission</label>
                                    <input type="text" name="description" value="{{ $commissionagrement->description ?? old('description') }}"
                                        class="form-control form-control-sm @error('description') is-invalid @enderror"
                                        id="description" placeholder="Ex: Fait à Dakar, le 10/12/2024">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="floatingInput">Lieu</label>
                                    <input type="text" name="lieu"
                                        value="{{ $commissionagrement->lieu ?? old('lieu') }}"
                                        class="form-control form-control-sm @error('lieu') is-invalid @enderror"
                                        id="lieu" placeholder="lieu">
                                    @error('lieu')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Edit agrement-->
    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-agrements', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
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

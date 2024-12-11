@extends('layout.user-layout')
@section('title', $operateur?->user?->username . ' - infrastructures et équipements')
@section('space-work')

    <section class="section register">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="pagetitle">
                    {{-- <h1>Data Tables</h1> --}}
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item active">Equipements</li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">INFRASTRUCTURES / EQUIPEMENTS</h5>
                            @can('devenir-operateur-agrement-ouvert')
                                <h5 class="card-title">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#AddRefModal">
                                        <i class="bi bi-plus" title="Ajouter une référence"></i>
                                    </button>
                                </h5>
                            @endcan
                        </div>
                        <!-- Table with stripped rows -->
                        <table
                            class="table table-bordered table-hover datatables align-middle justify-content-center table-borderless">
                            <thead>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th>DESIGNATION</th>
                                    <th class="text-center">QUANTITE</th>
                                    <th class="text-center">ETAT</th>
                                    <th class="text-center">TYPE</th>
                                    <th class="text-center"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($operateur->operateurequipements as $operateurequipement)
                                    <tr>
                                        <td style="text-align: center;">{{ $i++ }}</td>
                                        <td>{{ $operateurequipement->designation }}</td>
                                        <td style="text-align: center;">{{ $operateurequipement->quantite }}</td>
                                        <td style="text-align: center;">{{ $operateurequipement->etat }}</td>
                                        <td style="text-align: center;">{{ $operateurequipement->type }}</td>
                                        <td style="text-align: center;">
                                            <span class="d-flex align-items-baseline justify-content-center"><a
                                                    href="" class="btn btn-outline-info btn-sm mx-1"
                                                    title="Voir détails">
                                                    <i class="bi bi-eye"></i></a>
                                                @can('devenir-operateur-agrement-ouvert')
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li>
                                                                <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#EditoperateurequipementModal{{ $operateurequipement->id }}">
                                                                    <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('operateurequipements.destroy', $operateurequipement->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item show_confirm"><i
                                                                            class="bi bi-trash"></i>Supprimer</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endcan
                                            </span>
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

        <!-- Add References -->
        <div class="modal fade" id="AddRefModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="{{ route('operateurequipements.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">INFRASTRUCTURES / EQUIPEMENTS</h1>
                        </div>
                        <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                        <div class="modal-body">
                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="designation" class="form-label">Désignation<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="designation" value="{{ old('designation') }}"
                                    class="form-control form-control-sm @error('designation') is-invalid @enderror"
                                    placeholder="Désignation">
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="quantite" class="form-label">Quantité<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="number" min="0" name="quantite" value="{{ old('quantite') }}"
                                    class="form-control form-control-sm @error('quantite') is-invalid @enderror"
                                    placeholder="Quantité">
                                @error('quantite')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="etat" class="form-label">Etat<span
                                        class="text-danger mx-1">*</span></label>
                                <select name="etat" class="form-select selectpicker"
                                    data-live-search="true @error('etat') is-invalid @enderror" aria-label="Select"
                                    id="select-field-etat-add" data-placeholder="Choisir etat">
                                    <option value="">
                                        {{ old('etat') }}
                                    </option>
                                    <option value="Neuf(ve)">
                                        Neuf(ve)
                                    </option>
                                    <option value="Bon etat">
                                        Bon etat
                                    </option>
                                    <option value="Usé(e)">
                                        Usé(e)
                                    </option>
                                </select>
                                @error('etat')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="type" class="form-label">Type<span
                                        class="text-danger mx-1">*</span></label>
                                <select name="type" class="form-select selectpicker"
                                    data-live-search="true @error('type') is-invalid @enderror" aria-label="Select"
                                    id="select-field-type-add" data-placeholder="Choisir type">
                                    <option value="">
                                        {{ old('type') }}
                                    </option>
                                    <option value="Infrastructure">
                                        Infrastructure
                                    </option>
                                    <option value="Equipement">
                                        Equipement
                                    </option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add References-->
        <!-- Edit References -->
        @foreach ($operateurequipements as $operateurequipement)
            <div class="modal fade" id="EditoperateurequipementModal{{ $operateurequipement->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post"
                            action="{{ route('operateurequipements.update', $operateurequipement->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="card-header text-center bg-gradient-default">
                                <h1 class="h4 text-black mb-0">MODIFICATION</h1>
                            </div>
                            <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                            <div class="modal-body">
                                <div class="col-12 col-md-12 col-lg-12 mb-2">
                                    <label for="designation" class="form-label">Désignation<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="designation"
                                        value="{{ $operateurequipement->designation ?? old('designation') }}"
                                        class="form-control form-control-sm @error('designation') is-invalid @enderror"
                                        placeholder="Désignation">
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 mb-2">
                                    <label for="quantite" class="form-label">Quantité<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="0" name="quantite"
                                        value="{{ $operateurequipement->quantite ?? old('quantite') }}"
                                        class="form-control form-control-sm @error('quantite') is-invalid @enderror"
                                        placeholder="Quantité">
                                    @error('quantite')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mb-2">
                                    <label for="etat" class="form-label">Etat<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="etat" class="form-select selectpicker"
                                        data-live-search="true @error('etat') is-invalid @enderror" aria-label="Select"
                                        id="select-field-etat-update" data-placeholder="Choisir etat">
                                        <option value="{{ $operateurequipement->etat }}">
                                            {{ $operateurequipement->etat ?? old('etat') }}
                                        </option>
                                        <option value="Neuf(ve)">
                                            Neuf(ve)
                                        </option>
                                        <option value="Bon etat">
                                            Bon etat
                                        </option>
                                        <option value="Usé(e)">
                                            Usé(e)
                                        </option>
                                    </select>
                                    @error('etat')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 mb-2">
                                    <label for="type" class="form-label">Type<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="type" class="form-select selectpicker"
                                        data-live-search="true @error('type') is-invalid @enderror" aria-label="Select"
                                        id="select-field-type-update" data-placeholder="Choisir type">
                                        <option value="{{ $operateurequipement->type }}">
                                            {{ $operateurequipement->type ?? old('type') }}
                                        </option>
                                        <option value="Infrastructure">
                                            Infrastructure
                                        </option>
                                        <option value="Equipement">
                                            Equipement
                                        </option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Edit References-->

    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-regions', {
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

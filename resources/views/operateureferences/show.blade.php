@extends('layout.user-layout')
@section('title', $operateur?->user?->username . ' - références et expériences professionnelles')
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
                            <li class="breadcrumb-item active">Références</li>
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
                            <h5 class="card-title">EXPERIENCES ET REFERENCES PROFESSIONNELLES</h5>
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
                                    <th>DENOMINATION L'ORGANISME</th>
                                    <th>PERIODES D'INTERVENTION</th>
                                    <th>DESCRIPTION DES INTERVENTIONS</th>
                                    <th class="text-center">CONTACTS</th>
                                    <th class="text-center"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($operateur->operateureferences as $operateureference)
                                    <tr>
                                        <td>{{ $operateureference?->organisme }}</td>
                                        <td>{{ $operateureference?->periode }}</td>
                                        <td>{{ $operateureference?->description }}</td>
                                        <td style="text-align: center;">{{ $operateureference?->contact }}</td>
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
                                                                    data-bs-target="#EditoperateureferenceModal{{ $operateureference->id }}">
                                                                    <i class="bi bi-pencil" title="Modifier"></i> Modifier
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('operateureferences.destroy', $operateureference->id) }}"
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
                    <form method="post" action="{{ route('operateureferences.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">EXPERIENCES ET REFERENCES PROFESSIONNELLES</h1>
                        </div>
                        <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                        <div class="modal-body">

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="organisme" class="form-label">Dénomination de l'organisme<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="organisme" value="{{ old('organisme') }}"
                                    class="form-control form-control-sm @error('organisme') is-invalid @enderror"
                                    placeholder="Dénomination de l'organisme">
                                @error('organisme')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="periode" class="form-label">Période<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="periode" value="{{ old('periode') }}"
                                    class="form-control form-control-sm @error('periode') is-invalid @enderror"
                                    placeholder="Période">
                                @error('periode')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="number" min="0" name="contact" value="{{ old('contact') }}"
                                    class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                    placeholder="Contact">
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="contact" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    placeholder="Description de l'activité">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-floating mb-3">
                                <input type="text" name="organisme" value="{{ old('organisme') }}"
                                    class="form-control form-control-sm @error('organisme') is-invalid @enderror"
                                    id="organisme" placeholder="Dénomination de l'organisme" autofocus>
                                @error('organisme')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Dénomination de l'organisme<span
                                        class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min="0" name="contact" value="{{ old('contact') }}"
                                    class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                    id="contact" placeholder="Contact">
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Contact<span class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="periode" value="{{ old('periode') }}"
                                    class="form-control form-control-sm @error('periode') is-invalid @enderror"
                                    id="periode" placeholder="Période">
                                @error('periode')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Période<span class="text-danger mx-1">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    placeholder="Ajouter les membres du jury">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                                <label for="floatingInput">Description<span class="text-danger mx-1">*</span></label>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add References-->
        <!-- Edit References -->
        @foreach ($operateureferences as $operateureference)
            <div class="modal fade" id="EditoperateureferenceModal{{ $operateureference->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="post" action="{{ route('operateureferences.update', $operateureference->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="card-header text-center bg-gradient-default">
                                <h1 class="h4 text-black mb-0">MODIFICATION</h1>
                            </div>
                            <input type="hidden" name="operateur" value="{{ $operateur->id }}">
                            <div class="modal-body">
                                

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="organisme" class="form-label">Dénomination de l'organisme<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="organisme" value="{{ $operateureference->organisme ?? old('organisme') }}"
                                    class="form-control form-control-sm @error('organisme') is-invalid @enderror"
                                    placeholder="Dénomination de l'organisme">
                                @error('organisme')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="periode" class="form-label">Période<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="periode" value="{{ $operateureference->periode ?? old('periode') }}"
                                    class="form-control form-control-sm @error('periode') is-invalid @enderror"
                                    placeholder="Période">
                                @error('periode')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="number" min="0" name="contact" value="{{ $operateureference->contact ?? old('contact') }}"
                                    class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                    placeholder="Contact">
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <label for="contact" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    placeholder="Description de l'activité">{{ $operateureference->description ?? old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                                {{-- <div class="form-floating mb-3">
                                    <input type="text" name="organisme"
                                        value="{{ $operateureference->organisme ?? old('organisme') }}"
                                        class="form-control form-control-sm @error('organisme') is-invalid @enderror"
                                        id="organisme" placeholder="Dénomination de l'organisme" autofocus>
                                    @error('organisme')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Dénomination de l'organisme<span
                                            class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" min="0" name="contact"
                                        value="{{ $operateureference->contact ?? old('contact') }}"
                                        class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                        id="contact" placeholder="Contact">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Contact<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="periode"
                                        value="{{ $operateureference->periode ?? old('periode') }}"
                                        class="form-control form-control-sm @error('periode') is-invalid @enderror"
                                        id="periode" placeholder="Période">
                                    @error('periode')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Période<span class="text-danger mx-1">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="description" id="description" cols="30" rows="5"
                                        class="form-control form-control-sm @error('description') is-invalid @enderror"
                                        placeholder="Ajouter les membres du jury">{{ $operateureference->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Description<span class="text-danger mx-1">*</span></label>
                                </div> --}}
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

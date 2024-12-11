@extends('layout.user-layout')
@section('title', 'ONFP - Projets & Programmes')
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
                        @if (auth()->user()->hasRole('super-admin|admin'))
                            <div class="pt-1">
                                <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#AddProjetModal">
                                    <i class="bi bi-plus" title="Ajouter"></i>
                                </button>
                            </div>
                        @endif
                        <h5 class="card-title">Liste des projets et programmes</h5>
                        <table class="table datatables align-middle" id="table-individuelles">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">LOGO</th>
                                    <th>Projet / Programme</th>
                                    <th class="text-center">Sigle</th>
                                    <th class="text-center">Statut</th>
                                    <th>Modules</th>
                                    <th class="text-center">Reçues</th>
                                    <th class="text-center">Prévues</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($projets as $projet)
                                    <tr>
                                        <th scope="row" style="text-align: center">
                                            <img class="rounded-circle" alt="Profil" src="{{ asset($projet->getProjetImage()) }}"
                                                width="40" height="auto">
                                        </th>
                                        <td>{{ $projet?->name }}</td>
                                        <td class="text-center">{{ $projet?->sigle }}</td>
                                        <td class="text-center">
                                            <span class="{{ $projet?->statut }}">{{ $projet?->statut }}</span>
                                        </td>
                                        <td class="text-center"><span
                                                class="badge bg-success">{{ count($projet?->projetmodules) }}</span></td>
                                        <td class="text-center">
                                            <a href="{{ route('projetsBeneficiaire', $projet->id) }}" class="badge bg-info"
                                                title="afficher">{{ count($projet?->individuelles) }}</a>
                                            {{-- @foreach ($projet?->individuelles as $individuelle)
                                                @if ($loop->last)
                                                    <a href="#"><span
                                                            class="badge bg-info">{{ $loop->count }}</span></a>
                                                @endif
                                            @endforeach --}}
                                        </td>
                                        <td class="text-center">{{ $projet?->effectif }}</td>
                                        <td>
                                            <span class="d-flex align-items-baseline"><a
                                                    href="{{ route('projets.show', $projet->id) }}"
                                                    class="btn btn-primary btn-sm" title="voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                                @if (auth()->user()->hasRole('super-admin|admin'))
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li>
                                                                <a class="dropdown-item btn btn-sm"
                                                                    href="{{ route('projets.edit', $projet->id) }}"
                                                                    class="mx-1" title="Modifier">Modifier</a>
                                                                {{-- <button type="button" class="dropdown-item btn btn-sm mx-1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#EditProjetModal{{ $projet->id }}">Modifier
                                                                </button> --}}
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('projets.destroy', $projet->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item show_confirm"
                                                                        title="Supprimer">Supprimer</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('ouvrirProjet', ['id' => $projet?->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button
                                                                        class="show_confirm_valider btn btn-sm mx-1">Ouvrir</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('fermerProjet', ['id' => $projet?->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button
                                                                        class="show_confirm_valider btn btn-sm mx-1">Fermer</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
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
        <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="AddProjetModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ route('addProjet') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un nouveau
                                    projet ou programme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="name" class="form-label">Projet<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="name" id="name" rows="1"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Nom du projet ou programme">{{ old('name') }}</textarea>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="sigle" class="form-label">Sigle<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="sigle" value="{{ old('sigle') }}"
                                            class="form-control form-control-sm @error('sigle') is-invalid @enderror"
                                            id="sigle" placeholder="sigle">
                                        @error('sigle')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_signature" class="form-label">Date signature<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="date" name="date_signature" value="{{ old('date_signature') }}"
                                            class="form-control form-control-sm @error('date_signature') is-invalid @enderror"
                                            id="date_signature" placeholder="Date signature">
                                        @error('date_signature')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="duree" class="form-label">Durée<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="number" name="duree" value="{{ old('duree') }}" min="1"
                                            max="84"
                                            class="form-control form-control-sm @error('duree') is-invalid @enderror"
                                            id="duree" placeholder="durée en mois">
                                        @error('duree')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="budjet" class="form-label">Budjet (F CFA)</label>
                                        <input type="number" name="budjet" value="{{ old('budjet') }}" min="0"
                                            step="0.001"
                                            class="form-control form-control-sm @error('budjet') is-invalid @enderror"
                                            id="budjet" placeholder="Budjet total">
                                        @error('budjet')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="debut" class="form-label">Date début</label>
                                        <input type="date" name="debut" value="{{ old('debut') }}"
                                            class="form-control form-control-sm @error('debut') is-invalid @enderror"
                                            id="debut" placeholder="Date début">
                                        @error('debut')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="fin" class="form-label">Date fin</label>
                                        <input type="date" name="fin" value="{{ old('fin') }}"
                                            class="form-control form-control-sm @error('fin') is-invalid @enderror"
                                            id="fin" placeholder="Date fin">
                                        @error('fin')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="effectif" class="form-label">Effectif à former</label>
                                        <input type="number" name="effectif" value="{{ old('effectif') }}"
                                            min="0" step="5"
                                            class="form-control form-control-sm @error('effectif') is-invalid @enderror"
                                            id="effectif" placeholder="effectif total à former">
                                        @error('effectif')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="type" class="form-label">Type localité<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="type" class="form-select  @error('type') is-invalid @enderror"
                                            aria-label="Select" id="select-field-typelocalite"
                                            data-placeholder="Choisir type">
                                            <option value="">Choisir type</option>
                                            <option value="Commune">Commune</option>
                                            <option value="Arrondissement">Arrondissement</option>
                                            <option value="Departement">Departement</option>
                                            <option value="Region">Région</option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="type_projet" class="form-label">Type projet<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="type_projet"
                                            class="form-select  @error('type_projet') is-invalid @enderror"
                                            aria-label="Select" id="select-field-projetprogramme"
                                            data-placeholder="Choisir type projet">
                                            <option value="">Choisir type projet</option>
                                            <option value="Projet">Projet</option>
                                            <option value="Programme">Programme</option>
                                        </select>
                                        @error('type_projet')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="description" class="form-label">Description<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="description" id="description" rows="3"
                                            class="form-control form-control-sm @error('description') is-invalid @enderror"
                                            placeholder="Description du projet ou programme">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                        Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Projet -->
        {{-- @foreach ($projets as $projet)
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                <div class="modal fade" id="EditProjetModal{{ $projet->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="EditProjetModalLabel{{ $projet->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <form method="post" action="{{ route('projets.update', $projet->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="modal-header" id="EditProjetModalLabel{{ $projet->id }}">
                                    <h5 class="modal-title">Modification : {{ $projet?->sigle }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">


                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="name" class="form-label">Projet<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="name" id="name" rows="1"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                placeholder="Nom du projet ou programme">{{ $projet->name ?? old('name') }}</textarea>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="sigle" class="form-label">Sigle<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="sigle"
                                                value="{{ $projet->sigle ?? old('sigle') }}"
                                                class="form-control form-control-sm @error('sigle') is-invalid @enderror"
                                                id="sigle" placeholder="sigle">
                                            @error('sigle')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="date_signature" class="form-label">Date signature<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="date" name="date_signature"
                                                value="{{ $projet->date_signature->format('Y-m-d') ?? old('date_signature') }}"
                                                class="form-control form-control-sm @error('date_signature') is-invalid @enderror"
                                                id="date_signature" placeholder="Date signature">
                                            @error('date_signature')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="duree" class="form-label">Durée</label>
                                            <input type="number" name="duree"
                                                value="{{ $projet->duree ?? old('duree') }}" min="1"
                                                max="84"
                                                class="form-control form-control-sm @error('duree') is-invalid @enderror"
                                                id="duree" placeholder="durée en mois">
                                            @error('duree')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="budjet" class="form-label">Budjet (F CFA)</label>
                                            <input type="number" name="budjet"
                                                value="{{ $projet->budjet ?? old('budjet') }}" min="0"
                                                step="0.001"
                                                class="form-control form-control-sm @error('budjet') is-invalid @enderror"
                                                id="budjet" placeholder="Budjet total">
                                            @error('budjet')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="debut" class="form-label">Date début</label>
                                            <input type="date" name="debut"
                                                value="{{ $projet->debut?->format('Y-m-d') ?? old('debut') }}"
                                                class="form-control form-control-sm @error('debut') is-invalid @enderror"
                                                id="debut" placeholder="Date début">
                                            @error('debut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="fin" class="form-label">Date fin</label>
                                            <input type="date" name="fin"
                                                value="{{ $projet?->fin?->format('Y-m-d') ?? old('fin') }}"
                                                class="form-control form-control-sm @error('fin') is-invalid @enderror"
                                                id="fin" placeholder="Date fin">
                                            @error('fin')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="effectif" class="form-label">Effectif à former</label>
                                            <input type="number" name="effectif"
                                                value="{{ $projet?->effectif ?? old('effectif') }}" min="0"
                                                step="5"
                                                class="form-control form-control-sm @error('effectif') is-invalid @enderror"
                                                id="effectif" placeholder="effectif total à former">
                                            @error('effectif')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="type" class="form-label">Type localité<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="type"
                                                class="form-select  @error('type') is-invalid @enderror"
                                                aria-label="Select" id="select-field-type"
                                                data-placeholder="Choisir type">
                                                <option value="{{ $projet?->type_localite }}">
                                                    {{ $projet?->type_localite }}</option>
                                                <option value="Commune">Commune</option>
                                                <option value="Arrondissement">Arrondissement</option>
                                                <option value="Departement">Departement</option>
                                                <option value="Region">Région</option>
                                            </select>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="type_projet" class="form-label">Type projet<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="type_projet"
                                                class="form-select  @error('type_projet') is-invalid @enderror"
                                                aria-label="Select" id="select-field"
                                                data-placeholder="Choisir type projet">
                                                <option value="{{ $projet?->type_projet }}">
                                                    {{ $projet?->type_projet }}</option>
                                                <option value="Projet">Projet</option>
                                                <option value="Programme">Programme</option>
                                            </select>
                                            @error('type_projet')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="description" class="form-label">Description<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="description" id="description" rows="3"
                                                class="form-control form-control-sm @error('description') is-invalid @enderror"
                                                placeholder="Description du projet ou programme">{{ $projet?->description ?? old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                                            Modifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}
    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-individuelles', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            /*  "order": [
                 [0, 'asc']
             ], */
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

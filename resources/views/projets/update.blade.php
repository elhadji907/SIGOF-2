@extends('layout.user-layout')
@section('title', 'Modification ' . $projet?->sigle)
@section('space-work')
    <section class="section min-vh-0 d-flex flex-column align-items-center justify-content-center py-0">
        <div class="container">
            <div class="row justify-content-center">
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('projets.index') }}"
                                            class="btn btn-success btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | Liste des projets</p>
                                    </span>
                                </div>
                            </div>
                            <h5 class="card-title text-center pb-0 fs-4">Modification
                                {{ $projet?->type_projet . ' ' . $projet?->sigle }}</h5>
                            {{-- <p class="text-center small">Introduire les nouvelles données pour modifier</p> --}}
                            <form method="post" action="{{ route('projets.update', $projet->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                {{-- <div class="modal-header" id="EditProjetModalLabel{{ $projet->id }}">
                                    <h5 class="modal-title">Modification : {{ $projet?->sigle }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div> --}}
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="name" class="form-label">Projet<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="name" id="name" rows="1"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Nom du projet ou programme">{{ $projet->name ?? old('name') }}</textarea>
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
                                                value="{{ $projet->duree ?? old('duree') }}" min="1" max="84"
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
                                                <option value="{{ $projet?->type_localite ?? old('type') }}">
                                                    {{ $projet?->type_localite ?? old('type') }}</option>
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
                                                <option value="{{ $projet?->type_projet ?? old('type_projet') }}">
                                                    {{ $projet?->type_projet ?? old('type_projet') }}</option>
                                                <option value="Projet">Projet</option>
                                                <option value="Programme">Programme</option>
                                            </select>
                                            @error('type_projet')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="date_ouverture" class="form-label">Date ouverture</label>
                                            <input type="date" name="date_ouverture"
                                                value="{{ $projet->date_ouverture?->format('Y-m-d') ?? old('date_ouverture') }}"
                                                class="form-control form-control-sm @error('date_ouverture') is-invalid @enderror"
                                                id="date_ouverture" placeholder="Date ouverture">
                                            @error('date_ouverture')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="date_fermeture" class="form-label">Date ferméture</label>
                                            <input type="date" name="date_fermeture"
                                                value="{{ $projet?->date_fermeture?->format('Y-m-d') ?? old('date_fermeture') }}"
                                                class="form-control form-control-sm @error('date_fermeture') is-invalid @enderror"
                                                id="date_fermeture" placeholder="Date ferméture">
                                            @error('date_fermeture')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <label for="image" class="form-label">Logo<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="file" name="image" value="{{ old('image') }}"
                                                class="form-control form-control-sm @error('image') is-invalid @enderror"
                                                id="image" placeholder="Image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                            <label for="reference" class="form-label">Image</label><br>
                                            @if (isset($projet->image))
                                                <div>
                                                    <img class="w-25" alt="Profil"
                                                        src="{{ asset($projet->getProjetImage()) }}" width="20"
                                                        height="auto">
                                                </div>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <label for="convention_file" class="form-label">Convention signée<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="file" name="convention_file"
                                                value="{{ old('convention_file') }}"
                                                class="form-control form-control-sm @error('convention_file') is-invalid @enderror"
                                                id="convention_file" placeholder="convention">
                                            @error('convention_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                            <label for="reference" class="form-label">Fichier</label><br>
                                            @if (isset($projet->convention_file))
                                                <div>
                                                    <a class="btn btn-outline-secondary btn-sm"
                                                        title="télécharger le fichier joint" target="_blank"
                                                        href="{{ asset($projet->getConvention()) }}">
                                                        <i class="bi bi-file-earmark-pdf"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
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
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary btn-sm"><i
                                                class="bi bi-printer"></i>
                                            Modifier</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

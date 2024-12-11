@extends('layout.user-layout')
@section('title', 'enregistrement courrier arrivé')
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
                    <div class="card mb-3">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 pt-2">
                                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('arrives.index') }}"
                                            class="btn btn-success btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | Liste des courriers arrivés</p>
                                    </span>
                                </div>
                            </div>
                            <div class="pt-0 pb-0">
                                <h5 class="card-title text-center pb-0 fs-4">Enregistrement</h5>
                                <p class="text-center small">enregister un nouveau courrier arrivé</p>
                            </div>
                            <form method="post" action="{{ route('arrives.store') }}" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="date_arrivee" class="form-label">Date arrivée<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_arrivee" value="{{ old('date_arrivee') }}"
                                        class="form-control form-control-sm @error('date_arrivee') is-invalid @enderror"
                                        id="date_arrivee" placeholder="Date arrivée">
                                    @error('date_arrivee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="numero_arrive" class="form-label">Numéro<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_arrive"
                                            value="{{ $numCourrier ?? old('numero_arrive') }}"
                                            class="form-control form-control-sm @error('numero_arrive') is-invalid @enderror"
                                            id="numero_arrive" placeholder="Numéro de correspondance">
                                        @error('numero_arrive')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="date_correspondance" class="form-label">Date correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_correspondance"
                                        value="{{ old('date_correspondance') }}"
                                        class="form-control form-control-sm @error('date_correspondance') is-invalid @enderror"
                                        id="date_correspondance" placeholder="nom">
                                    @error('date_correspondance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="numero_correspondance" class="form-label">Numéro correspondance<span
                                        class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="text" min="0" name="numero_correspondance"
                                            value="{{ old('numero_correspondance') }}"
                                            class="form-control form-control-sm @error('numero_correspondance') is-invalid @enderror"
                                            id="numero_correspondance" placeholder="Numéro de correspondance">
                                        @error('numero_correspondance')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="annee" class="form-label">Année<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="2024" name="annee" value="{{ $anneeEnCours ?? old('annee') }}"
                                        class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                        id="annee" placeholder="Année">
                                    @error('annee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-9 col-lg-9 mb-0">
                                    <label for="expediteur" class="form-label">Expéditeur<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="expediteur" value="{{ old('expediteur') }}"
                                        class="form-control form-control-sm @error('expediteur') is-invalid @enderror"
                                        id="expediteur" placeholder="Expéditeur">
                                    @error('expediteur')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="objet" value="{{ old('objet') }}"
                                        class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                        id="objet" placeholder="Objet">
                                    @error('objet')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4 col-lg-4 mb-0">
                                    <label for="reference" class="form-label">Référence</label>
                                    <input type="text" name="reference" value="{{ old('reference') }}"
                                        class="form-control form-control-sm @error('reference') is-invalid @enderror"
                                        id="reference" placeholder="Référence">
                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4 col-lg-4 mb-0">
                                    <label for="numero_reponse" class="form-label">Numéro réponse</label>
                                    <input type="number" min="0" name="numero_reponse"
                                        value="{{ old('numero_reponse') }}"
                                        class="form-control form-control-sm @error('numero_reponse') is-invalid @enderror"
                                        id="numero_reponse" placeholder="Numéro réponse">
                                    @error('numero_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4 col-lg-4 mb-0">
                                    <label for="date_reponse" class="form-label">Date réponse</label>
                                    <input type="date" min="0" name="date_reponse"
                                        value="{{ old('date_reponse') }}"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror"
                                        id="date_reponse" placeholder="Numéro réponse">
                                    @error('date_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mb-0">
                                    <label for="observation" class="form-label">Observations</label>
                                    <textarea name="observation" id="observation" rows="1"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ old('observation') }}</textarea>
                                    @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

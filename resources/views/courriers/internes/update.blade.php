@extends('layout.user-layout')
@section('title', 'Modification courrier interne')
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
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif
                <div
                    class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 pt-2">
                                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('internes.index') }}"
                                            class="btn btn-success btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | Liste des courriers internes</p>
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="pt-0 pb-0">
                                <h5 class="card-title text-center pb-0 fs-4">Modification</h5>
                                <p class="text-center small">modification courrier interne</p>
                            </div> --}}
                            <form method="post" action="{{ url('internes/' . $interne->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('PUT')
                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="date_interne" class="form-label">Date internee<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_interne"
                                        value="{{ $interne->courrier->date_recep?->format('Y-m-d') ?? old('date_interne') }}"
                                        class="form-control form-control-sm @error('date_interne') is-invalid @enderror"
                                        id="date_interne" placeholder="Date internee">
                                    @error('date_interne')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="numero_interne" class="form-label">Numéro<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_interne"
                                            value="{{ $interne->numero ?? old('numero_interne') }}"
                                            class="form-control form-control-sm @error('numero_interne') is-invalid @enderror"
                                            id="numero_interne" placeholder="Numéro de correspondance">
                                        @error('numero_interne')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_correspondance" class="form-label">Date correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_correspondance"
                                        value="{{ $interne->courrier->date_cores?->format('Y-m-d') ?? old('date_correspondance') }}"
                                        class="form-control form-control-sm @error('date_correspondance') is-invalid @enderror"
                                        id="date_correspondance" placeholder="nom">
                                    @error('date_correspondance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_correspondance" class="form-label">Numéro correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="text" min="0" name="numero_correspondance"
                                            value="{{ $interne->courrier->numero ?? old('numero_correspondance') }}"
                                            class="form-control form-control-sm @error('numero_correspondance') is-invalid @enderror"
                                            id="numero_correspondance" placeholder="Numéro de correspondance">
                                        @error('numero_correspondance')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="annee" class="form-label">Année<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="2024" name="annee"
                                        value="{{ $interne->courrier->annee ?? old('annee') }}"
                                        class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                        id="annee" placeholder="Année">
                                    @error('annee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="expediteur" class="form-label">Expéditeur<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="expediteur"
                                        value="{{ $interne->courrier->expediteur ?? old('expediteur') }}"
                                        class="form-control form-control-sm @error('expediteur') is-invalid @enderror"
                                        id="expediteur" placeholder="Expéditeur">
                                    @error('expediteur')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="objet"
                                        value="{{ $interne->courrier->objet ?? old('objet') }}"
                                        class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                        id="objet" placeholder="Objet">
                                    @error('objet')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="reference" class="form-label">Référence</label>
                                    <input type="text" name="reference"
                                        value="{{ $interne->courrier->reference ?? old('reference') }}"
                                        class="form-control form-control-sm @error('reference') is-invalid @enderror"
                                        id="reference" placeholder="Référence">
                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_reponse" class="form-label">Numéro réponse</label>
                                    <input type="number" min="0" name="numero_reponse"
                                        value="{{ $interne->courrier->numero_reponse ?? old('numero_reponse') }}"
                                        class="form-control form-control-sm @error('numero_reponse') is-invalid @enderror"
                                        id="numero_reponse" placeholder="Numéro réponse">
                                    @error('numero_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_reponse" class="form-label">Date réponse</label>
                                    <input type="date" min="0" name="date_reponse"
                                        value="{{ $interne->courrier->date_reponse?->format('Y-m-d') ?? old('date_reponse') }}"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror"
                                        id="date_reponse" placeholder="Numéro réponse">
                                    @error('date_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="observation" class="form-label">Observations </label>
                                    <textarea name="observation" id="observation" rows="1" class="form-control form-control-sm"
                                        placeholder="Observations">{{ old('observation', $interne->courrier->observation) }}</textarea>
                                    @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="legende" class="form-label">Légende</label>
                                    <input type="text" name="legende"
                                        value="{{ $interne->courrier->legende ?? old('legende') }}"
                                        class="form-control form-control-sm @error('legende') is-invalid @enderror"
                                        id="legende" placeholder="Le nom du fichier scanné">
                                    @error('legende')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="reference" class="form-label">Scan courrier</label>
                                    <input type="file" name="file" id="file"
                                        class="form-control @error('file') is-invalid @enderror btn btn-primary btn-sm">
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    @if (isset($interne->courrier->file))
                                        <label for="reference" class="form-label">Cliquer ici pour télécharger</label><br>
                                        <a class="btn btn-outline-secondary btn-sm" title="télécharger le fichier joint"
                                            target="_blank" href="{{ asset($interne->courrier->getFile()) }}">
                                            <i class="bi bi-download">&nbsp;Cliquer ici pour télécharger le courrier
                                                scanné</i>
                                        </a>
                                    @endif
                                    {{-- <img class="w-25" alt="courrier"
                                    src="{{ asset($interne->courrier->getFile()) }}" width="50"
                                    height="auto"> --}}
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Modifier</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

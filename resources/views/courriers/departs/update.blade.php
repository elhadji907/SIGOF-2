@extends('layout.user-layout')
@section('title', 'Modification courrier départ')
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
                <div
                    class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 pt-2">
                                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('departs.index') }}"
                                            class="btn btn-success btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | Liste des courriers départs</p>
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="pt-0 pb-0">
                                <h5 class="card-title text-center pb-0 fs-4">Modification</h5>
                                <p class="text-center small">modification courrier départ</p>
                            </div> --}}
                            <form method="post" action="{{ url('departs/' . $depart->id) }}" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                @method('PUT')
                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_depart" class="form-label">Date départ<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_depart"
                                        value="{{ $depart->courrier->date_depart?->format('Y-m-d') ?? old('date_depart') }}"
                                        class="form-control form-control-sm @error('date_depart') is-invalid @enderror"
                                        id="date_depart" placeholder="Date départ">
                                    @error('date_depart')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_depart" class="form-label">Numéro départ<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_depart"
                                            value="{{ $depart->numero ?? old('numero_depart') }}"
                                            class="form-control form-control-sm @error('numero_depart') is-invalid @enderror"
                                            id="numero_depart" placeholder="Numéro départ">
                                        @error('numero_depart')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_corres" class="form-label">Date correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_corres"
                                        value="{{ $depart->courrier->date_cores?->format('Y-m-d') ?? old('date_corres') }}"
                                        class="form-control form-control-sm @error('date_corres') is-invalid @enderror"
                                        id="date_corres" placeholder="nom">
                                    @error('date_corres')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_correspondance" class="form-label">Numéro correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_correspondance"
                                            value="{{ $depart->courrier->numero ?? old('numero_correspondance') }}"
                                            class="form-control form-control-sm @error('numero_correspondance') is-invalid @enderror"
                                            id="numero_correspondance" placeholder="Numéro de correspondance">
                                        @error('numero_correspondance')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="annee" class="form-label">Année<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="2024" name="annee"
                                        value="{{ $depart->courrier->annee ?? old('annee') }}"
                                        class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                        id="annee" placeholder="Année">
                                    @error('annee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="destinataire" class="form-label">Destinataire<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="destinataire"
                                        value="{{ $depart->destinataire ?? old('destinataire') }}"
                                        class="form-control form-control-sm @error('destinataire') is-invalid @enderror"
                                        id="destinataire" placeholder="Destinataire">
                                    @error('destinataire')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="objet"
                                        value="{{ $depart->courrier->objet ?? old('objet') }}"
                                        class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                        id="objet" placeholder="Objet">
                                    @error('objet')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="service_expediteur" class="form-label">Service expéditeur</label>
                                    <input type="text" name="service_expediteur"
                                        value="{{ $depart->courrier->reference ?? old('service_expediteur') }}"
                                        class="form-control form-control-sm @error('service_expediteur') is-invalid @enderror"
                                        id="service_expediteur" placeholder="Service expéditeur">
                                    @error('service_expediteur')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_reponse" class="form-label">Numéro réponse</label>
                                    <input type="number" min="0" name="numero_reponse"
                                        value="{{ $depart->courrier->numero_reponse ?? old('numero_reponse') }}"
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
                                        value="{{ $depart->courrier->date_reponse?->format('Y-m-d') ?? old('date_reponse') }}"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror"
                                        id="date_reponse" placeholder="Numéro réponse">
                                    @error('date_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="observation" class="form-label">Observations</label>
                                    <textarea name="observation" id="observation" rows="1"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ $depart->courrier->observation ?? old('observation') }}</textarea>
                                    @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="legende" class="form-label">Légende</label>
                                    <input type="text" name="legende"
                                        value="{{ $depart->courrier->legende ?? old('legende') }}"
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
                                    <label for="reference" class="form-label">Fichier</label><br>
                                    @if (isset($depart->courrier->file))
                                        <div>
                                            <a class="btn btn-outline-secondary btn-sm"
                                                title="télécharger le fichier joint" target="_blank"
                                                href="{{ asset($depart->courrier->getFile()) }}">
                                                <i class="bi bi-file-earmark-pdf"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div class="badge bg-warning">Aucun</div>
                                    @endif
                                    {{-- <img class="w-25" alt="courrier"
                                    src="{{ asset($depart->courrier->getFile()) }}" width="50"
                                    height="auto"> --}}
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-sm">Enregistrer les
                                        modifications</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

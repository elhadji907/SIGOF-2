@extends('layout.user-layout')
@section('title', 'Modification du référentiel ' . $referentiel?->intitule)
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
                            <form method="post" action="{{ route('referentiels.update', $referentiel?->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="d-flex mt-2 align-items-baseline"><a
                                                href="{{ route('referentiels.index') }}" class="btn btn-success btn-sm"
                                                title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                            <p> | Liste des référentiel</p>
                                        </span>
                                    </div>
                                </div>
                                <h5 class="card-title text-center pb-0 fs-4">Modification du référentiel :
                                    {{ $referentiel?->intitule }}</h5>
                                <input type="hidden" name="id" value="{{ $referentiel?->id }}">

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="intitule" class="form-label">Intitulé<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="intitule" id="intitule" rows="1"
                                        class="form-control form-control-sm @error('intitule') is-invalid @enderror" placeholder="Intitulé">{{ $referentiel?->intitule ?? old('intitule') }}</textarea>
                                    @error('intitule')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="titre" class="form-label">Titre<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="titre" id="titre" rows="1"
                                        class="form-control form-control-sm @error('titre') is-invalid @enderror" placeholder="Titre">{{ $referentiel?->titre ?? old('titre') }}</textarea>
                                    @error('titre')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="categorie" class="form-label">Catégorie<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="categorie" id="category" rows="1"
                                        class="form-control form-control-sm @error('categorie') is-invalid @enderror" placeholder="Catégorie">{{ $referentiel?->categorie ?? old('categorie') }}</textarea>
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="convention" class="form-label">Convention<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="convention" class="form-select  @error('convention') is-invalid @enderror"
                                        aria-label="Select" id="select-field-convention-update"
                                        data-placeholder="Choisir la localité">
                                        <option value="{{ $referentiel?->convention?->name ?? old('convention') }}">
                                            {{ $referentiel?->convention?->name ?? old('convention') }}</option>
                                        <option value="null">
                                            Aucun
                                        </option>
                                        @foreach ($conventions as $convention)
                                            <option value="{{ $convention->name }}">
                                                {{ $convention->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('convention')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="reference" class="form-label">Référence<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="reference" id="reference" rows="2"
                                        class="form-control form-control-sm @error('reference') is-invalid @enderror" placeholder="Référence">{{ $referentiel?->reference ?? old('reference') }}</textarea>
                                    @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Enregister
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

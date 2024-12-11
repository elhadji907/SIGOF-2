@extends('layout.user-layout')
@section('title', 'Modification ' . $antenne?->name)
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
                                <div class="col-sm-12 pt-5">
                                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('antennes.index') }}"
                                            class="btn btn-success btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | Liste des antennes</p>
                                    </span>
                                </div>
                            </div>

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Modification</h5>
                                <p class="text-center small">Introduire les nouvelles données pour modifier</p>
                            </div>
                            <form method="post" action="{{ route('antennes.update', $antenne->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="name" class="form-label">Antenne<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="name" rows="1" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Antenne">{{ $antenne?->name ?? old('name') }}</textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="code" class="form-label">Code<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="code" rows="1" class="form-control form-control-sm @error('code') is-invalid @enderror"
                                        placeholder="Code">{{ $antenne?->code ?? old('code') }}</textarea>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="contact" class="form-label">contact<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="0" name="contact"
                                        value="{{ $antenne?->contact ?? old('contact') }}"
                                        class="form-control form-control-sm @error('contact') is-invalid @enderror"
                                        id="contact" placeholder="numéro de téléphone">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="adresse" class="form-label">Adresse<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="adresse" id="adresse" rows="1"
                                        class="form-control form-control-sm @error('adresse') is-invalid @enderror" placeholder="Ecrire votre adresse ici">{{ $antenne?->adresse ?? old('adresse') }}</textarea>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="employe" class="form-label">Chef antenne</label>
                                    <select name="employe" class="form-select  @error('employe') is-invalid @enderror"
                                        aria-label="Select" id="select-field-chef-antenne-update"
                                        data-placeholder="Choisir chef antenne">
                                        <option value="{{ $antenne?->chef?->id }}">
                                            {{ $antenne?->chef?->user?->civilite . ' ' . $antenne->chef?->user?->firstname . ' ' . $antenne->chef?->user?->name }}
                                        </option>
                                        @foreach ($employe as $employes)
                                            <option value="{{ $employes->id }}">
                                                {{ $employes?->matricule . ' ' . $employes?->user?->firstname . ' ' . $employes?->user?->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employe')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="region" class="form-label">Régions</label>
                                    <select name="region[]" class="form-select" aria-label="Select"
                                        id="multiple-select-field-region-antenne-update" multiple
                                        data-placeholder="Choisir région">
                                        @foreach ($regions as $region)
                                            <option value="{{ $region?->id }}"
                                                {{ in_array($region->id, $antenneRegion) ? 'selected' : '' }}>
                                                {{ $region?->nom ?? old('region') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Sauvegarder les
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

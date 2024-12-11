@extends('layout.user-layout')
@section('title', 'Enregistrement employé')
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
                                <div class="col-sm-12 pt-0">
                                    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('employes.index') }}"
                                            class="btn btn-success btn-sm" title="retour"><i
                                                class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | Liste des employés</p>
                                    </span>
                                </div>
                            </div>
                            <h5 class="card-title text-center pb-0 fs-4">Enregistrement</h5>
                            <p class="text-center small">Ajouter un nouveau employé</p>
                            <form method="post" action="{{ url('employes') }}" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="firstname" class="form-label">Civilité<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="civilite"
                                        class="form-select form-select-sm @error('civilite') is-invalid @enderror"
                                        aria-label="Select" id="select-field-civilite" data-placeholder="Choisir civilité">
                                        <option value="{{ old('civilite') }}">
                                            {{ old('civilite') }}
                                        </option>
                                        <option value="Monsieur">
                                            Monsieur
                                        </option>
                                        <option value="Madame">
                                            Madame
                                        </option>
                                    </select>
                                    @error('civilite')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="firstname" class="form-label">Prénom<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="firstname" value="{{ old('firstname') }}"
                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                        id="firstname" placeholder="prénom">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="name" class="form-label">Nom<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" placeholder="nom">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="name" class="form-label">Date naissance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_naissance" value="{{ old('date_naissance') }}"
                                        class="form-control form-control-sm @error('date_naissance') is-invalid @enderror"
                                        id="date_naissance" placeholder="Date naissance">
                                    @error('date_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="name" class="form-label">Lieu naissance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input name="lieu_naissance" type="text"
                                        class="form-control form-control-sm @error('lieu_naissance') is-invalid @enderror"
                                        id="lieu_naissance" value="{{ old('lieu_naissance') }}"
                                        autocomplete="lieu_naissance" placeholder="Lieu naissance">
                                    @error('lieu_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="adresse" class="form-label">Adresse<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="adresse" value="{{ old('adresse') }}"
                                        class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                        id="adresse" placeholder="adresse">
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        {{-- <span class="input-group-text" id="email">@</span> --}}
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            id="email" placeholder="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-12 col-md-6 col-lg-4">
                                    <label for="telephone" class="form-label">Téléphone<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="telephone" value="{{ old('telephone') }}"
                                        class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                        id="telephone" placeholder="téléphone">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="telephone" class="form-label">Téléphone personnel<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="0" name="telephone"
                                        value="{{ old('telephone') }}"
                                        class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                        id="telephone" placeholder="7xxxxxxxx">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="cin" class="form-label">N° CIN<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="cin" value="{{ old('cin') }}"
                                        class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                        id="cin" placeholder="Numéro carte d'identité nationale">
                                    @error('cin')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="name" class="form-label">Date embauche<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_embauche" value="{{ old('date_embauche') }}"
                                        class="form-control form-control-sm @error('date_embauche') is-invalid @enderror"
                                        id="date_embauche" placeholder="Date embauche">
                                    @error('date_embauche')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="categorie" class="form-label">Catégorie<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="categorie" class="form-select @error('categorie') is-invalid @enderror"
                                        aria-label="Select" id="select-field-categories"
                                        data-placeholder="Choisir categorie">
                                        <option value="{{ old('categorie') }}">{{ old('categorie') }}</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->name }}">
                                                {{ $categorie->name ?? old('categorie') }}</option>
                                        @endforeach
                                    </select>
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="direction" class="form-label">Direction<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="direction" class="form-select @error('direction') is-invalid @enderror"
                                        aria-label="Select" id="select-field" data-placeholder="Choisir direction">
                                        <option value="{{ old('direction') }}">{{ old('direction') }}</option>
                                        @foreach ($directions as $direction)
                                            <option value="{{ $direction->name }}">
                                                {{ $direction->name ?? old('direction') }}</option>
                                        @endforeach
                                    </select>
                                    @error('direction')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="fonction" class="form-label">Fonction<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="fonction" class="form-select @error('fonction') is-invalid @enderror"
                                        aria-label="Select" id="select-field-fonction"
                                        data-placeholder="Choisir fonction">
                                        <option value="{{ old('fonction') }}">{{ old('fonction') }}</option>
                                        @foreach ($fonctions as $fonction)
                                            <option value="{{ $fonction->name }}">
                                                {{ $fonction->name ?? old('fonction') }}</option>
                                        @endforeach
                                    </select>
                                    @error('fonction')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="matricule" class="form-label">Situation familiale<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="situation_familiale"
                                        class="form-select  @error('situation_familiale') is-invalid @enderror"
                                        aria-label="Select" id="select-field-familiale"
                                        data-placeholder="Choisir situation familiale">
                                        <option value="{{ old('situation_familiale') }}">
                                            {{ old('situation_familiale') }}
                                        </option>
                                        <option value="Marié(e)">
                                            Marié(e)
                                        </option>
                                        <option value="Célibataire">
                                            Célibataire
                                        </option>
                                        <option value="Veuf(ve)">
                                            Veuf(ve)
                                        </option>
                                        <option value="Divorsé(e)">
                                            Divorsé(e)
                                        </option>
                                    </select>
                                    @error('situation_familiale')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="matricule" class="form-label">Matricule</label>
                                    <input type="text" name="matricule" value="{{ old('matricule') }}"
                                        class="form-control form-control-sm @error('matricule') is-invalid @enderror"
                                        id="matricule" placeholder="matricule">
                                    @error('matricule')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="profil" class="form-label">Photo de profil</label>
                                    <input type="file" name="image" id="image" value="{{ old('image') }}"
                                        class="form-control @error('image') is-invalid @enderror btn btn-outline-info btn-sm">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="col-xl-4">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

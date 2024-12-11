@extends('layout.user-layout')
@section('title', 'modification demande individuelle')
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
                                    @if (auth()->user()->hasRole('Demandeur'))
                                        <span class="d-flex mt-2 align-items-baseline"><a
                                                href="{{ route('demandesIndividuelle') }}" class="btn btn-success btn-sm"
                                                title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                            <p> | Dossier personnel</p>
                                        </span>
                                    @endif
                                    @if (auth()->user()->hasRole('super-admin|admin'))
                                        <span class="d-flex mt-2 align-items-baseline"><a
                                                href="{{ route('individuelles.show', $individuelle?->id) }}"
                                                class="btn btn-success btn-sm" title="retour"><i
                                                    class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                            <p> | retour</p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- <p>NB: Si la formation souhaiter n'est pas disponible, merci de choisir <b>Autre</b> et renseigner votre formation souhaitée sur la case: {{ ("<<Si autre formation ? précisez>>") }}</p> --}}
                            {{-- <div class="pt-0 pb-0">
                                <h5 class="card-title text-center pb-0 fs-4">modification</h5>
                                <p class="text-center small">enregister un nouveau demande individuelle</p>
                            </div> --}}
                            <form method="post" action="{{ url('individuelles/' . $individuelle->id) }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('PUT')
                                {{-- <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="civilite" class="form-label">Civilité<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="civilite"
                                        class="form-select form-select-sm @error('civilite') is-invalid @enderror"
                                        aria-label="Select" id="select-field-civilite" data-placeholder="Choisir civilité">
                                        <option value="{{ $individuelle?->user->civilite }}">
                                            {{ $individuelle?->user->civilite ?? old('civilite') }}
                                        </option>
                                        <option value="M.">
                                            Monsieur
                                        </option>
                                        <option value="Mme">
                                            Madame
                                        </option>
                                    </select>
                                    @error('civilite')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="cin" class="form-label">N° CIN<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="cin"
                                        value="{{ $individuelle?->user->cin ?? old('cin') }}"
                                        class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                        id="cin" placeholder="Numéro carte d'identité nationale">
                                    @error('cin')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="firstname" class="form-label">Prénom<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="firstname"
                                        value="{{ $individuelle?->user->firstname ?? old('firstname') }}"
                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                        id="firstname" placeholder="prénom">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="name" class="form-label">Nom<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="name"
                                        value="{{ $individuelle?->user->name ?? old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" placeholder="nom">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="date_naissance" class="form-label">Date naissance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_naissance"
                                        value="{{ $individuelle?->user->date_naissance?->format('Y-m-d') ?? old('date_naissance') }}"
                                        class="form-control form-control-sm @error('date_naissance') is-invalid @enderror"
                                        id="date_naissance" placeholder="Date naissance">
                                    @error('date_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="name" class="form-label">Lieu naissance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input name="lieu_naissance" type="text"
                                        class="form-control form-control-sm @error('lieu_naissance') is-invalid @enderror"
                                        id="lieu_naissance"
                                        value="{{ $individuelle?->user->lieu_naissance ?? old('lieu_naissance') }}"
                                        autocomplete="lieu_naissance" placeholder="Lieu naissance">
                                    @error('lieu_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}


                                <div class="col-12 col-md-12 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                    <label for="module" class="form-label">Formation sollicitée<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="module"
                                        value="{{ $individuelle?->module?->name ?? old('module_name') }}"
                                        class="form-control form-control-sm @error('module_name') is-invalid @enderror"
                                        id="module_name" placeholder="Nom du module" autofocus>
                                    <div id="countryList"></div>
                                    {{ csrf_field() }}
                                    @error('module')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    {{-- <label for="module" class="form-label">Formation sollicitée<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="module" class="form-select  @error('module') is-invalid @enderror"
                                        aria-label="Select" id="select-field-module" data-placeholder="Choisir formation">
                                        <option value="{{ $individuelle?->module?->id }}">
                                            {{ $individuelle?->module?->name }}</option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}">
                                                {{ $module->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('module')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror --}}
                                </div>

                                <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="departement" class="form-label">Lieu de formation<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="departement"
                                        class="form-select  @error('departement') is-invalid @enderror" aria-label="Select"
                                        id="select-field-departement" data-placeholder="Choisir localité">
                                        <option value="{{ $individuelle?->departement?->nom ?? old('departement') }}">
                                            {{ $individuelle?->departement?->nom ?? old('departement') }}</option>
                                        @foreach ($departements as $departement)
                                            <option value="{{ $departement->nom }}">
                                                {{ $departement->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departement')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="adresse" class="form-label">Adresse<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="adresse"
                                        value="{{ $individuelle?->adresse ?? old('adresse') }}"
                                        class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                        id="adresse" placeholder="adresse">
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                {{--  <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="email"
                                            value="{{ $individuelle?->user->email ?? old('email') }}"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            id="email" placeholder="email" @readonly(true)>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                {{-- <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="telephone" class="form-label">Téléphone personnel<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="telephone"
                                        value="{{ $individuelle?->user->telephone ?? old('telephone') }}"
                                        class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                        id="telephone" placeholder="téléphone">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="telephone_secondaire" class="form-label">Téléphone secondaire<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="0" name="telephone_secondaire"
                                        value="{{ $individuelle?->telephone ?? old('telephone_secondaire') }}"
                                        class="form-control form-control-sm @error('telephone_secondaire') is-invalid @enderror"
                                        id="telephone_secondaire" placeholder="7xxxxxxxx">
                                    @error('telephone_secondaire')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="autre_module" class="form-label">Si autre formation ? précisez</label>
                                    <input type="text" name="autre_module"
                                        value="{{ $individuelle->autre_module ?? old('autre_module') }}"
                                        class="form-control form-control-sm @error('autre_module') is-invalid @enderror"
                                        id="autre_module" placeholder="autre formation">
                                    @error('autre_module')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="matricule" class="form-label">Situation familiale<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="situation_familiale"
                                        class="form-select  @error('situation_familiale') is-invalid @enderror"
                                        aria-label="Select" id="select-field-familiale"
                                        data-placeholder="Choisir situation familiale">
                                        <option value="{{ $individuelle?->user->situation_familiale }}">
                                            {{ $individuelle?->user->situation_familiale ?? old('situation_familiale') }}
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

                                <div class="col-12 col-md-3 col-lg-3 mb-0">
                                    <label for="situation professionnelle" class="form-label">Situation
                                        professionnelle<span class="text-danger mx-1">*</span></label>
                                    <select name="situation_professionnelle"
                                        class="form-select  @error('situation_professionnelle') is-invalid @enderror"
                                        aria-label="Select" id="select-field-professionnelle"
                                        data-placeholder="Choisir situation professionnelle">
                                        <option value="{{ $individuelle?->user->situation_professionnelle }}">
                                            {{ $individuelle?->user->situation_professionnelle ?? old('situation_professionnelle') }}
                                        </option>
                                        <option value="Employé(e)">
                                            Employé(e)
                                        </option>
                                        <option value="Informel">
                                            Informel
                                        </option>
                                        <option value="Elève ou étudiant">
                                            Elève ou étudiant
                                        </option>
                                        <option value="chercheur emploi">
                                            chercheur emploi
                                        </option>
                                        <option value="Stage ou période essai">
                                            Stage ou période essai
                                        </option>
                                        <option value="Entrepreneur ou freelance">
                                            Entrepreneur ou freelance
                                        </option>
                                    </select>
                                    @error('situation_professionnelle')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="Niveau étude" class="form-label">Niveau étude<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="niveau_etude"
                                        class="form-select  @error('niveau_etude') is-invalid @enderror" aria-label="Select"
                                        id="select-field-niveau_etude" data-placeholder="Choisir niveau étude">
                                        <option value="{{ $individuelle->niveau_etude }}">
                                            {{ $individuelle->niveau_etude ?? old('niveau_etude') }}
                                        </option>
                                        <option value="Aucun">
                                            Aucun
                                        </option>
                                        <option value="Arabe">
                                            Arabe
                                        </option>
                                        <option value="Elementaire">
                                            Elementaire
                                        </option>
                                        <option value="Secondaire">
                                            Secondaire
                                        </option>
                                        <option value="Moyen">
                                            Moyen
                                        </option>
                                        <option value="Supérieur">
                                            Supérieur
                                        </option>
                                    </select>
                                    @error('niveau_etude')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="diplome_academique" class="form-label">Diplôme académique<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="diplome_academique"
                                        class="form-select  @error('diplome_academique') is-invalid @enderror"
                                        aria-label="Select" id="select-field-diplome_academique"
                                        data-placeholder="Choisir diplôme académique">
                                        <option value="{{ $individuelle->diplome_academique }}">
                                            {{ $individuelle->diplome_academique ?? old('diplome_academique') }}
                                        </option>
                                        <option value="Aucun">
                                            Aucun
                                        </option>
                                        <option value="Arabe">
                                            Arabe
                                        </option>
                                        <option value="CFEE">
                                            CFEE
                                        </option>
                                        <option value="BFEM">
                                            BFEM
                                        </option>
                                        <option value="BAC">
                                            BAC
                                        </option>
                                        <option value="Licence">
                                            Licence
                                        </option>
                                        <option value="Master 2">
                                            Master 2
                                        </option>
                                        <option value="Doctorat">
                                            Doctorat
                                        </option>
                                        <option value="Autre">
                                            Autre
                                        </option>
                                    </select>
                                    @error('diplome_academique')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="autre_diplome_academique" class="form-label">Si autre ? précisez</label>
                                    <input type="text" name="autre_diplome_academique"
                                        value="{{ $individuelle->autre_diplome_academique ?? old('autre_diplome_academique') }}"
                                        class="form-control form-control-sm @error('autre_diplome_academique') is-invalid @enderror"
                                        id="autre_diplome_academique" placeholder="autre diplôme académique">
                                    @error('autre_diplome_academique')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="option_diplome_academique" class="form-label">Option du diplôme</label>
                                    <input type="text" name="option_diplome_academique"
                                        value="{{ $individuelle->option_diplome_academique ?? old('option_diplome_academique') }}"
                                        class="form-control form-control-sm @error('option_diplome_academique') is-invalid @enderror"
                                        id="option_diplome_academique" placeholder="Ex: Mathématiques">
                                    @error('option_diplome_academique')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="etablissement_academique" class="form-label">Etablissement
                                        académique</label>
                                    <input type="text" name="etablissement_academique"
                                        value="{{ $individuelle->etablissement_academique ?? old('etablissement_academique') }}"
                                        class="form-control form-control-sm @error('etablissement_academique') is-invalid @enderror"
                                        id="etablissement_academique" placeholder="Etablissement obtention">
                                    @error('etablissement_academique')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="diplome_pro" class="form-label">Diplôme professionnel<span
                                            class="text-danger mx-1">*</span></label>
                                    <select name="diplome_professionnel"
                                        class="form-select  @error('diplome_professionnel') is-invalid @enderror"
                                        aria-label="Select" id="select-field-diplome_professionnel"
                                        data-placeholder="Choisir diplôme professionnel">
                                        <option value="{{ $individuelle->diplome_professionnel }}">
                                            {{ $individuelle->diplome_professionnel ?? old('diplome_professionnel') }}
                                        </option>
                                        <option value="Aucun">
                                            Aucun
                                        </option>
                                        <option value="CAP">
                                            CAP
                                        </option>
                                        <option value="BEP">
                                            BEP
                                        </option>
                                        <option value="BT">
                                            BT
                                        </option>
                                        <option value="BTS">
                                            BTS
                                        </option>
                                        <option value="CPS">
                                            CPS
                                        </option>
                                        <option value="L3 Pro">
                                            L3 Pro
                                        </option>
                                        <option value="DTS">
                                            DTS
                                        </option>
                                        <option value="Autre">
                                            Autre
                                        </option>
                                    </select>
                                    @error('diplome_professionnel')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="autre_diplome_professionnel" class="form-label">Si autre ?
                                        précisez</label>
                                    <input type="text" name="autre_diplome_professionnel"
                                        value="{{ $individuelle->autre_diplome_professionnel ?? old('autre_diplome_professionnel') }}"
                                        class="form-control form-control-sm @error('autre_diplome_professionnel') is-invalid @enderror"
                                        id="autre_diplome_professionnel"
                                        placeholder="autre diplôme professionnel ou attestations">
                                    @error('autre_diplome_professionnel')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="etablissement_professionnel" class="form-label">Etablissement
                                        professionnel</label>
                                    <input type="text" name="etablissement_professionnel"
                                        value="{{ $individuelle->etablissement_professionnel ?? old('etablissement_professionnel') }}"
                                        class="form-control form-control-sm @error('etablissement_professionnel') is-invalid @enderror"
                                        id="etablissement_professionnel" placeholder="Etablissement obtention">
                                    @error('etablissement_professionnel')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="specialite_diplome_professionnel" class="form-label">Spécialité</label>
                                    <input type="text" name="specialite_diplome_professionnel"
                                        value="{{ $individuelle->specialite_diplome_professionnel ?? old('specialite_diplome_professionnel') }}"
                                        class="form-control form-control-sm @error('specialite_diplome_professionnel') is-invalid @enderror"
                                        id="specialite_diplome_professionnel" placeholder="Ex: électricité">
                                    @error('specialite_diplome_professionnel')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="projet_poste_formation" class="form-label">Votre projet après la
                                        formation<span class="text-danger mx-1">*</span></label>
                                    <select name="projet_poste_formation"
                                        class="form-select  @error('projet_poste_formation') is-invalid @enderror"
                                        aria-label="Select" id="select-field-projet_poste_formation"
                                        data-placeholder="Choisir projet poste formation">
                                        <option value="{{ $individuelle->projet_poste_formation }}">
                                            {{ $individuelle->projet_poste_formation ?? old('projet_poste_formation') }}
                                        </option>
                                        <option value="Poursuivre mes études">
                                            Poursuivre mes études
                                        </option>
                                        <option value="Chercher un emploi">
                                            Chercher un emploi
                                        </option>
                                        <option value="Lancer mon entreprise">
                                            Lancer mon entreprise
                                        </option>
                                        <option value="Retourner dans mon entreprise">
                                            Retourner dans mon entreprise
                                        </option>
                                        <option value="Aucun de ces projets">
                                            Aucun de ces projets
                                        </option>
                                    </select>
                                    @error('projet_poste_formation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="projet" class="form-label">Projet</label>
                                    <select name="projet" class="form-select  @error('projet') is-invalid @enderror"
                                        aria-label="Select" id="select-field-projet" data-placeholder="Choisir projet">
                                        <option>
                                            {{ $individuelle?->projet?->sigle ?? old('projet') }}
                                        </option>
                                        <option value="null">
                                            Aucun
                                        </option>
                                        @foreach ($projets as $projet)
                                            <option value="{{ $projet?->sigle }}">
                                                {{ $projet?->name . ' (' . $projet?->sigle . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('projet')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="qualification" class="form-label">Qualification et autres diplômes</label>
                                    <textarea name="qualification" id="qualification" rows="2"
                                        class="form-control form-control-sm @error('qualification') is-invalid @enderror"
                                        placeholder="Qualification et autres diplômes">{{ $individuelle->qualification ?? old('qualification') }}</textarea>
                                    @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="experience" class="form-label">Expériences et stages</label>
                                    <textarea name="experience" id="experience" rows="2"
                                        class="form-control form-control-sm @error('experience') is-invalid @enderror"
                                        placeholder="Expériences ou stages">{{ $individuelle->experience ?? old('experience') }}</textarea>
                                    @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="projetprofessionnel" class="form-label">Informations complémentaires sur
                                        le projet
                                        professionnel</label>
                                    <textarea name="projetprofessionnel" id="projetprofessionnel" rows="2"
                                        class="form-control form-control-sm @error('projetprofessionnel') is-invalid @enderror"
                                        placeholder="Si vous disposez déjà d'un projet professionnel, merci d'écrire son résumé en quelques lignes">{{ $individuelle->projetprofessionnel ?? old('projetprofessionnel') }}</textarea>
                                    @error('projetprofessionnel')
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

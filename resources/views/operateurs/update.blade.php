@extends('layout.user-layout')
@section('title', 'Modification opérateur ' . $operateur?->user?->username)
@section('space-work')
    @can('operateur-update')
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
                                        <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('operateurs.index') }}"
                                                class="btn btn-success btn-sm" title="retour"><i
                                                    class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                            <p> | Dossier personnel</p>
                                        </span>
                                    </div>
                                </div>
                                <form method="post" action="{{ route('operateurs.update', $operateur->id) }}"
                                    enctype="multipart/form-data" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $operateur->id }}">
                                    <div class="row g-3">


                                        <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="numero_dossier" class="form-label">Numéro dossier<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="0" name="numero_dossier"
                                                    value="{{ $operateur?->numero_dossier ?? old('numero_dossier') }}"
                                                    class="form-control form-control-sm @error('numero_dossier') is-invalid @enderror"
                                                    id="numero_dossier" placeholder="Numéro dossier">
                                                @error('numero_dossier')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="numero_arrive" class="form-label">Numéro courrier<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="input-group has-validation">
                                                <input type="number" min="0" name="numero_arrive"
                                                    value="{{ $operateur?->courrier?->numero ?? old('numero_arrive') }}"
                                                    class="form-control form-control-sm @error('numero_arrive') is-invalid @enderror"
                                                    id="numero_arrive" placeholder="Numéro de correspondance">
                                                @error('numero_arrive')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="numero_agrement" class="form-label">Numéro agrément</label>
                                            <input type="text" name="numero_agrement"
                                                value="{{ $operateur->numero_agrement ?? old('numero_agrement') }}"
                                                class="form-control form-control-sm @error('numero_agrement') is-invalid @enderror"
                                                id="numero_agrement" placeholder="Numéro agrément">
                                            @error('numero_agrement')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="operateur" class="form-label">Raison sociale opérateur<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="operateur" id="operateur" rows="1"
                                                class="form-control form-control-sm @error('operateur') is-invalid @enderror"
                                                placeholder="La raison sociale de l'opérateur">{{ $operateur?->user?->operateur ?? old('operateur') }}</textarea>
                                            @error('operateur')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="username" class="form-label">Sigle<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="username"
                                                value="{{ $operateur?->user?->username ?? old('username') }}"
                                                class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                id="username" placeholder="Sigle">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="email" class="form-label">Email<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="email"
                                                value="{{ $operateur?->user?->email ?? old('email') }}"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                id="email" placeholder="Adresse email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="fixe" class="form-label">Téléphone fixe<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="number" min="0" name="fixe"
                                                value="{{ $operateur?->user?->fixe ?? old('fixe') }}"
                                                class="form-control form-control-sm @error('fixe') is-invalid @enderror"
                                                id="fixe" placeholder="3xxxxxxxx">
                                            @error('fixe')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="telephone" class="form-label">Téléphone<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="number" min="0" name="telephone"
                                                value="{{ $operateur?->user?->telephone ?? old('telephone') }}"
                                                class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                                id="telephone" placeholder="7xxxxxxxx">
                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="bp" class="form-label">Boite postal</label>
                                            <input type="text" name="bp"
                                                value="{{ $operateur->user?->bp ?? old('bp') }}"
                                                class="form-control form-control-sm @error('bp') is-invalid @enderror"
                                                id="bp" placeholder="Boite postal">
                                            @error('bp')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="categorie" class="form-label">Catégorie<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="categorie" class="form-select selectpicker"
                                                data-live-search="true @error('categorie') is-invalid @enderror"
                                                aria-label="Select" id="select-field-categorie-update"
                                                data-placeholder="Choisir categorie">
                                                <option value="{{ $operateur?->user?->categorie ?? old('categorie') }}">
                                                    {{ $operateur?->user?->categorie ?? old('categorie') }}
                                                </option>
                                                <option value="Publique">
                                                    Publique
                                                </option>
                                                <option value="Privé">
                                                    Privé
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            @error('categorie')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="statut" class="form-label">Statut juridique<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="statut" class="form-select  @error('statut') is-invalid @enderror"
                                                aria-label="Select" id="select-field-statut-update"
                                                data-placeholder="Choisir statut">
                                                <option value="{{ $operateur?->user?->statut ?? old('statut') }}">
                                                    {{ $operateur?->user?->statut ?? old('statut') }}
                                                </option>
                                                <option value="GIE">
                                                    GIE
                                                </option>
                                                <option value="Association">
                                                    Association
                                                </option>
                                                <option value="Entreprise individuelle">
                                                    Entreprise individuelle
                                                </option>
                                                <option value="SA">
                                                    SA
                                                </option>
                                                <option value="SAS">
                                                    SAS
                                                </option>
                                                <option value="SUARL">
                                                    SUARL
                                                </option>
                                                <option value="SARL">
                                                    SARL
                                                </option>
                                                <option value="SNC">
                                                    SNC
                                                </option>
                                                <option value="SCS">
                                                    SCS
                                                </option>
                                                <option value="Etablissement public">
                                                    Etablissement public
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            @error('statut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="autre_statut" class="form-label">Si autre ?
                                                précisez</label>
                                            <input type="text" name="autre_statut"
                                                value="{{ $operateur?->user?->autre_statut ?? old('autre_statut') }}"
                                                class="form-control form-control-sm @error('autre_statut') is-invalid @enderror"
                                                id="autre_statut" placeholder="autre statut juridique">
                                            @error('autre_statut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="demande_signe" class="form-label">Demande signée</label>
                                            <select name="demande_signe"
                                                class="form-select  @error('demande_signe') is-invalid @enderror"
                                                aria-label="Select" id="select-field-demande_signe_update"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur?->demande_signe ?? old('demande_signe') }}">
                                                    {{ $operateur?->demande_signe ?? old('demande_signe') }}
                                                </option>
                                                <option value="Oui">
                                                    Oui
                                                </option>
                                                <option value="Non">
                                                    Non
                                                </option>
                                            </select>
                                            @error('demande_signe')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="departement" class="form-label">Siège social<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="departement"
                                                class="form-select form-select-sm @error('departement') is-invalid @enderror"
                                                aria-label="Select" id="select-field-departement-update"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur->departement?->nom ?? old('departement') }}">
                                                    {{ $operateur->departement?->nom ?? old('departement') }}
                                                </option>
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


                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="type_demande" class="form-label">Type demande<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="type_demande"
                                                class="form-select form-select-sm @error('type_demande') is-invalid @enderror"
                                                aria-label="Select" id="select-field-registre" data-placeholder="Choisir">
                                                <option value="{{ $operateur?->type_demande }}">
                                                    {{ $operateur?->type_demande ?? old('type_demande') }}
                                                </option>
                                                <option value="Nouvelle">
                                                    Nouvelle
                                                </option>
                                                <option value="Renouvellement">
                                                    Renouvellement
                                                </option>
                                            </select>
                                            @error('type_demande')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="web" class="form-label">Site web</label>
                                            <input type="text" name="web"
                                                value="{{ $operateur?->user?->web ?? old('web') }}"
                                                class="form-control form-control-sm @error('web') is-invalid @enderror"
                                                id="web" placeholder="www.">
                                            @error('web')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="adresse" class="form-label">Adresse<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="adresse" id="adresse" rows="1"
                                                class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                                placeholder="Adresse exacte opérateur">{{ $operateur?->user?->adresse ?? old('adresse') }}</textarea>
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="registre_commerce" class="form-label">RCCM / Ninéa</label>
                                            <select name="registre_commerce"
                                                class="form-select form-select-sm @error('registre_commerce') is-invalid @enderror"
                                                aria-label="Select" id="select-field-registre-update"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur?->user?->rccm ?? old('registre_commerce') }}">
                                                    {{ $operateur?->user?->rccm ?? old('registre_commerce') }}
                                                </option>
                                                <option value="Registre de commerce">
                                                    Registre de commerce
                                                </option>
                                                <option value="Ninea">
                                                    Ninea
                                                </option>
                                                <option value="Aucun">
                                                    Aucun
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            @error('registre_commerce')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="ninea" class="form-label">Numéro RCCM / Ninéa</label>
                                            <input type="text" name="ninea"
                                                value="{{ $operateur?->user?->ninea ?? old('ninea') }}"
                                                class="form-control form-control-sm @error('ninea') is-invalid @enderror"
                                                id="ninea" placeholder="Votre ninéa / Numéro RCCM">
                                            @error('ninea')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="quitusfiscal" class="form-label">Quitus fiscal<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="quitusfiscal"
                                                class="form-select  @error('quitusfiscal') is-invalid @enderror"
                                                aria-label="Select" id="select-field-quitusfiscalup"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur?->quitusfiscal ?? old('quitusfiscal') }}">
                                                    {{ $operateur?->quitusfiscal ?? old('quitusfiscal') }}
                                                </option>
                                                <option value="Oui">
                                                    Oui
                                                </option>
                                                <option value="Non">
                                                    Non
                                                </option>
                                            </select>
                                            @error('quitusfiscal')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <label for="quitus" class="form-label">Scan quitus fiscal</label>
                                            <input type="file" name="quitus" id="quitus"
                                                class="form-control @error('quitus') is-invalid @enderror btn btn-outline-primary btn-sm">
                                            @error('quitus')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                            <label for="file_convention" class="form-label">Fichier</label>
                                            @if (!empty($operateur?->quitus))
                                                <div>
                                                    <a class="btn btn-outline-secondary btn-sm" title="Convention"
                                                        target="_blank" href="{{ asset($operateur?->getQuitus()) }}">
                                                        <i class="bi bi-file-earmark-image"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="date_quitus" class="form-label">Date délivrance </label>
                                            <input type="date" name="date_quitus"
                                                value="{{ $operateur?->debut_quitus?->format('Y-m-d') ?? old('date_quitus') }}"
                                                class="form-control form-control-sm @error('date_quitus') is-invalid @enderror"
                                                id="date_quitus" placeholder="Date quitus">
                                            @error('date_quitus')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="arrete_creation" class="form-label">Arrêté création</label>
                                            <select name="arrete_creation"
                                                class="form-select  @error('arrete_creation') is-invalid @enderror"
                                                aria-label="Select" id="select-field-arrete_creation-update"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur?->arrete_creation ?? old('arrete_creation') }}">
                                                    {{ $operateur?->arrete_creation ?? old('arrete_creation') }}
                                                </option>
                                                <option value="MFP">
                                                    MFP
                                                </option>
                                                <option value="MESRI">
                                                    MESRI
                                                </option>
                                                <option value="MEN">
                                                    MEN
                                                </option>
                                                <option value="Aucun">
                                                    Aucun
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            @error('arrete_creation')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <label for="file_arrete_creation" class="form-label">Scan</label>
                                            <input type="file" name="file_arrete_creation" id="file_arrete_creation"
                                                value="{{ old('file_arrete_creation') }}"
                                                class="form-control @error('file_arrete_creation') is-invalid @enderror btn btn-outline-primary btn-sm">
                                            @error('file_arrete_creation')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                            <label for="file_convention" class="form-label">Fichier</label>
                                            @if (!empty($operateur?->file_arrete_creation))
                                                <div>
                                                    <a class="btn btn-outline-secondary btn-sm" title="Convention"
                                                        target="_blank" href="{{ asset($operateur?->getArreteCreation()) }}">
                                                        <i class="bi bi-file-earmark-image"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="formulaire_signe" class="form-label">Formulaire signée</label>
                                            <select name="formulaire_signe"
                                                class="form-select  @error('formulaire_signe') is-invalid @enderror"
                                                aria-label="Select" id="select-field-formulaire_signe_update"
                                                data-placeholder="Choisir">
                                                <option
                                                    value="{{ $operateur?->formulaire_signe ?? old('formulaire_signe') }}">
                                                    {{ $operateur?->formulaire_signe ?? old('formulaire_signe') }}
                                                </option>
                                                <option value="Oui">
                                                    Oui
                                                </option>
                                                <option value="Non">
                                                    Non
                                                </option>
                                            </select>
                                            @error('formulaire_signe')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="cvsigne" class="form-label">CV signés</label>
                                            <select name="cvsigne"
                                                class="form-select  @error('cvsigne') is-invalid @enderror"
                                                aria-label="Select" id="select-field-cvsigneup" data-placeholder="Choisir">
                                                <option value="{{ $operateur?->cvsigne ?? old('cvsigne') }}">
                                                    {{ $operateur?->cvsigne ?? old('cvsigne') }}
                                                </option>
                                                <option value="Oui">
                                                    Oui
                                                </option>
                                                <option value="Non">
                                                    Non
                                                </option>
                                            </select>
                                            @error('cvsigne')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <hr class="dropdown-divider mt-5">

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="civilite" class="form-label">Civilité<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="civilite"
                                                class="form-select form-select-sm @error('civilite') is-invalid @enderror"
                                                aria-label="Select" id="select-field-civilite"
                                                data-placeholder="Choisir civilité">
                                                <option value="{{ $operateur?->user?->civilite ?? old('civilite') }}">
                                                    {{ $operateur?->user?->civilite ?? old('civilite') }}
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

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="prenom" class="form-label">Prénom responsable<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="prenom"
                                                value="{{ $operateur?->user?->firstname ?? old('prenom') }}"
                                                class="form-control form-control-sm @error('prenom') is-invalid @enderror"
                                                id="prenom" placeholder="Prénom responsable">
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="nom" class="form-label">Nom responsable<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="nom"
                                                value="{{ $operateur?->user?->name ?? old('nom') }}"
                                                class="form-control form-control-sm @error('nom') is-invalid @enderror"
                                                id="nom" placeholder="Nom responsable">
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="fonction_responsable" class="form-label">Fonction responsable<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="fonction_responsable"
                                                value="{{ $operateur?->user?->fonction_responsable ?? old('fonction_responsable') }}"
                                                class="form-control form-control-sm @error('fonction_responsable') is-invalid @enderror"
                                                id="fonction_responsable" placeholder="Fonction responsable">
                                            @error('fonction_responsable')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="email_responsable" class="form-label">Adresse e-mail</label>
                                            <input type="email" name="email_responsable"
                                                value="{{ $operateur?->user?->email_responsable ?? old('email_responsable') }}"
                                                class="form-control form-control-sm @error('email_responsable') is-invalid @enderror"
                                                id="email_responsable" placeholder="Adresse email responsable">
                                            @error('email_responsable')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="telephone_parent" class="form-label">Téléphone responsable</label>
                                            <input type="number" min="0" name="telephone_parent"
                                                value="{{ $operateur?->user?->telephone_parent ?? old('telephone_parent') }}"
                                                class="form-control form-control-sm @error('telephone_parent') is-invalid @enderror"
                                                id="telephone_parent" placeholder="7xxxxxxxx">
                                            @error('telephone_parent')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>



                                        {{-- <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="operateur" class="form-label">Raison sociale opérateur<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="operateur" id="operateur" rows="1"
                                                class="form-control form-control-sm @error('operateur') is-invalid @enderror"
                                                placeholder="La raison sociale de l'opérateur">{{ $operateur?->user?->operateur ?? old('operateur') }}</textarea>
                                            @error('operateur')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="username" class="form-label">Sigle<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="username"
                                                value="{{ $operateur?->user?->username ?? old('username') }}"
                                                class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                id="username" placeholder="username">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="numero_agrement" class="form-label">Numéro agrément</label>
                                            <input type="text" name="numero_agrement"
                                                value="{{ $operateur->numero_agrement ?? old('numero_agrement') }}"
                                                class="form-control form-control-sm @error('numero_agrement') is-invalid @enderror"
                                                id="numero_agrement" placeholder="Numéro agrément">
                                            @error('numero_agrement')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="email" class="form-label">Email<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="email"
                                                value="{{ $operateur?->user?->email ?? old('email') }}"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                id="email" placeholder="Adresse email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="fixe" class="form-label">Téléphone fixe<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="number" min="0" name="fixe"
                                                value="{{ $operateur?->user?->fixe ?? old('fixe') }}"
                                                class="form-control form-control-sm @error('fixe') is-invalid @enderror"
                                                id="fixe" placeholder="3xxxxxxxx">
                                            @error('fixe')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="telephone" class="form-label">Téléphone<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="number" min="0" name="telephone"
                                                value="{{ $operateur?->user?->telephone ?? old('telephone') }}"
                                                class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                                id="telephone" placeholder="7xxxxxxxx">
                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="bp" class="form-label">Boite postal</label>
                                            <input type="text" name="bp"
                                                value="{{ $operateur->user?->bp ?? old('bp') }}"
                                                class="form-control form-control-sm @error('bp') is-invalid @enderror"
                                                id="bp" placeholder="Boite postal">
                                            @error('bp')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="categorie" class="form-label">Catégorie<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="categorie" class="form-select selectpicker"
                                                data-live-search="true @error('categorie') is-invalid @enderror"
                                                aria-label="Select" id="select-field-categorie-update"
                                                data-placeholder="Choisir categorie">
                                                <option value="{{ $operateur?->user?->categorie }}">
                                                    {{ $operateur?->user?->categorie ?? old('categorie') }}
                                                </option>
                                                <option value="Publique">
                                                    Publique
                                                </option>
                                                <option value="Privé">
                                                    Privé
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            @error('categorie')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="statut" class="form-label">Statut juridique<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="statut" class="form-select  @error('statut') is-invalid @enderror"
                                                aria-label="Select" id="select-field-statut-update"
                                                data-placeholder="Choisir statut">
                                                <option value="{{ $operateur->statut }}">
                                                    {{ $operateur->statut ?? old('statut') }}
                                                </option>
                                                <option value="GIE">
                                                    GIE
                                                </option>
                                                <option value="Association">
                                                    Association
                                                </option>
                                                <option value="Entreprise">
                                                    Entreprise
                                                </option>
                                                <option value="Institution">
                                                    Institution
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            @error('statut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="autre_statut" class="form-label">Si autre ?
                                                précisez</label>
                                            <input type="text" name="autre_statut"
                                                value="{{ $operateur?->autre_statut ?? old('autre_statut') }}"
                                                class="form-control form-control-sm @error('autre_statut') is-invalid @enderror"
                                                id="autre_statut" placeholder="autre statut juridique">
                                            @error('autre_statut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <label for="adresse" class="form-label">Adresse<span
                                                    class="text-danger mx-1">*</span></label>
                                            <textarea name="adresse" id="adresse" rows="1"
                                                class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                                placeholder="Adresse exacte opérateur">{{ $operateur->user->adresse ?? old('adresse') }}</textarea>
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="departement" class="form-label">Siège social<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="departement"
                                                class="form-select form-select-sm @error('departement') is-invalid @enderror"
                                                aria-label="Select" id="select-field-departement-update"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur->departement?->id }}">
                                                    {{ $operateur->departement?->nom ?? old('departement') }}
                                                </option>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}">
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

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="registre_commerce" class="form-label">RCCM / Ninéa<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="registre_commerce"
                                                class="form-select form-select-sm @error('registre_commerce') is-invalid @enderror"
                                                aria-label="Select" id="select-field-registre-update"
                                                data-placeholder="Choisir">
                                                <option value="{{ $operateur?->user?->rccm }}">
                                                    {{ $operateur?->user?->rccm ?? old('registre_commerce') }}
                                                </option>
                                                <option value="Registre de commerce">
                                                    Registre de commerce
                                                </option>
                                                <option value="Ninea">
                                                    Ninea
                                                </option>
                                            </select>
                                            @error('registre_commerce')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="ninea" class="form-label">Numéro RCCM / Ninéa<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="text" name="ninea"
                                                value="{{ $operateur?->user?->ninea ?? old('ninea') }}"
                                                class="form-control form-control-sm @error('ninea') is-invalid @enderror"
                                                id="ninea" placeholder="Votre ninéa / Numéro RCCM">
                                            @error('ninea')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <label for="quitus" class="form-label">N° quitus fiscal<span
                                                    class="text-danger mx-1">*</span></label>

                                            <input type="file" name="quitus" id="quitus"
                                                class="form-control @error('quitus') is-invalid @enderror btn btn-outline-primary btn-sm">
                                            @error('quitus')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                            <label for="file_convention" class="form-label">Fichier</label>
                                            @if (!empty($operateur?->quitus))
                                                <div>
                                                    <a class="btn btn-outline-secondary btn-sm" title="Convention"
                                                        target="_blank" href="{{ asset($operateur?->getQuitus()) }}">
                                                        <i class="bi bi-file-earmark-image"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="badge bg-warning">Aucun</div>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="date_quitus" class="form-label">Date délivrance<span
                                                    class="text-danger mx-1">*</span></label>
                                            <input type="date" name="date_quitus"
                                                value="{{ $operateur?->debut_quitus?->format('Y-m-d') ?? old('date_quitus') }}"
                                                class="form-control form-control-sm @error('date_quitus') is-invalid @enderror"
                                                id="date_quitus" placeholder="Date quitus">
                                            @error('date_quitus')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                            <label for="type_demande" class="form-label">TYPE<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="type_demande"
                                                class="form-select form-select-sm @error('type_demande') is-invalid @enderror"
                                                aria-label="Select" id="select-field-registre" data-placeholder="Choisir">
                                                <option value="{{ $operateur?->type_demande }}">
                                                    {{ $operateur?->type_demande ?? old('type_demande') }}
                                                </option>
                                                <option value="new">
                                                    Nouvelle
                                                </option>
                                                <option value="renew">
                                                    Renouvellement
                                                </option>
                                            </select>
                                            @error('type_demande')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror --}}
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
    @endcan
@endsection

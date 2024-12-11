@extends('layout.user-layout')
@section('title', 'modification formation')
@section('space-work')
    @can('formation-update')
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
                                        <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('formations.index') }}"
                                                class="btn btn-success btn-sm" title="retour"><i
                                                    class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                            <p> | Formations</p>
                                        </span>
                                    </div>
                                </div>
                                <h5 class="card-title text-center pb-0 fs-4">Modification</h5>
                                <form method="post" action="{{ url('formations/' . $formation?->id) }}"
                                    enctype="multipart/form-data" class="row g-3">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-12 col-md-12 col-lg-8 col-sm-12 col-xs-12 col-xxl-8">
                                        <label for="name" class="form-label">Bénéficiaires<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="name" id="name" rows="1"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Bénéficiaires">{{ $formation?->name ?? old('name') }}</textarea>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="code" class="form-label">Code<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="code" value="{{ $formation?->code ?? old('code') }}"
                                                class="form-control form-control-sm @error('code') is-invalid @enderror"
                                                id="code" placeholder="Numéro de correspondance">
                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="departement" class="form-label">Département<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="departement"
                                            class="form-select  @error('departement') is-invalid @enderror" aria-label="Select"
                                            id="select-field-departement-update" data-placeholder="Choisir localité">
                                            <option value="{{ $formation?->departement?->id }}">
                                                {{ $formation?->departement?->nom }}</option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement?->id }}">
                                                    {{ $departement?->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departement')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="lieu" class="form-label">Lieu formation<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="lieu" value="{{ $formation?->lieu ?? old('lieu') }}"
                                            class="form-control form-control-sm @error('lieu') is-invalid @enderror"
                                            id="lieu" placeholder="Lieu formation">
                                        @error('lieu')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="types_formation" class="form-label">Type formation<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="types_formation"
                                            class="form-select  @error('types_formation') is-invalid @enderror"
                                            aria-label="Select" id="select-field-types_formation_update"
                                            data-placeholder="Choisir type formation">
                                            <option value="{{ $formation?->types_formation?->id }}">
                                                {{ $formation?->types_formation?->name ?? old('types_formation') }}
                                            </option>
                                            @foreach ($types_formations as $types_formation)
                                                <option value="{{ $types_formation?->id }}">
                                                    {{ $types_formation?->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('types_formation')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="type_certification" class="form-label">Type certification<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="type_certification"
                                            class="form-select  @error('type_certification') is-invalid @enderror"
                                            aria-label="Select" id="select-field-type_certification_update"
                                            data-placeholder="Choisir type certification">
                                            <option value="{{ $formation?->type_certification }}">
                                                {{ $formation?->type_certification ?? old('type_certification') }}
                                            </option>
                                            <option value="{{ old('c') }}">
                                                {{ old('type_certification') }}
                                            </option>
                                            <option value="Titre">
                                                Titre
                                            </option>
                                            <option value="Attestation">
                                                Attestation
                                            </option>
                                        </select>
                                        @error('type_certification')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_debut" class="form-label">Date début</label>
                                        <input type="date" name="date_debut"
                                            value="{{ $formation?->date_debut?->format('Y-m-d') ?? old('date_debut') }}"
                                            class="form-control form-control-sm @error('date_debut') is-invalid @enderror"
                                            id="date_debut" placeholder="Date début">
                                        @error('date_debut')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_fin" class="form-label">Date fin</label>
                                        <input type="date" name="date_fin"
                                            value="{{ $formation?->date_fin?->format('Y-m-d') ?? old('date_fin') }}"
                                            class="form-control form-control-sm @error('date_fin') is-invalid @enderror"
                                            id="date_fin" placeholder="Date début">
                                        @error('date_fin')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="titre" class="form-label">Titre (convention)</label>

                                        <select name="titre" class="form-select  @error('titre') is-invalid @enderror"
                                            aria-label="Select" id="select-field-titre" data-placeholder="Choisir titre">
                                            <option>
                                                {{ $formation?->titre ?? ($formation?->referentiel?->titre ?? old('titre')) }}
                                            </option>
                                            <option value="null">
                                                Aucun
                                            </option>
                                            @foreach ($referentiels as $referentiel)
                                                <option value="{{ $referentiel?->titre }}">
                                                    {{ $referentiel?->titre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('titre')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="lettre_mission" class="form-label">N° lettre de mission</label>
                                        <input type="text" name="lettre_mission"
                                            value="{{ $formation?->lettre_mission ?? old('lettre_mission') }}"
                                            class="form-control form-control-sm @error('lettre_mission') is-invalid @enderror"
                                            id="lettre_mission" placeholder="Ex: 000875">
                                        @error('lettre_mission')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_lettre" class="form-label">Date lettre</label>
                                        <input type="date" name="date_lettre"
                                            value="{{ $formation?->date_lettre?->format('Y-m-d') ?? old('date_lettre') }}"
                                            class="form-control form-control-sm @error('date_lettre') is-invalid @enderror"
                                            id="date_lettre" placeholder="Date lettre">
                                        @error('date_lettre')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="numero_convention" class="form-label">Numéro convention</label>
                                        <input type="text" name="numero_convention"
                                            value="{{ $formation?->numero_convention ?? old('numero_convention') }}"
                                            class="form-control form-control-sm @error('numero_convention') is-invalid @enderror"
                                            id="numero_convention" placeholder="Ex: 000743">
                                        @error('numero_convention')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="date_convention" class="form-label">Date convention</label>
                                        <input type="date" name="date_convention"
                                            value="{{ $formation?->date_convention?->format('Y-m-d') ?? old('date_convention') }}"
                                            class="form-control form-control-sm @error('date_convention') is-invalid @enderror"
                                            id="date_convention" placeholder="Date convention">
                                        @error('date_convention')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <label for="file_convention" class="form-label">Joindre scan convention</label>
                                        <input type="file" name="file_convention" id="file_convention"
                                            class="form-control @error('file_convention') is-invalid @enderror btn btn-outline-primary btn-sm">
                                        @error('file_convention')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                        <label for="file_convention" class="form-label">Fichier</label>
                                        @if (!empty($formation?->file_convention))
                                            <div>
                                                <a class="btn btn-outline-secondary btn-sm" title="Convention"
                                                    target="_blank" href="{{ asset($formation->getFileConvention()) }}">
                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                </a>
                                            </div>
                                        @else
                                            <div class="badge bg-warning">Aucun</div>
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="prevue_h" class="form-label">Effectif homme</label>
                                        <input type="number" name="prevue_h" min="0" max="25"
                                            value="{{ $formation?->prevue_h ?? old('prevue_h') }}"
                                            class="form-control form-control-sm @error('prevue_h') is-invalid @enderror"
                                            id="prevue_h" placeholder="Effectif homme">
                                        @error('prevue_h')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="prevue_f" class="form-label">Effectif femme</label>
                                        <input type="number" name="prevue_f" min="0" max="25"
                                            value="{{ $formation?->prevue_f ?? old('prevue_f') }}"
                                            class="form-control form-control-sm @error('prevue_f') is-invalid @enderror"
                                            id="prevue_f" placeholder="Effectif femme">
                                        @error('prevue_f')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="frais_operateurs" class="form-label">Frais opérateur</label>
                                        <input type="number" name="frais_operateurs" min="0" step="0.001"
                                            value="{{ $formation?->frais_operateurs ?? old('frais_operateurs') }}"
                                            class="form-control form-control-sm @error('frais_operateurs') is-invalid @enderror"
                                            id="frais_operateurs" placeholder="Frais opérateur">
                                        @error('frais_operateurs')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="frais_add" class="form-label">Frais additionels</label>
                                        <input type="number" name="frais_add" min="0" step="0.001"
                                            value="{{ $formation?->frais_add ?? old('frais_add') }}"
                                            class="form-control form-control-sm @error('frais_add') is-invalid @enderror"
                                            id="frais_add" placeholder="Frais additionels">
                                        @error('frais_add')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="autes_frais" class="form-label">Autres frais</label>
                                        <input type="number" name="autes_frais" min="0" step="0.001"
                                            value="{{ $formation?->autes_frais ?? old('autes_frais') }}"
                                            class="form-control form-control-sm @error('autes_frais') is-invalid @enderror"
                                            id="autes_frais" placeholder="Autres frais">
                                        @error('autes_frais')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="projet" class="form-label">Projet</label>
                                        <select name="projet" class="form-select  @error('projet') is-invalid @enderror"
                                            aria-label="Select" id="select-field-projet" data-placeholder="Choisir projet">
                                            <option>
                                                {{ $formation?->projet?->sigle ?? old('projet') }}
                                            </option>
                                            <option value="null">
                                                Aucun
                                            </option>
                                            @foreach ($projets as $projet)
                                                <option value="{{ $projet?->sigle }}">
                                                    {{ $projet?->sigle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('projet')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="annee" class="form-label">Année</label>
                                        <input type="number" name="annee" min="2024" step="1"
                                            value="{{ $formation?->annee ?? old('annee') }}"
                                            class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                            id="annee" placeholder="Année">
                                        @error('annee')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <label for="detf_file" class="form-label">Joindre scan DETF</label>
                                        <input type="file" name="detf_file" id="detf_file"
                                            class="form-control @error('detf_file') is-invalid @enderror btn btn-outline-primary btn-sm">
                                        @error('detf_file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-1 col-sm-12 col-xs-12 col-xxl-1">
                                        <label for="detf_file" class="form-label">Fichier</label>
                                        @if (!empty($formation?->detf_file))
                                            <div>
                                                <a class="btn btn-outline-secondary btn-sm" title="DETF"
                                                    target="_blank" href="{{ asset($formation->getFileDetf()) }}">
                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                </a>
                                            </div>
                                        @else
                                            <div class="badge bg-warning">Aucun</div>
                                        @endif
                                    </div>
                                    <hr>
                                    {{-- <h5 class="card-title text-center pb-0 fs-4">Evaluation</h5> --}}

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label">Date évaluation</label>
                                            <input type="date" name="date_pv"
                                                value="{{ $formation?->date_pv?->format('Y-m-d') ?? old('date_pv') }}"
                                                class="form-control form-control-sm @error('date_pv') is-invalid @enderror"
                                                id="date_pv" placeholder="date_pv">
                                            @error('date_pv')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label">Montant indemnité évaluateur</label>
                                            <input type="number" name="frais_evaluateur" min="0" step="0.001"
                                                value="{{ $formation?->frais_evaluateur ?? old('frais_evaluateur') }}"
                                                class="form-control form-control-sm @error('frais_evaluateur') is-invalid @enderror"
                                                id="frais_evaluateur" placeholder="Montant indemnité de membre ">
                                            @error('frais_evaluateur')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <div class="mb-3">
                                            <label for="evaluateur" class="form-label">Evaluateur</label>
                                            <select name="evaluateur"
                                                class="form-select @error('evaluateur') is-invalid @enderror"
                                                aria-label="Select" id="select-field" data-placeholder="Choisir evaluateur">
                                                <option value="{{ $formation?->evaluateur?->id }}">
                                                    @if (!empty($formation?->evaluateur?->name))
                                                        {{ $formation?->evaluateur?->name . ', ' . $formation?->evaluateur?->fonction }}
                                                    @endif
                                                </option>
                                                @foreach ($evaluateurs as $evaluateur)
                                                    <option value="{{ $evaluateur->id }}">
                                                        {{ $evaluateur?->name . ', ' . $evaluateur?->fonction ?? old('evaluateur') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('evaluateur')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <div class="mb-3">
                                            <label for="evaluateur" class="form-label">Evaluateur ONFP</label>
                                            <select name="onfpevaluateur"
                                                class="form-select @error('onfpevaluateur') is-invalid @enderror"
                                                aria-label="Select" id="select-field-onfp"
                                                data-placeholder="Choisir evaluateur ONFP">
                                                <option value="{{ $formation?->onfpevaluateur?->id }}">
                                                    @if (!empty($formation?->onfpevaluateur?->name))
                                                        {{ $formation?->onfpevaluateur?->name . ', ' . $formation?->onfpevaluateur?->fonction }}
                                                    @endif
                                                </option>
                                                @foreach ($onfpevaluateurs as $onfpevaluateur)
                                                    <option value="{{ $onfpevaluateur->id }}">
                                                        {{ $onfpevaluateur?->name . ', ' . $onfpevaluateur?->fonction ?? old('onfpevaluateur') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('onfpevaluateur')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <div class="mb-3">
                                            <label for="region" class="form-label">Statut attestations<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="statut"
                                                class="form-select form-select-sm @error('statut') is-invalid @enderror"
                                                aria-label="Select" id="select-field-statut-attestations"
                                                data-placeholder="Choisir statut attestations">
                                                <option value="{{ $formation?->attestation ?? old('statut') }}">
                                                    {{ $formation?->attestation ?? old('statut') }}
                                                </option>
                                                <option value="disponibles">
                                                    disponibles
                                                </option>
                                                <option value="En cours">
                                                    En cours
                                                </option>
                                                <option value="retirés">
                                                    retirers
                                                </option>
                                            </select>
                                            @error('statut')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <div class="mb-3">
                                            <label for="membres_jury">Autre membres du jury</label>
                                            <textarea name="membres_jury" id="membres_jury" cols="30" rows="2"
                                                class="form-control form-control-sm @error('membres_jury') is-invalid @enderror"
                                                placeholder="Membre 1; Membre 2; Membre 3">{{ $formation->membres_jury ?? old('membres_jury') }}</textarea>
                                            @error('membres_jury')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <div class="mb-3">
                                            <label for="recommandations">Recommandations</label>
                                            <textarea name="recommandations" id="recommandations" cols="30" rows="2"
                                                class="form-control form-control-sm @error('recommandations') is-invalid @enderror"
                                                placeholder="Recommandations">{{ $formation?->recommandations ?? old('recommandations') }}</textarea>
                                            @error('recommandations')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center p-3">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-printer"></i>&nbsp;Enregister les modifications</button>
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

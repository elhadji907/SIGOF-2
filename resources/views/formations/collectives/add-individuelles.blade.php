@extends('layout.user-layout')
@section('title', 'ajouter dans la formation')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12">
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
                            role="alert"><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 pt-0">
                                <span class="d-flex mt-0 align-items-baseline"><a
                                        href="{{ route('formations.show', $formation->id) }}" class="btn btn-success btn-sm"
                                        title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des formations</p>
                                </span>
                            </div>
                        </div>
                        <h5><u><b>MODULE</b></u> : {{ $module->name }}</h5>
                        <h5><u><b>REGION</b></u> : {{ $localite->nom }}</h5>
                        <h5><u><b>Candisdats éligibles</b></u> : {{ $individuelles->count() ?? '' }}</h5>
                        <form method="post"
                            action="{{ url('formationdemandeurs', ['$idformation' => $formation->id, '$idmodule' => $formation->module->id, '$idlocalite' => $formation->departement->id]) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-check col-md-2 pt-5">
                                    <label for="#">Choisir tout</label>
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                </div>
                                <div></div>
                                <div class="form-check col-md-12">
                                    <table class="table datatables align-middle" id="table-individuelles">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Civilité</th>
                                                <th>CIN</th>
                                                <th>Prénom</th>
                                                <th>NOM</th>
                                                <th>Date naissance</th>
                                                <th>Lieu de naissance</th>
                                                <th>Adresse</th>
                                                <th>Statut</th>
                                                <th><i class="bi bi-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($individuelles as $individuelle)
                                                @isset($individuelle?->numero)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="individuelles[]"
                                                                value="{{ $individuelle->id }}"
                                                                {{ in_array($individuelle->formations_id, $individuelleFormation) ? 'checked' : '' }}
                                                                class="form-check-input @error('individuelles') is-invalid @enderror">
                                                            @error('individuelles')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div>{{ $message }}</div>
                                                                </span>
                                                                @enderror{{ $individuelle?->numero }}
                                                            </td>
                                                            <td>{{ $individuelle?->user?->civilite }}</td>
                                                            <td>{{ $individuelle?->user?->cin }}</td>
                                                            <td>{{ $individuelle?->user?->firstname }}</td>
                                                            <td>{{ $individuelle?->user?->name }}</td>
                                                            <td>{{ $individuelle?->user->date_naissance?->format('d/m/Y') }}
                                                            </td>
                                                            <td>{{ $individuelle?->user->lieu_naissance }}</td>
                                                            <td>{{ $individuelle?->user->adresse }}</td>
                                                            <td><span
                                                                    class="{{ $individuelle?->statut }}">{{ $individuelle?->statut }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="d-flex align-items-baseline"><a
                                                                        href="{{ route('individuelles.show', $individuelle->id) }}"
                                                                        class="btn btn-primary btn-sm" title="voir détails"
                                                                        target="_blanck"><i class="bi bi-eye"></i></a>
                                                                    <div class="filter">
                                                                        <a class="icon" href="#"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="bi bi-three-dots"></i></a>
                                                                        <ul
                                                                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                            <li><a class="dropdown-item btn btn-sm"
                                                                                    href="{{ route('individuelles.edit', $individuelle->id) }}"
                                                                                    class="mx-1" title="Modifier"><i
                                                                                        class="bi bi-pencil"></i>Modifier</a>
                                                                            </li>
                                                                            <li>
                                                                                <form
                                                                                    action="{{ route('individuelles.destroy', $individuelle->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="dropdown-item show_confirm"
                                                                                        title="Supprimer"><i
                                                                                            class="bi bi-trash"></i>Supprimer</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary"><i
                                                    class="bi bi-check2-circle"></i>&nbsp;Sélectionner</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

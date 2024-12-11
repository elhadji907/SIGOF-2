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
                        <h5><u><b>Module</b></u> : {{ $collectivemodule?->module }}</h5>
                        <h5><u><b>Région</b></u> : {{ $localite?->nom }}</h5>
                        <h5><u><b>Sélectionnés</b></u> : {{ $candidatsretenus?->count() ?? '' }}</h5>
                        <form method="post"
                            action="{{ url('formationdemandeurscollectives', ['$idformation' => $formation->id, '$idcollectivemodule' => $formation->collectivemodule->id, '$idlocalite' => $formation->departement->region->id]) }}"
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
                                                <th scope="col">CIN</th>
                                                <th scope="col">Civilité</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Date naissance</th>
                                                <th scope="col">Lieu naissance</th>
                                                <th scope="col">Niveau étude</th>
                                                <th scope="col">Module</th>
                                                <th scope="col">Statut</th>
                                                <th><i class="bi bi-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($listecollectives as $listecollective)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="listecollectives[]"
                                                                value="{{ $listecollective->id }}"
                                                                {{ in_array($listecollective->formations_id, $listecollectiveFormation) ? 'checked' : '' }}
                                                                class="form-check-input @error('listecollectives') is-invalid @enderror">
                                                            @error('listecollectives')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <div>{{ $message }}</div>
                                                                </span>
                                                                @enderror{{ $listecollective?->cin }}
                                                            </td>
                                                            <td>{{ $listecollective?->civilite }}</td>
                                                            <td>{{ $listecollective?->prenom }}</td>
                                                            <td>{{ $listecollective?->nom }}</td>
                                                            <td>{{ $listecollective?->date_naissance->format('d/m/Y') }}
                                                            </td>
                                                            <td>{{ $listecollective?->lieu_naissance }}</td>
                                                            <td>{{ $listecollective?->niveau_etude }}</td>
                                                            <td>{{ $listecollective?->collectivemodule?->module }}</td>
                                                            <td>
                                                                <span
                                                                    class="{{ $listecollective?->statut }}">{{ $listecollective?->statut }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="d-flex align-items-baseline">
                                                                    <a href="{{ route('listecollectives.show', $listecollective?->id) }}"
                                                                        class="btn btn-primary btn-sm"
                                                                        title="voir détails" target="_blank"><i class="bi bi-eye"></i></a>
                                                                    <div class="filter">
                                                                        <a class="icon" href="#"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="bi bi-three-dots"></i></a>
                                                                        <ul
                                                                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                            <li><a class="dropdown-item btn btn-sm"
                                                                                    href="{{ route('listecollectives.edit', $listecollective->id) }}"
                                                                                    class="mx-1" title="Modifier"><i
                                                                                        class="bi bi-pencil"></i>Modifier</a>
                                                                            </li>
                                                                            {{-- <form
                                                                                action="{{ route('listecollectives.destroy', $listecollective->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="dropdown-item show_confirm"
                                                                                    title="Supprimer"><i
                                                                                        class="bi bi-trash"></i>Supprimer</button>
                                                                            </form> --}}
                                                                        </ul>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                        </tr>
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

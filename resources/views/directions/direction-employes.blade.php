@extends('layout.user-layout')
@section('title', 'ajouter agents')
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
                                        href="{{ route('directions.show', $direction->id) }}" class="btn btn-success btn-sm"
                                        title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des directions</p>
                                </span>
                            </div>
                        </div>
                        <h5><u><b>Direction</b></u> : {{ $direction?->name . ' (' . $direction?->sigle . ')' }}</h5>
                        <h5><u><b>Agents</b></u> : {{ $direction->employees->count() ?? '' }}</h5>
                        <form method="post" action="{{ url('directionAgent', ['$iddirection' => $direction->id]) }}"
                            enctype="multipart/form-data" class="row g-3 pt-5">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-check col-md-12">
                                    <table class="table datatables align-middle" id="table-individuelles">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="form-check-input" id="checkAll">N°</th>
                                                <th></th>
                                                <th>Matricule</th>
                                                <th>Prénom</th>
                                                <th>Nom</th>
                                                <th>E-mail</th>
                                                <th>Téléphone</th>
                                                <th><i class="bi bi-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($employes as $employe)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="employes[]" value="{{ $employe->id }}"
                                                            {{ in_array($employe->directions_id, $employeDirection) ? 'checked' : '' }}
                                                            {{ in_array($employe->directions_id, $employeDirectionCheck) ? 'disabled' : '' }}
                                                            class="form-check-input @error('employes') is-invalid @enderror">
                                                        @error('employes')
                                                            <span class="invalid-feedback" role="alert">
                                                                <div>{{ $message }}</div>
                                                            </span>
                                                        @enderror
                                                        {{-- {{ $individuelle?->numero }} --}}
                                                    </td>
                                                    <th scope="row"><img class="rounded-circle w-20" alt="Profil"
                                                            src="{{ asset($employe->user->getImage()) }}" width="40"
                                                            height="auto">
                                                    </th>
                                                    {{-- <td>{{ $i++ }}</td> --}}
                                                    <td>{{ $employe->matricule }}</td>
                                                    <td>{{ $employe->user->firstname }}</td>
                                                    <td>{{ $employe->user->name }}</td>
                                                    <td>{{ $employe->user->email }}</td>
                                                    <td>{{ $employe->user->telephone }}</td>
                                                    <td>
                                                        <span class="d-flex mt-2 align-items-baseline"><a
                                                                href="{{ route('employes.show', $employe->id) }}"
                                                                class="btn btn-success btn-sm mx-1" title="voir détails"><i
                                                                    class="bi bi-eye"></i></a>
                                                            <div class="filter">
                                                                <a class="icon" href="#"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bi bi-three-dots"></i></a>
                                                                <ul
                                                                    class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                    <li><a class="dropdown-item btn btn-sm mx-1"
                                                                            href="{{ route('employes.edit', $employe->id) }}"
                                                                            class="mx-1"><i class="bi bi-pencil"></i>
                                                                            Modifier</a>
                                                                    </li>
                                                                    <li>
                                                                        {{-- <form
                                                                            action="{{ route('employes.destroy', $employe->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"><i
                                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                                        </form> --}}
                                                                    </li>
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

@extends('layout.user-layout')
@section('title', 'Antennes')
@section('space-work')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Données</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-12">
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
                            role="alert"><strong>{{ $error }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="pt-1">
                            <button type="button" class="btn btn-primary btn-sm float-end btn-rounded"
                                data-bs-toggle="modal" data-bs-target="#AddAntenneModal">Ajouter</button>
                        </div>
                        <h5 class="card-title">Antennes</h5>
                        <table class="table datatables align-middle" id="table-antennes">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">N°</th>
                                    <th>Antenne</th>
                                    <th>Contact</th>
                                    <th>Adresse</th>
                                    <th class="text-center">Responsable</th>
                                    <th class="text-center">Téléphone</th>
                                    <th>Régions</th>
                                    <th width="5%" class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($antennes as $antenne)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $antenne?->name }}</td>
                                        <td>{{ $antenne?->contact }}</td>
                                        <td>{{ $antenne?->adresse }}</td>
                                        <td>{{ $antenne?->chef?->user?->civilite . ' ' . $antenne->chef?->user?->firstname . ' ' . $antenne->chef?->user?->name }}
                                        </td>
                                        <td>{{ $antenne?->chef?->user?->telephone }}</td>
                                        <td>
                                            @foreach ($antenne?->regions as $region)
                                                <div>{{ $region?->nom }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="d-flex mt-2 align-items-baseline"><a href="#"
                                                    class="btn btn-warning btn-sm mx-1" title="Voir"><i
                                                        class="bi bi-file-lock"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li><a class="dropdown-item btn btn-sm mx-1"
                                                                href="{{ route('antennes.edit', $antenne->id) }}"
                                                                class="mx-1">Modifier</a>
                                                        </li>
                                                        <form action="{{ url('antennes', $antenne->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item show_confirm">Supprimer</button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div
        class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
        <div class="modal fade" id="AddAntenneModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="post" action="{{ route('antennes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">CRÉER UNE NOUVELLE ANTENNE</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="name" class="form-label">Antenne<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="name" rows="1" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Antenne">{{ old('name') }}</textarea>
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
                                        placeholder="Code">{{ old('code') }}</textarea>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="contact" class="form-label">contact<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="0" name="contact" value="{{ old('contact') }}"
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
                                        class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                        placeholder="Ecrire votre adresse ici">{{ old('adresse') }}</textarea>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="employe" class="form-label">Chef antenne</label>
                                    <select name="employe" class="form-select  @error('employe') is-invalid @enderror"
                                        aria-label="Select" id="select-field-chef-antenne"
                                        data-placeholder="Choisir le responsable">
                                        <option value="">choisir chef antenne</option>
                                        @foreach ($employe as $employes)
                                            <option value="{{ $employes->id }}">
                                                {{ $employes->matricule . ' ' . $employes->user->firstname . ' ' . $employes->user->name }}
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
                                        id="multiple-select-field-region-antenne" multiple
                                        data-placeholder="Choisir région">
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">
                                                {{ $region->nom ?? old('region') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer mt-5">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-antennes', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [0, 'asc']
            ],
            language: {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucantenne donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
                "select": {
                    "rows": {
                        _: "%d lignes sÃ©lÃ©ctionnÃ©es",
                        0: "Aucantenne ligne sÃ©lÃ©ctionnÃ©e",
                        1: "1 ligne sÃ©lÃ©ctionnÃ©e"
                    }
                }
            }
        });
    </script>
@endpush

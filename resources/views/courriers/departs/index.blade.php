@extends('layout.user-layout')
@section('title', 'ONFP - courriers départs')
@section('space-work')

    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Données</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                {{-- @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    @endforeach
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @endif
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-12 col-md-4 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Courriers <span>| Départs</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-calendar-check-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <span class="text-primary">{{ $count_today ?? '0' }}</span>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold">Aujourd'hui</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                        <div class="card info-card sales-card">
                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                            </div> --}}
                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Courriers <span>| Départs</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <span class="text-primary">{{ count($departs) ?? '0' }}</span>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold">Tous</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mt-0">
                            <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('courriers.index') }}"
                                    class="btn btn-success btn-sm" title="retour"><i
                                        class="bi bi-arrow-counterclockwise"></i></a>&nbsp;Liste des courriers
                            </span>
                            <span class="d-flex align-items-baseline">
                                <a href="#" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                    data-bs-target="#addCourrierDepart" title="Ajouter">Ajouter</a>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li>
                                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#generate_rapport"></i>Rechercher
                                                plus</button>
                                        </li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        @foreach ($departs as $depart)
                        @endforeach
                        @if (!empty($depart))
                        <h5 class="card-title">{{ $title }}</h5>
                            <table class="table datatables align-middle" id="table-departs">
                                <thead>
                                    <tr>
                                        <th>Date et n° départ</th>
                                        <th>Date et n° correspondance</th>
                                        <th>Destinataire</th>
                                        <th>Objet</th>
                                        <th>Service expéditeur</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($departs as $depart)
                                        <tr>
                                            <td>{{ $depart->courrier->date_depart?->format('d/m/Y') }} <br>
                                                <span style="color: rgb(255, 0, 0);">{{ ' n° ' . $depart?->numero }}</span>
                                            </td>
                                            <td>{{ $depart->courrier->date_cores?->format('d/m/Y') }} <br>
                                                <span
                                                    style="color: rgb(255, 0, 0);">{{ ' n° ' . $depart?->courrier->numero }}</span>
                                            </td>
                                            <td>{{ $depart?->destinataire }}</td>
                                            <td>{{ $depart->courrier?->objet }}</td>
                                            <td>{{ $depart->courrier?->reference }}</td>
                                            <td>
                                                <span class="d-flex mt-2 align-items-baseline"><a
                                                        href="{{ route('departs.show', $depart->id) }}"
                                                        class="btn btn-success btn-sm mx-1" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li><a class="dropdown-item btn btn-sm mx-1"
                                                                    href="{{ route('departs.edit', $depart->id) }}"
                                                                    class="mx-1"><i class="bi bi-pencil"></i>
                                                                    Modifier</a>
                                                            </li>
                                                            {{-- <li><a class="dropdown-item btn btn-sm mx-1"
                                                                href="{{ url('depart-imputations', ['id' => $depart->id]) }}"
                                                                class="mx-1"><i class="bi bi-recycle"></i> Imputer</a>
                                                        </li> --}}
                                                            {{-- <li><a class="dropdown-item btn btn-sm mx-1"
                                                                href="{!! url('coupon-depart', ['$id' => $depart->id]) !!}" class="mx-1"
                                                                target="_blank"><i
                                                                    class="bi bi-file-earmark-arrow-down"></i> Coupon</a>
                                                        </li> --}}
                                                            @can('depart-delete')
                                                                <li>
                                                                    <form action="{{ route('departs.destroy', $depart->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item show_confirm"><i
                                                                                class="bi bi-trash"></i>Supprimer</button>
                                                                    </form>
                                                                </li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info mt-3">Aucun courrier départ enregistré pour le moment !!!</div>
                        @endif
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="addCourrierDepart" tabindex="-1" role="dialog"
            aria-labelledby="addCourrierDepartLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    {{--  <div class="pt-0 pb-0">
                        <h5 class="card-title text-center pb-0 fs-4">Enregistrement</h5>
                        <p class="text-center small">enregister un nouveau courrier départ</p>
                    </div> --}}

                    <div class="card-header text-center bg-gradient-default">
                        <h1 class="h4 text-black mb-0">Ajouter un nouveau courrier départ</h1>
                    </div>

                    {{-- <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau courrier départ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> --}}
                    <form method="post" action="{{ route('departs.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf

                        {{--  <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter une nouvelle
                                demande
                                individuelle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div> --}}
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_depart" class="form-label">Date départ<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_depart" value="{{ old('date_depart') }}"
                                        class="form-control form-control-sm @error('date_depart') is-invalid @enderror"
                                        id="date_depart" placeholder="Date départ">
                                    @error('date_depart')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_depart" class="form-label">Numéro départ<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_depart"
                                            value="{{ $numCourrier ?? old('numero_depart') }}"
                                            class="form-control form-control-sm @error('numero_depart') is-invalid @enderror"
                                            id="numero_depart" placeholder="Numéro départ">
                                        @error('numero_depart')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_corres" class="form-label">Date correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="date" name="date_corres" value="{{ old('date_corres') }}"
                                        class="form-control form-control-sm @error('date_corres') is-invalid @enderror"
                                        id="date_corres" placeholder="nom">
                                    @error('date_corres')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_correspondance" class="form-label">Numéro correspondance<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="number" min="0" name="numero_correspondance"
                                            value="{{ old('numero_correspondance') }}"
                                            class="form-control form-control-sm @error('numero_correspondance') is-invalid @enderror"
                                            id="numero_correspondance" placeholder="Numéro de correspondance">
                                        @error('numero_correspondance')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="annee" class="form-label">Année<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="2024" name="annee"
                                        value="{{ $anneeEnCours ?? old('annee') }}"
                                        class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                        id="annee" placeholder="Année">
                                    @error('annee')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="destinataire" class="form-label">Destinataire<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="destinataire" value="{{ old('destinataire') }}"
                                        class="form-control form-control-sm @error('destinataire') is-invalid @enderror"
                                        id="destinataire" placeholder="Destinataire">
                                    @error('destinataire')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="objet" value="{{ old('objet') }}"
                                        class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                        id="objet" placeholder="Objet">
                                    @error('objet')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="service_expediteur" class="form-label">Service expéditeur</label>
                                    <input type="text" name="service_expediteur"
                                        value="{{ old('service_expediteur') }}"
                                        class="form-control form-control-sm @error('service_expediteur') is-invalid @enderror"
                                        id="service_expediteur" placeholder="Service expéditeur">
                                    @error('service_expediteur')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="numero_reponse" class="form-label">Numéro réponse</label>
                                    <input type="number" min="0" name="numero_reponse"
                                        value="{{ old('numero_reponse') }}"
                                        class="form-control form-control-sm @error('numero_reponse') is-invalid @enderror"
                                        id="numero_reponse" placeholder="Numéro réponse">
                                    @error('numero_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="date_reponse" class="form-label">Date réponse</label>
                                    <input type="date" min="0" name="date_reponse"
                                        value="{{ old('date_reponse') }}"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror"
                                        id="date_reponse" placeholder="Numéro réponse">
                                    @error('date_reponse')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-8">
                                    <label for="observation" class="form-label">Observations</label>
                                    <textarea name="observation" id="observation" rows="1"
                                        class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ old('observation') }}</textarea>
                                    @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="generate_rapport" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapportLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer une recherche<span class="text-danger mx-1">*</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('departs.report') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="numero" class="form-label">Numero</label>
                                                <input type="text" name="numero" value="{{ old('numero') }}"
                                                    class="form-control form-control-sm @error('numero') is-invalid @enderror"
                                                    id="numero" placeholder="Numero">
                                                @error('numero')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="objet" class="form-label">Objet</label>
                                                <input type="text" name="objet" value="{{ old('objet') }}"
                                                    class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                                    id="objet" placeholder="Objet">
                                                @error('objet')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="expediteur" class="form-label">Service expéditeur</label>
                                                <input type="text" name="expediteur" value="{{ old('expediteur') }}"
                                                    class="form-control form-control-sm @error('expediteur') is-invalid @enderror"
                                                    id="expediteur" placeholder="Expéditeur">
                                                @error('expediteur')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="destinataire" class="form-label">Destinataire</label>
                                                <input type="text" name="destinataire" value="{{ old('destinataire') }}"
                                                    class="form-control form-control-sm @error('destinataire') is-invalid @enderror"
                                                    id="destinataire" placeholder="Destinataire">
                                                @error('destinataire')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        new DataTable('#table-departs', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            "order": [
                [0, 'desc']
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
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
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
                        0: "Aucune ligne sÃ©lÃ©ctionnÃ©e",
                        1: "1 ligne sÃ©lÃ©ctionnÃ©e"
                    }
                }
            }
        });
    </script>
@endpush

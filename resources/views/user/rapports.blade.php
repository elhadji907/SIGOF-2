@extends('layout.user-layout')
@section('title', 'Générer rapport utilisateurs')
@section('space-work')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                @can('user-view')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @endcan
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Générer rapport utilisateurs</li>
            </ol>
        </nav>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif
    <div class="d-flex justify-content-between align-items-center mt-3">
        <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('home') }}" class="btn btn-success btn-sm"
                title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
            <p> | Tableau de bord</p>
        </span>
        {{-- @isset($users)
            <span class="page-title badge bg-primary">{{ $title }}</span>
        @endisset --}}
        @can('rapport-operateur-view')
            <span class="d-flex align-items-baseline">
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#generate_rapport_module_region" title="Générer rapports">Générer rapport</a>
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport"></i>Date naissance</button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport_module"></i>Télephone</button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport_email"></i>Email</button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport_compte"></i>Compte vérifié</button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#generate_rapport_role"></i>Roles</button>
                        </li>
                    </ul>
                </div>
            </span>
        @endcan
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @isset($users)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <div class="table-responsive">
                                <table class="table datatables align-middle" id="table-operateur">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">CIN</th>
                                            <th>Username</th>
                                            <th>E-mail</th>
                                            <th>Téléphone</th>
                                            <th>Roles</th>
                                            <th class="text-center">Statut</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if (!empty($user?->username))
                                                <tr>
                                                    <th scope="row">
                                                        <a href="{{ route('users.show', $user->id) }}">
                                                            <img class="rounded-circle w-20" alt="Profil"
                                                                src="{{ asset($user->getImage()) }}" width="40"
                                                                height="auto">
                                                        </a>
                                                    </th>
                                                    <td>{{ $user->cin }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                    <td><a href="tel:+221{{ $user->telephone }}">{{ $user->telephone }}</a>
                                                    </td>
                                                    <td>
                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $roleName)
                                                                <label for="label"
                                                                    class="badge bg-primary mx-1">{{ $roleName }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @isset($user?->email_verified_at)
                                                            <i class="bi bi-check-circle text-success" title="compte vérifié"></i>
                                                        @endisset
                                                    </td>
                                                    <td>
                                                        <span class="d-flex mt-2 align-items-baseline"><a
                                                                href="{{ route('users.show', $user->id) }}"
                                                                class="btn btn-info btn-sm mx-1" title="voir détails"><i
                                                                    class="bi bi-eye"></i></a>
                                                            <div class="filter">
                                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                        class="bi bi-three-dots"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                    <li><a class="dropdown-item btn btn-sm mx-1"
                                                                            href="{{ route('users.edit', $user->id) }}"
                                                                            class="mx-1"><i class="bi bi-pencil"></i>
                                                                            Modifier</a>
                                                                    </li>
                                                                    <li>
                                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"><i
                                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>

        <div class="modal fade" id="generate_rapport_module_region" tabindex="-1" role="dialog"
            aria-labelledby="generate_rappor_module_regionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer rapport utilisateur par CIN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <input type="hidden" name="cin_value" value="1">
                                            <div class="form-group">
                                                <label for="cin" class="form-label">N° CIN<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input minlength="10" maxlength="15" type="text" name="cin"
                                                    value="{{ old('cin') }}"
                                                    class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                                    id="cin" placeholder="Numéro carte d'identité nationale">
                                                @error('cin')
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
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
                        <h5 class="modal-title">Générer un rapport utilisateur par date naissance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <input type="hidden" name="date_value" value="1">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label>De</label>
                                                <input type="date" name="from_date"
                                                    class="form-control form-control-sm @error('from_date') is-invalid @enderror from_date">
                                            </div>
                                            @error('from_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label>À</label>
                                                <input type="date" name="to_date"
                                                    class="form-control form-control-sm @error('to_date') is-invalid @enderror to_date">
                                            </div>
                                            @error('to_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="generate_rapport_module" tabindex="-1" role="dialog"
            aria-labelledby="generate_rappor_moduleLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer utilisateurs par téléphone</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <input type="hidden" name="telephone_value" value="1">
                                            <div class="form-group">
                                                <label for="telephone" class="form-label">Téléphone<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input minlength="9" maxlength="9" type="text" name="telephone"
                                                    value="{{ old('telephone') }}"
                                                    class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                                    id="telephone" placeholder="7xxxxxxxx">
                                                @error('telephone')
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="generate_rapport_email" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapport_emailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer utilisateurs par E-mail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <input type="hidden" name="email_value" value="1">
                                            <div class="form-group">
                                                <label for="email" class="form-label">E-mail<span
                                                        class="text-danger mx-1">*</span></label>
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    id="email" placeholder="e-mail">
                                                @error('email')
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
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="generate_rapport_compte" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapport_compteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer utilisateurs autorisés à se connecter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.rapport') }}">
                        @csrf
                        {{-- <div class="modal-body">
                            <div class="row g-3">                                
                                <input type="hidden" name="verify_value" value="1">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <input type="hidden" name="verify_value" value="1">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Fermer</button>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-primary btn-block submit_rapport btn-sm">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="generate_rapport_role" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapport_roleLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer utilisateurs par E-mail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.rapport') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <input type="hidden" name="role_value" value="1">
                                            <div class="form-group">
                                                <label for="role" class="form-label">Role<span
                                                        class="text-danger mx-1">*</span></label>
                                                <select name="role"
                                                    class="form-select  @error('role') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-role-user"
                                                    data-placeholder="Choisir role">
                                                    <option value="{{ old('role') }}">{{ old('role') }}
                                                    </option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role }}">{{ $role ?? old('role') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small id="emailHelp" class="form-text text-muted">
                                                    @if ($errors->has('role'))
                                                        @foreach ($errors->get('role') as $message)
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @endforeach
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block submit_rapport btn-sm">Envoyer</button>
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
        new DataTable('#table-operateur', {
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

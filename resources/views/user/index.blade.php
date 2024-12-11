@extends('layout.user-layout')
@section('title', 'ONFP - Liste des users')
@section('space-work')

    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Données</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
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
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert"><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="pt-2">
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                    class="fas fa-plus"></i>
                                <i class="bi bi-person-plus" title="Ajouter"></i> </a>
                        </div> --}}

                        <div class="d-flex justify-content-between align-items-center">
                            @can('user-create')
                                <h5 class="card-title">{{ $title }}</h5>
                                <span class="d-flex align-items-baseline">
                                    <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                                        data-bs-target="#AddUserModal" title="Ajouter">Ajouter</a>
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
                            @endcan
                        </div>
                        {{-- <h5 class="card-title">Utilisateurs</h5> --}}
                        {{-- <p>Le tableau de tous les utilisateurs du système.</p> --}}
                        <!-- Table with stripped rows -->
                        @isset($user_liste)
                            <table class="table datatables align-middle" id="table-users">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Téléphone</th>
                                        <th>Roles</th>
                                        <th class="text-center">Statut</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($user_liste as $user)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('users.show', $user->id) }}">
                                                    <img class="rounded-circle w-20" alt="Profil"
                                                        src="{{ asset($user->getImage()) }}" width="40" height="auto">
                                                </a>
                                            </th>
                                            <td>{{ $user->username }}</td>
                                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                            <td><a href="tel:+221{{ $user->telephone }}">{{ $user->telephone }}</a></td>
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
                                                    {{-- <span class="badge bg-success"><i class="bi bi-check-circle" title="compte vérifié"></i></span> --}}
                                                    {{-- me-1 à mettre dans la classe de la balise i --}}
                                                    {{-- <span class="btn btn-outline-info btn-sm mx-1"><i class="bi bi-check2-circle"></i></span> --}}
                                                @endisset
                                            </td>
                                            {{-- <td>
                                            <span class="d-flex mt-2 align-items-baseline"><a
                                                    href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-success btn-sm mx-1" title="Modifier"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                        title="Supprimer"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </span>
                                        </td> --}}

                                            <td>
                                                {{-- @can('user-show') --}}
                                                    <span class="d-flex mt-2 align-items-baseline"><a
                                                            href="{{ route('users.show', $user->id) }}"
                                                            class="btn btn-info btn-sm mx-1" title="voir détails"><i
                                                                class="bi bi-eye"></i></a>
                                                        <div class="filter">
                                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                    class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                {{-- @can('user-update') --}}
                                                                    <li><a class="dropdown-item btn btn-sm mx-1"
                                                                            href="{{ route('users.edit', $user->id) }}"
                                                                            class="mx-1"><i class="bi bi-pencil"></i> Modifier</a>
                                                                    </li>
                                                                {{-- @endcan --}}
                                                                @can('user-delete')
                                                                    <li>
                                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item show_confirm"><i
                                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                                        </form>
                                                                    </li>
                                                                @endcan
                                                            </ul>
                                                        </div>
                                                    </span>
                                              {{--   @endcan --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="AddUserModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter un utilisateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="username" class="form-label">Username<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="username" value="{{ old('username') }}"
                                        class="form-control form-control-sm @error('username') is-invalid @enderror"
                                        id="username" placeholder="Username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
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

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
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

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
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

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="telephone" class="form-label">Téléphone<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="number" min="0" name="telephone" minlength="9" maxlength="9"
                                        value="{{ old('telephone') }}"
                                        class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                        id="telephone" placeholder="7xxxxxxxx">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
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

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="roles" class="form-label">Roles</label>
                                    <select name="roles[]" class="form-select" aria-label="Select"
                                        id="multiple-select-field" multiple data-placeholder="Choisir roles">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role ?? old('role') }}</option>
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

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        id="password" placeholder="mot de passe">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                    <label for="image" class="form-label">Image de profil</label>
                                    <input type="file" name="image" id="image" multiple
                                        value="{{ old('image') }}"
                                        class="form-control @error('image') is-invalid @enderror btn btn-outline-info btn-sm">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="col-xl-4">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-printer"></i>
                                    Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- End Basic Modal-->
        <div class="modal fade" id="generate_rapport" tabindex="-1" role="dialog"
            aria-labelledby="generate_rapportLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Générer une recherche<span class="text-danger mx-1">*</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('users.report') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="firstname" class="form-label">Prénom</label>
                                                <input type="text" name="firstname" value="{{ old('firstname') }}"
                                                    class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                                    id="firstname" placeholder="Prénom">
                                                @error('firstname')
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
                                                <label for="name" class="form-label">Nom</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    id="name" placeholder="Nom">
                                                @error('name')
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
                                                <label for="cin" class="form-label">N° CIN</label>
                                                <input minlength="5" maxlength="15" type="text" name="cin"
                                                    value="{{ old('cin') }}"
                                                    class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                                    id="cin" placeholder="Numéro demande">
                                                @error('cin')
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
                                                <label for="telephone" class="form-label">Téléphone</label>
                                                <input minlength="5" maxlength="10" type="text" name="telephone"
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
                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    id="email" placeholder="email@email.com">
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
        new DataTable('#table-users', {
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

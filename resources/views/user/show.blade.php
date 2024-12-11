@extends('layout.user-layout')
@section('title', 'Détails utilisateur')
@section('space-work')
    <section class="section profile">
        <div class="row">
            @if ($message = Session::get('status'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
            <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('users.index') }}"
                    class="btn btn-success btn-sm" title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                <p> | retour, liste des utilisateurs</p>
            </span>
            <div class="col-xl-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">
                        Image de profil
                    </div>
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img class="rounded-circle w-50" alt="Profil" src="{{ asset($user->getImage()) }}" width="100"
                            height="auto">

                        <h2 class="pt-3">
                            @if (isset($user?->name))
                                {{ $user?->civilite . ' ' . $user?->firstname . ' ' . $user?->name }}
                            @else
                                {{ $user?->username }}
                            @endif
                        </h2>
                        <div class="social-links mt-2">
                            <div class="social-links mt-2">
                                @isset($user?->twitter)
                                    <a href="{{ $user?->twitter }}" class="twitter" target="_blank"><i
                                            class="bi bi-x-twitter"></i></a>
                                @endisset
                                @isset($user?->facebook)
                                    <a href="{{ $user?->facebook }}" class="facebook" target="_blank"><i
                                            class="bi bi-facebook"></i></a>
                                @endisset
                                @isset($user?->instagram)
                                    <a href="{{ $user?->instagram }}" class="instagram" target="_blank"><i
                                            class="bi bi-instagram"></i></a>
                                @endisset
                                @isset($user?->linkedin)
                                    <a href="{{ $user?->linkedin }}" class="linkedin" target="_blank"><i
                                            class="bi bi-linkedin"></i></a>
                                @endisset
                            </div>
                        </div>

                        {{-- <h5 class="card-title">Informations complémentaires</h5>
                        <p>créé par <b>{{ $user_create_name }}</b>, {{ $user->created_at->diffForHumans() }}</p>
                        <p>modifié par <b>{{ $user_update_name }}</b>, {{ $user->updated_at->diffForHumans() }}</p> --}}
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card border-info mb-3">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Utilisateur</button>
                            </li>
                            <li class="nav-item">
                                {{-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#"><a
                                        class="dropdown-item btn btn-sm mx-1" href="{{ route('users.edit', $user->id) }}"
                                        class="mx-1"><i class="bi bi-pencil mx-1"></i>Modifier</a></button> --}}
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-edit">Modifier
                                    profil
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-autre">Info.
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-0">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Détails</h5>

                                @isset($user?->username)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Username</div>
                                        <div class="col-lg-9 col-md-8">{{ $user?->username }}
                                        </div>
                                    </div>
                                @endisset

                                @isset($user?->firstname)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Prénom</div>
                                        <div class="col-lg-9 col-md-8">{{ $user?->firstname }}</div>
                                    </div>
                                @endisset

                                @isset($user?->name)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nom</div>
                                        <div class="col-lg-9 col-md-8">{{ $user?->name }}
                                        </div>
                                    </div>
                                @endisset

                                @isset($user?->email)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Email</div>
                                        <div class="col-lg-9 col-md-8"><a
                                                href="mailto:{{ $user?->email }}">{{ $user?->email }}</a></div>
                                    </div>
                                @endisset

                                @isset($user?->telephone)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                        <div class="col-lg-9 col-md-8"><a
                                                href="tel:+221{{ $user?->telephone }}">{{ $user?->telephone }}</a></div>
                                    </div>
                                @endisset

                                @isset($user?->adresse)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Adresse</div>
                                        <div class="col-lg-9 col-md-8">{{ $user?->adresse }}</div>
                                    </div>
                                @endisset

                            </div>

                            <div class="tab-content pt-2">
                                <div class="tab-pane fade profile-overview" id="profile-autre">

                                    {{--  <h5 class="card-title">Audit</h5> --}}

                                    <div class="card-body profile-card pt-1 d-flex flex-column">
                                        <h5 class="card-title">Informations complémentaires</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label pb-2">Création </div>
                                            <div class="col-lg-9 col-md-8 pb-2">{{ 'créé par : ' . $user_create_name }}
                                                {{ $user->created_at->diffForHumans() }}</div>

                                            <div class="col-lg-3 col-md-4 label pt-2">Modification</div>

                                            @if ($user->created_at != $user->updated_at)
                                                <div class="col-lg-9 col-md-8 pt-2">
                                                    {{ 'modifié par : ' . $user_update_name }}
                                                    {{ $user->updated_at->diffForHumans() }}</div>
                                            @else
                                                <div class="col-lg-9 col-md-8 pt-2">
                                                    jamais modifié</div>
                                            @endif

                                            <div class="col-lg-3 col-md-4 label pt-3">Roles</div>
                                            <div class="col-lg-9 col-md-8 pt-3">
                                                @if (isset($user->roles) && $user->roles != '[]')
                                                    @foreach ($user->roles as $role)
                                                        <span class="badge bg-info">{{ $role->name }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    {{-- <div class="col-lg-2 col-md-3 label">Création</div>
                                        <div class="col-lg-10 col-md-9">créé le
                                            {{ Auth::user()->created_at->format('d/m/Y à H:i:s') }}</div>
                                        <div class="col-lg-2 col-md-3 label">Modification</div>
                                        <div class="col-lg-10 col-md-9">Modifié le
                                            {{ Auth::user()->updated_at->format('d/m/Y à H:i:s') }}</div> --}}
                                </div>
                            </div>

                            {{-- Edit uer --}}
                            <div class="tab-content pt-0">
                                {{-- Début Edition --}}
                                <div class="tab-pane fade profile-edit pt-3" id="user-edit">
                                    <form method="post" action="{{ route('users.update', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Modification user</h5>
                                            {{--  <form action="{{ route('employes.update', $user?->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <input name="employe" type="hidden" value="1">
                                                <button
                                                    class="show_confirm_employes btn btn-outline-success btn-sm float-end">Ajouter
                                                    employé</button>
                                            </form> --}}

                                            @if (isset($user->employee))
                                                <span class="badge bg-info">cet utilisateur est un employé</span>
                                            @else
                                                <button type="button" class="btn btn-outline-success btn-sm float-end"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addEmploye{{ $user?->id }}"
                                                    title="Ajouter à la base de données des employés">
                                                    Employé</button>
                                            @endif
                                        </div>
                                        <!-- Profile Edit Form -->
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image
                                                de
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img class="rounded-circle w-25" alt="Profil"
                                                    src="{{ asset($user?->getImage()) }}" width="50" height="auto">

                                                {{-- <div class="pt-2">
                                                            <a href="#" class="btn btn-primary btn-sm"
                                                                title="Upload new profile image"><i
                                                                    class="bi bi-upload"></i></a>
                                                            <a href="#" class="btn btn-danger btn-sm"
                                                                title="Remove my profile image"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </div> --}}
                                                <div class="pt-2">
                                                    <input type="file" name="image" id="image"
                                                        class="form-control @error('image') is-invalid @enderror btn btn-primary btn-sm">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Civilité --}}
                                        <div class="row mb-3">
                                            <label for="Civilité" class="col-md-4 col-lg-3 col-form-label">Civilité<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <select name="civilite"
                                                        class="form-select form-select-sm @error('civilite') is-invalid @enderror"
                                                        aria-label="Select" id="select-field-civilite"
                                                        data-placeholder="Choisir civilité">
                                                        <option value="{{ $user->civilite ?? old('civilite') }}">
                                                            {{ $user->civilite ?? old('civilite') }}
                                                        </option>
                                                        <option value="Monsieur">
                                                            Monsieur
                                                        </option>
                                                        <option value="Madame">
                                                            Madame
                                                        </option>
                                                    </select>
                                                    @error('civilite')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- CIN --}}
                                        <div class="row mb-3">
                                            <label for="cin" class="col-md-4 col-lg-3 col-form-label">CIN<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="cin" type="text"
                                                        class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                                        id="cin" value="{{ $user->cin ?? old('cin') }}"
                                                        autocomplete="cin" placeholder="Votre cin">
                                                </div>
                                                @error('cin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- username --}}
                                        <div class="row mb-3">
                                            <label for="username" class="col-md-4 col-lg-3 col-form-label">Username<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="username" type="text"
                                                        class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                        id="username" value="{{ $user->username ?? old('username') }}"
                                                        autocomplete="username" placeholder="Votre username">
                                                </div>
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Prénom --}}
                                        <div class="row mb-3">
                                            <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Prénom<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="firstname" type="text"
                                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                                        id="firstname" value="{{ $user->firstname ?? old('firstname') }}"
                                                        autocomplete="firstname" placeholder="Votre prénom">
                                                </div>
                                                @error('firstname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Nom --}}
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nom<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    id="name" value="{{ $user->name ?? old('name') }}"
                                                    autocomplete="name" placeholder="Votre Nom">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Date de naissance --}}
                                        <div class="row mb-3">
                                            <label for="date_naissance" class="col-md-4 col-lg-3 col-form-label">Date
                                                naissance<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="date" name="date_naissance"
                                                    value="{{ $user->date_naissance?->format('Y-m-d') ?? old('date_naissance') }}"
                                                    class="form-control form-control-sm @error('date_naissance') is-invalid @enderror"
                                                    id="date_naissance" placeholder="Date naissance">
                                                @error('date_naissance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Lieu naissance --}}
                                        <div class="row mb-3">
                                            <label for="lieu naissance" class="col-md-4 col-lg-3 col-form-label">Lieu
                                                naissance<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="lieu_naissance" type="text"
                                                    class="form-control form-control-sm @error('lieu_naissance') is-invalid @enderror"
                                                    id="lieu_naissance"
                                                    value="{{ $user->lieu_naissance ?? old('lieu_naissance') }}"
                                                    autocomplete="lieu_naissance" placeholder="Votre Lieu naissance">
                                                @error('lieu_naissance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Email --}}
                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    id="Email" value="{{ $user->email ?? old('email') }}"
                                                    autocomplete="email" placeholder="Votre adresse e-mail">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Telephone --}}
                                        <div class="row mb-3">
                                            <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Téléphone<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="telephone" type="telephone"
                                                    class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                                    id="telephone" value="{{ $user->telephone ?? old('telephone') }}"
                                                    autocomplete="telephone" placeholder="Votre n° de téléphone">
                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Adresse --}}
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Adresse<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adresse" type="adresse"
                                                    class="form-control form-control-sm @error('adresse') is-invalid @enderror"
                                                    id="adresse" value="{{ $user->adresse ?? old('adresse') }}"
                                                    autocomplete="adresse" placeholder="Votre adresse de résidence">
                                                @error('adresse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Situation familiale --}}
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Situation
                                                familiale<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="situation_familiale"
                                                    class="form-select form-select-sm @error('situation_familiale') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-familiale"
                                                    data-placeholder="Choisir situation familiale">
                                                    <option value="{{ $user->situation_familiale }}">
                                                        {{ $user->situation_familiale ?? old('situation_familiale') }}
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
                                        </div>
                                        {{-- Situation professionnelle --}}
                                        <div class="row mb-3">
                                            <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Situation
                                                professionnelle<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="situation_professionnelle"
                                                    class="form-select  @error('situation_professionnelle') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-professionnelle"
                                                    data-placeholder="Choisir situation professionnelle">
                                                    <option value="{{ $user->situation_professionnelle }}">
                                                        {{ $user->situation_professionnelle ?? old('situation_professionnelle') }}
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
                                            </div>
                                        </div>
                                        {{-- Mot de passe --}}
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-lg-3 col-form-label">Modifier mot de
                                                passe</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" name="password"
                                                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Votre mot de passe">
                                                <div class="invalid-feedback">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="newPassword" value="{{ $user->password }}">
                                        {{-- Roles --}}
                                        <div class="row mb-3">
                                            <label for="roles" class="col-md-4 col-lg-3 col-form-label">Roles</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="roles[]" class="form-select" aria-label="Select"
                                                    id="multiple-select-field" multiple data-placeholder="Choisir roles">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role }}"
                                                            {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                                            {{ $role ?? old('role') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- twitter --}}
                                        <div class="row mb-3">
                                            <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="twitter"
                                                    class="form-control form-control-sm @error('twitter') is-invalid @enderror"
                                                    id="twitter" value="{{ $user->twitter ?? old('twitter') }}"
                                                    autocomplete="twitter"
                                                    placeholder="lien de votre compte x (ex twitter)">
                                                @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- facebook --}}
                                        <div class="row mb-3">
                                            <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="facebook"
                                                    class="form-control form-control-sm @error('facebook') is-invalid @enderror"
                                                    id="facebook" value="{{ $user->facebook ?? old('facebook') }}"
                                                    autocomplete="facebook" placeholder="lien de votre compte facebook">
                                                @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- instagram --}}
                                        <div class="row mb-3">
                                            <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="instagram"
                                                    class="form-control form-control-sm @error('instagram') is-invalid @enderror"
                                                    id="instagram" value="{{ $user->instagram ?? old('instagram') }}"
                                                    autocomplete="instagram" placeholder="lien de votre compte instagram">
                                                @error('instagram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- linkedin --}}
                                        <div class="row mb-3">
                                            <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="linkedin"
                                                    class="form-control form-control-sm @error('linkedin') is-invalid @enderror"
                                                    id="linkedin" value="{{ $user->linkedin ?? old('linkedin') }}"
                                                    autocomplete="linkedin" placeholder="lien de votre ompte linkedin">
                                                @error('linkedin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Sauvegarder les
                                                modifications</button>
                                        </div>
                                        {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                    {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                                                    <button form="send-verification"
                                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                        {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif --}}
                                        <!-- End Profile Edit Form -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
        @if (isset($user->employee))
        @else
            <div class="modal fade" id="addEmploye{{ $user?->id }}" tabindex="-1" role="dialog"
                aria-labelledby="addEmployeLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{--  <div class="pt-0 pb-0">
                <h5 class="card-title text-center pb-0 fs-4">Enregistrement</h5>
                <p class="text-center small">enregister un nouveau courrier arrivé</p>
            </div> --}}

                        <div class="modal-header">
                            <h5 class="modal-title">Enregistrer cette utilisateur comme employé</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('users.update', $user->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')

                            <input name="employe" type="hidden" value="1">
                            {{--  <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter une nouvelle
                        demande
                        individuelle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div> --}}
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="cin" class="form-label">CIN<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="cin" value="{{ $user->cin ?? old('cin') }}"
                                            class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                            id="cin" placeholder="cin">
                                        @error('cin')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="matricule" class="form-label">Matricule</label>
                                        <input type="text" name="matricule"
                                            value="{{ $employe->matricule ?? old('matricule') }}"
                                            class="form-control form-control-sm @error('matricule') is-invalid @enderror"
                                            id="matricule" placeholder="matricule">
                                        @error('matricule')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="direction" class="form-label">Direction<span
                                                class="text-danger mx-1">*</span></label>
                                        <select name="direction"
                                            class="form-select @error('direction') is-invalid @enderror"
                                            aria-label="Select" id="select-field" data-placeholder="Choisir direction">
                                            <option value="{{ $user?->employee?->direction?->id }}">
                                                {{ $user?->employee?->direction?->name }}
                                            </option>
                                            @foreach ($directions as $direction)
                                                <option value="{{ $direction?->id }}">
                                                    {{ $direction?->name ?? old('direction') }}</option>
                                            @endforeach
                                        </select>
                                        @error('direction')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection

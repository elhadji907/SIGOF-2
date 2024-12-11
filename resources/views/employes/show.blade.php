@extends('layout.user-layout')
@section('title', 'Détails employé')
@section('space-work')

    <section class="section profile">
        <div class="row">
            {{--   @if ($message = Session::get('status'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('employes.index') }}"
                    class="btn btn-success btn-sm" title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                <p> | retour, liste des employés</p>
            </span>
            {{-- <div class="col-xl-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">
                        Image de profil
                    </div>
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img class="rounded-circle w-50" alt="Profil" src="{{ asset($user->getImage()) }}" width="100"
                            height="auto">

                        <h3 class="pt-3">{{ $user?->civilite . ' ' . $user->firstname . ' ' . $user->name }}</h3>

                        <div class="social-links mt-2">
                            @isset($employe->user->twitter)
                                <a href="{{ $employe->user->twitter }}" class="twitter" target="_blank"><i
                                        class="bi bi-twitter"></i></a>
                            @endisset
                            @isset($employe->user->facebook)
                                <a href="{{ $employe->user->facebook }}" class="facebook" target="_blank"><i
                                        class="bi bi-facebook"></i></a>
                            @endisset
                            @isset($employe->user->instagram)
                                <a href="{{ $employe->user->instagram }}" class="instagram" target="_blank"><i
                                        class="bi bi-instagram"></i></a>
                            @endisset
                            @isset($employe->user->linkedin)
                                <a href="{{ $employe->user->linkedin }}" class="linkedin" target="_blank"><i
                                        class="bi bi-linkedin"></i></a>
                            @endisset
                        </div>
                    </div>
                </div>

            </div> --}}

            <div class="col-xl-12">

                <div class="card border-info mb-3">
                    @if ($message = Session::get('status'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                            role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Employé</button>
                            </li>
                            {{-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#"><a
                                        class="dropdown-item btn btn-sm mx-1"
                                        href="{{ route('employes.edit', $employe->id) }}" class="mx-1"><i
                                            class="bi bi-pencil mx-1"></i>Modifier</a></button>
                            </li> --}}

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#employe-edit">Modifier
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#decisions">Décision
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-autre">Info.
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-0">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <h5 class="card-title">Détails</h5>
                                    @if ($employe->user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$employe->user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200 text-danger">
                                                {{ __('l\'adresse e-mail de cet employé n\'est pas vérifiée.') }}
                                            {{-- <form method="POST" action="{{ route('verification.send') }}">
                                                @csrf

                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-outline-primary">{{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}</button>
                                                </div>
                                            </form>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                    {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                                </p>
                                            @endif --}}
                                        </div>
                                    @endif
                                    <small>
                                        <a href="{!! url('file-decision', ['$id' => $employe->id]) !!}" class='btn btn-primary btn-sm'
                                            title="télécharger la décision" target="_blank">
                                            <i class="fa fa-print" aria-hidden="true"></i>&nbsp;Télécharger décision
                                        </a>
                                    </small>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">Matricule</div>
                                    <div class="col-lg-10 col-md-8">
                                        {{ $employe?->matricule }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">Prénom & Nom</div>
                                    <div class="col-lg-10 col-md-8">
                                        {{ $user?->civilite . ' ' . $user->firstname . ' ' . $user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">Date & lieu naissance</div>
                                    <div class="col-lg-10 col-md-8">
                                        {{ $user->date_naissance?->format('d/m/Y') . ' à ' . $user->lieu_naissance }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Email</div>
                                    <div class="col-lg-10 col-md-8">{{ $user->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">Téléphone</div>
                                    <div class="col-lg-10 col-md-8">{{ $user->telephone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Adresse</div>
                                    <div class="col-lg-10 col-md-8">{{ $user->adresse }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">Date embauche</div>
                                    <div class="col-lg-10 col-md-8">
                                        {{ $employe->date_embauche?->format('d/m/Y') }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">CIN</div>
                                    <div class="col-lg-10 col-md-8">
                                        {{ $employe?->user?->cin }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label">Situation familiale</div>
                                    <div class="col-lg-10 col-md-8">
                                        {{ $employe->user?->situation_familiale }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Direction</div>
                                    <div class="col-lg-10 col-md-8">{{ $employe->direction?->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Fonction</div>
                                    <div class="col-lg-10 col-md-8">{{ $employe->fonction?->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Catégorie</div>
                                    <div class="col-lg-10 col-md-8">{{ $employe->category?->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Lois</div>
                                    <div class="col-lg-10 col-md-8">
                                        @foreach ($employe->lois as $loi)
                                            <b>Vu</b>&nbsp;&nbsp;
                                            {{ $loi?->name }};<br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Decrets</div>
                                    <div class="col-lg-10 col-md-8">
                                        @foreach ($employe->decrets as $decret)
                                            <b>Vu</b>&nbsp;&nbsp;
                                            {{ $decret?->name }};<br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Procès verbaux</div>
                                    <div class="col-lg-10 col-md-8">
                                        @foreach ($employe->procesverbals as $procesverbal)
                                            <b>Vu</b>&nbsp;&nbsp;
                                            {{ $procesverbal?->name }};<br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Décisions</div>
                                    <div class="col-lg-10 col-md-8">
                                        @foreach ($employe->decisions as $decision)
                                            <b>Vu</b>&nbsp;&nbsp;
                                            {{ $decision?->name }};<br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 label ">Articles</div>
                                    <div class="col-lg-10 col-md-8" style="line-height: 100%">
                                        <?php $i = 3; ?>
                                        <b><u>Article premier</u> :
                                            {{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name . ', ' }}</b>
                                        {{-- Pour mettre le mois en français, j'ai ajouter dans AppServiceProvider Carbon::setLocale(config('app.locale')); --}}
                                        {{ ' né le ' . $employe->user->date_naissance?->translatedFormat('d F Y') . ' à ' . $employe->user->lieu_naissance . ', titulaire d\'un(e) ' }}
                                        <b> {{ $employe->diplome . ', ' }} </b> matricule de solde
                                        <b>{{ $employe->matricule . ', ' }}</b> précédemment <b>
                                            {{ $employe->fonction_precedente . ', ' }} </b> est nommé(e)
                                        <b>{{ $employe->fonction?->name }}</b>
                                        ;<br><br>
                                        <b><u>Article 2</u> :
                                            {{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name }}</b>
                                        percevra un salaire mensuel de base de
                                        <b>{{ $employe?->category?->salaire_lettre . '(' . $employe?->category?->salaire . ')' . 'Francs CFA ' }}</b>
                                        correspondant à la catégorie <b>{{ $employe?->category?->name }}</b> de la grille
                                        salariale du personnel de l'ONFP
                                        adoptée par le Conseil d'Administration du 21 Août 2014.
                                        ;<br><br>
                                        <b><u>Article 3</u> :
                                            {{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name }}</b>
                                        bénéficiera :<br><br>
                                        @foreach ($employe->indemnites as $indemnite)
                                            <span
                                                style="padding-left: 50px">{{ ' ' . ' - ' . $indemnite?->name }};<br></span>
                                            {{-- <ul style="line-height: 70%">
                                                <li>{{ $indemnite?->name }};</li>
                                            </ul> --}}
                                        @endforeach
                                        @foreach ($employe->articles as $article)
                                            <br><b><u>Article {{ ++$i }}</u> :</b>&nbsp;&nbsp;
                                            {{ $article?->name }};<br><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content pt-2">
                                {{-- Fin aperçu --}}
                                {{-- Début Edition --}}
                                <div class="tab-pane fade profile-edit pt-3" id="employe-edit">
                                    <form method="post" action="{{ route('employes.update', $employe->id) }}"
                                        enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        @method('patch')
                                        <h5 class="card-title">Modification employé</h5>
                                        <!-- Profile Edit Form -->
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image
                                                de
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img class="rounded-circle w-25" alt="Profil"
                                                    src="{{ asset($employe->user?->getImage()) }}" width="50"
                                                    height="auto">

                                                {{-- <div class="pt-2">
                                                            <a href="#" class="btn btn-primary btn-sm"
                                                                title="Upload new profile image"><i
                                                                    class="bi bi-upload"></i></a>
                                                            <a href="#" class="btn btn-danger btn-sm"
                                                                title="Remove my profile image"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </div> --}}
                                                <div class="pt-2">
                                                    <input type="file" name="image" id="image" multiple
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
                                                        <option value="{{ $employe->user?->civilite }}">
                                                            {{ $employe->user?->civilite ?? old('civilite') }}
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

                                        {{-- Prénom --}}
                                        <div class="row mb-3">
                                            <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Prénom<span
                                                    class="text-danger mx-1">*</span>
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input name="firstname" type="text"
                                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                                        id="firstname"
                                                        value="{{ $employe->user?->firstname ?? old('firstname') }}"
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
                                                    id="name" value="{{ $employe->user?->name ?? old('name') }}"
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
                                                    value="{{ $employe->user?->date_naissance?->format('Y-m-d') ?? old('date_naissance') }}"
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
                                                    value="{{ $employe->user?->lieu_naissance ?? old('lieu_naissance') }}"
                                                    autocomplete="lieu_naissance" placeholder="Votre Lieu naissance">
                                                @error('lieu_naissance')
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
                                                    id="adresse"
                                                    value="{{ $employe->user?->adresse ?? old('adresse') }}"
                                                    autocomplete="adresse" placeholder="Votre adresse de résidence">
                                                @error('adresse')
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
                                                    id="Email" value="{{ $employe->user?->email ?? old('email') }}"
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
                                                    id="telephone"
                                                    value="{{ $employe->user?->telephone ?? old('telephone') }}"
                                                    autocomplete="telephone" placeholder="Votre n° de téléphone">
                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- cin --}}
                                        <div class="row mb-3">
                                            <label for="cin" class="col-md-4 col-lg-3 col-form-label">CIN<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="cin" type="cin"
                                                    class="form-control form-control-sm @error('cin') is-invalid @enderror"
                                                    id="cin" value="{{ $employe?->user?->cin ?? old('cin') }}"
                                                    autocomplete="cin" placeholder="Votre n° de téléphone">
                                                @error('cin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- matricule --}}
                                        <div class="row mb-3">
                                            <label for="matricule" class="col-md-4 col-lg-3 col-form-label">Matricule<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
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
                                        </div>

                                        {{-- Situation familiale --}}
                                        <div class="row mb-3">
                                            <label for="familiale" class="col-md-4 col-lg-3 col-form-label">Situation
                                                familiale<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="situation_familiale"
                                                    class="form-select form-select-sm @error('situation_familiale') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-familiale"
                                                    data-placeholder="Choisir situation familiale">
                                                    <option value="{{ $employe->user?->situation_familiale }}">
                                                        {{ $employe->user?->situation_familiale ?? old('situation_familiale') }}
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


                                        {{-- Date embauche --}}
                                        <div class="row mb-3">
                                            <label for="date_embauche" class="col-md-4 col-lg-3 col-form-label">Date
                                                embauche<span class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="date" name="date_embauche"
                                                    value="{{ $employe->date_embauche?->format('Y-m-d') ?? old('date_embauche') }}"
                                                    class="form-control form-control-sm @error('date_embauche') is-invalid @enderror"
                                                    id="date_embauche" placeholder="Date naissance">
                                                @error('date_embauche')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- category --}}
                                        <div class="row mb-3">
                                            <label for="category" class="col-md-4 col-lg-3 col-form-label">Catégorie<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="categorie"
                                                    class="form-select @error('categorie') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-categorie"
                                                    data-placeholder="Choisir categorie">
                                                    <option value="{{ $employe->category?->id }}">
                                                        {{ $employe->category?->name }}
                                                    </option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">
                                                            {{ $categorie->name ?? old('categorie') }}</option>
                                                    @endforeach
                                                </select>
                                                @error('categorie')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                                @error('situation_familiale')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Direction --}}
                                        <div class="row mb-3">
                                            <label for="category" class="col-md-4 col-lg-3 col-form-label">Direction<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="direction"
                                                    class="form-select @error('direction') is-invalid @enderror"
                                                    aria-label="Select" id="select-field"
                                                    data-placeholder="Choisir direction">
                                                    <option value="{{ $employe->direction?->id }}">
                                                        {{ $employe->direction?->name }}
                                                    </option>
                                                    @foreach ($directions as $direction)
                                                        <option value="{{ $direction->id }}">
                                                            {{ $direction->name ?? old('direction') }}</option>
                                                    @endforeach
                                                </select>
                                                @error('direction')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Fonction --}}
                                        <div class="row mb-3">
                                            <label for="category" class="col-md-4 col-lg-3 col-form-label">Fonction<span
                                                    class="text-danger mx-1">*</span></label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="fonction"
                                                    class="form-select @error('fonction') is-invalid @enderror"
                                                    aria-label="Select" id="select-field-fonction"
                                                    data-placeholder="Choisir fonction">
                                                    <option value="{{ $employe->fonction?->id }}">
                                                        {{ $employe->fonction?->name }}
                                                    </option>
                                                    @foreach ($fonctions as $fonction)
                                                        <option value="{{ $fonction->id }}">
                                                            {{ $fonction->name ?? old('fonction') }}</option>
                                                    @endforeach
                                                </select>
                                                @error('fonction')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- diplome --}}
                                        <div class="row mb-3">
                                            <label for="diplome" class="col-md-4 col-lg-3 col-form-label">Diplome
                                                employé(e)</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="diplome" type="diplome"
                                                    class="form-control form-control-sm @error('diplome') is-invalid @enderror"
                                                    id="diplome" value="{{ $employe?->diplome ?? old('diplome') }}"
                                                    autocomplete="diplome" placeholder="le diplome de l'employé">
                                                @error('diplome')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- fonction_precedente --}}
                                        <div class="row mb-3">
                                            <label for="fonction_precedente"
                                                class="col-md-4 col-lg-3 col-form-label">Fonction précédente de
                                                employé(e)</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fonction_precedente" type="fonction_precedente"
                                                    class="form-control form-control-sm @error('fonction_precedente') is-invalid @enderror"
                                                    id="fonction_precedente"
                                                    value="{{ $employe?->fonction_precedente ?? old('fonction_precedente') }}"
                                                    autocomplete="fonction_precedente"
                                                    placeholder="la fonction précédente de l'employé">
                                                @error('fonction_precedente')
                                                    <span class="invalid-feedback" role="alert">
                                                        <div>{{ $message }}</div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- twitter --}}
                                        <div class="row mb-3">
                                            <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="twitter"
                                                    class="form-control form-control-sm @error('twitter') is-invalid @enderror"
                                                    id="twitter"
                                                    value="{{ $employe->user?->twitter ?? old('twitter') }}"
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
                                                    id="facebook"
                                                    value="{{ $employe->user?->facebook ?? old('facebook') }}"
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
                                                    id="instagram"
                                                    value="{{ $employe->user?->instagram ?? old('instagram') }}"
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
                                                    id="linkedin"
                                                    value="{{ $employe->user?->linkedin ?? old('linkedin') }}"
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

                                        <!-- End Profile Edit Form -->

                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-overview" id="decisions">

                                {{--  <h5 class="card-title">Audit</h5> --}}

                                <div class="card-body profile-card pt-1 d-flex flex-column">
                                    <h5 class="card-title">AJOUTER DE NOUVELLES INFORMATIONS A LA DECISION</h5>
                                    <a type="button" class="btn btn-outline-primary"
                                        href="{{ url('employes/' . $employe->id . '/give-lois') }}">LOI</a><br>
                                    <a type="button" class="btn btn-outline-secondary"
                                        href="{{ url('employes/' . $employe->id . '/give-decrets') }}">DECRET</a><br>
                                    <a type="button" class="btn btn-outline-success"
                                        href="{{ url('employes/' . $employe->id . '/give-procesverbals') }}">PROCES
                                        VERBAL</a><br>
                                    <a type="button" class="btn btn-outline-info"
                                        href="{{ url('employes/' . $employe->id . '/give-decisions') }}">DECISION</a><br>
                                    <a type="button" class="btn btn-outline-secondary"
                                        href="{{ url('employes/' . $employe->id . '/give-articles') }}">ARTICLE</a><br>
                                    <a type="button" class="btn btn-outline-warning"
                                        href="{{ url('employes/' . $employe->id . '/give-nomminations') }}">ESSAI/NOMMINATION/RECLASSEMENT</a><br>
                                    <a type="button" class="btn btn-outline-secondary"
                                        href="{{ url('employes/' . $employe->id . '/give-indemnites') }}">INDEMNITES</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-overview" id="profile-autre">

                                {{--  <h5 class="card-title">Audit</h5> --}}

                                <div class="card-body profile-card pt-1 d-flex flex-column">
                                    <h5 class="card-title">Informations complémentaires</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label pb-2">Créé par </div>
                                        <div class="col-lg-9 col-md-8 pb-2">{{ $user_create_name }}
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
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection

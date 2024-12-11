@extends('layout.user-layout')
@section('title', 'Détails demande individuelle')
@section('space-work')
    <section class="section min-vh-0 d-flex flex-column align-items-center justify-content-center py-0 section profile">
        <div class="container">
            <div class="row justify-content-center">
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
                <div class="col-12 col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mt-3">

                                {{-- @if (auth()->user()->hasRole('Demandeur')) --}}
                                {{-- @endif --}}
                                {{-- @if (auth()->user()->hasRole('super-admin|admin')) --}}

                                @if (auth()->user()->hasRole('super-admin|admin|DIOF|DEC'))
                                    <span class="d-flex mt-2 align-items-baseline"><a
                                            href="{{ route('individuelles.index') }}" class="btn btn-secondary btn-sm"
                                            title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | retour</p>
                                    </span>
                                @else
                                    <span class="d-flex mt-2 align-items-baseline"><a
                                            href="{{ route('demandesIndividuelle') }}" class="btn btn-info btn-sm"
                                            title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                        <p> | retour</p>
                                    </span>
                                @endif
                                {{-- @endif --}}

                                <span>
                                    <nav class="header-nav ms-auto">
                                        <ul class="d-flex align-items-center">
                                            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                                                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                                                    <i class="bi bi-chat-left-text m-1"></i>
                                                    <span class="badge bg-success badge-number"
                                                        title="{{ $individuelle?->statut }}">{{ $individuelle?->validationindividuelles->count() }}</span>
                                                </a>
                                            </a>
                                            <!-- End Notification Icon -->
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                                                <li class="dropdown-header">
                                                    Vous avez
                                                    {{ $individuelle?->validationindividuelles->count() . ' validation(s)' }}
                                                    <a href="{{ url('validationsRejetMessage/' . $individuelle?->id) }}"><span
                                                            class="badge rounded-pill bg-primary p-2 ms-2">Voir
                                                            toutes</span></a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <?php $i = 1; ?>
                                                @foreach ($individuelle?->validationindividuelles as $count => $validationindividuelle)
                                                    @if ($count < 2)
                                                        <li class="message-item">
                                                            <a
                                                                href="{{ url('validationsRejetMessage/' . $individuelle?->id) }}">
                                                                <img src="{{ asset($validationindividuelle->user->getImage()) }}"
                                                                    alt="" class="rounded-circle">
                                                                <div>
                                                                    <h4>{{ $validationindividuelle->user->firstname . ' ' . $validationindividuelle->user->name }}
                                                                    </h4>
                                                                    <p><span class="{{ $validationindividuelle->action }}">
                                                                            {{ $validationindividuelle->action }}
                                                                        </span>
                                                                        {{-- @if ($validationindividuelle->action == 'attente')
                                                                            <span
                                                                                class="badge rounded-pill bg-warning">{{ $validationindividuelle->action }}</span>
                                                                        @elseif ($validationindividuelle->action == 'accepter')
                                                                            <span
                                                                                class="badge rounded-pill bg-info">{{ $validationindividuelle->action }}</span>
                                                                        @elseif ($validationindividuelle->action == 'rejeter')
                                                                            <span
                                                                                class="badge rounded-pill bg-danger">{{ $validationindividuelle->action }}</span>
                                                                            <p>{!! substr($validationindividuelle?->motif, 0, 25) . ' ...' !!}</p>
                                                                        @else
                                                                            <span
                                                                                class="badge rounded-pill bg-warning">{{ $validationindividuelle->action }}</span>
                                                                        @endif --}}
                                                                    </p>
                                                                    <p>{!! $validationindividuelle->created_at->diffForHumans() !!}</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                    @endif
                                                @endforeach
                                                @if ($individuelle?->validationindividuelles->count() != '0')
                                                    <li class="dropdown-footer">
                                                        <a
                                                            href="{{ url('validationsRejetMessage/' . $individuelle?->id) }}">Voir
                                                            toutes les validations</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </ul>
                                    </nav>
                                </span>
                                {{-- @if (auth()->user()->hasRole('super-admin')) --}}
                                @can('user-view')
                                    <span class="d-flex align-items-baseline">
                                        <span class="{{ $individuelle?->statut }}">{{ $individuelle?->statut }}</span>
                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <form
                                                    action="{{ route('validation-individuelles.update', $individuelle?->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="show_confirm_valider btn btn-sm mx-1">Accepter</button>
                                                </form>
                                                {{-- @if ($individuelle?->statut == 'accepter') --}}
                                                <button class="btn btn-sm mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#RejetDemandeModal">Rejeter
                                                </button>
                                                {{-- @elseif($individuelle?->statut == 'rejeter') --}}
                                                {{--  @elseif($individuelle?->statut == 'attente') --}}
                                                {{-- <form
                                                        action="{{ route('validation-individuelles.update', $individuelle?->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button
                                                            class="show_confirm_valider btn btn-sm mx-1">Accepter</button>
                                                    </form>
                                                    <button class="btn btn-sm mx-1" data-bs-toggle="modal"
                                                        data-bs-target="#RejetDemandeModal">Rejeter
                                                    </button> --}}
                                                {{-- @else --}}
                                                {{-- <button class="btn btn-sm mx-1">Aucune action
                                                        possible</button> --}}
                                                {{-- @endif --}}
                                            </ul>
                                        </div>
                                    </span>
                                @endcan
                                {{-- @endif --}}
                            </div>
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <form method="post" action="{{ url('individuelles/' . $individuelle?->id) }}"
                                    enctype="multipart/form-data" class="row g-3">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Formation sollicitée</div>
                                        <div>{{ $individuelle?->module?->name }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Numéro</div>
                                        <div>{{ $individuelle?->numero }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Civilité</div>
                                        <div>{{ $individuelle?->user?->civilite }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">N° CIN</div>
                                        <div>{{ $individuelle?->user?->cin }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Prénom</div>
                                        <div>{{ $individuelle?->user->firstname }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Nom</div>
                                        <div>{{ $individuelle?->user->name }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div for="date_naissance" class="label">Date naissance</div>
                                        <div>{{ $individuelle?->user->date_naissance?->format('d/m/Y') }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Lieu naissance</div>
                                        <div>{{ $individuelle?->user->lieu_naissance }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Adresse</div>
                                        <div>{{ $individuelle?->user->adresse }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Email</div>
                                        <div>{{ $individuelle?->user->email }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Téléphone personnel</div>
                                        <div>{{ $individuelle?->user->telephone }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Téléphone secondaire</div>
                                        <div>{{ $individuelle?->user?->telephone_secondaire }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Lieu de formation</div>
                                        <div>{{ $individuelle?->departement?->nom }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Situation familiale</div>
                                        <div>{{ $individuelle?->user->situation_familiale }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Situation professionnelle</div>
                                        <div>{{ $individuelle?->user->situation_professionnelle }}</div>
                                    </div>


                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Niveau étude</div>
                                        <div>{{ $individuelle?->niveau_etude }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Diplôme académique</div>
                                        <div>{{ $individuelle?->diplome_academique }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Si autre ? précisez</div>
                                        <div>{{ $individuelle?->autre_diplome_academique }}</div>
                                    </div>

                                    @if (!empty($individuelle?->option_diplome_academique))
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <div class="label">Option du diplôme</div>
                                            <div>{{ $individuelle?->option_diplome_academique }}</div>
                                        </div>
                                    @endif

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Etablissement académique</div>
                                        <div>{{ $individuelle?->etablissement_academique }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Diplôme professionnel</div>
                                        <div>{{ $individuelle?->diplome_professionnel }}</div>
                                    </div>

                                    @if (!empty($individuelle?->autre_diplome_professionnel))
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <div class="label">Si autre ? précisez</div>
                                            <div>{{ $individuelle?->autre_diplome_professionnel }}</div>
                                        </div>
                                    @endif

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Etablissement professionnel</div>
                                        <div>{{ $individuelle?->etablissement_professionnel }}</div>
                                    </div>

                                    @if (!empty($individuelle?->specialite_diplome_professionnel))
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <div class="label">Spécialité</div>
                                            <div>{{ $individuelle?->specialite_diplome_professionnel }}</div>
                                        </div>
                                    @endif

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Votre projet après la formation</div>
                                        <div>{{ $individuelle?->projet_poste_formation }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                        <div class="label">Qualification et autres diplômes</div>
                                        <div>{{ $individuelle?->qualification }}</div>
                                    </div>

                                    @isset($individuelle?->note_obtenue)
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <div class="label">Note</div>
                                            <div>{{ $individuelle?->note_obtenue }}</div>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <div class="label">Appréciation</div>
                                            <div>{{ $individuelle?->appreciation }}</div>
                                        </div>
                                    @endisset

                                    @if (!empty($individuelle?->experience))
                                        <div class="col-12 col-md-3 col-lg-3 col-sm-12 col-xs-12 col-xxl-3">
                                            <div class="label">Expériences et stages</div>
                                            <div>{{ $individuelle?->experience }}</div>
                                        </div>
                                    @endif

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <div class="label">Informations complémentaires sur
                                            le projet
                                            professionnel</div>
                                        <div>{{ $individuelle?->projetprofessionnel }}</div>
                                    </div>

                                    @if (!empty($individuelle?->projets_id))
                                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                            <div class="label">Projet</div>
                                            <div>
                                                {{ $individuelle?->projet?->name . ' (' . $individuelle?->projet?->sigle . ')' }}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="text-center">
                                        <a href="{{ route('individuelles.edit', $individuelle?->id) }}"
                                            class="btn btn-primary btn-sm text-white" title="voir détails"><i
                                                class="bi bi-pencil"></i>&nbsp;Modifier</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="RejetDemandeModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('validation-individuelles.destroy', $individuelle?->id) }}"
                        enctype="multipart/form-data" class="row">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Rejet demande</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="motif" class="form-label">Motifs du rejet</label>
                            <textarea name="motif" id="motif" rows="5"
                                class="form-control form-control-sm @error('motif') is-invalid @enderror"
                                placeholder="Enumérer les motifs du rejet">{{ old('motif') }}</textarea>
                            @error('motif')
                                <span class="invalid-feedback" role="alert">
                                    <div>{{ $message }}</div>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-printer"></i>
                                Rejeter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

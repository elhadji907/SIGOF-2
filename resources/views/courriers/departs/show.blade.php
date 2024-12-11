@extends('layout.user-layout')
@section('title', 'Détails courrier départ')

@section('space-work')
    <section class="section profile">
        <div class="row">
            @if ($message = Session::get('status'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('departs.index') }}"
                    class="btn btn-success btn-sm" title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                <p> | Liste des courriers départs</p>
            </span>
            <div class="col-xl-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">
                        AUDIT
                    </div>
                    <div class="card-body profile-card pt-1 d-flex flex-column">
                        <h5 class="card-title">Informations complémentaires</h5>
                        <p>créé par <b>{{ $user_create_name }}</b>, {{ $courrier->created_at->diffForHumans() }}</p>
                        {{-- <p>modifié par <b>{{ $user_update_name }}</b>, {{ $courrier->updated_at->diffForHumans() }}</p> --}}
                        @if ($courrier->created_at != $courrier->updated_at)
                            <p>{{ 'modifié par ' }} <b> {{ $user_update_name }} </b>
                                {{ $courrier->updated_at->diffForHumans() }}</p>
                        @else
                            <p> jamais modifié</p>
                        @endif
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
                                    data-bs-target="#profile-overview">Courrier</button>
                            </li>

                            {{-- <li class="nav-item">
                                <button class="nav-link"><a class="dropdown-item btn btn-sm mx-1"
                                        href="{{ route('departs.edit', $depart->id) }}" class="mx-1">
                                        Modifier</a></button>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <button class="nav-link"><a class="dropdown-item btn btn-sm mx-1"
                                        href="{{ url('depart-imputations', ['id' => $depart->id]) }}" class="mx-1">
                                        Imputer</a></button>
                            </li> --}}

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#courrier_update">Modifier</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-settings">Commentaires</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-0">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Objet</h5>
                                <p class="small fst-italic">{{ $depart->courrier->objet }}.</p>

                                <h5 class="card-title">Détails</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Date départ</div>
                                    <div class="col-lg-3 col-md-4">{{ $depart->courrier->date_depart?->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">N° départ</div>
                                    <div class="col-lg-3 col-md-4">{{ $depart->numero }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Date correspondance</div>
                                    <div class="col-lg-3 col-md-4">{{ $depart->courrier->date_cores?->format('d/m/Y') }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">N° correspondance</div>
                                    <div class="col-lg-3 col-md-4">{{ $depart->courrier->numero }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Année</div>
                                    <div class="col-lg-3 col-md-4">{{ $depart->courrier->annee }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Destinataire</div>
                                    <div class="col-lg-3 col-md-4">{{ $depart->destinataire }}</div>
                                </div>
                                <div class="row">
                                    @isset($depart->courrier->reference)
                                        <div class="col-lg-3 col-md-4 label">Service expéditeur</div>
                                        <div class="col-lg-3 col-md-4">{{ $depart->courrier->reference }}</div>
                                    @endisset
                                </div>

                                @isset($depart->courrier->numero_reponse)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">N° réponse</div>
                                        <div class="col-lg-3 col-md-4">{{ $depart->courrier->numero_reponse }}</div>
                                        <div class="col-lg-3 col-md-4 label">Date réponse</div>
                                        <div class="col-lg-3 col-md-4">{{ $depart->courrier->date_reponse?->format('d/m/Y') }}
                                        </div>
                                    </div>
                                @endisset

                                @isset($depart->courrier->observation)
                                    <h5 class="card-title">Observations</h5>
                                    <p class="small fst-italic">{{ $depart->courrier->observation }}.</p>
                                @endisset

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->

                                <form method="POST" action="{{ route('comments.store', $depart->courrier) }}"
                                    class="mt-3">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Commentaires</label>
                                        <div class="col-md-8 col-lg-9">

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control @error('commentaire') is-invalid @enderror" placeholder="Ecrire votre commentaire ici"
                                                    name="commentaire" id="commentaire" style="height: 100px;"></textarea>
                                                <label for="floatingTextarea">Ecrire votre commentaire ici</label>
                                            </div>
                                            <input type="hidden" name="type" value="depart">
                                            <small id="emailHelp" class="form-text text-muted">
                                                @if ($errors->has('commentaire'))
                                                    @foreach ($errors->get('commentaire') as $message)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @endforeach
                                                @endif
                                            </small>

                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Poster</button>
                                    </div>
                                </form><!-- End settings Form -->
                                <hr>
                                <h3 class="card-title text-center">Commentaires</h3>
                                @forelse ($depart->courrier->comments as $comment)
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <div>{!! $comment->content !!}
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    {{-- <small>Posté le {!! Carbon\Carbon::parse($comment->created_at)?->format('d/m/Y à H:i:s') !!}</small> --}}
                                                    <small>Posté le {!! Carbon\Carbon::parse($comment->created_at)->diffForHumans() !!}</small>
                                                    <span
                                                        class="badge bg-info mx-1">{!! $comment->user->firstname ?? '' !!}&nbsp;{!! $comment->user->name ?? '' !!}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <solution-button></solution-button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Réponse aux commentaires --}}
                                    @foreach ($comment->comments as $replayComment)
                                        <div class="row mb-3">
                                            <label for="" class="col-md-1 col-lg-1 col-form-label"></label>
                                            <div class="col-md-11 col-lg-11">
                                                <div class="card form-floating mb-3">
                                                    <div class="card-body">
                                                        {!! $replayComment->content !!}
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mt-2">
                                                            <small>Posté le {!! Carbon\Carbon::parse($replayComment->created_at)->diffForHumans() !!}</small>
                                                            <span
                                                                class="badge bg-primary mx-1">{!! $replayComment->user->firstname ?? '' !!}&nbsp;{!! $replayComment->user->name ?? '' !!}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @auth
                                        <button class="btn btn-info btn-sm mt-0 mb-2" id="commentReplyId"
                                            onclick="toggleReplayComment({{ $comment->id }})">
                                            Répondre
                                        </button>
                                        <form method="POST" action="{{ route('comments.storeReply', $comment) }}"
                                            class="ml-5 d-none" id="replayComment-{{ $comment->id }}">
                                            @csrf



                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Réponse
                                                    commentaires</label>
                                                <div class="col-md-8 col-lg-9">

                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control @error('replayComment') is-invalid @enderror" placeholder="Répondre à ce commentaire"
                                                            name="replayComment" id="replayComment" style="height: 100px;"></textarea>
                                                        <label for="floatingTextarea">Répondre à ce commentaire</label>
                                                    </div>
                                                    <input type="hidden" name="type" value="depart">
                                                    <small id="emailHelp" class="form-text text-muted">
                                                        @if ($errors->has('replayComment'))
                                                            @foreach ($errors->get('replayComment') as $message)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @endforeach
                                                        @endif
                                                    </small>

                                                    <button class="btn btn-primary btn-sm m-2">
                                                        Répondre à ce commentaire
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endauth
                                    {{-- fin réponse aux commentaires --}}
                                @empty

                                    <div class="alert alert-info">Aucun commentaire pour ce courrier</div>

                                @endforelse
                            </div>

                            <div class="tab-pane fade pt-3" id="courrier_update">
                                <form method="post" action="{{ url('departs/' . $depart->id) }}"
                                    enctype="multipart/form-data" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="date_depart" class="form-label">Date départ<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="date" name="date_depart"
                                            value="{{ $depart->courrier->date_depart?->format('Y-m-d') ?? old('date_depart') }}"
                                            class="form-control form-control-sm @error('date_depart') is-invalid @enderror"
                                            id="date_depart" placeholder="Date départ">
                                        @error('date_depart')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="numero_depart" class="form-label">Numéro départ<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <input type="number" min="0" name="numero_depart"
                                                value="{{ $depart->numero ?? old('numero_depart') }}"
                                                class="form-control form-control-sm @error('numero_depart') is-invalid @enderror"
                                                id="numero_depart" placeholder="Numéro départ">
                                            @error('numero_depart')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="date_corres" class="form-label">Date correspondance<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="date" name="date_corres"
                                            value="{{ $depart->courrier->date_cores?->format('Y-m-d') ?? old('date_corres') }}"
                                            class="form-control form-control-sm @error('date_corres') is-invalid @enderror"
                                            id="date_corres" placeholder="nom">
                                        @error('date_corres')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="numero_correspondance" class="form-label">Numéro correspondance<span
                                                class="text-danger mx-1">*</span></label>
                                        <div class="input-group has-validation">
                                            <input type="number" min="0" name="numero_correspondance"
                                                value="{{ $depart->courrier->numero ?? old('numero_correspondance') }}"
                                                class="form-control form-control-sm @error('numero_correspondance') is-invalid @enderror"
                                                id="numero_correspondance" placeholder="Numéro de correspondance">
                                            @error('numero_correspondance')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="annee" class="form-label">Année<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="number" min="2024" name="annee"
                                            value="{{ $depart->courrier->annee ?? old('annee') }}"
                                            class="form-control form-control-sm @error('annee') is-invalid @enderror"
                                            id="annee" placeholder="Année">
                                        @error('annee')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="destinataire" class="form-label">Destinataire<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="destinataire"
                                            value="{{ $depart->destinataire ?? old('destinataire') }}"
                                            class="form-control form-control-sm @error('destinataire') is-invalid @enderror"
                                            id="destinataire" placeholder="Destinataire">
                                        @error('destinataire')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="objet" class="form-label">Objet<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="text" name="objet"
                                            value="{{ $depart->courrier->objet ?? old('objet') }}"
                                            class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                            id="objet" placeholder="Objet">
                                        @error('objet')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="service_expediteur" class="form-label">Service expéditeur</label>
                                        <input type="text" name="service_expediteur"
                                            value="{{ $depart->courrier->reference ?? old('service_expediteur') }}"
                                            class="form-control form-control-sm @error('service_expediteur') is-invalid @enderror"
                                            id="service_expediteur" placeholder="Service expéditeur">
                                        @error('service_expediteur')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="numero_reponse" class="form-label">Numéro réponse</label>
                                        <input type="number" min="0" name="numero_reponse"
                                            value="{{ $depart->courrier->numero_reponse ?? old('numero_reponse') }}"
                                            class="form-control form-control-sm @error('numero_reponse') is-invalid @enderror"
                                            id="numero_reponse" placeholder="Numéro réponse">
                                        @error('numero_reponse')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="date_reponse" class="form-label">Date réponse</label>
                                        <input type="date" min="0" name="date_reponse"
                                            value="{{ $depart->courrier->date_reponse?->format('Y-m-d') ?? old('date_reponse') }}"
                                            class="form-control form-control-sm @error('date_reponse') is-invalid @enderror"
                                            id="date_reponse" placeholder="Numéro réponse">
                                        @error('date_reponse')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="observation" class="form-label">Observations</label>
                                        <textarea name="observation" id="observation" rows="1"
                                            class="form-control form-control-sm @error('date_reponse') is-invalid @enderror" placeholder="Observations">{{ $depart->courrier->observation ?? old('observation') }}</textarea>
                                        @error('observation')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="legende" class="form-label">Légende</label>
                                        <input type="text" name="legende"
                                            value="{{ $depart->courrier->legende ?? old('legende') }}"
                                            class="form-control form-control-sm @error('legende') is-invalid @enderror"
                                            id="legende" placeholder="Le nom du fichier scanné">
                                        @error('legende')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="reference" class="form-label">Scan courrier</label>
                                        <input type="file" name="file" id="file"
                                            class="form-control @error('file') is-invalid @enderror btn btn-primary btn-sm">
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @error('reference')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        @if (isset($depart->courrier->file))
                                            <label for="reference" class="form-label">Cliquer ici pour
                                                télécharger</label><br>
                                            <a class="btn btn-outline-secondary btn-sm"
                                                title="télécharger le fichier joint" target="_blank"
                                                href="{{ asset($depart->courrier->getFile()) }}">
                                                <i class="bi bi-download">&nbsp;Cliquer ici pour télécharger le courrier
                                                    scanné</i>
                                            </a>
                                        @endif
                                        {{-- <img class="w-25" alt="courrier"
                                        src="{{ asset($depart->courrier->getFile()) }}" width="50"
                                        height="auto"> --}}
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function toggleReplayComment(id) {
            let element = document.getElementById('replayComment-' + id);
            element.classList.toggle('d-none');
        }
    </script>
@endpush

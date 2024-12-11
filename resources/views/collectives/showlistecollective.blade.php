@extends('layout.user-layout')
@section('title', 'Détails demandeur collective')
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
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('demandesCollective') }}"
                                        class="btn btn-secondary btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Détails</p>
                                </span>
                            </div>
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <form method="post" action="{{ url('listecollectives/' . $listecollective->id) }}"
                                    enctype="multipart/form-data" class="row g-3">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">N° CIN</div>
                                        <div>{{ $listecollective?->cin }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Civilité</div>
                                        <div>{{ $listecollective?->civilite }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Prénom</div>
                                        <div>{{ $listecollective?->prenom }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Nom</div>
                                        <div>{{ $listecollective?->nom }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div for="date_naissance" class="label">Date naissance</div>
                                        <div>{{ $listecollective?->date_naissance?->format('d/m/Y') }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Lieu naissance</div>
                                        <div>{{ $listecollective?->lieu_naissance }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Telephone</div>
                                        <div>{{ $listecollective?->telephone }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Niveau étude</div>
                                        <div>{{ $listecollective?->niveau_etude }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Expérience</div>
                                        <div>{{ $listecollective?->experience }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Autres experience</div>
                                        <div>{{ $listecollective?->autre_experience }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Statut</div>
                                        <div>{{ $listecollective?->statut }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Détails</div>
                                        <div>{{ $listecollective?->details }}</div>
                                    </div>

                                    <div class="col-12 col-md-3 col-lg-3 mb-0">
                                        <div class="label">Formation demandée</div>
                                        <div>{{ $listecollective?->collectivemodule?->module }}</div>
                                    </div>


                                    <div class="text-center">
                                        <a href="{{ route('listecollectives.edit', $listecollective?->id) }}"
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
 
    </section>
@endsection

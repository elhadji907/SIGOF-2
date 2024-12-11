@extends('layout.user-layout')
@section('title', 'ONFP - Projets - Programmes')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                @if ($message = Session::get('status'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" region="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        region="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-header text-center bg-gradient-default">
                        <h1 class="h4 text-black mb-0">PROJETS - PROGRAMMES</h1>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mt-0">
                            <span class="d-flex align-items-baseline"><a href="{{ url('/profil') }}"
                                    class="btn btn-success btn-sm" title="retour"><i
                                        class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                <p> | retour</p>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-0">
                            <h5 class="card-title">
                                Bonjour
                                {{ Auth::user()->civilite . ' ' . Auth::user()->firstname . ' ' . Auth::user()->name }}
                            </h5>
                        </div>
                        @foreach ($projets as $projet)
                        @endforeach
                        @if (!empty($projet))
                            <table class="table table-bordered table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="3%">N°</th>
                                        <th>Name</th>
                                        <th class="text-center">Sigle</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Statut</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($projets as $projet)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $projet?->name }}</td>
                                            <td class="text-center">{{ $projet?->sigle }}</td>
                                            <td class="text-center">{{ $projet?->type_projet }}</td>
                                            <td class="text-center">
                                                <span class="{{ $projet?->statut }}">{{ $projet?->statut }}</span>
                                            </td>
                                            <td>
                                                <span class="d-flex align-items-baseline"><a
                                                        href="{{ route('projetsIndividuelle', ['id' => $projet?->id]) }}"
                                                        class="btn btn-primary btn-sm" title="voir détails"><i
                                                            class="bi bi-eye"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">Vous n'avez aucune demande projet ou programme pour le moment !!!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

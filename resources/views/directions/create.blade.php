@extends('layout.user-layout')
@section('title', 'Enregistrement direction')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 pt-0">
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('directions.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des direction</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Création nouvelle direction</h5>
                        <!-- departement -->
                        <form method="post" action="{{ url('directions') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="direction" class="form-label">Nom direction<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="direction" value="{{ old('direction') }}"
                                    class="form-control form-control-sm @error('direction') is-invalid @enderror"
                                    id="direction" placeholder="Nom direction">
                                @error('direction')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="sigle" class="form-label">Sigle<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="sigle" value="{{ old('sigle') }}"
                                    class="form-control form-control-sm @error('sigle') is-invalid @enderror" id="sigle"
                                    placeholder="Nom sigle">
                                @error('sigle')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="type" class="form-label">Type de service</label>
                                <select name="type" class="form-select  @error('type') is-invalid @enderror"
                                    aria-label="Select" id="select-field-type"
                                    data-placeholder="Choisir le type">
                                    <option value="">--Choisir le type--</option>
                                    <option value="Direction">Direction</option>
                                    <option value="Service">Service</option>
                                    <option value="Cellule">Cellule</option>
                                    <option value="Antenne">Antenne</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                           {{--  <div class="col-12 col-md-6 col-lg-6">
                                <label for="employe" class="form-label">Responsable</label>
                                <select name="employe" class="form-select  @error('employe') is-invalid @enderror"
                                    aria-label="Select" id="select-field-employe" data-placeholder="Choisir le responsable">
                                    <option value="">--Choisir le responsable--</option>
                                    @foreach ($employe as $employes)
                                        <option value="{{ $employes->id }}">
                                            {{ $employes->matricule }} {{ $employes->user->firstname }}
                                            {{ $employes->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('employe')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form><!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

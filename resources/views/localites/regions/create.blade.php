@extends('layout.user-layout')
@section('title', 'Enregistrement région')
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
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('regions.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des régions</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Création nouvelle région</h5>
                        <!-- region -->
                        <form method="post" action="{{ url('regions') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="row mb-3 col-12 col-md-6 col-lg-6 pt-5">
                                <div class="form-floating mb-3">
                                    <input type="text" name="region" value="{{ old('region') }}"
                                        class="form-control form-control-sm @error('region') is-invalid @enderror"
                                        id="region" placeholder="Nom region" autofocus>
                                    @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Région</label>
                                </div>
                            </div>
                            <div class="row mb-3 col-12 col-md-6 col-lg-6 pt-5">
                                <div class="form-floating mb-3">
                                    <input type="text" name="sigle" value="{{ old('sigle') }}"
                                        class="form-control form-control-sm @error('sigle') is-invalid @enderror"
                                        id="sigle" placeholder="Code region">
                                    @error('sigle')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Code région</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form><!-- End region -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

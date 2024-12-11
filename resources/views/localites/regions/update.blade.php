@extends('layout.user-layout')
@section('title', 'Modification région')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        region="alert">
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
                                    <p> | Liste des regions</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Modification région</h5>
                        <!-- region -->
                        <form method="post" action="{{ route('regions.update', $region->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="row mb-3 col-12 col-md-6 col-lg-6 pt-5">
                                <div class="form-floating mb-3">
                                    <input type="text" name="nom" value="{{ $region->nom ??  old('nom') }}"
                                        class="form-control form-control-sm @error('nom') is-invalid @enderror"
                                        id="nom" placeholder="Nom région">
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Région</label>
                                </div>
                            </div>
                            <div class="row mb-3 col-12 col-md-6 col-lg-6 pt-5">
                                <div class="form-floating mb-3">
                                    <input type="text" name="sigle" value="{{ $region->sigle ?? old('sigle') }}"
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
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form><!-- End region -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

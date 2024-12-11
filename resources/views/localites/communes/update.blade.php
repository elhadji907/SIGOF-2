@extends('layout.user-layout')
@section('title', 'modification commune')
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
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('communes.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des communes</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Modification commune</h5>
                        <!-- departement -->
                        <form method="post" action="{{ route('communes.update', $commune->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('patch')
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                <label for="nom" class="form-label">commune<span
                                        class="text-danger mx-1">*</span></label>
                                <input type="text" name="nom" value="{{ $commune->nom ?? old('nom') }}"
                                    class="form-control form-control-sm @error('nom') is-invalid @enderror" id="nom"
                                    placeholder="Nom commune">
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                <label for="arrondissement" class="form-label">Arrondissement<span
                                        class="text-danger mx-1">*</span></label>
                                <select name="arrondissement" class="form-select  @error('arrondissement') is-invalid @enderror"
                                    aria-label="Select" id="select-field-arrondissement" data-placeholder="Choisir la département">
                                    <option value="{{ $commune->arrondissement->id }}">{{ $commune->arrondissement->nom }}</option>
                                    @foreach ($arrondissements as $arrondissement)
                                        <option value="{{ $arrondissement->id }}">
                                            {{ $arrondissement->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
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

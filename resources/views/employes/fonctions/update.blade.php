@extends('layout.user-layout')
@section('title', 'Modification fonction')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12">
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
                            <div class="col-sm-12 pt-5">
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('fonctions.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des fonctions</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Modification fonction</h5>
                        <!-- fonction -->
                        <form method="post" action="{{ url('fonctions/' . $fonction->id) }}" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-12 col-md-8 col-lg-8 mb-4">
                                    <label for="name" class="form-label">Fonction<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="name" value="{{ $fonction->name ?? old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nom fonction">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mb-4">
                                    <label for="sigle" class="form-label">Sigle<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="text" name="sigle" value="{{ $fonction->sigle ?? old('sigle') }}"
                                        class="form-control form-control-sm @error('sigle') is-invalid @enderror"
                                        id="sigle" placeholder="Nom fonction">
                                    @error('sigle')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-2">
                                <button type="submit" class="btn btn-outline-success"><i
                                        class="far fa-save"></i>&nbsp;Modifier</button>
                            </div>
                            {{-- <div class="text-center">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div> --}}
                        </form><!-- End fonction -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

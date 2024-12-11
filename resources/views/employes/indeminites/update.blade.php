@extends('layout.user-layout')
@section('title', 'Modification indemnite')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
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
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('indemnites.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des indemnites</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Modification indemnite</h5>
                        <!-- indemnite -->
                        <form method="post" action="{{ url('indemnites/' . $indemnite->id) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="form-label">indemnite<span class="text-danger mx-1">*</span></label>
                                <input type="text" name="name" value="{{ $indemnite->name ?? old('name') }}"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nom indemnite">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-2">
                                <button type="submit" class="btn btn-outline-success"><i
                                        class="far fa-save"></i>&nbsp;Modifier</button>
                            </div>
                            {{-- <div class="text-center">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div> --}}
                        </form><!-- End indemnite -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

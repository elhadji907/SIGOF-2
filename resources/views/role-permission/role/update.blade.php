@extends('layout.user-layout')
@section('title', 'Modification role')
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
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('roles.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des roles</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Modification role</h5>
                        <!-- role -->
                        <form method="post" action="{{ url('roles/' . $role->id) }}" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="form-label">Role<span class="text-danger mx-1">*</span></label>
                                <input type="text" name="name" value="{{ $role->name ?? old('name') }}"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nom role">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form><!-- End role -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">
                        AUDIT
                    </div>
                    
                    <div class="card-body profile-card pt-1 d-flex flex-column">
                        <h5 class="card-title">Informations complémentaires</h5>
                        <p>créé par <b>{{ $user_create_name }}</b>, {{ $role->created_at->diffForHumans() }}</p>
                        <p>modifié par <b>{{ $user_update_name }}</b>, {{ $role->updated_at->diffForHumans() }}</p>
                    </div>

                    {{-- <div class="card-body profile-card pt-1 d-flex flex-column align-items-left">
                        <h5 class="card-title">Informations complémentaires</h5>

                        <p>Créé le {{ $role->created_at->format('d, M Y à H:i:s') }} par, <br> <span class="fst-italic fw-bolder">
                                {{ $user_create->firstname }} {{ $user_create->name }}</span></label></p>
                        <p>Modifié le {{ $role->updated_at->format('d, M Y à H:i:s') }} par, <br>
                            <span class="fst-italic fw-bolder">{{ $user_update->firstname }}
                                {{ $user_update->name }}</span></label>
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

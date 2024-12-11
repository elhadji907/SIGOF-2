@extends('layout.user-layout')
@section('title', 'Enregistrement loi')
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
                                <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('lois.index') }}"
                                        class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Liste des lois</p>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title">Création loi</h5>
                        <!-- loi -->
                        <form method="post" action="{{ url('lois') }}" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            {{--  <div class="row mb-3">
                                <label for="name" class="form-label"></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nom loi" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div> --}}


                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>lois<span class="text-danger mx-1">*</span></th>
                                    <th width="15%">Action</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="lois[0][name]" placeholder="Entrer une loi"
                                            class="form-control form-control-sm" autofocus/></td>
                                    <td><button type="button" name="add" id="add-btn" class="btn btn-success"
                                            title="Ajouter une ligne">Ajouter</button>
                                    </td>
                                </tr>
                            </table>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-2">
                                <button type="submit" class="btn btn-outline-success"><i
                                        class="far fa-save"></i>&nbsp;Sauvegarder</button>
                            </div>

                        </form><!-- End loi -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="lois[' + i +
                '][name]" placeholder="Entrer une autre loi" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Supprimer</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush

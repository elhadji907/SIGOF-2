@extends('layout.user-layout')
@section('title', 'Imputation courrier départ')
@section('space-work')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="col-sm-12 col-md-12 pt-2">

                    <div class="card">
                        <div class="card-body custom-edit-service">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span><a href="{{ route('departs.index') }}" class="btn btn-success btn-sm" title="retour"><i
                                            class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    | Liste des courriers départs
                                </span>

                                {{-- <small>
                                    <a href="{!! url('coupon-depart', ['$id' => $depart->id]) !!}" class='btn btn-primary btn-sm'
                                        title="télécharger le coupon" target="_blank">
                                        <i class="fa fa-print" aria-hidden="true"></i>&nbsp;Télécharger coupon
                                    </a>
                                </small> --}}

                                <form action="{{ route('couponDepart') }}" method="post" target="_blank">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <input type="hidden" name="id" value="{{ $depart->id }}">
                                    <button class="btn btn-outline-primary btn-sm"><i class="fa fa-print"
                                            aria-hidden="true"></i>Télécharger coupon</button>
                                </form>
                            </div>
                            @csrf
                            <div class="row form-row pt-3">
                                <div class="pb-1"><b>Expéditeur:</b> {{ $depart->courrier->expediteur }}</div>
                                <div class="pb-3"><b>Objet:</b> {{ $depart->courrier->objet }}</div>
                                <div class="pb-3"><b>Imputation:</b>
                                    @if ($depart->courrier->directions != '[]')
                                        <?php $i = 1; ?>
                                        @foreach ($depart->courrier->directions as $direction)
                                            <br>{{ $i++ }}. {!! $direction->name ?? '' !!}
                                            <b>[{!! $direction->sigle ?? '' !!}]</b>
                                        @endforeach
                                    @else
                                        Aucune imputation pour l'instant
                                    @endif
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Direction/Service/Cellule</label>
                                        <input type="text" placeholder="rechercher direction..."
                                            class="form-control form-control-sm @error('product') is-invalid @enderror"
                                            name="product" id="product" value="" @required(true)>
                                        <div class="col-lg-6" id="productList">
                                        </div>
                                        @error('product')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Chef</label>
                                        <input type="text" placeholder="Personne responsable"
                                            class="form-control form-control-sm @error('chef') is-invalid @enderror"
                                            name="chef" id="chef" value="" readonly>
                                        @error('chef')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" placeholder="ID"
                                    class="form-control form-control-sm @error('id_direction') is-invalid @enderror"
                                    name="id_direction" id="id_direction" value="0.0" min="0">
                                <input type="hidden" placeholder="ID"
                                    class="form-control form-control-sm @error('id_employe') is-invalid @enderror"
                                    name="id_employe" id="id_employe" value="" min="0">
                                <input type="hidden" placeholder="imp"
                                    class="form-control form-control-sm @error('imp') is-invalid @enderror" name="imp"
                                    id="imp" value="1">

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button id="addMore" class="btn btn-success btn-sm"><i class="fa fa-plus"
                                            aria-hidden="true"></i>&nbsp;Ajouter</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    <form method="post" action="{{ url('departs/' . $depart->id) }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        @method('PUT')
                        {{-- {!! Form::open(['url' => 'departs/' . $depart->id, 'method' => 'PATCH', 'files' => true]) !!}
                    @csrf --}}
                        <div class="table-responsive">
                            <table class="table table-bordered" style="display: none;">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Direction</th>
                                        <th>Responsable</th>
                                        <th style="width: 5%">#</th>
                                    </tr>
                                </thead>
                                <tbody id="addRow" class="addRow">
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="1" class="">
                                            {{-- <strong>{!! Form::label('Actions attendues') !!}</strong>
                                        {!! Form::select(
                                            'description',
                                            [
                                                'Urgent' => 'Urgent',
                                                'M\'en parler' => 'M\'en parler',
                                                'Etudes et Avis' => 'Etudes et Avis',
                                                'Répondre' => 'Répondre',
                                                'Suivi' => 'Suivi',
                                                'Information' => 'Information',
                                                'Diffusion' => 'Diffusion',
                                                'Attribution' => 'Attribution',
                                                'Classement' => 'Classement',
                                            ],
                                            $depart->courrier->description,
                                            [
                                                'placeholder' => 'Choisir une instruction...',
                                                'class' => 'form-control form-control-sm font-italic',
                                                'required' => 'required',
                                                'id' => 'description',
                                            ],
                                        ) !!}

                                        <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('description'))
                                                @foreach ($errors->get('description') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                        </small> --}}

                                            <label for="description" class="form-label">Actions attendues<span
                                                    class="text-danger mx-1">*</span></label>
                                            <select name="description"
                                                class="form-select font-italic @error('description') is-invalid @enderror"
                                                aria-label="Select" id="select-field-familiale"
                                                data-placeholder="Choisir une instruction..." @required(true)>
                                                <option value="{{ $depart?->courrier?->description }}">
                                                    {{ $depart?->courrier?->description ?? old('description') }}
                                                </option>
                                                <option value="Urgent">
                                                    Urgent
                                                </option>
                                                <option value="M'en parler">
                                                    M'en parler
                                                </option>
                                                <option value="Répondre">
                                                    Répondre
                                                </option>
                                                <option value="Suivi">
                                                    Suivi
                                                </option>
                                                <option value="Information">
                                                    Information
                                                </option>
                                                <option value="Diffusion">
                                                    Diffusion
                                                </option>
                                                <option value="Attribution">
                                                    Attribution
                                                </option>
                                                <option value="Classement">
                                                    Classement
                                                </option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted">
                                                @if ($errors->has('description'))
                                                    @foreach ($errors->get('description') as $message)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @endforeach
                                                @endif
                                            </small>
                                        </td>
                                        <td colspan="1">
                                            <strong><label for="date_imp">{{ __('Date imputation') }}</label></strong>
                                            <input id="date_imp" {{ $errors->has('date_imp') ? 'is-invalid' : '' }}
                                                type="date"
                                                class="form-control form-control-sm @error('date_imp') is-invalid @enderror"
                                                name="date_imp" placeholder="Date imputation" required
                                                value="{{ optional($depart->courrier->date_imp)->format('Y-m-d') ?? old('date_imp') }}"
                                                autocomplete="date_imp">
                                            @error('date_imp')
                                                <span class="invalid-feedback" role="alert">
                                                    <div>{{ $message }}</div>
                                                </span>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            {{-- {!! Form::submit('Imputer', ['class' => 'btn btn-outline-primary pull-right']) !!} --}}

                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-outline-primary pull-right">Imputer</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </form>
                    {{-- {!! Form::close() !!} --}}
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
                <script src="//code.jquery.com/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
                <script id="document-template" type="text/x-handlebars-template">
                    <tr class="delete_add_more_item" id="delete_add_more_item">    
                        <td>
                            <input type="hidden" name="id_direction[]" value="@{{ id_direction }}" required placeholder="Id direction" class="form-control form-control-sm">
                            <input type="hidden" name="id_employe[]" value="@{{ id_employe }}" required placeholder="Id employe" class="form-control form-control-sm">
                            <input type="text" name="product[]" value="@{{ product }}" required placeholder="Direction" class="form-control form-control-sm" readonly>                            
                            <input type="hidden" name="imp" value="@{{ imp }}">
                        </td>
                        <td>
                        <input type="text" class="chef form-control form-control-sm" name="chef[]" value="@{{ chef }}" required min="1" placeholder="Le nom du responsable" readonly>
                      </td>
                        <td>
                        <i class="removeaddmore" style="cursor:pointer;color:red;" title="supprimer"><i class="bi bi-trash"></i></i>
                        </td>    
                    </tr>
                    </script>
                <script type="text/javascript">
                    $(document).on('click', '#addMore', function() {
                        $('.table').show();
                        var product = $("#product").val();
                        var id_direction = $("#id_direction").val();
                        var id_employe = $("#id_employe").val();
                        var chef = $("#chef").val();
                        var imp = $("#imp").val();
                        var source = $("#document-template").html();
                        var template = Handlebars.compile(source);
                        var data = {
                            product: product,
                            id_direction: id_direction,
                            id_employe: id_employe,
                            chef: chef,
                            imp: imp,
                        }
                        var html = template(data);
                        $("#addRow").append(html)
                        total_ammount_price();
                    });
                    $(document).on('click', '.removeaddmore', function(event) {
                        $(this).closest('.delete_add_more_item').remove();
                        total_ammount_price();
                    });

                    $('#product').keyup(function() {
                        var query = $(this).val();
                        if (query != '') {
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('depart.fetch') }}",
                                method: "POST",
                                data: {
                                    query: query,
                                    _token: _token
                                },
                                success: function(data) {
                                    $('#productList').fadeIn();
                                    $('#productList').html(data);
                                }
                            });
                        }
                    });
                    $(document).on('click', 'li', function() {
                        $('#product').val($(this).text());
                        $('#id_direction').val($(this).data("id"));
                        $('#id_employe').val($(this).data("employeid"));
                        $('#chef').val($(this).data("chef"));
                        $('#productList').fadeOut();
                    });
                </script>
            </div>
        </div>
    </section>
@endsection

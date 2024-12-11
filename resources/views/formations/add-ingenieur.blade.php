@extends('layout.user-layout')
@section('title', 'attribuer cette formation à un ingénieur')
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
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert"><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 pt-0">
                                <span class="d-flex mt-0 align-items-baseline"><a
                                        href="{{ route('formations.show', $formation->id) }}" class="btn btn-success btn-sm"
                                        title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
                                    <p> | Détails formation</p>
                                </span>
                            </div>
                        </div>
                        <h5><u><b>INGENIEUR</b>:</u> {{ $ingenieur }}</h5>
                        <form method="post" action="{{ url('formationingenieurs', ['$idformation' => $formation->id]) }}"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                {{-- <div class="form-check col-md-2 pt-5">
                                    <label for="#">Choisir tout</label>
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                </div> --}}
                                <div class="form-check col-md-12 pt-5">
                                    <table class="table datatables align-middle" id="table-modules">
                                        <thead>
                                            <tr>
                                                {{-- <th>Matricule</th> --}}
                                                <th>Ingénieur</th>
                                                <th>Initiale</th>
                                                <th>Fonction</th>
                                                {{-- <th>Spécialité</th> --}}
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th style="text-align: center;">Formations</th>
                                                <th class="text-center" scope="col">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($ingenieurs as $ingenieur)
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="ingenieur" value="{{ $ingenieur?->id }}"
                                                            {{ in_array($ingenieur->id, $ingenieurFormation) ? 'checked' : '' }}
                                                            class="form-check-input @error('ingenieur') is-invalid @enderror">
                                                        @error('ingenieur')
                                                            <span class="invalid-feedback" role="alert">
                                                                <div>{{ $message }}</div>
                                                            </span>
                                                        @enderror
                                                        {{ $ingenieur->name }}
                                                    </td>
                                                    {{--  <td>{{ $ingenieur->name }}</td> --}}
                                                    <td>{{ $ingenieur->initiale }}</td>
                                                    <td>{{ $ingenieur->fonction }}</td>
                                                    {{-- <td>{{ $ingenieur->specialite }}</td> --}}
                                                    <td><a
                                                            href="mailto:{{ $ingenieur->email }}">{{ $ingenieur->email }}</a>
                                                    </td>
                                                    <td><a
                                                            href="tel:+221{{ $ingenieur->telephone }}">{{ $ingenieur->telephone }}</a>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @foreach ($ingenieur->formations as $formation)
                                                            @if ($loop->last)
                                                                <span class="badge bg-info">{{ $loop->count }}</span>
                                                            @endif
                                                        @endforeach
                                                    </td>

                                                    <td style="text-align: center;">
                                                        <span class="d-flex mt-2 align-items-baseline"><a
                                                                href="{{ route('ingenieurs.show', $ingenieur->id) }}"
                                                                class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                                <i class="bi bi-eye"></i></a>
                                                            {{-- <div class="filter">
                                                                <a class="icon" href="#"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bi bi-three-dots"></i></a>
                                                                <ul
                                                                    class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"> --}}
                                                            {{--  <li>
                                                                        <button type="button"
                                                                            class="dropdown-item btn btn-sm mx-1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#EditingenieurModal{{ $ingenieur->id }}">
                                                                            <i class="bi bi-pencil" title="Modifier"></i>
                                                                            Modifier
                                                                        </button>
                                                                    </li>
                                                                    <li> --}}
                                                            {{-- <form
                                                                            action="{{ url('ingenieurs', $ingenieur->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item show_confirm"><i
                                                                                    class="bi bi-trash"></i>Supprimer</button>
                                                                        </form> --}}
                                                            {{--      </li>
                                                                </ul>
                                                            </div> --}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-primary"><i
                                            class="bi bi-check2-circle"></i>&nbsp;Sélectionner</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        new DataTable('#table-modules', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            },
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "Tout"]
            ],
            "order": [
                [2, 'desc']
            ],
            language: {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
                "select": {
                    "rows": {
                        _: "%d lignes sÃ©lÃ©ctionnÃ©es",
                        0: "Aucune ligne sÃ©lÃ©ctionnÃ©e",
                        1: "1 ligne sÃ©lÃ©ctionnÃ©e"
                    }
                }
            }
        });
    </script>
@endpush

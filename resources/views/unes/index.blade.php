@extends('layout.user-layout')
@section('title', 'A LA UNE')
@section('space-work')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Données</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-12">
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
                            role="alert"><strong>{{ $error }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="pt-1">
                            <button type="button" class="btn btn-primary btn-sm float-end btn-rounded"
                                data-bs-toggle="modal" data-bs-target="#AddUneModal">Ajouter</button>
                        </div>
                        <h5 class="card-title">A la une</h5>
                        <table class="table datatables align-middle" id="table-unes">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">Image</th>
                                    <th width="12%">Titre 1</th>
                                    <th width="12%">Titre 2</th>
                                    <th>Message</th>
                                    <th width="5%" class="text-center">Statut</th>
                                    <th width="5%" class="text-center">Vidéo</th>
                                    <th width="5%" class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($unes as $une)
                                    <tr>
                                        <th scope="row" style="text-align: center">
                                            <img class="rounded-circle" alt="Profil" src="{{ asset($une->getUne()) }}"
                                                width="40" height="auto">
                                        </th>
                                        <td>{{ $une?->titre1 }}</td>
                                        <td>{{ $une?->titre2 }}</td>
                                        <td>{{ $une?->message }}</td>
                                        <td>{{ $une?->status }}</td>
                                        <td>
                                            @if (!empty($une->video))
                                                <a href="{{ $une->video }}" class="btn btn-link mt-2 mt-sm-0 glightbox" target="_blank">
                                                    <i class="bi bi-play-circle me-1"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="d-flex mt-2 align-items-baseline"><a href="#"
                                                    class="btn btn-warning btn-sm mx-1" title="Voir"><i
                                                        class="bi bi-file-lock"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                        <button type="button" class="dropdown-item btn btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#EditUneModal{{ $une->id }}">
                                                            Modifier
                                                        </button>
                                                        <form action="{{ url('unes', $une->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item show_confirm">Supprimer</button>
                                                        </form>
                                                        <form action="{{ route('alaunes') }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="alaune" id="alaune"
                                                                value="{{ $une->id }}">
                                                            <button type="submit" class="dropdown-item une_confirm">Mettre
                                                                à la une</button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div
        class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
        <div class="modal fade" id="AddUneModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="post" action="{{ route('unes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">CRÉER UNE PUBLICATION A LA UNE</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="titre1" class="form-label">Titre 1<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="titre1" rows="1" class="form-control form-control-sm @error('titre1') is-invalid @enderror"
                                        placeholder="Titre 1">{{ old('titre1') }}</textarea>
                                    @error('titre1')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="titre2" class="form-label">Titre 2<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="titre2" rows="1" class="form-control form-control-sm @error('titre2') is-invalid @enderror"
                                        placeholder="Titre 2">{{ old('titre2') }}</textarea>
                                    @error('titre2')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="message" class="form-label">Message<span
                                            class="text-danger mx-1">*</span></label>
                                    <textarea name="message" id="message" rows="3"
                                        class="form-control form-control-sm @error('message') is-invalid @enderror"
                                        placeholder="Ecrire votre message ici">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="image" class="form-label">Image<span
                                            class="text-danger mx-1">*</span></label>
                                    <input type="file" name="image" value="{{ old('image') }}"
                                        class="form-control form-control-sm @error('image') is-invalid @enderror"
                                        id="image" placeholder="Image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer mt-5">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($unes as $une)
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="EditUneModal{{ $une->id }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ route('unes.update', $une->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header text-center bg-gradient-default">
                                <h1 class="h4 text-black mb-0">MODIFICATION A LA UNE</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="titre1" class="form-label">Titre 1<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="titre1" rows="1" class="form-control form-control-sm @error('titre1') is-invalid @enderror"
                                            placeholder="Titre1">{{ $une->titre1 ?? old('titre1') }}</textarea>
                                        @error('titre1')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="titre2" class="form-label">Titre 2<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="titre2" rows="1" class="form-control form-control-sm @error('titre2') is-invalid @enderror"
                                            placeholder="Titre 2">{{ $une->titre2 ?? old('titre2') }}</textarea>
                                        @error('titre2')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                        <label for="message" class="form-label">Mesage<span
                                                class="text-danger mx-1">*</span></label>
                                        <textarea name="message" id="message" rows="3"
                                            class="form-control form-control-sm @error('message') is-invalid @enderror" placeholder="Ecrire votre une ici">{{ $une->message ?? old('message') }}</textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 col-sm-12 col-xs-12 col-xxl-4">
                                        <label for="image" class="form-label">Image<span
                                                class="text-danger mx-1">*</span></label>
                                        <input type="file" name="image" value="{{ old('image') }}"
                                            class="form-control form-control-sm @error('image') is-invalid @enderror"
                                            id="image" placeholder="Image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-2 col-sm-12 col-xs-12 col-xxl-2">
                                        <label for="reference" class="form-label">Image</label><br>
                                        @if (isset($une->image))
                                            <div>
                                                <img class="w-25" alt="Profil" src="{{ asset($une->getUne()) }}"
                                                    width="20" height="auto">
                                            </div>
                                        @else
                                            <div class="badge bg-warning">Aucun</div>
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                        <label for="video" class="form-label">Vidéo</label>
                                        <textarea name="video" rows="1" class="form-control form-control-sm @error('video') is-invalid @enderror"
                                            placeholder="Lien vidéo">{{ $une->video ?? old('video') }}</textarea>
                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <div>{{ $message }}</div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer mt-5">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('scripts')
    <script>
        new DataTable('#table-unes', {
            /* layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                }
            }, */
            "order": [
                [0, 'asc']
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

@extends('layout.user-layout')
@section('title', 'Contact')
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
                        <h5 class="card-title">Contact</h5>
                        <table class="table datatables align-middle" id="table-contacts">
                            <thead>
                                <tr>
                                    <th width="20%">Objet</th>
                                    <th>Message</th>
                                    <th width="15%">Email</th>
                                    <th width="10%">Téléphone</th>
                                    <th>Réponse</th>
                                    <th width="5%" class="text-center">Statut</th>
                                    <th width="5%" class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact?->objet }}</td>
                                        <td>{{ $contact?->message }}</td>
                                        <td>{{ $contact?->email }}</td>
                                        <td>{{ $contact?->telephone }}</td>
                                        <td>{{ $contact?->reponse }}</td>
                                        <td>{{ $contact?->statut }}</td>
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
                                                            data-bs-target="#EditUneModal{{ $contact->id }}">
                                                            Modifier
                                                        </button>
                                                        <form action="{{ url('contacts', $contact->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item show_confirm">Supprimer</button>
                                                        </form>
                                                        <form action="{{ route('uneContacts') }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="alaune" id="alaune"
                                                                value="{{ $contact->id }}">
                                                            <button type="submit" class="dropdown-item une_confirm">Mettre
                                                                en évidence</button>
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
                    <form method="post" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">AJOUTER</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">


                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="emailadresse" class="form-label">Email<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="emailadresse" name="emailadresse"
                                            class="form-control form-control-sm @error('emailadresse') is-invalid @enderror"
                                            id="emailadresse" required placeholder="Votre adresse e-mail"
                                            value="{{ old('emailadresse') }}">
                                        <div class="invalid-feedback">
                                            @error('emailadresse')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="telephone" class="form-label">Téléphone<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="telephone" name="telephone"
                                            class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                            id="telephone" required placeholder="Votre téléphone"
                                            value="{{ old('telephone') }}">
                                        <div class="invalid-feedback">
                                            @error('telephone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="name" name="objet"
                                            class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                            id="objet" required placeholder="Objet" value="{{ old('objet') }}">
                                        <div class="invalid-feedback">
                                            @error('objet')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <label for="message" class="form-label">Message<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="message" rows="4" placeholder="Ecrire votre message ici" required>{{ old('message') }}</textarea>
                                    </div>
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
    @foreach ($contacts as $contact)
        <div
            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
            <div class="modal fade" id="EditUneModal{{ $contact->id }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="post" action="{{ route('contacts.update', $contact->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header text-center bg-gradient-default">
                                <h1 class="h4 text-black mb-0">MODIFICATION A LA UNE</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">

                                    
                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="emailadresse" class="form-label">Email<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="emailadresse" name="emailadresse"
                                            class="form-control form-control-sm @error('emailadresse') is-invalid @enderror"
                                            id="emailadresse" required placeholder="Votre adresse e-mail"
                                            value="{{ $contact->email ?? old('emailadresse') }}">
                                        <div class="invalid-feedback">
                                            @error('emailadresse')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="telephone" class="form-label">Téléphone<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="telephone" name="telephone"
                                            class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                            id="telephone" required placeholder="Votre téléphone"
                                            value="{{ $contact->telephone ?? old('telephone') }}">
                                        <div class="invalid-feedback">
                                            @error('telephone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="objet" class="form-label">Objet<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="name" name="objet"
                                            class="form-control form-control-sm @error('objet') is-invalid @enderror"
                                            id="objet" required placeholder="Objet" value="{{ $contact->objet ?? old('objet') }}">
                                        <div class="invalid-feedback">
                                            @error('objet')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="statut" class="form-label">Statut<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <input type="name" name="statut"
                                            class="form-control form-control-sm @error('statut') is-invalid @enderror"
                                            id="statut" placeholder="statut" value="{{ $contact->statut ?? old('statut') }}">
                                        <div class="invalid-feedback">
                                            @error('statut')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="message" class="form-label">Message<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="message" rows="2" placeholder="Ecrire votre message ici" required>{{ $contact->message ?? old('message') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12 col-xxl-6">
                                    <label for="reponse" class="form-label">Réponse<span
                                            class="text-danger mx-1">*</span></label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="reponse" rows="2" placeholder="Ecrire votre réponse ici">{{ $contact->reponse ?? old('reponse') }}</textarea>
                                    </div>
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
        new DataTable('#table-contacts', {
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

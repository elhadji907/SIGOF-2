@extends('layout.user-layout')
@section('title', 'ONFP - Localités ' . $projet->sigle)
@section('space-work')

    <section class="section register">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10">
                <div class="pagetitle">
                    {{-- <h1>Data Tables</h1> --}}
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item active">Données</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                @if ($message = Session::get('status'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                        role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
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
                        @if (auth()->user()->hasRole('super-admin|admin'))
                            <div class="pt-1">
                                <button type="button" class="btn btn-primary float-end btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#AddprojetlocaliteModal">
                                    <i class="bi bi-person-plus" title="Ajouter"></i>
                                </button>
                            </div>
                        @endcan
                        <h5 class="card-title">Localité</h5>
                        <table class="table datatables align-middle justify-content-center" id="table-projetlocalites">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">N°</th>
                                    <th>Localité</th>
                                    <th class="text-center" scope="col">Effectif</th>
                                    <th class="text-center" scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($projetlocalites as $projetlocalite)
                                    <tr>
                                        <td style="text-align: center;">{{ $i++ }}</td>
                                        <td>{{ $projetlocalite->localite }}</td>
                                        <td style="text-align: center;">
                                        </td>
                                        <td style="text-align: center;">
                                            <span class="d-flex mt-2 align-items-baseline"><a
                                                    href="{{ route('projetlocalites.show', $projetlocalite->id) }}"
                                                    class="btn btn-warning btn-sm mx-1" title="Voir détails">
                                                    <i class="bi bi-eye"></i></a>
                                                @if (auth()->user()->hasRole('super-admin|admin'))
                                                    <div class="filter">
                                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li>
                                                                <button type="button"
                                                                    class="dropdown-item btn btn-sm mx-1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#EditprojetlocaliteModal{{ $projetlocalite->id }}">
                                                                    <i class="bi bi-pencil" title="Modifier"></i>
                                                                    Modifier
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ url('projetlocalites', $projetlocalite->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item show_confirm"><i
                                                                            class="bi bi-trash"></i>Supprimer</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endcan
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
<!-- Add projetlocalite -->
<div class="modal fade" id="AddprojetlocaliteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <form method="POST" action="{{ route('addprojetlocalite') }}">
                        @csrf --}}
            <form method="post" action="{{ url('projetlocalites') }}" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus" title="Ajouter"></i> Ajouter une nouvelle
                        Localité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="localite" value="{{ old('localite') }}"
                            class="form-control form-control-sm @error('localite') is-invalid @enderror"
                            id="localite" placeholder="Localité" autofocus>
                        @error('localite')
                            <span class="invalid-feedback" role="alert">
                                <div>{{ $message }}</div>
                            </span>
                        @enderror
                        <label for="floatingInput">Localité</label>
                    </div>
                    <input name="projet" value="{{ $projet->id }}" type="hidden">
                    <div class="form-floating mb-3">
                        <input type="number" min="0" name="effectif" value="{{ old('effectif') }}"
                            class="form-control form-control-sm @error('effectif') is-invalid @enderror"
                            id="effectif" placeholder="Effectif">
                        @error('effectif')
                            <span class="invalid-feedback" role="alert">
                                <div>{{ $message }}</div>
                            </span>
                        @enderror
                        <label for="floatingInput">Effectif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                        Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add projetlocalite-->

<!-- Edit projetlocalite -->
@foreach ($projetlocalites as $projetlocalite)
    <div class="modal fade" id="EditprojetlocaliteModal{{ $projetlocalite->id }}" tabindex="-1" role="dialog"
        aria-labelledby="EditprojetlocaliteModalLabel{{ $projetlocalite->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form method="POST" action="{{ route('updateprojetlocalite') }}">
                            @csrf --}}
                <form method="post" action="{{ route('projetlocalites.update', $projetlocalite->id) }}"
                    enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('patch')
                    <div class="modal-header" id="EditprojetlocaliteModalLabel{{ $projetlocalite->id }}">
                        <h5 class="modal-title"><i class="bi bi-pencil" title="Ajouter"></i> Modifier localité
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $projetlocalite->projet->id }}">
                        <div class="form-floating mb-3">
                            <input type="text" name="localite"
                                value="{{ $projetlocalite->localite ?? old('localite') }}"
                                class="form-control form-control-sm @error('localite') is-invalid @enderror"
                                id="localite" placeholder="Localité" autofocus>
                            @error('localite')
                                <span class="invalid-feedback" role="alert">
                                    <div>{{ $message }}</div>
                                </span>
                            @enderror
                            <label for="floatingInput">Localité</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="effectif"
                                value="{{ $projetlocalite->effectif ?? old('effectif') }}"
                                class="form-control form-control-sm @error('effectif') is-invalid @enderror"
                                id="effectif" placeholder="Effectif">
                            @error('effectif')
                                <span class="invalid-feedback" role="alert">
                                    <div>{{ $message }}</div>
                                </span>
                            @enderror
                            <label for="floatingInput">Effectif</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i>
                            Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- End Edit projetlocalite-->
</section>

@endsection
@push('scripts')
<script>
    new DataTable('#table-projetlocalites', {
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            }
        },
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

@extends('layout.user-layout')
@section('title', 'utilisateurs ayant un role')
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
                        <div class="col-sm-12 d-flex justify-content-between align-items-center"> <span><a
                                    href="{{ route('roles.index') }}" class="btn btn-success btn-sm" title="retour"><i
                                        class="bi bi-arrow-counterclockwise mx-1"></i></a>
                                | Liste des utilisateurs ayant le role : {{ $roleName }}</span>
                            <span><a href="{{ route('users.create') }}" class="btn btn-primary float-end btn-rounded"><i
                                        class="fas fa-plus"></i>
                                    <i class="bi bi-person-plus" title="Ajouter"></i> </a></span>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatables align-middle" id="table-users">
                            <thead>
                                <tr>
                                    <th></th>
                                    {{-- <th>N°</th> --}}
                                    <th>Prénom & Nom</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Roles</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row"><img class="rounded-circle w-20" alt="Profil"
                                                src="{{ asset($user->getImage()) }}" width="40" height="auto">
                                        </th>
                                        {{-- <td>{{ $i++ }}</td> --}}
                                        <td>{{ $user->firstname }} {{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $roleName)
                                                    <label for="label"
                                                        class="badge bg-primary mx-1">{{ $roleName }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <span class="d-flex mt-2 align-items-baseline"><a
                                                    href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-success btn-sm mx-1" title="voir détails"><i
                                                        class="bi bi-eye"></i></a>
                                                <div class="filter">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li><a class="dropdown-item btn btn-sm mx-1"
                                                                href="{{ route('users.edit', $user->id) }}"
                                                                class="mx-1"><i class="bi bi-pencil"></i>
                                                                Modifier</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item show_confirm"><i
                                                                        class="bi bi-trash"></i>Supprimer</button>
                                                            </form>
                                                        </li>
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
@endsection

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-light">
        <a class="navbar-brand text-dark" href="#"><b>Laravel 10 Update Data Using Modal</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        </button>
    </nav>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-black">Laravel 10 Update Data Using Modal</h3>
                <br><br>
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                <i class="fas fa-user-plus"></i>    Add
                </button>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <table class="table table-bordered">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th><i class="fas fa-user"></i> Name</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-address-card"></i> Address</th>
                            <th class="align-center" style="text-align: center;"><i class="fas fa-cog"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regions as $region)
                            <tr>
                                <td>{{ $region->nom }}</td>
                                <td> </td>
                                <td> </td>
                                <td class="align-center" style="text-align: center;">
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editStudentModal{{ $region->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('addRegion') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel"><i class="fas fa-user-plus"></i> Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i> Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address"><i class="fas fa-address-card"></i> Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($regions as $region)
        <!-- Edit Student Modal (for each student) -->
        <div class="modal fade" id="editStudentModal{{ $region->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editStudentModalLabel{{ $region->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('updateRegion') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStudentModalLabel{{ $region->id }}"><i
                                    class="fas fa-edit"></i>
                                Edit Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $region->id }}">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i> Name</label>
                                <input type="text" name="name" value="{{ $region->nom }}" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" name="email" value=" " class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="fas fa-address-card"></i> Address</label>
                                <input type="text" name="address" value=" " class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

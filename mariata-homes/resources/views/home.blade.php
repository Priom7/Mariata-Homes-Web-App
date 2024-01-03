@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid mt-5">
        <h1>Admin Dashboard</h1>

        <div class="row">

            <!-- Total Users Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users <i class="bi bi-person"></i></h5>
                        <p class="card-text"><i class="bi bi-person"></i> All: {{ $totalApplicants }}</p>
                        <p class="card-text"><i class="bi bi-person"></i> User Type: {{ $userTypes }}</p>
                        <p class="card-text"><i class="bi bi-person"></i> Admins: {{ $adminTypes }}</p>

                    </div>
                </div>
            </div>

            <!-- Total Applications Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Applications <i class="bi bi-file-earmark-text"></i></h5>
                        <p class="card-text">Count: {{ $totalApplications }} </p>
                    </div>
                </div>
            </div>

            <!-- Recommendation Stats Cards -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recommendation Stats</h5>

                        <!-- Police -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="bi bi-shield"></i> Police</span>
                            <span class="badge bg-primary"> {{$totalPoliceRecommendation}}</span>
                        </div>

                        <!-- Prison -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="bi bi-building"></i> Prison</span>
                            <span class="badge bg-warning"> {{ $toalPrisonRecommendation }} </span>
                        </div>

                        <!-- Immigration -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="bi bi-globe"></i> Immigration</span>
                            <span class="badge bg-success">{{$totalImmigrationRecommendation}}</span>
                        </div>

                        <!-- Others -->
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-gear"></i> Others</span>
                            <span class="badge bg-secondary">{{$totalOthersRecommendation}}</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col md 6">
                            <h1><i class="bi bi-person text-primary"></i> User List</h1>
                        </div>
                        <div class="col md 6">
                            <div class="mb-3">
                                <button class="btn btn-primary"><i class="bi bi-person-fill-add"> <a style="text-decoration: none; color:white" href="/register"> Add User</a></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">


                        <!-- Search and filter fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <form action="{{ route('applicant.search') }}" method="GET">
                                    <label for="search" class="form-label">Type Search Item</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                    </div>
                                    <div class="mb-3">
                                        <label for="searchField" class="form-label">Select Search Field</label>
                                        <div class="input-group">
                                            <select class="form-select" id="searchField" name="searchField">
                                                <option value="name" selected>Name</option>
                                                <option value="email">Email</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <!-- Table with data -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL <i class="bi bi-sort"></i></th>
                                    <th>Name <i class="bi bi-sort"></i></th>
                                    <th>Email <i class="bi bi-sort"></i></th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=0;
                                @endphp
                                @foreach($applicants as $user)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>

                                    <td>
                                        <a href="{{ route('applicant.get', ['id' => $user['id']]) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('applicant.delete', ['id' => $user['id']]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $applicants->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col md 3">
                            <h1><i class="bi bi-file-earmark-text text-success"></i> Application List</h1>
                        </div>
                        <button class="btn btn-success"><i class="bi bi-person-fill-add"> <a style="text-decoration: none; color:white" href="/addApplication"> Add Application</a></i></button>


                    </div>
                    <div class="card-body">
                        <div class="container-fluid">


                            <!-- Search and filter fields -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <form action="{{ route('application.search') }}" method="GET">
                                        <label for="search" class="form-label">Type Search Item</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="Search">
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                        </div>
                                        <div class="mb-3">
                                            <label for="searchField" class="form-label">Select Search Field</label>
                                            <div class="input-group">
                                                <select class="form-select" id="searchField" name="searchField">
                                                    <option value="name" selected>Name</option>
                                                    <option value="email">Email</option>
                                                    <option value="age" selected>Age</option>
                                                    <option value="telephone">Telephone</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <!-- Table with data -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL <i class="bi bi-sort"></i></th>
                                        <th>Name <i class="bi bi-sort"></i></th>
                                        <th>Email <i class="bi bi-sort"></i></th>
                                        <th>Telephone <i class="bi bi-sort"></i></th>
                                        <th>Age <i class="bi bi-sort"></i></th>
                                        <th>Recommended Source<i class="bi bi-sort"></i></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($applications as $application)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i}}</td>
                                        <td>{{ $application['name'] }}</td>
                                        <td>{{ $application['email'] }}</td>
                                        <td>{{ $application['telephone'] }}</td>
                                        <td>{{ $application['age'] }}</td>
                                        <td>
                                            {{$application?->applicationsRecommendedSource->recommendedSource->name}}

                                        </td>
                                        <!-- Add more data fields as needed -->
                                        <td>
                                            <a href="{{ route('application.get', ['id' => $application['id']]) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                            <!-- <form action="{{ route('application.delete', ['id' => $application['id']]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE') -->


                                                <button onclick="showDeleteConfirmation()" type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                            <!-- </form> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $applications->links('pagination::bootstrap-4') }}

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="modal" tabindex="-1" role="dialog" id="deleteConfirmationModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Application Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Application?</p>
                    <!-- <p>Note: Application created By the following user will also be deleted.</p> -->
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <script>
        function showDeleteConfirmation(itemId) {
            // Show Bootstrap modal for confirmation
            $('#deleteConfirmationModal').modal('show');
            // console.log(itemId);
            // Pass the item ID to the modal's form action
            // $('#deleteForm').attr('action', '/delete/' + itemId);
        }
    </script>
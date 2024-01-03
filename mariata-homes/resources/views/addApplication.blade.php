@extends('layouts.app')

@section('content')
<div>
    <div style="align-items: center;" class="card">
        <div class="card-header text-center">
            <h1>Create New Application For Selected User</h1>
        </div>


        <div class="container mt-5">
            <h2><i class="bi bi-person"></i> Admin Application</h2>

            <!-- Error Messages -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card p-4">
                <form method="post" action="{{ route('admin.application.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">

                            <!-- Your Bootstrap styled dropdown with icon -->
                            <div class="input-group">
                                <label class="input-group-text" for="recommended_sources_dropdown"><i class="bi bi-people"></i></label>
                                <select class="form-select" aria-label="Default select example" data-live-search="true" name="user_id" id="recommended_sources_dropdown">
                                    <option value="" selected disabled>Select an User</option>
                                    @foreach ($users as $option)
                                    <option value="{{$option->id}}">{{ $option->name }} - {{$option->email}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                            <input type="date" class="form-control" id="dob" name="dob" onchange="calculateAge()" required>
                        </div>
                    </div>

                    <!-- Age -->
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Mobile Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required>
                        </div>
                    </div>

                    <!-- Next of Kin -->
                    <div class="mb-3">
                        <label for="next_of_kin" class="form-label">Next of Kin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-check-fill"></i></span>
                            <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" required>
                        </div>
                    </div>

                    <!-- Passport Photo -->
                    <div class="mb-3">
                        <label for="passport_photo" class="form-label">Passport Photo</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-file-image"></i></span>
                            <input type="file" class="form-control" id="passport_photo" name="passport_photo" accept="image/*" required>
                        </div>
                    </div>

                    <!-- Any Illness -->
                    <div class="mb-3">
                        <label for="illness" class="form-label">Any Illness</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-file-medical"></i></span>
                            <textarea class="form-control" id="illness" name="illness" required></textarea>
                        </div>
                    </div>

                    <!-- Last Residence Address -->
                    <div class="mb-3">
                        <label for="last_residence_address" class="form-label">Last Residence Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                            <input type="text" class="form-control" id="last_residence_address" name="last_residence_address" required>
                        </div>
                    </div>

                    <!-- Recommended Source Address -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- Your Bootstrap styled dropdown with icon -->
                            <div class="input-group">
                                <label class="input-group-text" for="recommended_sources_dropdown"><i class="bi bi-people"></i></label>
                                <select class="form-select" aria-label="Default select example" data-live-search="true" name="recommended_source" id="recommended_sources_dropdown">
                                    <option value="" selected disabled>Select a Recommended Source</option>
                                    @foreach ($recommendedSources as $option)
                                    <option value="{{$option->id}}">{{ $option->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <!-- Recommended Source Address with icon -->
                            <div class="input-group">
                                <label class="input-group-text" for="recommended_source_address"><i class="bi bi-geo-alt"></i></label>
                                <input type="text" class="form-control" id="recommended_source_address" name="recommended_source_address" required>
                            </div>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle-fill"></i> Submit</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    @endsection

    <!-- JavaScript to calculate age -->
    <script>
        function calculateAge() {
            // Get the selected date
            var dob = document.getElementById('dob').value;

            // Calculate age
            var age = getAge(new Date(dob));

            // Set the calculated age in the 'age' input field
            document.getElementById('age').value = age;
        }

        function getAge(birthdate) {
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            var monthDiff = today.getMonth() - birthdate.getMonth();

            // If birthdate is yet to come this year
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
                age--;
            }

            return age;
        }
    </script>
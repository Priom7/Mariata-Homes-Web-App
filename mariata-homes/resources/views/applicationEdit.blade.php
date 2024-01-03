@extends('layouts.app') <!-- Use your layout file, if different -->

@section('content')
<div class="container mt-5">
    <div class="card p-5">
        <h2>Edit User Application Details Info</h2>

        <form action="{{ route('application.update', ['id' => $application->id]) }}" method="post">
            @csrf
            @method('PUT')




            <div class="form-group">
                <label for="name">Name(s)</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $application->name }}" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ $application->dob }}" onchange="calculateAge()" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $application->email}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telephone">Telephone</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" value=" {{  $application->telephone}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="next_of_kin">Next of Kin</label>
                    <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" value=" {{  $application->next_of_kin}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="passport_photo">Recent Passport Photograph</label>
                    <input type="file" class="form-control-file" id="passport_photo" name="passport_photo" accept="image/*" required>
                </div>
            </div>

            <div class="form-group">
                <label for="illness">Any Illness</label>
                <textarea class="form-control" id="illness" name="illness"> {{$application->illness}}</textarea>
            </div>

            <div class="form-group">
                <label for="last_residence_address">Last Residence Address</label>
                <input type="text" class="form-control" id="last_residence_address" name="last_residence_address" value=" {{  $application->last_residence_address}}">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <!-- Your Bootstrap styled dropdown -->
                    <select class="form-select" aria-label="Default select example" data-live-search="true" name="recommended_sources" id="recommended_sources_dropdown">
                        <option value="{{$application?->applicationsRecommendedSource->recommendedSource->id}}" selected disabled>Select an Recommended Source</option>
                        @foreach ($recommendedSources as $option)
                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="recommended_source_address">Recommended Source Address</label>
                    <input type="text" class="form-control" id="recommended_source_address" name="recommended_source_address" value=" {{  $application->recommended_source_address}}" required>
                </div>
            </div>




            <button type="submit" class="btn btn-primary">Update</button>
        </form>
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
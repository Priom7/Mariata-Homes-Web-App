@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit User Registration Info <i class="bi bi-pencil-square"></i></h2>

    <form action="{{ route('applicant.update', ['id' => $applicant->id]) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Add your form fields here -->
        <div class="form-group">
            <label for="name">Name <i class="bi bi-person"></i></label>
            <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" value="{{ $applicant->name }}">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email <i class="bi bi-envelope"></i></label>
            <div class="input-group">
                <input type="email" class="form-control" id="email" name="email" value="{{ $applicant->email }}">
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            </div>
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Update</button>
        <a href="\home" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </form>
</div>

@endsection
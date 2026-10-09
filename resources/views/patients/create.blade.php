@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Create Patient</h2>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('patients.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="student_id" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" value="{{ old('student_id') }}" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course" name="course" value="{{ old('course') }}" required>
                </div>

                <div class="mb-3">
                    <label for="year_level" class="form-label">Year Level</label>
                    <input type="number" class="form-control" id="year_level" name="year_level" min="1" value="{{ old('year_level') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Patient</button>
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

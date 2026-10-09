@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>List of Patients</h2>

        <a href="{{ route('patients.create') }}" class="btn btn-primary">
            + Add Patient
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

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

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th width="280">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($patients as $patient)
                            <tr>
                                <td>{{ $patient->student_id }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->course }}</td>
                                <td>{{ $patient->year_level }}</td>

                                <td>
                                    <a href="{{ route('patients.show', $patient->id) }}"
                                       class="btn btn-info btn-sm">
                                        View
                                    </a>

                                    <a href="{{ route('patients.edit', $patient->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('patients.destroy', $patient->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No patients found. Click Add Patient to register one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
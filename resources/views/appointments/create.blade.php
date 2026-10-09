@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Create Appointment</h2>

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

            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="patient_id" class="form-label">Select Patient</label>

                    <select name="patient_id" id="patient_id" class="form-select" required>
                        <option value="">Choose a patient</option>

                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                {{ $patient->student_id }} - {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>

                    @if($patients->isEmpty())
                        <small class="text-danger">
                            No patients registered. Register a patient first.
                        </small>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Select Doctor</label>

                    <select name="doctor_id" id="doctor_id" class="form-select" required>
                        <option value="">Choose a doctor</option>

                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }} - {{ $doctor->specialization }}
                            </option>
                        @endforeach
                    </select>

                    @if($doctors->isEmpty())
                        <small class="text-danger">
                            No doctors registered. Register a doctor first.
                        </small>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="appointment_date" class="form-label">
                        Appointment Date
                    </label>

                    <input type="date"
                           name="appointment_date"
                           id="appointment_date"
                           class="form-control"
                           value="{{ old('appointment_date') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>

                    <select name="status" id="status" class="form-select" required>
                        <option value="">Select status</option>

                        @foreach(['Pending', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status', 'Pending') == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save Appointment
                </button>

                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </form>

        </div>
    </div>

</div>
@endsection

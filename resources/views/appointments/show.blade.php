@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Appointment Details</h2>

        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
            Back to Appointments
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Appointment Information
        </div>

        <div class="card-body">
            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient->name ?? 'Patient not found' }}
            </p>

            <p>
                <strong>Doctor:</strong>
                {{ $appointment->doctor->name ?? 'Doctor not found' }}
            </p>

            <p>
                <strong>Appointment Date:</strong>
                {{ $appointment->appointment_date }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $appointment->status }}
            </p>

            <a href="{{ route('appointments.edit', $appointment->id) }}"
               class="btn btn-warning">
                Edit Appointment
            </a>
        </div>
    </div>

</div>
@endsection
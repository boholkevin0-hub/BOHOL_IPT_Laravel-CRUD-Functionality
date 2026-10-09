<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:255|unique:patients,student_id',
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'year_level' => 'required|integer|min:1',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:255|unique:patients,student_id,' . $patient->id,
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'year_level' => 'required|string|max:255',
        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        if ($patient->appointments()->exists()) {
            return redirect()
                ->route('patients.index')
                ->with('error', 'Cannot delete this patient because they have appointments.');
        }

        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}
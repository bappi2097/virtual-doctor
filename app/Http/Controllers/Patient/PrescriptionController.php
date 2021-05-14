<?php

namespace App\Http\Controllers\Patient;

use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.prescription.index', [
            'prescriptions' => Prescription::with('doctor', 'patient', 'appointment')
                ->where('patient_id', auth()->user()->id)
                ->latest()
                ->get()
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        $prescription->loadMissing(['doctor', 'patient', 'appointment']);
        return view('patient.prescription.show', [
            'prescription' => $prescription
        ]);
    }
}

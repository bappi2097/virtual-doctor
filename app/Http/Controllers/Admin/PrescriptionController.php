<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.prescription.index', [
            'prescriptions' => Prescription::with('doctor', 'patient', 'appointment')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prescription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'appointment_id' => 'required|exists:appointments,id',
            'description' => 'required|string',
        ]);
        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'description' => $request->description,
        ];
        $prescription = new Prescription($data);
        if ($prescription->save()) {
            $appointment = Appointment::where('id', $request->appointment_id)->first();
            $prescription->appointment()->save($appointment);
            Toastr::success('Successfully Prescription Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
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
        return view('admin.prescription.show', [
            'prescription' => $prescription
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        $prescription->loadMissing(['doctor', 'patient', 'appointment']);
        return view('admin.prescription.edit', [
            'prescription' => $prescription
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        $this->validate($request, [
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'appointment_id' => 'required|exists:appointments,id',
            'description' => 'required|string',
        ]);
        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_id' => $request->appointment_id,
            'description' => $request->description,
        ];
        if ($prescription->update($data)) {
            Toastr::success('Successfully Prescription Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $appointment = Appointment::where('prescription_id', $prescription->id)->first();
        $appointment->prescription_id = null;
        $appointment->save();
        if ($prescription->delete()) {
            Toastr::success('Successfully Prescription Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

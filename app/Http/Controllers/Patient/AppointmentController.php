<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.appointment.index', [
            'appointments' => Appointment::with('doctor', 'patient', 'doctorCategory')->where('patient_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctocCategories = DoctorCategory::with('doctors')->get()->map(function ($item) {
            return $item->toArray();
        })->all();

        return view('patient.appointment.create', [
            'doctorCategories' => $doctocCategories,
            'patients' => User::role('patient')->get()
        ]);
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
            'doctor_category_id' => 'required|exists:doctor_categories,id',
            'description' => 'required|string',
        ]);

        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => auth()->user()->id,
            'doctor_category_id' => $request->doctor_category_id,
            'day' => null,
            'start' => null,
            'end' => null,
            'description' => $request->description,
        ];

        $appointment = new Appointment($data);
        if ($appointment->save()) {
            Toastr::success('Successfully Appointment Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('patient.appointment.show', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $doctocCategories = DoctorCategory::with('doctors')->get()->map(function ($item) {
            return $item->toArray();
        })->all();

        return view('patient.appointment.edit', [
            'appointment' => $appointment,
            'doctorCategories' => $doctocCategories,
            'patients' => User::role('patient')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request, [
            'doctor_id' => 'required|exists:users,id',
            'doctor_category_id' => 'required|exists:doctor_categories,id',
            'description' => 'required|string',
        ]);

        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => auth()->user()->id,
            'doctor_category_id' => $request->doctor_category_id,
            'description' => $request->description,
        ];

        $appointment->fill($data);
        if ($appointment->save()) {
            Toastr::success('Successfully Appointment Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        if ($appointment->delete()) {
            Toastr::success('Successfully Appointment Removed', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

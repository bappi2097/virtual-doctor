<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DoctorCategory;
use App\Models\User;
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
        return view('admin.appointment.index', [
            'appointments' => Appointment::with('doctor', 'patient', 'doctorCategory')->get()
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

        return view('admin.appointment.create', [
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
            'patient_id' => 'required|exists:users,id',
            'doctor_category_id' => 'required|exists:doctor_categories,id',
            'day' => 'required|date',
            'start' => 'date_format:H:i',
            'end' => 'date_format:H:i|after:start',
            'description' => 'required|string',
        ]);

        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'doctor_category_id' => $request->doctor_category_id,
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
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
        return view('admin.appointment.show', [
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

        return view('admin.appointment.edit', [
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
            'patient_id' => 'required|exists:users,id',
            'doctor_category_id' => 'required|exists:doctor_categories,id',
            'day' => 'required|date',
            'start' => 'date_format:H:i',
            'end' => 'date_format:H:i|after:start',
            'description' => 'required|string',
        ]);

        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'doctor_category_id' => $request->doctor_category_id,
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
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

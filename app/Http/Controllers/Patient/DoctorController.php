<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.users.doctor.index', [
            "users" => User::role('doctor')->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('patient.users.doctor.show', [
            'user' => $user
        ]);
    }

    public function appointmentIndex(User $user)
    {
        return view('patient.appointment.index', [
            'appointments' => Appointment::where(['doctor_id' => $user->id, 'patient_id' => auth()->user()->id])->with('doctor', 'patient', 'doctorCategory')->get()
        ]);
    }
}

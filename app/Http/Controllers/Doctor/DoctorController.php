<?php

namespace App\Http\Controllers\Doctor;

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
        return view('doctor.users.doctor.index', [
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
        return view('doctor.users.doctor.show', [
            'user' => $user
        ]);
    }

    public function appointmentIndex(User $user)
    {
        return view('doctor.appointment.index', [
            'appointments' => Appointment::where('doctor_id', $user->id)->with('doctor', 'patient', 'doctorCategory')->get()
        ]);
    }
}

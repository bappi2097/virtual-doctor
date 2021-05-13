<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorScheduleController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('patient.users.doctor.doctor-schedule.schedule', [
            'schedules' => $user->doctorSchedules()->get(),
            'user' => $user,
        ]);
    }

    public function schedule(User $user)
    {
        return $user->doctorSchedules()->get();
    }
}

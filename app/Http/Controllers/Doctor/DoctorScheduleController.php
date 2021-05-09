<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

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
        return view('doctor.users.doctor.doctor-schedule.schedule', [
            'schedules' => $user->doctorSchedules()->get(),
            'user' => $user,
        ]);
    }

    public function schedule(User $user)
    {
        return $user->doctorSchedules()->get();
    }
}

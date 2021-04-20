<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user->doctorSchedules()->get());
        return view('admin.users.doctor.doctor-schedule.schedule', [
            'schedules' => $user->doctorSchedules()->get(),
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'day' => 'required|array',
            'day.*' => 'required|string|in:satur,sun,mon,tues,wednes,thurs,fri',
            'start' => 'date_format:H:i',
            'end' => 'date_format:H:i|after:start',
        ]);
        foreach ($request->day as $day) {
            $doctorSchedule = DoctorSchedule::where(["user_id" => $user->id, "day" => $day]);
            if ($doctorSchedule->exists()) {
                $doctorSchedule = $doctorSchedule->first();
                $doctorSchedule->fill([
                    "start" => $request->start,
                    "end" => $request->end,
                ]);
            } else {
                $doctorSchedule = new DoctorSchedule([
                    "user_id" => $user->id,
                    "day" => $day,
                    "start" => $request->start,
                    "end" => $request->end,
                ]);
            }
            // dd($day);
            if ($doctorSchedule->save()) {
                Toastr::success('Successfully Doctor Schedule Added', "Success");
            } else {
                Toastr::error('Something Went Wrong!', "Error");
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        if ($doctorSchedule->delete()) {
            Toastr::success('Successfully Doctor Category Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.patient.index', [
            "users" => User::role('patient')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.patient.create');
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
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "user_name" => "required|string|unique:users,user_name",
            "phone_no" => "required|string|max:25",
            "password" => "required|string|min:8|max:25|confirmed",
            "image" => "nullable|file",
            "address" => "required|string",
            "blood" => "required|string|in:a+,a-,b+,b-,ab+,ab-,o+,o-",
            "gender" => "required|string|in:male,female",
        ]);
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "phone_no" => $request->phone_no,
            "user_name" => $request->user_name,
            "blood" => $request->blood,
            "gender" => $request->gender,
            "address" => $request->address,
            "password" => bcrypt($request->password),
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk("local")->put("images\\patients", $request->image);
        }
        $user = new User($data);
        if ($user->save()) {
            $user->assignRole("patient");
            Toastr::success('Successfully Patient Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.patient.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.patient.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $user->id,
            "user_name" => "required|string|unique:users,user_name," . $user->id,
            "phone_no" => "required|string|max:25",
            "image" => "nullable|file",
            "address" => "required|string",
            "blood" => "required|string|in:a+,a-,b+,b-,ab+,ab-,o+,o-",
            "gender" => "required|string|in:male,female",
        ]);

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "phone_no" => $request->phone_no,
            "blood" => $request->blood,
            "gender" => $request->gender,
            "user_name" => $request->user_name,
            "address" => $request->address,
        ];

        if ($request->ban == 'on' && !$user->hasRole('ban')) {
            $user->assignRole('ban');
        }

        if (empty($request->ban) && $user->hasRole('ban')) {
            $user->removeRole('ban');
        }

        if ($request->hasFile('image')) {
            if (Storage::disk("local")->exists($user->image)) {
                Storage::disk("local")->delete($user->image);
            }
            $data['image'] = Storage::disk("local")->put("images\\patients", $request->image);
        }

        if ($user->update($data)) {
            Toastr::success('Successfully Patient Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, User $user)
    {
        $this->validate($request, [
            "password" => "required|string|min:8|max:25|confirmed",
        ]);
        $data = [
            "password" => bcrypt($request->password),
        ];

        if ($user->update($data)) {
            Toastr::success('Successfully Password Changed', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Storage::disk("local")->exists($user->image)) {
            Storage::disk("local")->delete($user->image);
        }
        if ($user->delete()) {
            Toastr::success('Successfully Patient Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
    /**
     * add role ban to user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return true|false
     */

    public function ban(Request $request)
    {
        $user = User::role('patient')->where('id', $request->id)->first();
        if ($request->ban == 'true') {
            $user->removeRole('ban');
            return true;
        } else {
            $user->assignRole('ban');
            return false;
        }
    }

    public function appointmentIndex(User $user)
    {
        return view('admin.appointment.index', [
            'appointments' => Appointment::where('patient_id', $user->id)->with('doctor', 'patient', 'doctorCategory')->get()
        ]);
    }
}

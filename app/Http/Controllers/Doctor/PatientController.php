<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Report;
use App\Models\Appointment;
use App\Models\DailyHealth;
use App\Models\Prescription;
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
        return view('doctor.users.patient.index', [
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
        return view('doctor.users.patient.create');
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
        return view('doctor.users.patient.show', [
            'user' => $user
        ]);
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
            return "true";
        } else {
            $user->assignRole('ban');
            return "false";
        }
    }

    public function appointmentIndex(User $user)
    {
        return view('doctor.appointment.index', [
            'appointments' => Appointment::where('patient_id', $user->id)->with('doctor', 'patient', 'doctorCategory')->get()
        ]);
    }

    /**
     * Display specific user Health 
     *
     * @param  App\Models\User $user
     * @return App\Models\DailyHealth $healths
     */
    public function healths(User $user)
    {
        return view('doctor.health.index', [
            'healths' => DailyHealth::where('patient_id', $user->id)->with('patient')->get()
        ]);
    }

    /**
     * Display specific user report
     *
     * @param  App\Models\User $user
     * @return App\Models\Report $reports
     */
    public function reports(User $user)
    {
        return view('doctor.report.index', [
            'reports' => Report::where('patient_id', $user->id)->with('patient')->get()
        ]);
    }

    /**
     * Display specific user prescriptions
     *
     * @param  App\Models\User $user
     * @return App\Models\Prescription $prescriptions
     */
    public function prescriptions(User $user)
    {
        return view('doctor.prescription.index', [
            'prescriptions' => Prescription::where('patient_id', $user->id)->with('doctor', 'patient', 'appointment')->get()
        ]);
    }
}

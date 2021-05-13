<?php

namespace App\Http\Controllers\Patient;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use App\Http\Controllers\Controller;

class DoctorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("patient.doctor-category.index", [
            "doctorCategories" => DoctorCategory::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorCategory  $doctorCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorCategory $doctorCategory)
    {
        return view('patient.doctor-category.show', [
            'doctorCategory' => $doctorCategory
        ]);
    }

    public function doctorIndex($slug)
    {
        return view("patient.users.doctor.index", [
            "users" => DoctorCategory::where("slug", $slug)->first()->doctors()
        ]);
    }

    public function appointmentIndex(DoctorCategory $doctorCategory)
    {
        return view('patient.appointment.index', [
            'appointments' => Appointment::where(['doctor_category_id' => $doctorCategory->id, 'patient_id' => auth()->user()->id])->with('doctor', 'patient', 'doctorCategory')->get()
        ]);
    }
}

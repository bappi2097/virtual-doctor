<?php

namespace App\Http\Controllers\Doctor;

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
        return view("doctor.doctor-category.index", [
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
        return view('doctor.doctor-category.show', [
            'doctorCategory' => $doctorCategory
        ]);
    }

    public function doctorIndex($slug)
    {
        return view("doctor.users.doctor.index", [
            "users" => DoctorCategory::where("slug", $slug)->with('doctors')->first()->doctors
        ]);
    }

    public function appointmentIndex(DoctorCategory $doctorCategory)
    {
        return view('doctor.appointment.index', [
            'appointments' => Appointment::where('doctor_category_id', $doctorCategory->id)->with('doctor', 'patient', 'doctorCategory')->get()
        ]);
    }
}

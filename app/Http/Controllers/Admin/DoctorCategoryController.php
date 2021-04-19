<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class DoctorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.doctor-category.index", [
            "doctorCategories" => DoctorCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor-category.create');
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
            "image" => "required|file",
            "description" => "required|string",
        ]);

        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk("local")->put("images\\doctor-categories", $request->image);
        }

        $doctorCategory = new DoctorCategory($data);

        if ($doctorCategory->save()) {
            Toastr::success('Successfully Doctor Category Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorCategory  $doctorCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorCategory $doctorCategory)
    {
        return view('admin.doctor-category.show', [
            'doctorCategory' => $doctorCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorCategory  $doctorCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorCategory $doctorCategory)
    {
        return view('admin.doctor-category.edit', [
            'doctorCategory' => $doctorCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorCategory  $doctorCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorCategory $doctorCategory)
    {
        $this->validate($request, [
            "name" => "required|string|max:255",
            "image" => "nullable|file",
            "description" => "required|string",
        ]);

        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];


        if ($request->hasFile('image')) {
            if (Storage::disk("local")->exists($doctorCategory->image)) {
                Storage::disk("local")->delete($doctorCategory->image);
            }
            $data['image'] = Storage::disk("local")->put("images\\doctor-categories", $request->image);
        }

        if ($doctorCategory->update($data)) {
            Toastr::success('Successfully Doctor Category Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorCategory  $doctorCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorCategory $doctorCategory)
    {
        if (Storage::disk("local")->exists($doctorCategory->image)) {
            Storage::disk("local")->delete($doctorCategory->image);
        }
        if ($doctorCategory->delete()) {
            Toastr::success('Successfully Doctor Category Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

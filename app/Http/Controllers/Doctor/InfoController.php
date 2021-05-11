<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.info.index', [
            'infos' => Info::with('createdBy', 'tags')->where('created_by', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.info.create');
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
            'title' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'details' => 'required|string',
            'tag' => 'required|string'
        ]);
        $data = [
            'title' => $request->title,
            'address' => $request->address,
            'phone' => $request->phone,
            'details' => $request->details,
            'is_active' => true,
            'created_by' => auth()->user()->id,
        ];
        $info = new Info($data);
        if ($info->save()) {
            $info->attachTag($request->tag);
            Toastr::success('Successfully Information Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        return view('doctor.info.show', [
            'info' => $info
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        $info->loadMissing('tags');
        return view('doctor.info.edit', [
            'info' => $info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'details' => 'required|string',
            'tag' => 'required|string'
        ]);
        $data = [
            'title' => $request->title,
            'address' => $request->address,
            'phone' => $request->phone,
            'details' => $request->details,
        ];
        $info->fill($data);
        if ($info->save()) {
            $info->attachTag($request->tag);
            Toastr::success('Successfully Information Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        if ($info->delete()) {
            Toastr::success('Successfully Information Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Patient;

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
        return view('patient.info.index', [
            'infos' => Info::with('createdBy', 'tags')->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        return view('patient.info.show', [
            'info' => $info
        ]);
    }
}

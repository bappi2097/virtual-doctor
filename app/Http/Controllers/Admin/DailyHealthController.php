<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyHealth;
use Illuminate\Http\Request;

class DailyHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.health.index', [
            'healths' => DailyHealth::with('patient')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.health.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function show(DailyHealth $dailyHealth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyHealth $dailyHealth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyHealth $dailyHealth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyHealth $dailyHealth)
    {
        //
    }
}

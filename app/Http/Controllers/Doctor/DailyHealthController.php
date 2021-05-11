<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\DailyHealth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DailyHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.health.index', [
            'healths' => DailyHealth::with('patient')->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $patient
     * @return \Illuminate\Http\Response
     */
    public function single(User $patient)
    {
        return view('doctor.health.index', [
            'healths' => DailyHealth::where('patient_id', $patient->id)->with('patient')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.health.create');
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
            'patient_id' => 'required|exists:users,id',
            'heart_beat' => 'required|numeric',
            'pressure' => 'required|array',
            'pressure.*' => 'required|numeric',
            'sugar' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'bmi' => 'nullable|numeric',
        ]);

        $data = [
            'patient_id' => $request->patient_id,
            'heart_beat' => $request->heart_beat,
            'pressure' => json_encode([
                'low' => $request->pressure[0],
                'high' => $request->pressure[1],
            ]),
            'sugar' => $request->sugar ?: null,
            'extra' => null
        ];
        if (empty($request->bmi)) {
            $health = DailyHealth::where('patient_id', $request->patient_id);

            if ($health->exists()) {
                $health = $health->latest()->first();
                $data['extra'] = json_encode([
                    'height' => $health->extra('height'),
                    'weight' => $health->extra('weight'),
                    'bmi' => $health->extra('bmi'),
                ]);
            }
        } else {
            $data['extra'] = json_encode([
                'height' => $request->height ?: null,
                'weight' => $request->weight ?: null,
                'bmi' => $request->bmi ?: null,
            ]);
        }

        $dailyHealth = new DailyHealth($data);
        if ($dailyHealth->save()) {
            Toastr::success('Successfully Daily health report Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function show(DailyHealth $dailyHealth)
    {
        $dailyHealth->loadMissing('patient');
        return view('doctor.health.show', [
            'dailyHealth' => $dailyHealth
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyHealth $dailyHealth)
    {
        return view('doctor.health.edit', [
            'dailyHealth' => $dailyHealth
        ]);
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
        $this->validate($request, [
            'heart_beat' => 'required|numeric',
            'pressure' => 'required|array',
            'pressure.*' => 'required|numeric',
            'sugar' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'bmi' => 'nullable|numeric',
        ]);

        $data = [
            'heart_beat' => $request->heart_beat,
            'pressure' => json_encode([
                'low' => $request->pressure[0],
                'high' => $request->pressure[1],
            ]),
            'sugar' => $request->sugar ?: null,
            'extra' => null
        ];
        if (empty($request->bmi)) {
            $health = DailyHealth::where('patient_id', $request->patient_id);

            if ($health->exists()) {
                $health = $health->latest()->first();
                $data['extra'] = json_encode([
                    'height' => $health->extra('height'),
                    'weight' => $health->extra('weight'),
                    'bmi' => $health->extra('bmi'),
                ]);
            }
        } else {
            $data['extra'] = json_encode([
                'height' => $request->height ?: null,
                'weight' => $request->weight ?: null,
                'bmi' => $request->bmi ?: null,
            ]);
        }

        $dailyHealth->fill($data);
        if ($dailyHealth->save()) {
            Toastr::success('Successfully Daily health report updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyHealth  $dailyHealth
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyHealth $dailyHealth)
    {
        if ($dailyHealth->delete()) {
            Toastr::success('Successfully Daily health report deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

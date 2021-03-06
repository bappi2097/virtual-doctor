<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\Report;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.report.index', [
            'reports' => Report::with('patient')->where('patient_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.report.create');
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
            'description' => 'nullable|string',
            'file_name' => 'required|array',
            'file_name.*' => 'required|string',
            'file' => 'required|array',
            'file.*' => 'required|file',
        ]);
        $report = new Report();
        $report->patient_id = auth()->user()->id;
        $report->title = $request->title;
        $report->description = $request->description;
        if ($report->save()) {
            foreach ($request->file as $index => $file) {
                if ($request->hasFile('file')) {
                    $data['path'] = Storage::disk("local")->put("reports", $file);
                }
                $data['file_name'] = $request->file_name[$index];
                $data['patient_id'] = $report->patient_id;
                $report->documents()->save(new Document($data));
            }
            Toastr::success('Successfully report Added', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $report->loadMissing('documents');
        return view('patient.report.show', [
            'report' => $report,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $report->loadMissing(['documents', 'patient']);
        return view('patient.report.edit', [
            'report' => $report,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $report->loadMissing('documents');
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $report->patient_id = auth()->user()->id;
        $report->title = $request->title;
        $report->description = $request->description;
        if ($report->save()) {
            foreach ($report->documents as $document) {
                $document->patient_id = auth()->user()->id;
                $document->save();
            }
            Toastr::success('Successfully report Updated', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->loadMissing(['documents', 'patient']);
        foreach ($report->documents as $document) {
            if (Storage::disk("local")->exists($document->path)) {
                Storage::disk("local")->delete($document->path);
            }
        }
        $report->documents()->delete();
        if ($report->delete()) {
            Toastr::success('Successfully report Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    public function downloadDocument(Document $document)
    {
        return response()->download($document->path, $document->file_name);
    }
}

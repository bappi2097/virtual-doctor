<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Report;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Report $report)
    {
        $this->validate($request, [
            'file_name' => 'required|array',
            'file_name.*' => 'required|string',
            'file' => 'required|array',
            'file.*' => 'required|file',
        ]);

        foreach ($request->file as $index => $file) {
            $document = new Document();
            if ($request->hasFile('file')) {
                $document->path = Storage::disk("local")->put("reports", $file);
            }
            $document->report_id = $report->id;
            $document->patient_id = $report->patient->id;
            $document->file_name = $request->file_name[$index];
            $document->save();
        }
        Toastr::success('Successfully Document Added', "Success");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if (Storage::disk("local")->exists($document->path)) {
            Storage::disk("local")->delete($document->path);
        }
        if ($document->delete()) {
            Toastr::success('Successfully Document Deleted', "Success");
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}

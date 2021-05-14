@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.report.show', $report->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('patient.reports.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $report->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $report->description }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($report->documents as $item)
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body shadow">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <a href="{{ asset($item->path) }}" target="_blank"
                                                                        title="view document">
                                                                        <h5> {{ $item->file_name }}
                                                                        </h5>
                                                                    </a>
                                                                </div>
                                                                <div class="col-3">
                                                                    <a href="{{ route('patient.reports.download-document', $item->id) }}"
                                                                        class="btn btn-outline-info btn-sm rounded-circle">
                                                                        <span class="display-6">
                                                                            <i class="mdi mdi-download"></i>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection

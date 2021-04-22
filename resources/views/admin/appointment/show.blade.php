@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.appointment.show', $appointment->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.appointments.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Doctor Category</td>
                                                    <td>{{ $appointment->doctorCategory->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Doctor</td>
                                                    <td>{{ $appointment->doctor->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td rowspan="2">Patient</td>
                                                    <td>{{ $appointment->patient->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $appointment->patient->email }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Date</td>
                                                    <td>{{ date('l F j, Y', strtotime($appointment->day)) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Start-End</td>
                                                    <td>
                                                        {{ date('g:i A', strtotime($appointment->start)) . '-' . date('g:i A', strtotime($appointment->end)) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div> <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-horizontal form-material mx-2">
                                            {!! $appointment->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Column -->
                        </div>
                        <div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ============================================================== -->
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

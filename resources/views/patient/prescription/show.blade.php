@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.prescription.show', $prescription->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('patient.prescriptions.index') }}" class="btn waves-effect waves-light btn-info">
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
                                                    <td rowspan="2">Doctor</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('patient.users.doctor.show', $prescription->doctor->id) }}">{{ $prescription->doctor->name }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $prescription->doctor->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center">Appointment</td>
                                                </tr>

                                                <tr>
                                                    <td>Date</td>
                                                    <td>{{ date('l F j, Y', strtotime($prescription->appointment->day)) }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Start-End</td>
                                                    <td>
                                                        {{ date('g:i A', strtotime($prescription->appointment->start)) . '-' . date('g:i A', strtotime($prescription->appointment->end)) }}
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
                                            {!! $prescription->description !!}
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

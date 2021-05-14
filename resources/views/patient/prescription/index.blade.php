@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.prescription'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Doctor</th>
                                        <th class="border-top-0">Appointment</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prescriptions as $item)
                                        <tr>
                                            <td>{{ $item->doctor->name . ' ( ' . $item->doctor->user_name . ' ) ' }}</td>
                                            <td>{{ $item->patient->name . ' ( ' . $item->patient->user_name . ' ) ' }}
                                            </td>
                                            <td>{{ date('l F j, Y', strtotime($item->appointment->day)) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('patient.prescriptions.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

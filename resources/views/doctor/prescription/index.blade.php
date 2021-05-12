@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.prescription'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('doctor.prescriptions.create') }}"
                            class="btn waves-effect waves-light btn-info">Add
                            Data</a>
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Doctor</th>
                                        <th class="border-top-0">Patient</th>
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
                                                    <a href="{{ route('doctor.prescriptions.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('doctor.prescriptions.edit', $item->id) }}"
                                                        class="btn btn-info text-white mx-2" title="edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('doctor.prescriptions.delete', $item->id) }}"
                                                        class="btn btn-danger text-white mx-2" title="delete"
                                                        onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <form id="delete-item{{ $item->id }}"
                                                        action="{{ route('doctor.prescriptions.delete', $item->id) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
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

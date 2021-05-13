@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.doctor-category'))

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
                                        <th class="border-top-0">Image</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctorCategories as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <img src="{{ asset($item->image ?: 'assets/images/doctor-category/undraw_doctor_kw5l.svg') }}"
                                                            alt="users" class="rounded-circle" width="90" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('patient.doctor-category.appointment-index', $item->id) }}"
                                                        class="btn btn-secondary" title="appointment">
                                                        <i class="mdi mdi-calendar-check"></i>
                                                    </a>
                                                    <a href="{{ route('patient.doctor-category.show', $item->id) }}"
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

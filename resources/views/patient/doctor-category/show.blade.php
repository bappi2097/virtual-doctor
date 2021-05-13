@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.doctor-category.show', $doctorCategory->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.doctor-category.index') }}"
                            class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('admin.doctor-category.doctor.doctor-index', $doctorCategory->slug) }}"
                            class="btn waves-effect waves-light btn-info mx-2">
                            <i class="mdi mdi-eye"></i> Doctors
                        </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <center class="m-t-30">
                                            <img src="{{ asset($doctorCategory->image ?: 'assets/images/doctor-category/undraw_doctor_kw5l.svg') }}"
                                                class="img-fluid" style="width: 50%" />
                                            <h4 class="card-title m-t-10">{{ $doctorCategory->name }}</h4>

                                        </center>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <small class="text-muted">Description </small>
                                        <h6>{{ $doctorCategory->description }}</h6>
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

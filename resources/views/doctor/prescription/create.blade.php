@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.prescription.create'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('doctor.prescriptions.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <a href="{{ route('doctor.prescriptions.index') }}"
                                class="btn waves-effect waves-light btn-info">
                                <i class="mdi mdi-arrow-left"></i> Back
                            </a>
                            <br>
                            <hr><br>
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30">
                                                <img id="user-image" class="img-fluid rounded"
                                                    src="{{ asset('dist/image/undraw_medical_care_movn.svg') }}"
                                                    alt="your image" />
                                            </center>
                                        </div>
                                        <div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label for="doctor_id">Doctor</label>
                                                    <select name="doctor_id" id="doctor_id"
                                                        class="form-control form-control-line selectpicker">
                                                        @foreach (App\Models\User::role('doctor')->get() as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="patient_id">Patient</label>
                                                    <select name="patient_id" id="patient_id"
                                                        class="form-control form-control-line selectpicker">
                                                        @foreach (App\Models\User::role('patient')->get() as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="appointment_id">Appointment</label>
                                                    <select name="appointment_id" id="appointment_id"
                                                        class="form-control form-control-line selectpicker">
                                                        @foreach (App\Models\Appointment::with('doctor', 'patient')->get() as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->doctor->name . ' | ' . $item->patient->name . ' | ' . date('l F j, Y', strtotime($item->day)) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-md-12">Description</label>
                                                    <div class="col-md-12">
                                                        <textarea name="description" id="description" cols="30" rows="10"
                                                            class="form-control form-control-line summernote"
                                                            required></textarea>
                                                        @error('description')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-info text-white">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Column -->
                            </div>
                        </div>
                    </form>
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

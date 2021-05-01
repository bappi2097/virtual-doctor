@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.health.create'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.healths.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <a href="{{ route('admin.healths.index') }}" class="btn waves-effect waves-light btn-info">
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
                                                <img id="user-image" alt="doctor category images" width="250"
                                                    src="{{ asset('dist/image/undraw_doctors_hwty.svg') }}" />
                                            </center>
                                        </div>
                                        <div>
                                            <hr>
                                        </div>
                                    </div>
                                </div> <!-- Column -->
                                <!-- Column -->
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label class="col-md-12" for="patient_id">Patient</label>
                                                    <div class="col-md-12">
                                                        <select name="patient_id" id="patient_id"
                                                            class="form-control form-control-line selectpicker" required>
                                                            @foreach (\App\Models\User::role('patient')->get() as $item)
                                                                <option value="{{ $item->id }}" @if (!empty($patient)) {{ selected($item->id, $patient->id) }} @endif>
                                                                    {{ $item->user_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('patient_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="heart_beat" class="col-md-12">Heart Beat (in BPM)</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="heart_beat" placeholder="72"
                                                            class="form-control form-control-line" min="0" max="200"
                                                            required>
                                                        @error('heart_beat')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pressure_high" class="col-md-12">Blood Pressure</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="number" name="pressure[]" id="pressure_high"
                                                                class="form-control form-control-line" placeholder="80"
                                                                min="0" max="200" required>
                                                            @error('pressure')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="pressure[]" id="pressure_low"
                                                                class="form-control form-control-line" placeholder="120"
                                                                min="0" max="200" required>
                                                            @error('pressure')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sugar" class="col-md-12">Blood Sugar (in mg/dl) <span
                                                            class="text-warning">(optional)</span></label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="sugar"
                                                            class="form-control form-control-line" placeholder="5.2" min="0"
                                                            max="50" step=".01">
                                                        @error('sugar')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label> BMI (<span class="text-warning">Leave Empty if not
                                                            changed</span>)</label>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="height" class="col-md-12">Height (in cm)</label>
                                                            <div class="col-md-12">
                                                                <input type="number" name="height"
                                                                    class="form-control form-control-line" placeholder="170"
                                                                    id="height" min="0" max="250" step=".01">
                                                                @error('height')
                                                                    <span class="text-danger">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="width" class="col-md-12">Weight (in kg)</label>
                                                            <div class="col-md-12">
                                                                <input type="number" name="weight"
                                                                    class="form-control form-control-line" placeholder="68"
                                                                    id="weight" min="0" max="200" step=".01">
                                                                @error('width')
                                                                    <span class="text-danger">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bmi" class="col-md-12">BMI</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="bmi" class="form-control form-control-line"
                                                            placeholder="22" readonly id="bmi">
                                                        @error('bmi')
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
@push('script')
    <script>
        $(window).ready(() => {
            $('#height').on('input', () => {
                let height = $('#height').val();
                let weight = $('#weight').val();
                if (height && weight) {
                    let bmi = weight / ((height * height) / 10000);
                    $('#bmi').val(bmi.toFixed(2));
                }
            });
            $('#weight').on('input', () => {
                let height = $('#height').val();
                let weight = $('#weight').val();
                if (height && weight) {
                    let bmi = weight / ((height * height) / 10000);
                    $('#bmi').val(bmi.toFixed(2));
                }
            });
        });

    </script>
@endpush

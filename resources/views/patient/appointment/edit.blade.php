@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.appointment.edit', $appointment->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('patient.appointments.update', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <a href="{{ route('patient.appointments.index') }}"
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
                                                    src="{{ asset('assets/images/Calendar.svg') }}" alt="your image" />
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
                                                    <label for="doctor-category" class="col-md-12">Doctor Category</label>
                                                    <div class="col-md-12">
                                                        <select name="doctor_category_id" id="doctor-category"
                                                            class="form-control form-control-line selectpicker" required>
                                                            <option>Select Category</option>
                                                            @foreach ($doctorCategories as $item)
                                                                <option value="{{ $item['id'] }}"
                                                                    {{ selected($appointment->doctor_category_id, $item['id']) }}>
                                                                    {{ $item['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('doctor_category_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="doctor" class="col-md-12">Doctor</label>
                                                    <div class="col-md-12">
                                                        <select name="doctor_id" id="doctor"
                                                            class="form-control form-control-line selectpicker" required>
                                                            <option selected>Select Doctor</option>
                                                            @foreach ($doctorCategories as $doctorCategory)
                                                                @foreach ($doctorCategory['doctors'] as $item)
                                                                    <option value="{{ $item['id'] }}"
                                                                        {{ selected($appointment->doctor_id, $item['id']) }}>
                                                                        {{ $item['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                        @error('doctor_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-md-12">Description</label>
                                                    <div class="col-md-12">
                                                        <textarea name="description" id="description" cols="30" rows="10"
                                                            class="form-control form-control-line summernote"> {!! $appointment->description !!} </textarea>
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
@push('script')
    <script>
        $(document).ready(() => {

            let data = {!! json_encode($doctorCategories) !!};

            $('#doctor-category').on('input', (e) => {
                $('#doctor').empty();
                $('#doctor').append(
                    `<option selected>Select Doctor</option>`
                );

                if ($(e.target).val() != 'Select Category') {

                    let category_id = parseInt($(e.target).val());

                    filter_data = data.filter(item => item.id === category_id);

                    filter_data[0].doctors.forEach(element => {
                        $('#doctor').append(
                            `<option value='${element.id}'>${element.name}</option>`
                        );
                    });

                } else {
                    data.forEach(item => {
                        item.doctors.forEach(element => {
                            $('#doctor').append(
                                `<option value='${element.id}'>${element.name}</option>`
                            );
                        });
                    });
                }
            });
        });

    </script>

@endpush

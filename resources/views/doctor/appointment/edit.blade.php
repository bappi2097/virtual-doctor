@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.appointment.edit', $appointment->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('doctor.appointments.index') }}" class="btn waves-effect waves-light btn-info">
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
                                    <div class="d-flex justify-content-around">
                                        @if ($appointment->status == 'request')
                                            <form action="{{ route('doctor.appointments.accepted', $appointment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-group">
                                                    <label for="notification" class="label">Notification</label>
                                                    <textarea name="notification" id="notification"
                                                        class="form-control summernote"></textarea>
                                                </div>
                                                <div class="input-form my-2">
                                                    <input name="status" data-onstyle="info" data-offstyle="light" checked
                                                        data-on="Accepted" class="toggle" type="checkbox"
                                                        data-toggle="toggle" data-off="Rejected" data-width="100" />
                                                </div>
                                                <button class="btn btn-primary">Update</button>
                                            </form>
                                        @endif
                                        @if ($appointment->status == 'accepted')
                                            <form action="{{ route('doctor.appointments.completed', $appointment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success">Completed</button>
                                            </form>
                                        @endif
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
                                        <div class="form-horizontal form-material mx-2">
                                            <form action="{{ route('doctor.appointments.update', $appointment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
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
                                                    <label for="patient" class="col-md-12">Patient</label>
                                                    <div class="col-md-12">
                                                        <select name="patient_id" id="patient"
                                                            class="form-control form-control-line selectpicker" required>
                                                            <option selected>Select Patient</option>
                                                            @foreach ($patients as $item)
                                                                <option value="{{ $item['id'] }}"
                                                                    {{ selected($appointment->patient_id, $item['id']) }}>
                                                                    {{ $item['email'] }}
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
                                                    <label for="day" class="col-md-12">Date</label>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control form-control-line" name="day"
                                                            value="{{ date('Y-m-d', strtotime($appointment->day)) }}"
                                                            id="day" required>
                                                        @error('day')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="start" class="col-md-12">Start Time</label>
                                                    <div class="col-md-12">
                                                        <input type="time" name="start" id="start" placeholder="09:00 AM"
                                                            class="form-control form-control-line" min="09:00" max="21:00"
                                                            value="{{ date('H:i', strtotime($appointment->start)) }}"
                                                            step="1800" required>
                                                        @error('start')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="end" class="col-md-12">End Time</label>
                                                    <div class="col-md-12">
                                                        <input type="time" name="end" id="end" placeholder="06:30 PM"
                                                            class="form-control form-control-line" min="09:00" max="21:00"
                                                            value="{{ date('H:i', strtotime($appointment->end)) }}"
                                                            step="1800" required>
                                                        @error('end')
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
                                                    <label for="notification" class="col-md-12">Notification</label>
                                                    <textarea name="notification" id="notification"
                                                        class="form-control summernote">{!! $appointment->notification !!} </textarea>
                                                    @error('notification')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-info text-white">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Column -->
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
            $('#start').on('input', (e) => {
                $('#end').val(moment.utc(e.target.value, 'HH:mm').add(30, 'minutes').format('HH:mm'));
            });
        });

    </script>

@endpush

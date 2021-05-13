@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.dashboard'))

@section('content')

    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @php
                        $dailyHealth = App\Models\DailyHealth::where('patient_id', auth()->user()->id)->first();
                    @endphp
                    @empty($dailyHealth)
                        <h4>Please Insert <a href="{{ route('patient.healths.create') }}"> Health Data</a></h4>
                    @else
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            <div class="round align-self-center round-danger">
                                                <i class="mdi mdi-heart-pulse"></i>
                                            </div>
                                            <div class="ml-3 align-self-center text-center">
                                                <h3 class="mb-0">{{ $dailyHealth->heart_beat }} bpm</h3>
                                                <span class="text-muted">Heart Beat</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            <div class="round align-self-center round-warning">
                                                <i class="mdi mdi-water"></i>
                                            </div>
                                            <div class="ml-3 align-self-center text-center">
                                                <h3 class="mb-0">
                                                    {{ $dailyHealth->sugar }} mg/dl
                                                </h3>
                                                <span class="text-muted">Blood Sugar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            <div class="round align-self-center round-info">
                                                <i class="mdi mdi-speedometer"></i>
                                            </div>
                                            <div class="ml-3 align-self-center text-center">
                                                <h3 class="mb-0">{{ $dailyHealth->extra('bmi') }}</h3>
                                                <span class="text-muted">BMI</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            <div class="round align-self-center round-danger">
                                                <i class="mdi mdi-water"></i>
                                            </div>
                                            <div class="ml-3 align-self-center text-center">
                                                <h3 class="mb-0">
                                                    {{ $dailyHealth->pressure('low') . '/' . $dailyHealth->pressure('high') }}
                                                </h3>
                                                <span class="text-muted">Blood Pressure</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endempty
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Daily Health</h4>
                            <h5 class="card-subtitle">
                                Overview of Daily Health
                            </h5>
                        </div>
                    </div>
                    <a href="/" class="btn btn-info float-end">Add Health</a>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle" id="doctor">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Heart</th>
                                <th class="border-top-0">Pressure</th>
                                <th class="border-top-0">Sugar</th>
                                <th class="border-top-0">BMI</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\DailyHealth::with('patient')->where('patient_id', auth()->user()->id)->latest()->get()
        as $item)
                                <tr>
                                    <td>{{ $item->heart_beat }}</td>
                                    <td>{{ $item->pressure('low') . ' / ' . $item->pressure('high') }}</td>
                                    <td>{{ $item->sugar }}</td>
                                    <td>
                                        {{ $item->extra() }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.healths.show', $item->id) }}"
                                                class="btn btn-success text-white mx-2" title="show">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.healths.edit', $item->id) }}"
                                                class="btn btn-info text-white mx-2" title="edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.healths.delete', $item->id) }}"
                                                class="btn btn-danger text-white mx-2" title="delete"
                                                onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="delete-item{{ $item->id }}"
                                                action="{{ route('admin.healths.delete', $item->id) }}" method="POST"
                                                class="d-none">
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
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Appointment</h4>
                            <h5 class="card-subtitle">
                                Overview of Appointment
                            </h5>
                        </div>
                    </div>
                    <a href="/" class="btn btn-info float-end">Book Appointment</a>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle" id="patient">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Category</th>
                                <th class="border-top-0">Doctor</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Start-End</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->patientAppointments()->orderBy('day', 'DESC')->orderBy('start', 'ASC')->get()
        as $item)
                                <tr>
                                    <td>{{ $item->doctorCategory->name }}</td>
                                    <td>{{ $item->doctor->name }}</td>
                                    <td>{{ date('l F j, Y', strtotime($item->day)) }}</td>
                                    <td>{{ date('g:i A', strtotime($item->start)) . '-' . date('g:i A', strtotime($item->end)) }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.appointments.show', $item->id) }}"
                                                class="btn btn-success text-white mx-2" title="show">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.appointments.edit', $item->id) }}"
                                                class="btn btn-info text-white mx-2" title="edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.appointments.delete', $item->id) }}"
                                                class="btn btn-danger text-white mx-2" title="delete"
                                                onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="delete-item{{ $item->id }}"
                                                action="{{ route('admin.appointments.delete', $item->id) }}"
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
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2">
                            <img src="../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle" />
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and
                                type setting industry.
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <span class="label label-rounded label-primary">Pending</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <img src="../assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle" />
                        </div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">Michael Jorden</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and
                                type setting industry.
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <span class="label label-success label-rounded">Approved</span>
                                <span class="action-icons active">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                            <img src="../assets/images/users/5.jpg" alt="user" width="50" class="rounded-circle" />
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Johnathan Doeting</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and
                                type setting industry.
                            </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <span class="label label-rounded label-danger">Rejected</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temp Guide</h4>
                    <div class="d-flex align-items-center flex-row m-t-30">
                        <div class="display-5 text-info">
                            <i class="wi wi-day-showers"></i>
                            <span>73<sup>°</sup></span>
                        </div>
                        <div class="m-l-10">
                            <h3 class="m-b-0">Saturday</h3>
                            <small>Ahmedabad, India</small>
                        </div>
                    </div>
                    <table class="table no-border mini-table m-t-20">
                        <tbody>
                            <tr>
                                <td class="text-muted">Wind</td>
                                <td class="font-medium">ESE 17 mph</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Humidity</td>
                                <td class="font-medium">83%</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Pressure</td>
                                <td class="font-medium">28.56 in</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Cloud Cover</td>
                                <td class="font-medium">78%</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="row list-style-none text-center m-t-30">
                        <li class="col-3">
                            <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                            <span class="d-block text-muted">09:30</span>
                            <h3 class="m-t-5">70<sup>°</sup></h3>
                        </li>
                        <li class="col-3">
                            <h4 class="text-info">
                                <i class="wi wi-day-cloudy"></i>
                            </h4>
                            <span class="d-block text-muted">11:30</span>
                            <h3 class="m-t-5">72<sup>°</sup></h3>
                        </li>
                        <li class="col-3">
                            <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                            <span class="d-block text-muted">13:30</span>
                            <h3 class="m-t-5">75<sup>°</sup></h3>
                        </li>
                        <li class="col-3">
                            <h4 class="text-info">
                                <i class="wi wi-day-sprinkle"></i>
                            </h4>
                            <span class="d-block text-muted">15:30</span>
                            <h3 class="m-t-5">76<sup>°</sup></h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
@endsection
@push('script')
    <script>
        $('#doctor').DataTable({
            "pageLength": 5
        });
        $('#patient').DataTable({
            "pageLength": 5
        });

    </script>
@endpush

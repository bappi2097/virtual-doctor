@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard'))

@section('content')

    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Appointment Summary</h4>
                            <h5 class="card-subtitle">Overview of Latest Month</h5>
                        </div>
                        <div class="ms-auto d-flex no-block align-items-center">
                            <ul class="list-inline font-12 dl m-r-15 m-b-0">
                                <li class="list-inline-item text-info">
                                    <i class="fa fa-circle"></i> Appointment
                                </li>
                                <li class="list-inline-item text-primary">
                                    <i class="fa fa-circle"></i> Registration
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12">
                            <div class="campaign ct-charts"></div>
                        </div>
                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Feeds</h4>
                    <div class="feed-widget">
                        <ul class="list-style-none feed-body m-0 p-b-20">
                            <li class="feed-item">
                                <div class="feed-icon bg-info">
                                    <i class="ti-user"></i>
                                </div>
                                {{ App\Models\User::newRegisteredUser('patient')->count() }} New Patient registered.<span
                                    class="ms-auto font-12 text-muted">From
                                    {{ date('l', strtotime(Carbon\Carbon::now()->subDays(7))) }}</span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-icon bg-warning">
                                    <i class="far fa-bell"></i>
                                </div>
                                New appointment taken
                                {{ App\Models\Appointment::where('created_at', '>', Carbon\Carbon::now()->subDays(7))->count() }}
                                <span class="ms-auto font-12 text-muted">From
                                    {{ date('l', strtotime(Carbon\Carbon::now()->subDays(7))) }}</span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-icon bg-success">
                                    <i class="ti-server"></i>
                                </div>
                                Active Users {{ (new App\Models\User())->allOnline()->count() }}
                                <span class="ms-auto font-12 text-muted">2 Hours ago</span>
                            </li>
                            <li class="feed-item">
                                <div class="feed-icon bg-danger">
                                    <i class="ti-user"></i>
                                </div>
                                {{ App\Models\User::newRegisteredUser('doctor')->count() }} New Doctor registered.<span
                                    class="ms-auto font-12 text-muted">From
                                    {{ date('l', strtotime(Carbon\Carbon::now()->subDays(7))) }}</span>
                            </li>
                        </ul>
                    </div>
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
                            <h4 class="card-title">Doctor</h4>
                            <h5 class="card-subtitle">
                                Overview of Doctor & Appointment
                            </h5>
                        </div>
                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle" id="doctor">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Doctor</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Category</th>
                                <th class="border-top-0">Appointments</th>
                                <th class="border-top-0">Complete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\User::role('doctor')->with(['doctorCategory', 'doctorAppointments', 'doctorCompletedAppointments'])->get()
        as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                @empty($user->image)
                                                    <a href="{{ route('admin.users.admin.show', $user->id) }}"
                                                        class="btn btn-circle d-flex btn-{{ randomColor() }}">
                                                        {{ substr($user->name, 0, 2) }}
                                                    </a>
                                                @else
                                                    <a class="" href="{{ route('admin.users.admin.show', $user->id) }}">
                                                        <img src="{{ asset($user->image ?: 'assets/images/users/male_avatar.svg') }}"
                                                            alt="users" class="rounded-circle" width="40" />
                                                    </a>
                                                @endempty
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">{{ $user->name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <label
                                            class="label label-{{ randomColor() }}">{{ $user->doctorCategory->name }}</label>
                                    </td>
                                    <td>{{ $user->doctorAppointments->count() }}</td>
                                    <td>{{ $user->doctorCompletedAppointments->count() }}</td>
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
                            <h4 class="card-title">Patient</h4>
                            <h5 class="card-subtitle">
                                Overview of Patient & Appointment
                            </h5>
                        </div>
                    </div>
                    <!-- title -->
                </div>
                <div class="table-responsive">
                    <table class="table v-middle" id="patient">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Patient</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Appointments</th>
                                <th class="border-top-0">Complete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\User::role('patient')->with(['patientAppointments', 'patientCompletedAppointments'])->get()
        as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                @empty($user->image)
                                                    <a href="{{ route('admin.users.admin.show', $user->id) }}"
                                                        class="btn btn-circle d-flex btn-{{ randomColor() }}">
                                                        {{ substr($user->name, 0, 2) }}
                                                    </a>
                                                @else
                                                    <a class="" href="{{ route('admin.users.admin.show', $user->id) }}">
                                                        <img src="{{ asset($user->image ?: 'assets/images/users/male_avatar.svg') }}"
                                                            alt="users" class="rounded-circle" width="40" />
                                                    </a>
                                                @endempty
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">{{ $user->name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->patientAppointments->count() }}</td>
                                    <td>{{ $user->patientCompletedAppointments->count() }}</td>
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

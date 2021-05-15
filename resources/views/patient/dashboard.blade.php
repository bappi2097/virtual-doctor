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
                            <h4 class="card-title">Appointment</h4>
                            <h5 class="card-subtitle">
                                Overview of Appointment
                            </h5>
                        </div>
                    </div>
                    <a href="{{ route('patient.appointments.create') }}" class="btn btn-info float-end">Book
                        Appointment</a>
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
                                            <a href="{{ route('patient.appointments.show', $item->id) }}"
                                                class="btn btn-success text-white mx-2" title="show">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="{{ route('patient.appointments.edit', $item->id) }}"
                                                class="btn btn-info text-white mx-2" title="edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="{{ route('patient.appointments.delete', $item->id) }}"
                                                class="btn btn-danger text-white mx-2" title="delete"
                                                onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="delete-item{{ $item->id }}"
                                                action="{{ route('patient.appointments.delete', $item->id) }}"
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
                    <a href="{{ route('patient.healths.create') }}" class="btn btn-info float-end">Add Health</a>
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
                                            <a href="{{ route('patient.healths.show', $item->id) }}"
                                                class="btn btn-success text-white mx-2" title="show">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="{{ route('patient.healths.edit', $item->id) }}"
                                                class="btn btn-info text-white mx-2" title="edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="{{ route('patient.healths.delete', $item->id) }}"
                                                class="btn btn-danger text-white mx-2" title="delete"
                                                onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            <form id="delete-item{{ $item->id }}"
                                                action="{{ route('patient.healths.delete', $item->id) }}" method="POST"
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
@endsection
@push('script')
    <script>
        $('#doctor').DataTable({
            "pageLength": 5,
        });
        $('#patient').DataTable({
            "pageLength": 5,
            "ordering": false
        });

    </script>
@endpush

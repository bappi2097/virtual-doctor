@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.schedule', $user->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-6 col-xlg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Day</th>
                                        <th class="border-top-0">Start</th>
                                        <th class="border-top-0">End</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td> {{ strtoupper(days($schedule->day)['name']) }} </td>
                                            <td>{{ date('g:i A', strtotime($schedule->start)) }}</td>
                                            <td>{{ date('g:i A', strtotime($schedule->end)) }}</td>
                                            <td class="">
                                                <a href="{{ route('admin.users.doctor.doctor-schedule.delete', $schedule->id) }}"
                                                    class="btn btn-danger text-white" title="delete"
                                                    onclick="event.preventDefault(); document.getElementById('delete-item{{ $schedule->id }}').submit();">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <form id="delete-item{{ $schedule->id }}"
                                                    action="{{ route('admin.users.doctor.doctor-schedule.delete', $schedule->id) }}"
                                                    method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-6 col-xlg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2"
                            action="{{ route('admin.users.doctor.doctor-schedule.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Day</label>
                                <div class="col-md-12">
                                    <select name="day[]" id="day" class="form-control form-control-line" multiple>
                                        @foreach (days() as $item)
                                            <option value="{{ $item['value'] }}"> {{ strtoupper($item['name']) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
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
                                        class="form-control form-control-line" min="09:00" max="21:00" step="600">
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
                                        class="form-control form-control-line" min="09:00" max="21:00" step="600">
                                    @error('end')
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
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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

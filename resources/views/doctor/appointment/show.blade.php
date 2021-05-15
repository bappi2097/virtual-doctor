@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.appointment.show', $appointment->id))

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
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $appointment->statusClass() }} text-uppercase">
                                                            {{ $appointment->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">Patient</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('doctor.users.patient.show', $appointment->patient->id) }}">{{ $appointment->patient->name }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $appointment->patient->email }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Date</td>
                                                    <td>{{ date('l F j, Y', strtotime($appointment->day)) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Start-End</td>
                                                    <td>
                                                        {{ date('g:i A', strtotime($appointment->start)) . '-' . date('g:i A', strtotime($appointment->end)) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div> <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-horizontal form-material mx-2">
                                            {!! $appointment->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Column -->
                            @if ($appointment->isShowable())
                                <div class="col-lg-6">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            Chat Box
                                        </div>
                                        <div class="card-body overflow-auto" style="height: 250px;">
                                            @foreach ($appointment->chats as $item)
                                                @if (auth()->user()->hasRole($item->type))
                                                    <div class="row">
                                                        <div class="col-12 d-flex align-items-center justify-content-end">
                                                            <div class="bg-light text-dark ms-5 rounded p-2 my-2 shadow">
                                                                {{ $item->text }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col-12 d-flex align-items-center">
                                                            <div>
                                                                <img src="{{ asset($item->patient->image) }}"
                                                                    class="img rounded-circle" style="width: 50px;" alt="">
                                                            </div>
                                                            <div class="bg-info text-white me-5 rounded p-2 my-2 shadow">
                                                                {{ $item->text }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="card-header">
                                            <form action="{{ route('doctor.chat.store', $appointment->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="input-group d-flex align-items-center justify-content-around">
                                                    <textarea name="chat" id="chat" class="form-control"
                                                        placeholder="Type a message..." required></textarea>
                                                    <button class="btn btn-lg btn-primary rounded-circle">
                                                        <i class="mdi mdi-send"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            Notification
                                        </div>
                                        <div class="card-body">
                                            {!! $appointment->notification !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="d-flex justify-content-around">
                                    @if ($appointment->status == 'request')
                                        <form action="{{ route('doctor.appointments.accepted', $appointment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="notification" class="label">Notification</label>
                                                <textarea name="notification" id="notification"
                                                    class="form-control summernote"></textarea>
                                                @error('notification')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-form my-2">
                                                <input name="status" data-onstyle="info" data-offstyle="light" checked
                                                    data-on="Accepted" class="toggle" type="checkbox" data-toggle="toggle"
                                                    data-off="Rejected" data-width="100" />
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
                            </div>
                        </div>
                        <div>
                            <hr>
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

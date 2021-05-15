@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.appointment.show', $appointment->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('patient.appointments.index') }}" class="btn waves-effect waves-light btn-info">
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
                                                    <td>Doctor Category</td>

                                                    <td>
                                                        <a
                                                            href="{{ route('patient.doctor-category.show', $appointment->doctorCategory->id) }}">{{ $appointment->doctorCategory->name }}</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td rowspan="2">Doctor</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('patient.users.doctor.show', $appointment->doctor->id) }}">{{ $appointment->doctor->name }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $appointment->doctor->email }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Date</td>
                                                    <td>{{ empty($appointment->day) ? 'Not Reviewed' : date('l F j, Y', strtotime($appointment->day)) }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Start-End</td>
                                                    <td>
                                                        {{ empty($appointment->start) ? 'Not Reviewed' : date('g:i A', strtotime($appointment->start)) . '-' . date('g:i A', strtotime($appointment->end)) }}
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
                                                                <img src="{{ asset($item->doctor->image) }}"
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
                                            <form action="{{ route('patient.chat.store', $appointment->id) }}"
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

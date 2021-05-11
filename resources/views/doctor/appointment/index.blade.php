@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.appointment'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('doctor.appointments.create') }}"
                            class="btn waves-effect waves-light btn-info">Add
                            Data</a>
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="appointment_table" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Patient</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Start-End</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $item)
                                        <tr>
                                            <td>{{ $item->patient->name }}</td>
                                            <td>{{ date('l F j, Y', strtotime($item->day)) }}</td>
                                            <td>{{ date('g:i A', strtotime($item->start)) . '-' . date('g:i A', strtotime($item->end)) }}
                                            </td>
                                            <td class="text-uppercase">{{ $item->status }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('doctor.appointments.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('doctor.appointments.edit', $item->id) }}"
                                                        class="btn btn-info text-white mx-2" title="edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('doctor.appointments.delete', $item->id) }}"
                                                        class="btn btn-danger text-white mx-2" title="delete"
                                                        onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <form id="delete-item{{ $item->id }}"
                                                        action="{{ route('doctor.appointments.delete', $item->id) }}"
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
        </div>
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

@push('script')
    <script>
        $('#appointment_table').DataTable({
            "ordering": false
        });

    </script>
@endpush

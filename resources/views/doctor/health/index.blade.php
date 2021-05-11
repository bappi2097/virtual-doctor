@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.health'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Patient</th>
                                        {{-- <th class="border-top-0">Name</th> --}}
                                        <th class="border-top-0">Heart</th>
                                        <th class="border-top-0">Pressure</th>
                                        <th class="border-top-0">Sugar</th>
                                        <th class="border-top-0">BMI</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($healths as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <img src="{{ asset($item->patient->image ?: 'assets/images/healths/undraw_doctor_kw5l.svg') }}"
                                                            alt="{{ $item->patient->user_name }}" class="rounded-circle"
                                                            width="40" />
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16">{{ $item->patient->user_name }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $item->patient->name }}</td> --}}
                                            <td>{{ $item->heart_beat }}</td>
                                            <td>{{ $item->pressure('low') . ' / ' . $item->pressure('high') }}</td>
                                            <td>{{ $item->sugar }}</td>
                                            <td>
                                                {{ $item->extra() }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('doctor.healths.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
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

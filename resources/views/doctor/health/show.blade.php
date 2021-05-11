@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.health.show', $dailyHealth->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('doctor.healths.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back </a>
                        <br>
                        <hr><br>
                        <div class="row justify-content-center">
                            <!-- Column -->
                            <div class="col-md-10 col-sm-12">
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Value</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Heart Beat</td>
                                            <td>{{ $dailyHealth->heart_beat }} bpm</td>
                                        </tr>

                                        <tr>
                                            <td>Blood Pressure</td>
                                            <td>{{ $dailyHealth->pressure('low') . '/' . $dailyHealth->pressure('high') }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Blood Sugar</td>
                                            <td>{{ $dailyHealth->sugar }} mg/dl</td>
                                        </tr>

                                        <tr>
                                            <td>Height</td>
                                            <td>{{ $dailyHealth->extra('height') }} cm</td>
                                        </tr>

                                        <tr>
                                            <td>Weight</td>
                                            <td>{{ $dailyHealth->extra('weight') }} kg</td>
                                        </tr>

                                        <tr>
                                            <td>BMI</td>
                                            <td>{{ $dailyHealth->extra('bmi') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Column -->
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

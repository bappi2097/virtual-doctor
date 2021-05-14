@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.info.show', $info->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('patient.infos.index') }}" class="btn waves-effect waves-light btn-info">
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
                                                    <td>Title</td>
                                                    <td>{{ $info->title }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{ $info->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{ $info->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tag</td>
                                                    <td>{{ $info->tags[0]->name }}</td>
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
                                            {!! $info->details !!}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Column -->
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

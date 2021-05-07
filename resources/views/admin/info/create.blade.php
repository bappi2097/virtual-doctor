@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.info.create'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.infos.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <a href="{{ route('admin.infos.index') }}" class="btn waves-effect waves-light btn-info">
                                <i class="mdi mdi-arrow-left"></i> Back
                            </a>
                            <br>
                            <hr><br>
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30">
                                                <img id="user-image" class="img-fluid rounded"
                                                    src="{{ asset('assets/images/Calendar.svg') }}" alt="your image" />
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td>Day</td>
                                                            <td>Start</td>
                                                            <td>End</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="schedule"></tbody>
                                                </table>
                                            </center>
                                        </div>
                                        <div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label for="title" class="col-md-12">Title</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="title" id="title"
                                                            placeholder="Dhaka Ambulance"
                                                            class="form-control form-control-line" />
                                                        @error('title')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="col-md-12">Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="address" id="address"
                                                            placeholder="22B, Baker St."
                                                            class="form-control form-control-line" />
                                                        @error('address')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-md-12">Title</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="phone" id="phone"
                                                            placeholder="+8801XXXXXXXXX"
                                                            class="form-control form-control-line" />
                                                        @error('phone')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-md-12">Description</label>
                                                    <div class="col-md-12">
                                                        <textarea name="description" id="description" cols="30" rows="10"
                                                            class="form-control form-control-line"></textarea>
                                                        @error('description')
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
                                </div> <!-- Column -->
                            </div>
                        </div>
                    </form>
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

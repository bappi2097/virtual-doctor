@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.patient.show', $user->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.users.patient.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <center class="m-t-30">
                                            <img id="user-image" class="rounded-circle" alt="{{ $user->name }}"
                                                width="150"
                                                src="{{ asset($user->image ?: 'assets/images/users/male_avatar.svg') }}" />
                                            </button>
                                            <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                            <h6 class="card-subtitle">{{ '@' . $user->user_name }}</h6>
                                            <div class="row text-center justify-content-md-center">
                                                <div class="col-4">
                                                    <a href="javascript:void(0)" class="link">
                                                        <i class="icon-people"></i>
                                                        <font class="font-medium">Patient</font>
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="javascript:void(0)" class="link">
                                                        <i
                                                            class="mdi mdi-brightness-1 text-{{ isActiveClass($user->isActive) }}"></i>
                                                        <font class="font-medium">{{ isActiveText($user->isActive) }}
                                                        </font>
                                                    </a>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-muted">Email address </small>
                                                <h6>{{ $user->email }}</h6>
                                                <small class="text-muted p-t-30 db">Phone</small>
                                                <h6>{{ $user->phone_no }}</h6>
                                                <small class="text-muted p-t-30 db">Address</small>
                                                <h6>{{ $user->address }}</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <small class="text-muted">Gender </small>
                                                <h6>{{ strtoupper($user->gender) }}</h6>
                                                <small class="text-muted p-t-30 db">Blood Group</small>
                                                <h6>{{ strtoupper($user->blood) }}</h6>
                                            </div>
                                        </div>
                                        <div class="map-box">
                                            <iframe width="600" height="150" id="gmap_canvas"
                                                src="https://maps.google.com/maps?q={{ strtolower(join('+', preg_split('/[\s,]+/', $user->address))) }}&t=k&z=11&ie=UTF8&iwloc=&output=embed"
                                                width="100%" height="150" frameborder="0" style="border:0" allowfullscreen
                                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                        </div>
                                        <small class="text-muted p-t-30 db">Social Profile</small>
                                        <br />
                                        <button class="btn btn-circle btn-secondary"><i
                                                class="fab fa-facebook-f"></i></button>
                                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                                    </div>
                                </div>
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

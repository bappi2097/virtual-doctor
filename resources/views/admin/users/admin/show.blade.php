@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.users.admin.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <center class="m-t-30">
                                            <img src="{{ asset($user->image ?: 'assets/images/users/male_avatar.svg') }}"
                                                class="rounded-circle" width="150" />
                                            <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                            <h6 class="card-subtitle">{{ '@' . $user->user_name }}</h6>
                                            <div class="row text-center justify-content-md-center">
                                                <div class="col-4">
                                                    <a href="javascript:void(0)" class="link">
                                                        <i class="icon-people"></i>
                                                        <font class="font-medium">Admin</font>
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
                                        <small class="text-muted">Email address </small>
                                        <h6>{{ $user->email }}</h6>
                                        <small class="text-muted p-t-30 db">Phone</small>
                                        <h6>{{ $user->phone_no }}</h6>
                                        <small class="text-muted p-t-30 db">Address</small>
                                        <h6>{{ $user->address }}</h6>
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

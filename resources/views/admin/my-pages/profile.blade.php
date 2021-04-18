@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img id="user-image" class="rounded-circle" alt="{{ $user->name }}" width="150"
                                src="{{ asset($user->image ?: 'assets/images/users/male_avatar.svg') }}" />
                            <button type="button" class="btn btn-outline-info"
                                onclick="document.getElementById('user-image-btn').click();">
                                <i class="mdi mdi-camera"></i>
                            </button>
                            <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                            <h6 class="card-subtitle">{{ '@' . $user->user_name }}</h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-people"></i>
                                        <font class="font-medium">{{ roleText() }}</font>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="mdi mdi-brightness-1 text-{{ isActiveClass($user->isActive) }}"></i>
                                        <font class="font-medium">{{ isActiveText($user->isActive) }}</font>
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
                        <div class="map-box">
                            <iframe width="600" height="150" id="gmap_canvas"
                                src="https://maps.google.com/maps?q={{ strtolower(join('+', preg_split('/[\s,]+/', $user->address))) }}&t=k&z=11&ie=UTF8&iwloc=&output=embed"
                                width="100%" height="150" frameborder="0" style="border:0" allowfullscreen frameborder="0"
                                scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                        <small class="text-muted p-t-30 db">Social Profile</small>
                        <br />
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="{{ route('admin.profile.update') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" name="name" value="{{ $user->name }}"
                                        class="form-control form-control-line">
                                    @error('name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type='file' name="image" id="user-image-btn" style="display: none;"
                                onchange="readURL(this);" accept="image/*" />
                            <div class="form-group">
                                <label for="email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com" name="email" id="email"
                                        class="form-control form-control-line" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_name" class="col-md-12">User Name</label>
                                <div class="col-md-12">
                                    <input type="user_name" placeholder="john12" class="form-control form-control-line"
                                        name="user_name" value="{{ $user->user_name }}" id="user_name">
                                    @error('user_name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="123 456 7890" name="phone_no"
                                        value="{{ $user->phone_no }}" class="form-control form-control-line">
                                    @error('phone_no')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <textarea rows="5" name="address"
                                        class="form-control form-control-line">{{ $user->address }}</textarea>
                                    @error('address')
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
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2"
                            action="{{ route('admin.profile.change-password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="*******" name="password"
                                        class="form-control form-control-line">
                                    @error('password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="*******" name="password_confirmation"
                                        class="form-control form-control-line">
                                    @error('password_confirmation')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-info text-white">Change Password</button>
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
@push('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endpush

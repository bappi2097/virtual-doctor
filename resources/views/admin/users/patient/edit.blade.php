@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.edit', $user->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body"> <a href="{{ route('admin.users.patient.index') }}"
                            class="btn waves-effect waves-light btn-info"> <i class="mdi mdi-arrow-left"></i> Back </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <center class="m-t-30"> <img id="user-image" class="rounded-circle"
                                                src="{{ asset($user->image ?: 'assets/images/users/male_avatar.svg') }}"
                                                alt="{{ $user->name }}" width="150" />
                                            <button type="button" class="btn btn-outline-info"
                                                onclick="document.getElementById('user-image-btn').click();"> <i
                                                    class="mdi mdi-camera"></i> </button>
                                        </center>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                </div>
                            </div> <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material mx-2"
                                            action="{{ route('admin.users.patient.update', $user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group"> <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12"> <input type="text" placeholder="Johnathan Doe"
                                                        name="name" value="{{ $user->name }}"
                                                        class="form-control form-control-line"> @error('name') <span
                                                            class="text-danger"> <strong>{{ $message }}</strong> </span>
                                                    @enderror </div>
                                            </div>
                                            <input type='file' name="image" id="user-image-btn" style="display: none;"
                                                onchange="readURL(this);" accept="image/*" />
                                            <div class="form-group"> <label for="email" class="col-md-12">Email</label>
                                                <div class="col-md-12"> <input type="email"
                                                        placeholder="johnathan@admin.com"
                                                        class="form-control form-control-line" name="email" id="email"
                                                        value="{{ $user->email }}"> @error('email') <span
                                                            class="text-danger">
                                                            <strong>{{ $message }}</strong> </span>
                                                    @enderror </div>
                                            </div>
                                            <div class="form-group"> <label for="user_name" class="col-md-12">User
                                                    Name</label>
                                                <div class="col-md-12"> <input type="user_name" placeholder="john12"
                                                        class="form-control form-control-line" name="user_name"
                                                        value="{{ $user->user_name }}" id="user_name"> @error('user_name')
                                                        <span class="text-danger"> <strong>{{ $message }}</strong> </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group"> <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12"> <input type="text" placeholder="123 456 7890"
                                                        name="phone_no" value="{{ $user->phone_no }}"
                                                        class="form-control form-control-line"> @error('phone_no') <span
                                                            class="text-danger"> <strong>{{ $message }}</strong> </span>
                                                    @enderror </div>
                                            </div>
                                            <div class="form-group"> <label class="col-md-12">Address</label>
                                                <div class="col-md-12"> <textarea rows="5" name="address"
                                                        class="form-control form-control-line">{{ $user->address }}</textarea>
                                                    @error('address') <span class="text-danger">
                                                        <strong>{{ $message }}</strong> </span> @enderror </div>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    User Banned
                                                    <input name="ban" {{ isBan($user, 'check') }} class="toggle"
                                                        type="checkbox" data-toggle="toggle" data-onstyle="info"
                                                        data-offstyle="light" data-on="True" data-off="False"
                                                        data-width="100">
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12"> <button
                                                        class="btn btn-info text-white">Save</button> </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal form-material mx-2"
                                            action="{{ route('admin.users.patient.change-password', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group"> <label class="col-md-12">Password</label>
                                                <div class="col-md-12"> <input type="password" placeholder="*******"
                                                        name="password" class="form-control form-control-line">
                                                    @error('password') <span class="text-danger">
                                                        <strong>{{ $message }}</strong> </span> @enderror </div>
                                            </div>
                                            <div class="form-group"> <label class="col-md-12">Confirm Password</label>
                                                <div class="col-md-12"> <input type="password" placeholder="*******"
                                                        name="password_confirmation" class="form-control form-control-line">
                                                    @error('password_confirmation') <span class="text-danger">
                                                        <strong>{{ $message }}</strong> </span> @enderror </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12"> <button class="btn btn-info text-white">Change
                                                        Password</button> </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- Column -->
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

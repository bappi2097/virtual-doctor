@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.admin.create'))

@section('content') <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.users.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body"> <a href="{{ route('admin.users.admin.index') }}"
                                class="btn waves-effect waves-light btn-info"> <i class="mdi mdi-arrow-left"></i> Back </a>
                            <br>
                            <hr><br>
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30"> <img id="user-image" class="rounded-circle"
                                                    src="{{ asset('assets/images/users/male_avatar.svg') }}"
                                                    alt="your image" width="150" /> <input type='file' name="image"
                                                    id="user-image-btn" style="display: none;" onchange="readURL(this);"
                                                    accept="image/*" />
                                                <button type="button" class="btn btn-outline-info"
                                                    onclick="document.getElementById('user-image-btn').click();"> <i
                                                        class="mdi mdi-camera"></i> </button> @error('image') <span
                                                        class="text-danger"> <strong>{{ $message }}</strong> </span>
                                                @enderror
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
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Full Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="Johnathan Doe" name="name"
                                                            value="{{ old('name') }}"
                                                            class="form-control form-control-line">
                                                        @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12" for="blood">Blood Group</label>
                                                    <div class="col-md-12">
                                                        <select name="blood" id="blood"
                                                            class="form-control form-control-line selectpicker">
                                                            <option selected>Blood Group</option>
                                                            <option value="a+">A+</option>
                                                            <option value="a-">A-</option>
                                                            <option value="b+">B+</option>
                                                            <option value="b-">B-</option>
                                                            <option value="ab+">AB+</option>
                                                            <option value="ab-">AB-</option>
                                                            <option value="o+">O+</option>
                                                            <option value="o-">O-</option>
                                                        </select>
                                                        @error('blood')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Gender</label>
                                                    <div class="col-md-12">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value="male" id="male">
                                                            <label class="form-check-label" for="male">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value="female" id="female">
                                                            <label class="form-check-label" for="female">
                                                                Female
                                                            </label>
                                                        </div>
                                                        @error('gender')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group"> <label for="email" class="col-md-12">Email</label>
                                                    <div class="col-md-12"> <input type="email"
                                                            placeholder="johnathan@admin.com"
                                                            class="form-control form-control-line" name="email" id="email"
                                                            value="{{ old('email') }}"> @error('email') <span
                                                                class="text-danger"> <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror </div>
                                                </div>
                                                <div class="form-group"> <label for="user_name" class="col-md-12">User
                                                        Name</label>
                                                    <div class="col-md-12"> <input type="user_name" placeholder="john12"
                                                            class="form-control form-control-line" name="user_name"
                                                            value="{{ old('user_name') }}" id="user_name">
                                                        @error('user_name')
                                                            <span class="text-danger"> <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group"> <label class="col-md-12">Password</label>
                                                    <div class="col-md-12"> <input type="password" placeholder="*******"
                                                            name="password" class="form-control form-control-line">
                                                        @error('password') <span class="text-danger">
                                                            <strong>{{ $message }}</strong> </span> @enderror </div>
                                                </div>
                                                <div class="form-group"> <label class="col-md-12">Confirm Password</label>
                                                    <div class="col-md-12"> <input type="password" placeholder="*******"
                                                            name="password_confirmation"
                                                            class="form-control form-control-line">
                                                        @error('password_confirmation') <span class="text-danger">
                                                            <strong>{{ $message }}</strong> </span> @enderror </div>
                                                </div>
                                                <div class="form-group"> <label class="col-md-12">Phone No</label>
                                                    <div class="col-md-12"> <input type="text" placeholder="123 456 7890"
                                                            name="phone_no" value="{{ old('phone_no') }}"
                                                            class="form-control form-control-line"> @error('phone_no') <span
                                                                class="text-danger"> <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror </div>
                                                </div>
                                                <div class="form-group"> <label class="col-md-12">Address</label>
                                                    <div class="col-md-12"> <textarea rows="5" name="address"
                                                            class="form-control form-control-line">{{ old('address') }}</textarea>
                                                        @error('address') <span class="text-danger">
                                                            <strong>{{ $message }}</strong> </span> @enderror </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12"> <button
                                                            class="btn btn-info text-white">Save</button> </div>
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
    </div> @endsection @push('script') <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

</script> @endpush

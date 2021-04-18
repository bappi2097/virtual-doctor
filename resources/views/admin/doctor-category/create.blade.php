@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.doctor-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <a href="{{ route('admin.doctor-category.index') }}"
                                class="btn waves-effect waves-light btn-info">
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
                                                <img id="user-image" alt="doctor category images" width="250"
                                                    src="{{ asset('assets/images/doctor-category/undraw_doctor_kw5l.svg') }}" />
                                                <input type='file' name="image" id="user-image-btn" style="display: none;"
                                                    onchange="readURL(this);" accept="image/*" />
                                                <button type="button" class="btn btn-outline-info"
                                                    onclick="document.getElementById('user-image-btn').click();">
                                                    <i class="mdi mdi-camera"></i>
                                                </button> @error('image')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
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
                                                    <label class="col-md-12">Category Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="Psychiatrist" name="name"
                                                            value="{{ old('name') }}"
                                                            class="form-control form-control-line slug-input">
                                                        @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Category Slug</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="psychiatrist" name="slug"
                                                            value="{{ old('slug') }}"
                                                            class="form-control form-control-line slug-output">
                                                        @error('slug')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Description</label>
                                                    <div class="col-md-12">
                                                        <textarea rows="5" name="description"
                                                            class="form-control form-control-line"
                                                            placeholder="Pediatricians provide primary health care to children, including immunizations, well-baby checks, school physicals .....">{{ old('description') }}</textarea>
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

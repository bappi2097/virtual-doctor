@extends('admin.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('admin.report.edit', $report->id))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.reports.index') }}" class="btn waves-effect waves-light btn-info">
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
                                            <img id="user-image" alt="report images" width="250"
                                                src="{{ asset('dist/image/undraw_medical_research_qg4d.svg') }}" />
                                            @error('image')
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
                                        <div class="form-horizontal form-material mx-2">
                                            <form action="{{ route('admin.reports.update', $report->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label class="col-md-12" for="patient_id">Patient</label>
                                                    <div class="col-md-12">
                                                        <select name="patient_id" id="patient_id"
                                                            class="form-control form-control-line selectpicker" required>
                                                            @foreach (\App\Models\User::role('patient')->get() as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ selected($item->id, $report->patient->id) }}>
                                                                    {{ $item->user_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('patient_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Title</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="CT Scan Report" name="title"
                                                            value="{{ $report->title }}" required
                                                            class="form-control form-control-line slug-input">
                                                        @error('title')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12">Description (<span
                                                            class="text-warning">optional</span>)</label>
                                                    <div class="col-md-12">
                                                        <textarea rows="5" name="description"
                                                            class="form-control form-control-line"
                                                            placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, corporis! .....">{{ $report->description }}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-info text-white">Update</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <table>
                                                <tbody>
                                                    @foreach ($report->documents as $item)
                                                        <tr class="d_row">
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="col-md-12">
                                                                        File Name
                                                                    </label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" placeholder="CT Scan file"
                                                                            value="{{ $item->file_name }}" readonly
                                                                            class="form-control form-control-line">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <form
                                                                    action="{{ route('admin.documents.delete', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger rounded btn-sm">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <form action="{{ route('admin.documents.store', $report->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <table id="file_table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <button class="btn btn-info text-white">ADD</button>
                                                                    </div>
                                                                </div>
                                                                @error('file_name')
                                                                    <span class="text-danger">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror

                                                                @error('file')
                                                                    <span class="text-danger">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                            <div class="col-sm-12">
                                                <button id="add_document" type="button"
                                                    class="btn btn-success text-white rounded-circle float-end">
                                                    <span class="fw-bolder">
                                                        <i class="mdi mdi-plus"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
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
        $(document).ready(() => {
            $("#add_document").on('click', () => {
                $("#file_table tbody").before(
                    `<tr class="d_row"> <td> <div class="form-group"> <label class="col-md-12"> File Name </label> <div class="col-md-12"> <input type="text" placeholder="CT Scan file" name="file_name[]" value="{{ old('file_name') }}" class="form-control form-control-line" required> </div> </div> <div class="form-group"> <div class="col-md-12"> <input type="file" name="file[]" class="form-control form-control-line" required> </div> </div> </td> <td class=""> <button type="button" class="btn btn-outline-danger rounded btn-sm" onclick="deleteRow(this)"> <i class="mdi mdi-delete"></i> </button> </td> </tr>`
                );
            });
        });

        function deleteRow(e) {
            $(e).closest("tr").remove();
        }

    </script>
@endpush

@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.info'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Title</th>
                                        <th class="border-top-0">Address</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Details</th>
                                        <th class="border-top-0">Active</th>
                                        <th class="border-top-0">Tag</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infos as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>
                                                <label
                                                    class="label label-{{ isActiveClass($item->is_active) }}">{{ isActiveText($item->is_active) }}</label>
                                            </td>
                                            <td>{{ $item->tags[0]->name }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('patient.infos.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

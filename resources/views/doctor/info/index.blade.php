@extends('doctor.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('doctor.info'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('doctor.infos.create') }}" class="btn waves-effect waves-light btn-info">Add
                            Data</a>
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
                                                    <a href="{{ route('doctor.infos.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('doctor.infos.edit', $item->id) }}"
                                                        class="btn btn-info text-white mx-2" title="edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('doctor.infos.delete', $item->id) }}"
                                                        class="btn btn-danger text-white mx-2" title="delete"
                                                        onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <form id="delete-item{{ $item->id }}"
                                                        action="{{ route('doctor.infos.delete', $item->id) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
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

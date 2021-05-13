@extends('patient.layouts.app')

@section('breadcrumbs', Breadcrumbs::render('patient.health'))

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('patient.healths.create') }}" class="btn waves-effect waves-light btn-info">Add
                            Data</a>
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Heart</th>
                                        <th class="border-top-0">Pressure</th>
                                        <th class="border-top-0">Sugar</th>
                                        <th class="border-top-0">BMI</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($healths as $item)
                                        <tr>
                                            <td>{{ $item->heart_beat }}</td>
                                            <td>{{ $item->pressure('low') . ' / ' . $item->pressure('high') }}</td>
                                            <td>{{ $item->sugar }}</td>
                                            <td>
                                                {{ $item->extra() }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('patient.healths.show', $item->id) }}"
                                                        class="btn btn-success text-white mx-2" title="show">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('patient.healths.edit', $item->id) }}"
                                                        class="btn btn-info text-white mx-2" title="edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('patient.healths.delete', $item->id) }}"
                                                        class="btn btn-danger text-white mx-2" title="delete"
                                                        onclick="event.preventDefault(); document.getElementById('delete-item{{ $item->id }}').submit();">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <form id="delete-item{{ $item->id }}"
                                                        action="{{ route('patient.healths.delete', $item->id) }}"
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

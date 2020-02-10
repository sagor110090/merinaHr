@extends('layouts.app')

@section('content')

        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Department List</h4>
                            <h5 class="card-subtitle">Create New Department</h5>
                        </div>
                    </div>
                    <a href="{{ url('/admin/department/create') }}" class="btn btn-success btn-sm"
                        title="Add New Department">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    {{-- <div class="table-responsive"> --}} 
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th><th>Department</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($department as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->department }}</td>
                                    <td>
                                        <a href="{{ url('/admin/department/' . $item->id) }}"
                                            title="View Department"><button class="btn btn-info btn-sm"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/admin/department/' . $item->id . '/edit') }}"
                                            title="Edit Department"><button class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit" aria-hidden="true"></i>
                                                Edit</button></a>

                                        <form method="POST"
                                            action="{{ url('/admin/department' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete Department"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}

                </div>
            </div>
        </div>

@endsection
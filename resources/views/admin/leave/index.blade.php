@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Leave List</h4>
                    <h5 class="card-subtitle">Create New Leave</h5>
                </div>
            </div>
            <a href="{{ url('/admin/leave/create') }}" class="btn btn-success btn-sm" title="Add New Leave">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br />
            <br />
            {{-- <div class="table-responsive"> --}}
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Application</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leave as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->employee_id }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->application }}</td>
                        <td>{{ $item->file }}</td>
                        <td>
                            <a href="{{ url('/admin/leave/' . $item->id) }}" title="View Leave"><button
                                    class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    View</button></a>
                            <a href="{{ url('/admin/leave/' . $item->id . '/edit') }}" title="Edit Leave"><button
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>
                                    Edit</button></a>

                            <form method="POST" action="{{ url('/admin/leave' . '/' . $item->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Leave"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash"
                                        aria-hidden="true"></i> Delete</button>
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
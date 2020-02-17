@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Attendance List</h4>
                    @if (Hr::isAdmin())
                    <h5 class="card-subtitle">Create New Attendance</h5>
                    @endif
                </div>
            </div>
            @if (Hr::isAdmin())
            <a href="{{ url('/admin/attendance/create') }}" class="btn btn-success btn-sm" title="Add New Attendance">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br />
            @endif
            <br />
            <div class="table-responsive">
                <table class="table " id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Attendance</th>
                            <th>Late</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendance as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->employee->fname.' '.$item->employee->lname }}</td>
                            <td>{{ $item->attendance }}</td>
                            <td>{{ $item->late }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                <a href="{{ url('/admin/attendance/' . $item->id) }}" title="View Attendance"><button
                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View</button></a>
                                @if (Hr::isAdmin())
                                <a href="{{ url('/admin/attendance/' . $item->id . '/edit') }}"
                                    title="Edit Attendance"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                            aria-hidden="true"></i>
                                        Edit</button></a>

                                <form method="POST" action="{{ url('/admin/attendance' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Attendance"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Employee personal info List</h4>
                    @if (Hr::isAdmin())
                    <h5 class="card-subtitle">Create New Employee personal info</h5>
                    @endif
                </div>
            </div>
            @if (Hr::isAdmin())
            <a href="{{ url('/admin/employee-personal-info/create') }}" class="btn btn-success btn-sm"
                title="Add New EmployeePersonalInfo">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            @endif
            <br />
            <br />
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Picture</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employeepersonalinfo as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->employee->fname }} {{ $item->employee->lname }}</td>
                            <td><img src="{{ Storage::url($item->picture)  }}" alt="{{ $item->employee->fname }} {{ $item->employee->lname }}" height="50px" width="50px"></td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->file }}</td>
                            <td>
                                <a href="{{ url('/admin/employee-personal-info/' . $item->id) }}"
                                    title="View EmployeePersonalInfo"><button class="btn btn-info btn-sm"><i
                                            class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                <a href="{{ url('/admin/employee-personal-info/' . $item->id . '/edit') }}"
                                    title="Edit EmployeePersonalInfo"><button class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit" aria-hidden="true"></i>
                                        Edit</button></a>
                                @if (Hr::isAdmin())
                                <form method="POST"
                                    action="{{ url('/admin/employee-personal-info' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        title="Delete EmployeePersonalInfo"
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

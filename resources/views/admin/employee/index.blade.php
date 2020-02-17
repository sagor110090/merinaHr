@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Employee List</h4>
                    @if (Hr::isAdmin())
                    <h5 class="card-subtitle">Create New Employee</h5>
                    @endif
                </div>
            </div>
            @if (Hr::isAdmin())
            <a href="{{ url('/admin/employee/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Deptertment</th>
                            <th>Position </th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employee as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->lname }}</td>
                            <td>{{ $item->department->department }}</td>
                            <td>{{ $item->position->position }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>
                                <a href="{{ url('/admin/employee/' . $item->id) }}" title="View Employee"><button
                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View</button></a>

                                <a href="{{ url('/admin/employee/' . $item->id . '/edit') }}"
                                    title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                            aria-hidden="true"></i>
                                        Edit</button></a>
                                @if (Hr::isAdmin())
                                <form method="POST" action="{{ url('/admin/employee' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee"
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

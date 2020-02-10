@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Employee {{ $employee->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/employee') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/employee/' . $employee->id . '/edit') }}" title="Edit Employee"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</button></a>

            <form method="POST" action="{{ url('admin/employee' . '/' . $employee->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                        aria-hidden="true"></i> Delete</button>
            </form>
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $employee->id }}</td>
                        </tr>
                        <tr>
                            <th> Department</th>
                            <td> {{ $employee->department->department }} </td>
                        </tr>
                        <tr>
                            <th> Position </th>
                            <td> {{ $employee->position->position }} </td>
                        </tr>
                        <tr>
                            <th> Start Date </th>
                            <td> {{ $employee->start_date }} </td>
                        </tr>
                        <tr>
                            <th> End Date </th>
                            <td> {{ $employee->end_date }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
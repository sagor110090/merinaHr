@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Leave {{ $leave->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/leave') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/leave/' . $leave->id . '/edit') }}" title="Edit Leave"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</button></a>

            <form method="POST" action="{{ url('admin/leave' . '/' . $leave->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Leave"
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
                            <td>{{ $leave->id }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $leave->date }}</td>
                        </tr>
                        <tr>
                            <th> Employee Id </th>
                            <td> {{ $leave->employee_id }} </td>
                        </tr>
                        <tr>
                            <th> Application </th>
                            <td> {{ $leave->application }} </td>
                        </tr>
                        <tr>
                            <th> File </th>
                            <td> {{ $leave->file }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
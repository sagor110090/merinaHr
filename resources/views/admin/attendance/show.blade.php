@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Attendance {{ $attendance->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/attendance') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

            @if (Hr::isAdmin())
            <a href="{{ url('/admin/attendance/' . $attendance->id . '/edit') }}" title="Edit Attendance"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</button></a>

            <form method="POST" action="{{ url('admin/attendance' . '/' . $attendance->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Attendance"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                        aria-hidden="true"></i> Delete</button>
            </form>
            @endif
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        {{-- <tr>
                            <th>ID</th>
                            <td>{{ $attendance->id }}</td>
                        </tr> --}}
                        <tr>
                            <th> Employee Name</th>
                            <td> {{ $attendance ->employee->fname.' '.$attendance ->employee->lname }} </td>
                        </tr>
                        <tr>
                            <th> Attendance </th>
                            <td> {{ $attendance->attendance }} </td>
                        </tr>
                        <tr>
                            <th> Late </th>
                            <td> {{ $attendance->late }} </td>
                        </tr>
                        <tr>
                            <th> Date </th>
                            <td> {{ $attendance->date }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

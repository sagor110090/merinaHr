@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Schedule {{ $schedule->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/schedule') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/schedule/' . $schedule->id . '/edit') }}" title="Edit Schedule"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</button></a>

            <form method="POST" action="{{ url('admin/schedule' . '/' . $schedule->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Schedule"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                        aria-hidden="true"></i> Delete</button>
            </form>
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th> Employee </th>
                            <td> {{ $schedule ->employee->fname.' '.$schedule ->employee->lname }} </td>

                        </tr>
                        <tr>
                            <th>ID</th>
                            <td>{{ $schedule->id }}</td>
                        </tr>
                        <tr>
                            <th> Start Time </th>
                            <td> {{ $schedule->start_time }} </td>
                        </tr>
                        <tr>
                            <th> End Time </th>
                            <td> {{ $schedule->end_time }} </td>
                        </tr>
                        <tr>
                            <th> Starting Date </th>
                            <td> {{ $schedule->starting_date }} </td>
                        </tr>
                        <tr>
                            <th> Ending Date </th>
                            <td> {{ $schedule->ending_date }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
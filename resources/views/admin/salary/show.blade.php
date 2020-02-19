@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Salary {{ $salary->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/salary') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            @if (Hr::isAdmin())
            <a href="{{ url('/admin/salary/' . $salary->id . '/edit') }}" title="Edit Salary"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</button></a>

            <form method="POST" action="{{ url('admin/salary' . '/' . $salary->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Salary"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                        aria-hidden="true"></i> Delete</button>
            </form>
            @endif
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th> Employee Name </th>
                            <td> {{ $salary ->employee->fname.' '.$salary ->employee->lname }} </td>
                        </tr>
                        <tr>
                            <th> Amount </th>
                            <td> {{ $salary->amount }} </td>
                        </tr>
                        <tr>
                            <th> Fine </th>
                            <td> {{ $salary->fine }} </td>
                        </tr>
                        <tr>
                            <th> Month </th>
                            <td> {{ $salary->month }} </td>
                        </tr>
                        <tr>
                            <th> Bank Id </th>
                            <td> {{ $salary->bank->bank_name}} </td>
                        </tr>
                        <tr>
                            <th> Chcek No </th>
                            <td> {{ $salary->chcek_no }} </td>
                        </tr>
                        <tr>
                            <th> Date </th>
                            <td> {{ $salary->date }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

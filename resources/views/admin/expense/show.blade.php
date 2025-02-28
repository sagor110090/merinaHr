@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Expense {{ $expense->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/expense') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/expense/' . $expense->id . '/edit') }}" title="Edit Expense"><button
                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit</button></a>

            <form method="POST" action="{{ url('admin/expense' . '/' . $expense->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Expense"
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
                            <td>{{ $expense->id }}</td>
                        </tr>
                        <tr>
                            <th> Expanse Categories </th>
                            <td> {{ $expense->expanseCategories->category_name }} </td>
                        </tr>
                        <tr>
                            <th> Amount </th>
                            <td> {{ $expense->amount }} </td>
                        </tr>
                        <tr>
                            <th> Date </th>
                            <td> {{ $expense->date }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
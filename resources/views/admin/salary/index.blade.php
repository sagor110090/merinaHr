@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Salary List</h4>
                    @if (Hr::isAdmin())
                    <h5 class="card-subtitle">Create New Salary</h5>
                    @endif
                </div>
            </div>
            @if (Hr::isAdmin())
            <a href="{{ url('/admin/salary/create') }}" class="btn btn-success btn-sm" title="Add New Salary">
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
                        <th>Employee</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Fine</th>
                        <th>Bank</th>
                        <th>Chcek No</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salary as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->employee->fname.' '.$item->employee->lname }}</td>
                        <td>{{ $item->month }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->fine }}</td>
                        <td>{{ $item->bank->bank_name }}</td>
                        <td>{{ $item->chcek_no }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            <a href="{{ url('/admin/salary/' . $item->id) }}" title="View Salary"><button
                                    class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                    View</button></a>

                            @if (Hr::isAdmin())
                            <a href="{{ url('/admin/salary/' . $item->id . '/edit') }}" title="Edit Salary"><button
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>
                                    Edit</button></a>

                            <form method="POST" action="{{ url('/admin/salary' . '/' . $item->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Salary"
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

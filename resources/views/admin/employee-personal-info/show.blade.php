@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employee Personal Info {{ $employeepersonalinfo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/employee-personal-info') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/employee-personal-info/' . $employeepersonalinfo->id . '/edit') }}" title="Edit EmployeePersonalInfo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        @if(Hr::isAdmin())
                        <form method="POST" action="{{ url('admin/employeepersonalinfo' . '/' . $employeepersonalinfo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete EmployeePersonalInfo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name</th><td>{{ $employeepersonalinfo->employee->fname.' '.$employeepersonalinfo->employee->lname }}</td>
                                    </tr>
                                    <tr>
                                        <th> Picture </th><td> {{ $employeepersonalinfo->picture }} </td>
                                    </tr>
                                    <tr>
                                        <th> Age </th><td> {{ $employeepersonalinfo->age }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address </th><td> {{ $employeepersonalinfo->address }} </td>
                                    </tr>
                                    <tr>
                                        <th> Mobile </th><td> {{ $employeepersonalinfo->mobile }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th><td> {{ $employeepersonalinfo->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> File </th><td> {{ $employeepersonalinfo->file }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection

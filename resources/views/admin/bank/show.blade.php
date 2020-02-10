@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bank {{ $bank->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/bank') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/bank/' . $bank->id . '/edit') }}" title="Edit Bank"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/bank' . '/' . $bank->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Bank" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $bank->id }}</td>
                                    </tr>
                                    <tr><th> Bank Name </th><td> {{ $bank->bank_name }} </td></tr><tr><th> Account Name </th><td> {{ $bank->account_name }} </td></tr><tr><th> Branch </th><td> {{ $bank->branch }} </td></tr><tr><th> Account Id </th><td> {{ $bank->account_Id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection

@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Position {{ $position->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/position') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/position/' . $position->id . '/edit') }}" title="Edit Position"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/position' . '/' . $position->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Position" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $position->id }}</td>
                                    </tr>
                                    <tr><th> Position </th><td> {{ $position->position }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection

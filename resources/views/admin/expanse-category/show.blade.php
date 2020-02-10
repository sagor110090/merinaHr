@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Expanse Category {{ $expansecategory->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/expanse-category') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/expanse-category/' . $expansecategory->id . '/edit') }}" title="Edit ExpanseCategory"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/expansecategory' . '/' . $expansecategory->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ExpanseCategory" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $expansecategory->id }}</td>
                                    </tr>
                                    <tr><th> Category Name </th><td> {{ $expansecategory->category_name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection

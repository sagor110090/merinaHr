@extends('layouts.app')

@section('content')

        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Expanse category List</h4>
                            <h5 class="card-subtitle">Create New Expanse category</h5>
                        </div>
                    </div>
                    <a href="{{ url('/admin/expanse-category/create') }}" class="btn btn-success btn-sm"
                        title="Add New ExpanseCategory">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    {{-- <div class="table-responsive"> --}}
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th><th>Category Name</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expansecategory as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <a href="{{ url('/admin/expanse-category/' . $item->id) }}"
                                            title="View ExpanseCategory"><button class="btn btn-info btn-sm"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/admin/expanse-category/' . $item->id . '/edit') }}"
                                            title="Edit ExpanseCategory"><button class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit" aria-hidden="true"></i>
                                                Edit</button></a>

                                        <form method="POST"
                                            action="{{ url('/admin/expanse-category' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete ExpanseCategory"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}

                </div>
            </div>
        </div>

@endsection
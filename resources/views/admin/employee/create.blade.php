@extends('layouts.app')

@section('content')


        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Create New Employee</h4>
                        </div>
                    </div>
                    <a href="{{ url('/admin/employee') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/employee') }}" accept-charset="UTF-8"
                        class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.employee.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>

@endsection
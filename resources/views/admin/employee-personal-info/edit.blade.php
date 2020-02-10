@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Employee Personal Info #{{ $employeepersonalinfo->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/employee-personal-info') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/employee-personal-info/' . $employeepersonalinfo->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.employee-personal-info.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@endsection

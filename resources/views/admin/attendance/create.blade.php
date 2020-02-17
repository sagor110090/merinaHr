@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Create New Attendance</h4>
                </div>
            </div>
            <a href="{{ url('/admin/attendance') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i>
                    Back</button></a>
            <br />
            <br />

            @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{ url('/admin/attendance') }}" accept-charset="UTF-8"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @foreach (Hr::findAll('employees') as $item)
                    <div class="custom-control custom-checkbox mr-sm-2" style="margin-left: 20%">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing{{$item->fname}}"
                            name="employee_id[]" value="{{$item->id}}"
                            {{ (Hr::chackedEmpoloies(date('Y-m-d'),$item->id)) ? 'checked' : ''}}>
                        <label class="custom-control-label"
                            for="customControlAutosizing{{$item->fname}}">{{$item->fname.' '.$item->lname}}</label>
                    </div>

                    @endforeach
                    <br>
                    <div class="form-group">
                        <input class="btn btn-primary btn-sm" type="submit" value="Submit">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

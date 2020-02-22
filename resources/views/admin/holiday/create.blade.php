@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Create New Holiday</h4>
                </div>
            </div>
            

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <form action="{{ route('holiday.store') }}" method="post">
                {{ csrf_field() }}
                Holiday name:
                <br />
                <input type="text" name="name" class="form-control" />
                <br /><br />
                Holiday description:
                <br />
                <textarea name="description" class="form-control"></textarea>
                <br /><br />
                Holiday Date:
                <br />
                <input type="date" name="holiday_date" class="date" class="form-control" />
                <br /><br />
                <input type="submit" value="Save" class="btn btn-success btn-sm" />
            </form>

        </div>
    </div>
</div>

@endsection
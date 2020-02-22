@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{(!Hr::isAdmin()) ? 'Show':'Edit'}}  Holiday #{{ $holiday->id }}</div>
        <div class="card-body">
            <a href="{{ url('/') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        
            <br />
            <br />

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ url('/admin/holiday/' . $holiday->id) }}" accept-charset="UTF-8"
                class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                Holiday name:
                <br />
                <input type="text" name="name" class="form-control" value="{{$holiday->name}}" {{(!Hr::isAdmin()) ? 'readonly':''}} />
                <br /><br />
                Holiday description:
                <br />
                <textarea name="description" class="form-control" {{(!Hr::isAdmin()) ? 'readonly':''}}> {{$holiday->description}}</textarea>
                <br /><br />
                Holiday Date:
                <br />
                <input type="date" name="holiday_date" class="date" class="form-control"
                    value="{{$holiday->holiday_date}}" {{(!Hr::isAdmin()) ? 'readonly':''}} />
                <br /><br />
                <input type="submit" value="Save" class="btn btn-success btn-sm" {{(!Hr::isAdmin()) ? 'hidden':''}}  />

            </form>

        </div>
    </div>
</div>

@endsection
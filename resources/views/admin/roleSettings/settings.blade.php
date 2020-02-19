@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Settings</b> #{{Auth::user()->name}}</div>
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

                        <form method="POST" action="{{ url('/admin/settings/' . $user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{-- @method('PATCH') --}}
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Name' }}</label>
                                <input class="form-control" name="name" type="text" id="name"  value="{{$user->name}}"  >
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                                <label for="role" class="control-label">{{ 'Role' }}</label>
                                <input class="form-control" name="role" type="text" id="role"  value="{{$user->role}}" readonly >
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="control-label">{{ 'Email' }}</label>
                                <input class="form-control" name="email" type="text" id="email"  value="{{$user->email}}"  >
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label for="password" class="control-label">{{ 'Change Password' }}</label>
                                <input class="form-control" name="password" type="text" id="password"  placeholder="Enter New Password" >
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('oldpassword') ? 'has-error' : ''}}">
                                <label for="oldpassword" class="control-label">{{ 'Current Password' }}</label>
                                <input class="form-control" name="oldpassword" type="text" id="oldpassword"  placeholder="Enter Current Password" >
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Update</button>

                        </form>

                    </div>
                </div>
            </div>

@endsection

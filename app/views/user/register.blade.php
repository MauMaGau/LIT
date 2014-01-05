@extends('scaffold.scaffold')

@section('main')

    {{ Form::open( ['route'=>'user.register.post'] ) }}

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $email, ['class'=>'form-control', 'autofocus']) }}
            {{ $errors->first('email', '<p class="label label-danger">:message</p>') }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password', null, ['class'=>'form-control']) }}
            {{ $errors->first('password', '<p class="label label-danger">:message</p>') }}
        </div>

        <div class="form-group">
            {{ Form::submit('Register', ['class'=>'btn btn-success']) }}
        </div>

    {{ Form::close() }}

@stop

@extends('scaffold.scaffold')

@section('main')

{{ Form::open(['route'=>'user.reset.post', 'class'=>'form']) }}

    {{ Form::hidden('token', $token) }}

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', $email, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'New Password:') }}
        {{ Form::password('password', ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm Password:') }}
        {{ Form::password('password_confirmation', ['class'=>'form-control']) }}
    </div>

    {{ Form::submit('Reset Password', ['class'=>'btn btn-success']) }}

{{ Form::close() }}

@stop
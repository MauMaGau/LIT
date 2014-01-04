@extends('scaffold.scaffold')

@section('main')

@if ($errors->first('valid'))
    <p class="alert alert-danger"><strong>Invalid credentials:</strong> The email address or password you supplied is not recognised. <a href="{{ URL::route('user.forgot') }}">Forgotten your password?</a></p>
@endif

{{ Form::open( ['route'=>'user.login.post'] ) }}

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', $email, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::text('password', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Log in', ['class'=>'btn btn-success']) }}
    </div>

{{ Form::close() }}
@stop
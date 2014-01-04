@extends('scaffold.scaffold')

@section('main')

{{ Form::open(['route'=>'user.forgot.post']) }}

    {{ Form::label('email', 'Email:') }}
    {{ Form::email('email') }}
    {{ Form::submit('Send Reminder', ['class'=>'btn btn-success']) }}

{{ Form::close() }}
@stop
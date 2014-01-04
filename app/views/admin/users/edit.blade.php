@extends('scaffold.scaffold')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('admin.users.update', $user->id), 'class' => 'form well')) }}

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', $user->email, ['class'=>'form-control']) }}
        {{ $errors->first('email', '<p class="label label-danger">:message</p>') }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::text('password', '', ['class'=>'form-control']) }}
        {{ $errors->first('password', '<p class="label label-danger">:message</p>') }}
        <p class="help-block">Leave blank to keep current password</p>
    </div>

    <div class="form-group">
        {{ Form::label('active', 'Active:')}}
        {{ Form::select('active', ['y'=>'active', 'n'=>'inactive'], $user->active ? 'y' : 'n') }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'Type:')}}
        {{ Form::select('type', ['user'=>'user', 'admin'=>'admin'], $user->type) }}
    </div>

	<div class="form-group">
		{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
		{{ link_to_route('admin.users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
	</div>

{{ Form::close() }}

@if ($errors->any())
	<!-- <ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul> -->
@endif

@stop

@extends('scaffold.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'admin.users.store', 'class' => 'form well')) }}

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, ['class'=>'form-control']) }}
        {{ $errors->first('email', '<p class="label label-danger">:message</p>') }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::text('password', '', ['class'=>'form-control']) }}
        {{ $errors->first('password', '<p class="label label-danger">:message</p>') }}
        <p class="help-block">Must be at least six characters</p>
    </div>

    <div class="form-group">
        {{ Form::label('active', 'Active:')}}
        {{ Form::select('active', ['y'=>'active', 'n'=>'inactive'], 'n') }}
        <p class="help-block">Inactive users cannot log in</p>
    </div>

    <div class="form-group">
        {{ Form::label('type', 'Type:')}}
        {{ Form::select('type', ['user'=>'user', 'admin'=>'admin'], 'user') }}
    </div>

    <div class="form-group">
        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('admin.users.index', 'Cancel', array('class' => 'btn')) }}
    </div>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop



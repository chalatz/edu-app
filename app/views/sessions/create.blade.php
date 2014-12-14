@extends('layouts.default')

@section('content')

    <h1>Login</h1>

    {{ Form::open(array('route' => 'sessions.store', 'class' => 'pure-form pure-form-stacked')) }}

		{{ Form::label('email', 'Email') }}
		{{ Form::email('email') }}
        {{ $errors->first('email') }}

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
        {{ $errors->first('password') }}


		{{Form::button('Login', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

	{{ Form::close() }}

@stop
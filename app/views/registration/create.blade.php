@extends('layouts/default')

@section('content')

	<h1>Sign Up</h1>

	{{ Form::open(array('route' => 'registration.store', 'class' => 'pure-form pure-form-stacked')) }}

		{{ Form::label('email', 'Email') }}
		{{ Form::email('email') }}
        {{ $errors->first('email') }}

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
        {{ $errors->first('password') }}

		{{ Form::label('password_confirmation', 'Confirm Password') }}
		{{ Form::password('password_confirmation') }}

		{{Form::button('Create Account', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

	{{ Form::close() }}

@stop
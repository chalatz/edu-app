@extends('layouts.default')

@section('content')

    <h1>Σύνδεση</h1>

    {{ Form::open(array('route' => 'sessions.store', 'class' => 'pure-form pure-form-stacked')) }}

		{{ Form::label('email', 'E-mail') }}
		{{ Form::email('email') }}
        {{ $errors->first('email') }}

		{{ Form::label('password', 'Κωδικός Πρόσβασης') }}
		{{ Form::password('password') }}
        {{ $errors->first('password') }}


		{{Form::button('Σύνδεση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

	{{ Form::close() }}

@stop
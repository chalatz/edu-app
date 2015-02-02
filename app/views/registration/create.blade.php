@extends('layouts/default')

@section('content')


    <h1>Εγγραφή Χρήστη</h1>


	{{ Form::open(array('route' => 'registration.store', 'class' => 'pure-form pure-form-stacked')) }}

		{{ Form::label('email', 'Email') }}
		{{ Form::email('email') }}
        <p class="error-message">{{ $errors->first('email') }}</p>

		{{ Form::label('password', 'Επιθυμητός Κωδικός Πρόσβασης') }}
		{{ Form::password('password') }}
        <p class="error-message">{{ $errors->first('password') }}</p>

		{{ Form::label('password_confirmation', 'Επιβεβαίωση Κωδικού Πρόσβασης') }}
		{{ Form::password('password_confirmation') }}

		{{ Form::button('Εγγραφή', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

	{{ Form::close() }}

@stop
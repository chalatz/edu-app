@extends('layouts/default')

@section('content')

    @if($user_type == 'site')
	    <h1>Εγγραφή Υποψήφιου Ιστότοπου</h1>
    @endif

    @if($user_type == 'grader')
	    <h1>Εγγραφή Αξιολογητή</h1>
    @endif

    @if($user_type == 'user')
	    <h1>Εγγραφή Χρήστη</h1>
    @endif

	{{ Form::open(array('route' => 'registration.store', 'class' => 'pure-form pure-form-stacked')) }}

		{{ Form::label('email', 'Email') }}
		{{ Form::email('email') }}
        <p class="error-message">{{ $errors->first('email') }}</p>

		{{ Form::label('password', 'Κωδικός Πρόσβασης') }}
		{{ Form::password('password') }}
        <p class="error-message">{{ $errors->first('password') }}</p>

		{{ Form::label('password_confirmation', 'Επιβεβαίωση Κωδικού Πρόσβασης') }}
		{{ Form::password('password_confirmation') }}

        {{ Form::hidden('type', $user_type) }}

		{{ Form::button('Εγγραφή', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

	{{ Form::close() }}

@stop
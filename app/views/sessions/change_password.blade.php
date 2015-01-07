@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        
        <h1>Αλλαγή Κωδικού Πρόσβασης</h1>

        {{ Form::open(array('route' => 'do_change_password', 'class' => 'pure-form pure-form-stacked')) }}

            {{ Form::label('current_password', 'Τρέχων Κωδικός Πρόσβασης') }}
            {{ Form::password('current_password') }}
            <p class="error-message">{{ $errors->first('current_password') }}</p>

        {{Form::close() }}

    @endif

@stop
@extends('layouts/default')

@section('content')

	<h1>Επαναφορά Κωδικού Πρόσβασης</h1>

	@if (Session::has('error'))
	    <div class="flash-message flash-error">
	    	<i class="fa fa-exclamation-triangle"></i> {{ trans(Session::get('error')) }}
		</div>
	@elseif (Session::has('status'))
		 <div class="flash-message flash-info">
	    	<i class="fa fa-info-circle"></i> Σας έχει σταλεί ένα email με οδηγίες για να αλλάξετε τον Κωδικό Πρόσβασής σας.
		</div>
	@endif

    <form class="pure-form pure-form-stacked" action="{{ action('RemindersController@postRemind') }}" method="POST">
    	<label for="email">Δώστε το email σας</label>
        <input type="email" name="email">
        <input type="submit" value="Αποστολή" class="pure-button pure-button-primary">
    </form>

    <div class="instructions">Όταν δώσετε το email σας και πατήσετε Αποστολή, θα αποσταλούν στο email σας οδηγίες για να αλλάξετε τον Κωδικό Πρόσβασής σας.</div>

@stop
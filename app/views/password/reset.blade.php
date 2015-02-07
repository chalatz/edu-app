@extends('layouts/default')

@section('content')

    <h1>Αλλαγή Κωδικού Πρόσβασης</h1>

    @if (Session::has('error'))
        <div class="flash-message flash-error">
            <i class="fa fa-exclamation-triangle"></i> {{ trans(Session::get('error')) }}
        </div>
    @endif

    <form class="pure-form pure-form-stacked" action="{{ action('RemindersController@postReset') }}" method="POST">
        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">Δώστε το email σας</label>
        <input type="email" name="email">

        <label for="email">Δώστε τον νέο Κωδικό Πρόσβασής σας</label>
        <input type="password" name="password">
        <div class="instructions">Θα πρέπει να έχει μήκος τουλάχιστον 6 χαρακτήρες</div>

        <label for="password_confirmation">Επιβεβαίωση Κωδικού Πρόσβασης</label>
        <input type="password" name="password_confirmation">

        <input type="submit" value="Αλλαγή Κωδικού Πρόσβασης" class="pure-button pure-button-primary">
    </form>

@stop
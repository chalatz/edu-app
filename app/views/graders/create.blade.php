@extends('layouts/default')

@section('content')

    <h1>Δήλωση Στοιχείων Αξιολογητή</h1>

    {{ Form::open(array('route' => 'grader.store', 'class' => 'pure-form pure-form-stacked')) }}

        {{ Form::label('grader_name', 'Ονοματεπώνυμο') }}
		{{ Form::text('grader_name') }}
        <p class="error-message">{{ $errors->first('grader_name') }}</p>

        {{ Form::label('cat_id', 'Κατηγορία του Site που θα αξιολογήσω') }}
		{{ Form::select('cat_id',[
            '' => 'Επιλέξτε...',
            '1' => 'Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
            '2' => 'Γυμνάσια, ΕΕΕΕΚ',
            '3' => 'Γενικά Λύκεια, ΕΠΑΛ, ΕΠΑΣ, ΣΕΚ, ΤΕΕ Ειδικής Αγωγής',
            '4' => 'Υποστηρικτικές δομές εκπαίδευσης',
            '5' => 'Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
            '6' => 'Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών',
        ]) }}
        <p class="error-message">{{ $errors->first('cat_id') }}</p>

        {{ Form::label('district_id', 'Περιφέρεια που ανήκει το Site που θα αξιολογήσω') }}
		{{ Form::select('district_id',[
            '' => 'Επιλέξτε...',
            '1' => 'Αττική',
            '2' => 'Βόρειο Αιγαίο',
            '3' => 'Νότιο Αιγαίο',
            '4' => 'Δυτική Ελλάδα',
            '5' => 'Θεσσαλία',
            '6' => 'Ήπειρος',
            '7' => 'Ιόνιο',
            '8' => 'Κρήτη',
            '9' => 'Ανατολική Μακεδονία και Θράκη',
            '10' => 'Δυτική Μακεδονία',
            '11' => 'Κεντρική Μακεδονία',
            '12' => 'Πελοπόννησος',
            '13' => 'Στερεά Ελλάδα',
        ]) }}
        <p class="error-message">{{ $errors->first('district_id') }}</p>

        {{ Form::label('from_who', 'Από ποιον έχω προταθεί;') }}
		{{ Form::text('from_who') }}
        <p class="error-message">{{ $errors->first('from_who') }}</p>

        {{ Form::label('past_grader', 'Ήμουν αξιολογητής στον προηγούμενο διαγωνισμό;') }}
		{{ Form::select('past_grader',[
            '' => 'Επιλέξτε...',
            '1' => 'Ναι',
            '0' => 'Όχι',
        ]) }}
        <p class="error-message">{{ $errors->first('past_grader') }}</p>

        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

@stop
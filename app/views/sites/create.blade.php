@extends('layouts/default')

@section('content')

    <h1>Δήλωση Στοιχείων Site</h1>

    {{ Form::open(array('route' => 'site.store', 'class' => 'pure-form pure-form-stacked')) }}

        {{ Form::label('title', 'Γενική Ονομασία') }}
		{{ Form::text('title', null, array('class' => 'pure-input-1')) }}
        <div class="instructions">Δηλώστε έναν χαρακτηριστικό τίτλο για τη συμμετοχή σας</div>
        <p class="error-message">{{ $errors->first('title') }}</p>

        {{ Form::label('site_url', 'URL Ιστοσελίδας') }}
		{{ Form::text('site_url', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('site_url') }}</p>

        {{ Form::label('cat_id', 'Κατηγορία') }}
		{{ Form::select('cat_id',[
            '' => 'Επιλέξτε...',
            '1' => 'Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
            '2' => 'Γυμνάσια, ΕΕΕΕΚ',
            '3' => 'Γενικά Λύκεια, ΕΠΑΛ, ΕΠΑΣ, ΣΕΚ, ΤΕΕ Ειδικής Αγωγής',
            '4' => 'Υποστηρικτικές δομές εκπαίδευσης',
            '5' => 'Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
            '6' => 'Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών',
        ], null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('cat_id') }}</p>

        {{ Form::label('creator', 'Δημιουργός / Δημιουργοί') }}
		{{ Form::text('creator', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('creator') }}</p>

        {{ Form::label('responsible', 'Νομικά υπεύθυνος') }}
		{{ Form::text('responsible', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('responsible') }}</p>

        {{ Form::label('contact_name', 'Υπέυθυνος επικοινωνίας') }}
		{{ Form::text('contact_name', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('contact_name') }}</p>

        {{ Form::label('contact_email', 'E-mail επικοινωνίας') }}
		{{ Form::email('contact_email', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('contact_email') }}</p>

        {{ Form::label('phone', 'Τηλέφωνο επικοινωνίας') }}
		{{ Form::text('phone', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('phone') }}</p>

        {{ Form::label('district_id', 'Περιφέρεια') }}
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
        ], null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('district_id') }}</p>

        {{ Form::label('grader_name', 'Προτεινόμενος αξιολογητής') }}
		{{ Form::text('grader_name', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('grader_name') }}</p>

        {{ Form::label('grader_email', 'E-mail αξιολογητή') }}
		{{ Form::email('grader_email', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('grader_email') }}</p>

        {{ Form::label('notify_grader', 'Να ειδοποιηθεί ο αξιολογητής;') }}
        {{ Form::select('notify_grader',[
            '' => 'Επιλέξτε...',
            '1' => 'Ναι',
            '0' => 'Όχι',
        ], null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('notify_grader') }}</p>

        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

@stop
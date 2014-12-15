@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Not logged in</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Επεξεργασία Στοιχείων Site</h1>

            {{ Form::model($user->site, array('method' => 'PATCH','route' => ['site.update', $user->id], 'class' => 'pure-form pure-form-stacked')) }}

                {{ Form::label('title', 'Γενική Ονομασία') }}
                {{ Form::text('title') }}
                <div class="instructions">Δηλώστε έναν χαρακτηριστικό τίτλο για τη συμμετοχή σας</div>

                {{ Form::label('site_url', 'URL Ιστοσελίδας') }}
                {{ Form::text('site_url') }}

                {{ Form::label('cat_id', 'Κατηγορία') }}
                {{ Form::select('cat_id',[
                    '0' => 'Επιλέξτε...',
                    '1' => 'Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
                    '2' => 'Γυμνάσια, ΕΕΕΕΚ',
                    '3' => 'Γενικά Λύκεια, ΕΠΑΛ, ΕΠΑΣ, ΣΕΚ, ΤΕΕ Ειδικής Αγωγής',
                    '4' => 'Υποστηρικτικές δομές εκπαίδευσης',
                    '5' => 'Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
                    '6' => 'Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών',
                ]) }}

                {{ Form::label('creator', 'Δημιουργός / Δημιουργοί') }}
                {{ Form::text('creator') }}

                {{ Form::label('responsible', 'Νομικά υπεύθυνος') }}
                {{ Form::text('responsible') }}

                {{ Form::label('contact_name', 'Υπέυθυνος επικοινωνίας') }}
                {{ Form::text('contact_name') }}

                {{ Form::label('contact_email', 'E-mail επικοινωνίας') }}
                {{ Form::email('contact_email') }}

                {{ Form::label('phone', 'Τηλέφωνο επικοινωνίας') }}
                {{ Form::text('phone') }}

                {{ Form::label('district_id', 'Περιφέρεια') }}
                {{ Form::select('district_id',[
                    '0' => 'Επιλέξτε...',
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

                {{ Form::label('grader_name', 'Προτεινόμενος αξιολογητής') }}
                {{ Form::text('grader_name') }}

                {{ Form::label('grader_email', 'E-mail αξιολογητή') }}
                {{ Form::text('grader_email') }}

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

            {{ Form::close() }}

        @else
            <p>Not your profile</p>
        @endif
    @endif

@stop
@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Επεξεργασία Στοιχείων Υποψηφιότητας Ιστότοπου</h1>

            {{ Form::model($user->site, array('method' => 'PATCH','route' => ['site.update', $user->id], 'class' => 'pure-form pure-form-stacked',  'id' => 'confirmMe')) }}

                {{ Form::label('site_url', 'URL Ιστοσελίδας') }}
                {{ Form::url('site_url', null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('site_url') }}</p>

                {{ Form::label('title', 'Επωνυμία Ιστότοπου') }}
                {{ Form::text('title', null, array('class' => 'pure-input-1', 'required')) }}
                <div class="instructions">Δηλώστε έναν χαρακτηριστικό τίτλο για τη συμμετοχή σας.</div>
                <p class="error-message">{{ $errors->first('title') }}</p>

                {{ Form::label('cat_id', 'Κατηγορία') }}
                {{ Form::select('cat_id',[
                    '' => 'Επιλέξτε...',
                    '1' => '1. Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
                    '2' => '2. Γυμνάσια, ΕΕΕΕΚ',
                    '3' => '3. Γενικά Λύκεια, ΕΠΑΛ, ΕΚ, ΤΕΕ Ειδικής Αγωγής',
                    '4' => '4. Υποστηρικτικές δομές εκπαίδευσης  (ΚΕΠΛΗΝΕΤ, ΕΚΦΕ, ΣΣΝ, ΚΠΕ, ΚΕΣΥΠ, ΚΕΔΔΥ, Γραφεία Σχολικών Δραστηριοτήτων, Αγωγής Υγείας, Περιβαλλοντικής Εκπαίδευσης, Πολιτιστικών θεμάτων, ομάδων Φυσικής Αγωγής της Δ/νσης Β/θμιας Εκπ/σης)',
                    '5' => '5. Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
                    '6' => '6. Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών',
                ], null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('cat_id') }}</p>

                {{ Form::label('creator', 'Δημιουργός / Δημιουργοί') }}
                {{ Form::text('creator', null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('creator') }}</p>

                {{ Form::label('responsible', 'Νομικά υπεύθυνος') }}
                {{ Form::text('responsible', null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('responsible') }}</p>

                {{ Form::label('contact_name', 'Υπέυθυνος επικοινωνίας υποψηφιότητας') }}
                {{ Form::text('contact_name', null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('contact_name') }}</p>

                {{ Form::label('contact_email', 'E-mail επικοινωνίας υποψηφιότητας') }}
                {{ Form::email('contact_email', null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('contact_email') }}</p>

                {{ Form::label('phone', 'Τηλέφωνο επικοινωνίας') }}
                {{ Form::text('phone', null, array('class' => 'pure-input-1', 'required')) }}
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
                ], null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('district_id') }}</p>

                {{ Form::label('grader_name', 'Προτεινόμενος αξιολογητής') }}
                {{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required')) }}
                <p class="error-message">{{ $errors->first('grader_name') }}</p>
                
                {{ Form::label('grader_email', 'E-mail αξιολογητή') }}
                {{ Form::text('grader_email', null, array('class' => 'pure-input-1','required', $check_grader_site )) }}
                @if($check_grader_site != 'disabled')
                    <div class="instructions">Εάν έχετε δηλώσει το δικό σας email, επιλέξτε παρακάτω την επιλογή <strong>Ναι</strong> για να καταχωρηθείτε και ως αξιολογητής.</div>
                @else
                    <div class="instructions">Εάν επιθυμείτε να αλλάξετε τον αξιολογητή που προτείνετε, παρακαλούμε επικοινωνήστε μαζί μας.</div>
                @endif
                <p class="error-message">{{ $errors->first('grader_email') }}</p>

                @if($check_grader_site != 'disabled')
                    {{ Form::label('notify_grader', 'Να ειδοποιηθεί ο αξιολογητής;') }}
                    {{ Form::select('notify_grader',[
                        '' => 'Επιλέξτε...',
                        '1' => 'Ναι',
                        '0' => 'Όχι',
                    ], null, array('class' => 'pure-input-1', 'required')) }}
                    <div class="instructions"><strong>ΠΡΟΣΟΧΗ: </strong>Εάν επιλέξετε Ναι, <strong>δε θα μπορείτε να καταχωρίσετε μετά κάποιον άλλον αξιολογητή!</strong> Εάν έχετε κάνει κάποιο λάθος, παρακαλούμε επικοινωνήστε μαζί μας.</div>
                    <p class="error-message">{{ $errors->first('notify_grader') }}</p>
                @endif

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

            {{ Form::close() }}

        @else
            <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
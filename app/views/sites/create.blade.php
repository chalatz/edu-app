@extends('layouts/default')

@section('content')

    <h1>Υποβολή Υποψηφιότητας Ιστότοπου</h1>

    {{ Form::open(array('route' => 'site.store', 'class' => 'pure-form pure-form-stacked site-form', 'id' => 'confirmMe', 'name' => 'confirmMe')) }}

        {{ Form::label('site_url', 'URL Ιστοσελίδας') }}
		{{ Form::url('site_url', null, array('class' => 'pure-input-1', 'required')) }}
        <div class="instructions">Θα πρέπει να ξεκινάει από http://</div>
        <p class="error-message">{{ $errors->first('site_url') }}</p>

        {{ Form::label('title', 'Επωνυμία Ιστότοπου') }}
		{{ Form::text('title', null, array('class' => 'pure-input-1', 'required')) }}
        <div class="instructions">Δηλώστε έναν χαρακτηριστικό τίτλο για τη συμμετοχή σας</div>
        <p class="error-message">{{ $errors->first('title') }}</p>

        {{ Form::label('cat_id', 'Κατηγορία') }}
		{{ Form::select('cat_id',[
            '' => 'Επιλέξτε...',
            '1' => '1. Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
            '2' => '2. Γυμνάσια, ΕΕΕΕΚ',
            '3' => '3. Γενικά Λύκεια, ΕΠΑΛ, ΕΚ, ΤΕΕ Ειδικής Αγωγής',
            '4' => '4. Υποστηρικτικές δομές εκπαίδευσης',
            '5' => '5. Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
            '6' => '6. Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <div class="instructions">Υποστηρικτικές δομές εκπαίδευσης: ΚΕΠΛΗΝΕΤ, ΕΚΦΕ, ΣΣΝ, ΚΠΕ, ΚΕΣΥΠ, ΚΕΔΔΥ, Γραφεία Σχολικών Δραστηριοτήτων, Αγωγής Υγείας, Περιβαλλοντικής Εκπαίδευσης, Πολιτιστικών θεμάτων, ομάδων Φυσικής Αγωγής της Δ/νσης Β/θμιας Εκπ/σης.</div>
        <p class="error-message">{{ $errors->first('cat_id') }}</p>

        {{ Form::label('creator', 'Δημιουργός / Δημιουργοί') }}
		{{ Form::text('creator', null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('creator') }}</p>

        {{ Form::label('responsible', 'Νομικά υπεύθυνος') }}
		{{ Form::text('responsible', null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('responsible') }}</p>

        {{ Form::label('responsible_type', 'Ιδιότητα νομικά υπεύθυνου') }}
		{{ Form::text('responsible_type', null, array('class' => 'pure-input-1', 'required')) }}
        <div class="instructions">π.χ Διευθυντής, Υποδιευθυντής, κλπ</div>
        <p class="error-message">{{ $errors->first('responsible_type') }}</p>

        {{ Form::label('contact_name', 'Υπεύθυνος επικοινωνίας υποψηφιότητας') }}
		{{ Form::text('contact_name', null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('contact_name') }}</p>

        {{ Form::label('contact_email', 'E-mail επικοινωνίας υποψηφιότητας') }}
		{{ Form::email('contact_email', null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('contact_email') }}</p>

        {{ Form::label('phone', 'Τηλέφωνο επικοινωνίας') }}
		{{ Form::text('phone', null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('phone') }}</p>

        {{ Form::label('mobile_phone', 'Κινητό Τηλέφωνο') }}
		{{ Form::text('mobile_phone', null, array('class' => 'pure-input-1')) }}

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
            '14' => 'Άλλη...',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('district_id') }}</p>

        <div id="district_text_wrapper">
            {{ Form::label('district_text', 'Ονομασία Περιφέρειας') }}
		    {{ Form::text('district_text', null, array('class' => 'pure-input-1')) }}
            <p class="error-message">{{ $errors->first('district_text') }}</p>
        </div>

        {{ Form::label('grader_name', 'Προτεινόμενος αξιολογητής') }}
		{{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('grader_name') }}</p>

        {{ Form::label('grader_email', 'E-mail αξιολογητή') }}
		{{ Form::email('grader_email', null, array('class' => 'pure-input-1', 'required')) }}
        <div class="instructions">Εάν έχετε δηλώσει το δικό σας email, επιλέξτε παρακάτω την επιλογή <strong>Ναι</strong> για να καταχωρηθείτε και ως αξιολογητής.</div>
        <p class="error-message">{{ $errors->first('grader_email') }}</p>

        {{ Form::label('notify_grader', 'Να ειδοποιηθεί ο αξιολογητής;') }}
        {{ Form::select('notify_grader',[
            '100' => 'Επιλέξτε...',
            '1' => 'Ναι',
            '0' => 'Όχι',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <div class="instructions"><strong>ΠΡΟΣΟΧΗ: </strong>Εάν επιλέξετε Ναι, <strong>δε θα μπορείτε να καταχωρίσετε μετά κάποιον άλλον αξιολογητή!</strong> Εάν έχετε κάνει κάποιο λάθος, παρακαλούμε επικοινωνήστε μαζί μας.</div>
        <p class="error-message">{{ $errors->first('notify_grader') }}</p>

        {{ Form::label('received_permission', 'Έχετε λάβει γραπτή άδεια για να εμφανίζονται προσωπικά δεδομένα των παιδιών;') }}
        {{ Form::select('received_permission',[
            '100' => 'Επιλέξτε...',
            '1' => 'Ναι',
            '0' => 'Όχι',
        ], null, array('class' => 'pure-input-1', 'required')) }}

        {{ Form::label('restricted_access', 'Έχει ο ιστότοπος περιορισμένη πρόσβαση;') }}
        {{ Form::select('restricted_access',[
            '100' => 'Επιλέξτε...',
            '1' => 'Ναι',
            '0' => 'Όχι',
        ], null, array('class' => 'pure-input-1')) }}

        <div id="restricted_access_details_wrapper">
            {{ Form::label('restricted_access_details', 'Πληροφορίες πρόσβασης') }}
            {{ Form::textarea('restricted_access_details', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Δώστε λεπτομέρειες σχετικά με την είσοδο στον ιστότοπο με περιορισμένη πρόσβαση')) }}
            <div class="instructions">Δώστε λεπτομέρειες σχετικά με την είσοδο στον ιστότοπο με περιορισμένη πρόσβαση</div>
        </div>
            
        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

    <div id="dialog-confirm" title = "Επιβεβαίωση αξιολογητή;">
        <p>Είστε βέβαιοι ότι επιθυμείτε να δηλώσετε αυτόν τον αξιολογητή;</p>
        <p>Εάν απαντήσετε θετικά, η ενέργεια αυτή δεν μπορεί να αναιρεθεί και θα πρέπει να επικοινωνήσετε μαζί μας.</p>
    </div>

@stop
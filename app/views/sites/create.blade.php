@extends('layouts/default')

@section('content')

    <h1>Υποβολή Υποψηφιότητας Ιστότοπου</h1>

    {{ Form::open(array('route' => 'site.store', 'class' => 'pure-form pure-form-stacked site-form', 'id' => 'confirmMe', 'name' => 'confirmMe')) }}

        <fieldset>
            <h3>Στοιχεία Υποψήφιου Ιστότοπου</h3>
            
            {{ Form::label('site_url', 'URL Ιστοσελίδας') }}
            {{ Form::url('site_url', null, array('class' => 'pure-input-1', 'required')) }}
            <div class="instructions">Θα πρέπει να ξεκινάει από http://</div>
            <p class="error-message">{{ $errors->first('site_url') }}</p>

            {{ Form::label('title', 'Επωνυμία Ιστότοπου') }}
            {{ Form::text('title', null, array('class' => 'pure-input-1', 'required')) }}
            <div class="instructions">Δηλώστε έναν χαρακτηριστικό τίτλο για τη συμμετοχή σας</div>
            <p class="error-message">{{ $errors->first('title') }}</p>

            <?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
            {{ Form::label('cat_id', 'Κατηγορία') }}
            {{ Form::select('cat_id', $categories, null, array('class' => 'pure-input-1', 'required')) }}
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

        </fieldset>

        <fieldset>
            <h3>Στοιχεία Επικοινωνίας Υποψηφιότητας</h3>
            
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

            <?php $districts = ['' => 'Επιλέξτε...'] + District::lists('district_name', 'id'); ?>
            {{ Form::label('district_id', 'Περιφέρεια') }}
            {{ Form::select('district_id', $districts, null, array('class' => 'pure-input-1', 'required')) }}
            <p class="error-message">{{ $errors->first('district_id') }}</p>

            <div id="district_text_wrapper">
                {{ Form::label('district_text', 'Ονομασία Περιφέρειας') }}
                {{ Form::text('district_text', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('district_text') }}</p>
            </div>
        
        </fieldset>

        <fieldset>
            <h3>Στοιχεία Αξιολογητή Α</h3>

            {{ Form::label('grader_last_name', 'Επώνυμο προτεινόμενου αξιολογητή Α') }}
            {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required')) }}
            <p class="error-message">{{ $errors->first('grader_last_name') }}</p>            
            
            {{ Form::label('grader_name', 'Όνομα προτεινόμενου αξιολογητή Α') }}
            {{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required')) }}
            <p class="error-message">{{ $errors->first('grader_name') }}</p>
            
            {{ Form::label('grader_district', 'Περιφέρεια Αξιολογητή Α') }}
            {{ Form::select('grader_district', $districts, null, array('class' => 'pure-input-1', 'required')) }}
            <p class="error-message">{{ $errors->first('grader_district') }}</p>

            <div id="grader_district_text_wrapper">
                {{ Form::label('grader_district_text', 'Ονομασία Περιφέρειας Αξιολογητή Α') }}
                {{ Form::text('grader_district_text', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_district_text') }}</p>
            </div>

            {{ Form::label('grader_email', 'E-mail αξιολογητή Α') }}
            {{ Form::email('grader_email', null, array('class' => 'pure-input-1', 'required')) }}
            <div class="instructions">Εάν έχετε δηλώσει το δικό σας email, επιλέξτε παρακάτω την επιλογή <strong>Ναι</strong> για να καταχωρηθείτε και ως αξιολογητής.</div>
            <p class="error-message">{{ $errors->first('grader_email') }}</p>

            {{ Form::label('notify_grader', 'Να ειδοποιηθεί ο αξιολογητής Α;') }}
            {{ Form::select('notify_grader',[
                '100' => 'Επιλέξτε...',
                '1' => 'Ναι',
                '0' => 'Όχι',
            ], null, array('class' => 'pure-input-1', 'required')) }}
            <div class="instructions"><strong>ΠΡΟΣΟΧΗ: </strong>Εάν επιλέξετε Ναι, <strong>δε θα μπορείτε να καταχωρίσετε μετά κάποιον άλλον αξιολογητή!</strong> Εάν έχετε κάνει κάποιο λάθος, παρακαλούμε επικοινωνήστε μαζί μας.</div>
            <p class="error-message">{{ $errors->first('notify_grader') }}</p>
        
        </fieldset>
            
        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

    <div id="dialog-confirm" title = "Επιβεβαίωση αξιολογητή;">
        <p>Είστε βέβαιοι ότι επιθυμείτε να δηλώσετε αυτόν τον αξιολογητή;</p>
        <p>Εάν απαντήσετε θετικά, η ενέργεια αυτή δεν μπορεί να αναιρεθεί και θα πρέπει να επικοινωνήσετε μαζί μας.</p>
    </div>

@stop
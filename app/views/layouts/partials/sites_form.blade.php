<fieldset>
    <h3>Στοιχεία Υποψήφιου Ιστότοπου</h3>
    
    {{ Form::label('site_url', 'URL Ιστοσελίδας *') }}
    {{ Form::url('site_url', null, array('class' => 'pure-input-1', 'required')) }}
    <div class="instructions">Θα πρέπει να ξεκινάει από http://</div>
    <p class="error-message">{{ $errors->first('site_url') }}</p>

    {{ Form::label('title', 'Επωνυμία Ιστότοπου *') }}
    {{ Form::text('title', null, array('class' => 'pure-input-1', 'required')) }}
    <div class="instructions">Δηλώστε έναν χαρακτηριστικό τίτλο για τη συμμετοχή σας</div>
    <p class="error-message">{{ $errors->first('title') }}</p>

    {{ Form::label('cat_id', 'Κατηγορία *') }}
    {{ Form::select('cat_id', $categories, null, array('class' => 'pure-input-1', 'required')) }}
    <div class="instructions">Υποστηρικτικές δομές εκπαίδευσης: ΚΕΠΛΗΝΕΤ, ΕΚΦΕ, ΣΣΝ, ΚΠΕ, ΚΕΣΥΠ, ΚΕΔΔΥ, Γραφεία Σχολικών Δραστηριοτήτων, Αγωγής Υγείας, Περιβαλλοντικής Εκπαίδευσης, Πολιτιστικών θεμάτων, ομάδων Φυσικής Αγωγής της Δ/νσης Β/θμιας Εκπ/σης.</div>
    <p class="error-message">{{ $errors->first('cat_id') }}</p>

    {{ Form::label('creator', 'Δημιουργός / Δημιουργοί *') }}
    {{ Form::text('creator', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('creator') }}</p>

    {{ Form::label('responsible', 'Νομικά υπεύθυνος *') }}
    {{ Form::text('responsible', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('responsible') }}</p>

    {{ Form::label('responsible_type', 'Ιδιότητα νομικά υπεύθυνου *') }}
    {{ Form::text('responsible_type', null, array('class' => 'pure-input-1', 'required')) }}
    <div class="instructions">π.χ Διευθυντής, Υποδιευθυντής, κλπ</div>
    <p class="error-message">{{ $errors->first('responsible_type') }}</p>
    
    {{ Form::label('uses_private_data', 'Προβάλλει ο ιστότοπος προσωπικά δεδομένα παιδιών;') }}
    {{ Form::select('uses_private_data',[
        '' => 'Επιλέξτε...',
        'yes' => 'Ναι',
        'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}

    <div id="received_permission_wrapper">
        {{ Form::label('received_permission', 'Εάν ναι, έχετε λάβει γραπτή άδεια για να εμφανίζονται προσωπικά δεδομένα των παιδιών;') }}
        {{ Form::select('received_permission',[
            '' => 'Επιλέξτε...',
            'yes' => 'Ναι',
            'no' => 'Όχι',
        ], null, array('class' => 'pure-input-1')) }}
    </div>

    {{ Form::label('restricted_access', 'Έχει ο ιστότοπος περιορισμένη πρόσβαση;') }}
    {{ Form::select('restricted_access',[
        '' => 'Επιλέξτε...',
        'yes' => 'Ναι',
        'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}

    <div id="restricted_access_details_wrapper">
        {{ Form::label('restricted_access_details', 'Πληροφορίες πρόσβασης') }}
        {{ Form::textarea('restricted_access_details', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Δώστε λεπτομέρειες σχετικά με την είσοδο στον ιστότοπο με περιορισμένη πρόσβαση')) }}
        <div class="instructions">Δώστε λεπτομέρειες σχετικά με την είσοδο στον ιστότοπο με περιορισμένη πρόσβαση</div>
    </div>

</fieldset>

<fieldset>

    <h3>Στοιχεία Επικοινωνίας Υποψηφιότητας</h3>
    
    {{ Form::label('contact_name', 'Υπεύθυνος επικοινωνίας υποψηφιότητας *') }}
    {{ Form::text('contact_name', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('contact_name') }}</p>

    {{ Form::label('contact_email', 'E-mail επικοινωνίας υποψηφιότητας *') }}
    {{ Form::email('contact_email', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('contact_email') }}</p>

    {{ Form::label('phone', 'Τηλέφωνο επικοινωνίας *') }}
    {{ Form::text('phone', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('phone') }}</p>

    {{ Form::label('mobile_phone', 'Κινητό Τηλέφωνο') }}
    {{ Form::text('mobile_phone', null, array('class' => 'pure-input-1')) }}

    {{ Form::label('district_id', 'Περιφέρεια *') }}
    {{ Form::select('district_id', $districts, null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('district_id') }}</p>

    <div id="district_text_wrapper">
        {{ Form::label('district_text', 'Ονομασία Περιφέρειας') }}
        {{ Form::text('district_text', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('district_text') }}</p>
    </div>

</fieldset>

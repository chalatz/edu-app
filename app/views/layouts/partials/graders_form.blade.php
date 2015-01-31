<fieldset>
    <h3>Στοιχεία Αξιολογητή</h3>

    {{ Form::label('grader_last_name', 'Επώνυμο *') }}
    {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
    <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

    {{ Form::label('grader_name', 'Όνομα *') }}
    {{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
    <p class="error-message">{{ $errors->first('grader_name') }}</p>

    <div class="detail">
        <label>Περιφέρεια</label>
        <p>{{ $districts[$grader->district_id] }}</p>
        @if($grader->district_id == 14)
        <p>{{ $grader->grader_district_text }}</p>
        @endif
    </div>

    {{ Form::label('desired_category', 'Θα προτιμούσα να είμαι αξιολογητής στην παρακάτω κατηγορία:') }}
    {{ Form::select('desired_category',$categories , null, array('class' => 'pure-input-1')) }}
    <p class="error-message">{{ $errors->first('desired_category') }}</p>

    {{ Form::label('past_grader', 'Ήμουν αξιολογητής Α στον προηγούμενο διαγωνισμό;') }}
    {{ Form::select('past_grader',[
    '' => 'Επιλέξτε...',
        'yes' => 'Ναι',
        'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}
    <p class="error-message">{{ $errors->first('past_grader') }}</p>

    {{ Form::label('past_grader_more', 'Ήμουν αξιολογητής σε περισσότερους από έναν διαγωνισμούς;') }}
    {{ Form::select('past_grader_more',[
    '' => 'Επιλέξτε...',
    'yes' => 'Ναι',
    'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}

    {{ Form::label('wants_to_be_grader_b', 'Θα ήθελα να συμμετάσχω και ως Αξιολογητής Β') }}
    {{ Form::select('wants_to_be_grader_b',[
        '' => 'Επιλέξτε...',
        'yes' => 'Ναι',
        'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}

    <hr>

    <label>Ξένες γλώσσες που γνωρίζω</label>

    <div class= "pure-g">
        <div class="pure-u-1 pure-u-md-1-3">
            {{ Form::checkbox('level_english_check', 'yes_english', false, ['id' => 'level_english_check']) }}
            {{ Form::label('level_english_check', 'Αγγλικά', ['class' => 'label-for-checkbox']) }}
        </div>
        <div class="pure-u-1 pure-u-md-1-3">
            {{ Form::select('level_english', $lang_levels, null, array('id' => 'level_english')) }}
        </div>
    </div>
    <hr>

    <div class= "pure-g">
        <p>
            <div class="pure-u-1 pure-u-md-1-3">
                {{ Form::checkbox('level_french_check', 'yes_french', false, ['id' => 'level_french_check']) }}
                {{ Form::label('level_french_check', 'Γαλλικά', ['class' => 'label-for-checkbox']) }}
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                {{ Form::select('level_french', $lang_levels, null, array('id' => 'level_french')) }}
            </div>
        </p>
    </div>
    <hr>

    <div class= "pure-g">
        <p>
            <div class="pure-u-1 pure-u-md-1-3">
                {{ Form::checkbox('level_german_check', 'yes_german', false, ['id' => 'level_german_check']) }}
                {{ Form::label('level_german_check', 'Γερμανικά', ['class' => 'label-for-checkbox']) }}
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                {{ Form::select('level_german', $lang_levels, null, array('id' => 'level_german')) }}
            </div>
        </p>
    </div>
    <hr>

    <div class= "pure-g">
        <p>
            <div class="pure-u-1 pure-u-md-1-3">
                {{ Form::checkbox('level_italian_check', 'yes_italian', false, ['id' => 'level_italian_check']) }}
                {{ Form::label('level_italian_check', 'Ιταλικά', ['class' => 'label-for-checkbox']) }}
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                {{ Form::select('level_italian', $lang_levels, null, array('id' => 'level_italian')) }}
            </div>
        </p>
    </div>

    {{ Form::label('languages', 'Όνομα *') }}
    {{ Form::text('languages', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}

</fieldset>
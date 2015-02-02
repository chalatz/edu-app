<fieldset>
	
	{{ Form::label('grader_last_name', 'Επώνυμο *') }}
    {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
    <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

	{{ Form::label('grader_name', 'Όνομα *') }}
    {{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
    <p class="error-message">{{ $errors->first('grader_name') }}</p>

    {{ Form::label('grader_district_id', 'Περιφέρεια *') }}
    {{ Form::select('grader_district_id', $districts, null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('grader_district_id') }}</p>

    <div id="grader_district_text_wrapper">
        {{ Form::label('grader_district_text', 'Ονομασία Περιφέρειας') }}
        {{ Form::text('grader_district_text', null, array('class' => 'pure-input-1')) }}
        <p class="error-message">{{ $errors->first('grader_district_text') }}</p>
    </div>

    <?php $cats_array = explode('|', $grader->desired_category); ?>
    {{ Form::label('desired_category', 'Θα προτιμούσα να είμαι αξιολογητής στην παρακάτω κατηγορία:') }}
    <p>
        @foreach(Category::all() as $category)
            <?php $checked = ''; ?>
            @if(in_array($category->id, $cats_array))
                <?php $checked = 'checked'; ?>
            @else
                <?php $checked = ''; ?>
            @endif
            {{ Form::checkbox('desired_category['.$category->id.']', $category->id, $checked) }}
            {{ $category->category_name }}<br>
        @endforeach
    </p>
    <div class="instructions"><strong>Επιλέξτε όσες κατηγορίες επιθυμείτε</strong></div>
    <div class="instructions small">** Υποστηρικτικές δομές εκπαίδευσης: ΚΕΠΛΗΝΕΤ, ΕΚΦΕ, ΣΣΝ, ΚΠΕ, ΚΕΣΥΠ, ΚΕΔΔΥ, Γραφεία Σχολικών Δραστηριοτήτων, Αγωγής Υγείας, Περιβαλλοντικής Εκπαίδευσης, Πολιτιστικών θεμάτων, ομάδων Φυσικής Αγωγής της Δ/νσης Β/θμιας Εκπ/σης.</div>
    <hr>

    {{ Form::label('past_grader', 'Ήμουν αξιολογητής Α στον προηγούμενο διαγωνισμό;') }}
    {{ Form::select('past_grader',[
    '' => 'Επιλέξτε...',
        'yes' => 'Ναι',
        'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}
    <p class="error-message">{{ $errors->first('past_grader') }}</p>

    {{ Form::label('past_grader_more', 'Ήμουν αξιολογητής σε περισσότερους από έναν διαγωνισμούς Ιστοτόπων;') }}
    {{ Form::select('past_grader_more',[
        '' => 'Επιλέξτε...',
        'yes' => 'Ναι',
        'no' => 'Όχι',
    ], null, array('class' => 'pure-input-1')) }}

    {{ Form::checkbox('self_proposed', 'yes') }}
    {{ Form::label('self_proposed', 'Αυτοπροτείνομαι ως Αξιολογητής Β', ['class' => 'label-for-checkbox']) }}

    <div id="why_self_proposed_wrapper">
        {{ Form::label('why_self_proposed', 'Εξηγήστε τους λόγους για τους οποίους προτείνετε τον εαυτό σας ως Αξιολογητή Β') }}
        {{ Form::textarea('why_self_proposed', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1')) }}
    </div>
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

    {{ Form::label('languages', 'Άλλες Ξένες Γλώσσες') }}
    {{ Form::text('languages', null, array('class' => 'pure-input-1')) }}

    {{ Form::label('languages_level', 'Επίπεδο Άλλων Ξένων Γλωσσών') }}
    {{ Form::text('languages_level', null, array('class' => 'pure-input-1')) }}    

</fieldset>	
<fieldset>
    <h3>Στοιχεία Αξιολογητή</h3>

    {{ Form::label('grader_last_name', 'Επώνυμο *') }}
    {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

    {{ Form::label('grader_name', 'Όνομα *') }}
    {{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required')) }}
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

    {{ Form::label('languages', 'Ξένες γλώσσες που γνωρίζω') }}
    {{ Form::text('languages', null, array('class' => 'pure-input-1')) }}
    <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

    {{ Form::label('languages_level', 'Επίπεδο ξένων γλωσσών που γνωρίζω') }}
    {{ Form::text('languages_level', null, array('class' => 'pure-input-1')) }}
    <p class="error-message">{{ $errors->first('grader_last_name') }}</p>
</fieldset>
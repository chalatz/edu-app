{{ Form::checkbox('proposes_himself', 'yes') }}
{{ Form::label('proposes_himself', 'Προτείνω ως Αξιολογητή Α, τον Υπεύθυνο Επικοινωνίας', ['class' => 'label-for-checkbox']) }}

{{ Form::label('grader_last_name', 'Επώνυμο προτεινόμενου Αξιολογητή Α *') }}
{{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
<p class="error-message">{{ $errors->first('grader_last_name') }}</p>            

{{ Form::label('grader_name', 'Όνομα προτεινόμενου Αξιολογητή Α *') }}
{{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
<p class="error-message">{{ $errors->first('grader_name') }}</p>

{{ Form::label('grader_district', 'Περιφέρεια Αξιολογητή Α *') }}
{{ Form::select('grader_district', $districts, null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_district') }}</p>

{{ Form::label('grader_email', 'E-mail Αξιολογητή Α *') }}
{{ Form::email('grader_email', null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_email') }}</p>
{{ Form::label('grader_last_name', 'Επώνυμο προτεινόμενου αξιολογητή Α *') }}
{{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_last_name') }}</p>            

{{ Form::label('grader_name', 'Όνομα προτεινόμενου αξιολογητή Α *') }}
{{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_name') }}</p>

{{ Form::label('grader_district', 'Περιφέρεια Αξιολογητή Α *') }}
{{ Form::select('grader_district', $districts, null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_district') }}</p>

<div id="grader_district_text_wrapper">
    {{ Form::label('grader_district_text', 'Ονομασία Περιφέρειας Αξιολογητή Α') }}
    {{ Form::text('grader_district_text', null, array('class' => 'pure-input-1')) }}
    <p class="error-message">{{ $errors->first('grader_district_text') }}</p>
</div>

{{ Form::label('grader_email', 'E-mail αξιολογητή Α *') }}
{{ Form::email('grader_email', null, array('class' => 'pure-input-1', 'required')) }}
<div class="instructions">Εάν έχετε δηλώσει το δικό σας email, επιλέξτε παρακάτω την επιλογή <strong>Ναι</strong> για να καταχωρηθείτε και ως αξιολογητής.</div>
<p class="error-message">{{ $errors->first('grader_email') }}</p>
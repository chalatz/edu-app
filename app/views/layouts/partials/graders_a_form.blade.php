<fieldset>
	
	{{ Form::label('grader_last_name', 'Επώνυμο *') }}
    {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

	{{ Form::label('grader_name', 'Όνομα *') }}
    {{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('grader_name') }}</p>

    {{ Form::label('grader_district_id', 'Περιφέρεια *') }}
    {{ Form::select('grader_district_id', $districts, null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('grader_district_id') }}</p>

    {{ Form::label('grader_email', 'E-mail αξιολογητή Α *') }}
    {{ Form::email('grader_email', null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('grader_email') }}</p>

    {{Form::hidden('grader_type', 'alpha')}}

</fieldset>	
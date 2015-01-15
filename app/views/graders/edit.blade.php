@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Δήλωση Στοιχείων Αξιολογητή</h1>

            {{ Form::model($user->grader, array('method' => 'PATCH','route' => ['grader.update', $user->id], 'class' => 'pure-form pure-form-stacked')) }}

                {{ Form::label('grader_last_name', 'Επώνυμο') }}
                {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

                {{ Form::label('grader_name', 'Όνομα') }}
                {{ Form::text('grader_name', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_name') }}</p>

                <p>Κατηγορία του Υποψήφιου Ιστότοπου που με πρότεινε ως αξιολογητή</p>
                <p>{{ Category::find($user->grader->cat_id)->category_name }}</p>

                <p>Περιφέρεια του Υποψήφιου Ιστότοπου που με πρότεινε ως αξιολογητή</p>
                <p>{{ District::find($user->grader->district_id)->district_name }}</p>

                <p>Υποψήφιος Ιστότοπος που με πρότεινε:</p>
                <p>{{ $user->grader->from_who }}</p>

                {{ Form::label('past_grader', 'Ήμουν αξιολογητής στον προηγούμενο διαγωνισμό;') }}
                {{ Form::select('past_grader',[
                    '' => 'Επιλέξτε...',
                    '1' => 'Ναι',
                    '0' => 'Όχι',
                ], null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('past_grader') }}</p>

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

    {{ Form::close() }}

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
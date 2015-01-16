@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Δήλωση Στοιχείων Αξιολογητή</h1>

            {{ Form::model($user->grader, array('method' => 'PATCH','route' => ['grader.update', $user->id], 'class' => 'pure-form pure-form-stacked')) }}

                <label>Υποψήφιος Ιστότοπος που με πρότεινε:</label>
                <p>{{ $user->grader->from_who }}</p>
                <hr>

                <label>Κατηγορία του Υποψήφιου Ιστότοπου που με πρότεινε ως αξιολογητή</label>
                <p>{{ Category::find($user->grader->cat_id)->category_name }}</p>
                <hr>

                <label>Περιφέρεια του Υποψήφιου Ιστότοπου</label>
                <p>{{ District::find($user->grader->district_id)->district_name }}</p>
                <hr>

                <label>Νομικά υπεύθυνος Υποψήφιου Ιστότοπου</label>
                @foreach($grader->sites as $site)
                    <p>{{ $site->responsible }}</p>
                @endforeach
                <hr>

                <label>Ιδιότητα Νομικά υπεύθυνου Υποψήφιου Ιστότοπου</label>
                @foreach($grader->sites as $site)
                    <p>{{ $site->responsible_type }}</p>
                @endforeach
                <hr>

                {{ Form::label('grader_last_name', 'Επώνυμο') }}
                {{ Form::text('grader_last_name', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

                {{ Form::label('grader_name', 'Όνομα') }}
                {{ Form::text('grader_name', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_name') }}</p>

                <?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
                {{ Form::label('desired_category', 'Θα προτιμούσα να είμαι αξιολογητής στην παρακάτω κατηγορία:') }}
                {{ Form::select('desired_category',$categories , null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('past_grader') }}</p>

                {{ Form::label('past_grader', 'Ήμουν αξιολογητής Α στον προηγούμενο διαγωνισμό;') }}
                {{ Form::select('past_grader',[
                    '' => 'Επιλέξτε...',
                    '1' => 'Ναι',
                    '0' => 'Όχι',
                ], null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('past_grader') }}</p>

                {{ Form::label('past_grader_more', 'Ήμουν αξιολογητής σε περισσότερους από έναν διαγωνισμούς;') }}
                {{ Form::select('past_grader_more',[
                    '' => 'Επιλέξτε...',
                    '1' => 'Ναι',
                    '0' => 'Όχι',
                ], null, array('class' => 'pure-input-1')) }}

                {{ Form::label('languages', 'Ξένες γλώσσες που γνωρίζω') }}
                {{ Form::text('languages', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

                {{ Form::label('languages_level', 'Επίπεδο ξένων γλώσσών που γνωρίζω') }}
                {{ Form::text('languages_level', null, array('class' => 'pure-input-1')) }}
                <p class="error-message">{{ $errors->first('grader_last_name') }}</p>

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

    {{ Form::close() }}

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
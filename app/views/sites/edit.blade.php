@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Επεξεργασία Στοιχείων Υποψηφιότητας Ιστότοπου</h1>

            {{ Form::model($user->site, array('method' => 'PATCH','route' => ['site.update', $user->id], 'class' => 'pure-form pure-form-stacked site-form',  'id' => 'confirmMe', 'name' => 'confirmMe')) }}

                <?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
                <?php $districts = ['' => 'Επιλέξτε...'] + District::lists('district_name', 'id'); ?>

                @include('layouts.partials.sites_form')

                <fieldset>
                    <h3>Στοιχεία Αξιολογητή Α</h3>

                    @if($check_grader_site != 'disabled')
                    
                        @include('layouts.partials.sites_form_graders_fields')
                    
                    @else

                        <p><strong>Επώνυμο προτεινόμενου αξιολογητή Α</strong></p>
                        <p>{{ $user->site->grader_last_name }}</p>
                        {{ Form::hidden('grader_last_name', null, array('class' => 'pure-input-1')) }}
                    
                        <p><strong>Όνομα προτεινόμενου αξιολογητή Α</strong></p>
                        <p>{{ $user->site->grader_name }}</p>
                        {{ Form::hidden('grader_name', null, array('class' => 'pure-input-1')) }}
                    
                        <p><strong>E-mail αξιολογητή</strong></p>
                        <p>{{ $user->site->grader_email }}</p>
                        {{ Form::hidden('grader_email', null, array('class' => 'pure-input-1')) }}

                        <p><strong>Περιφέρεια Αξιολογητή Α</strong></p>
                        <p>{{ District::find($user->site->grader_district)->district_name }}</p>
                        {{ Form::hidden('grader_district', null, array('class' => 'pure-input-1')) }}

                        <p>{{ $user->site->grader_district_text }}</p>
                        {{ Form::hidden('grader_district_text', null, array('class' => 'pure-input-1')) }}                      
                    
                    <div class="instructions"><strong>Εάν επιθυμείτε να αλλάξετε τον αξιολογητή που προτείνετε, παρακαλούμε επικοινωνήστε μαζί μας.</strong></div>
                    @endif

                    @if($check_grader_site != 'disabled')
                        {{ Form::label('notify_grader', 'Να ειδοποιηθεί ο αξιολογητής;') }}
                        {{ Form::select('notify_grader',[
                            '' => 'Επιλέξτε...',
                            'yes' => 'Ναι',
                            'no' => 'Όχι',
                        ], null, array('class' => 'pure-input-1', 'required')) }}
                        <div class="instructions"><strong>ΠΡΟΣΟΧΗ: </strong>Εάν επιλέξετε Ναι, <strong>δε θα μπορείτε να καταχωρίσετε μετά κάποιον άλλον αξιολογητή!</strong> Εάν έχετε κάνει κάποιο λάθος, παρακαλούμε επικοινωνήστε μαζί μας.</div>
                        <p class="error-message">{{ $errors->first('notify_grader') }}</p>
                    @else
                        {{ Form::hidden('notify_grader') }}
                    @endif
                    
                </fieldset>

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

            {{ Form::close() }}

            <div id="dialog-confirm" title = "Επιβεβαίωση αξιολογητή;">
                <p>Είστε βέβαιοι ότι επιθυμείτε να δηλώσετε αυτόν τον αξιολογητή;</p>
                <p>Εάν απαντήσετε θετικά, η ενέργεια αυτή δεν μπορεί να αναιρεθεί και θα πρέπει να επικοινωνήσετε μαζί μας.</p>
            </div>

        @else
            <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
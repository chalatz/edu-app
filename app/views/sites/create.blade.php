@extends('layouts/default')

@section('content')

    <h1>Υποβολή Υποψηφιότητας Ιστότοπου</h1>

    {{ Form::open(array('route' => 'site.store', 'class' => 'pure-form pure-form-stacked site-form', 'id' => 'confirmMe', 'name' => 'confirmMe')) }}

        <?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
        <?php $districts = ['' => 'Επιλέξτε...'] + District::lists('district_name', 'id'); ?>

        <?php
            $counties_array = array();
            foreach(County::all() as $county){
                $counties_array[$county->district_name][$county->id] = $county->county_name;
            }
            $counties_array = ['0' => 'Επιλέξτε...'] + $counties_array;
        ?>

        @include('layouts.partials.sites_form')

        <fieldset>
            <h3>Στοιχεία Αξιολογητή Α</h3>

            @include('layouts.partials.sites_form_graders_fields')

            {{ Form::label('notify_grader', 'Να ειδοποιηθεί ο αξιολογητής Α; *') }}
            {{ Form::select('notify_grader',[
                '' => 'Επιλέξτε...',
                'yes' => 'Ναι',
                'no' => 'Όχι',
            ], null, array('class' => 'pure-input-1', 'required')) }}
            <div class="instructions"><strong>ΠΡΟΣΟΧΗ: </strong>Εάν επιλέξετε Ναι, <strong>δε θα μπορείτε να καταχωρίσετε μετά κάποιον άλλον αξιολογητή!</strong> Εάν έχετε κάνει κάποιο λάθος, παρακαλούμε επικοινωνήστε μαζί μας.</div>
            <p class="error-message">{{ $errors->first('notify_grader') }}</p>
        
        </fieldset>
            
        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

    <div id="dialog-confirm" title = "Επιβεβαίωση αξιολογητή;">
        <p>Είστε βέβαιοι ότι επιθυμείτε να δηλώσετε αυτόν τον αξιολογητή;</p>
        <p>Εάν απαντήσετε θετικά, η ενέργεια αυτή δεν μπορεί να αναιρεθεί και θα πρέπει να επικοινωνήσετε μαζί μας.</p>
    </div>

@stop
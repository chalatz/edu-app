@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            @if(sizeof(Auth::user()->site->graders) == 0)
                @if(Auth::user()->site->grader_agrees == 'no')
                    <div class="instructions white-font red little-block"><strong><i class="fa fa-frown-o"></i> O Αξιολογητής Α που έχετε προτείνει, δεν έχει αποδεχθεί την πρόσκλησή σας.</strong></div>
                    <div class="instructions orange little-block white-font"><strong><i class="fa fa-rocket"></i> {{ link_to('#grader-a-details', 'Θα πρέπει να προτείνετε καινούριο Αξιολογητή Α, εντός 48 ωρών.', ['class' => 'white-font']) }} </strong></div>                            
                @endif
            @endif

            <h1>Καρτέλα Ιστότοπου</h1>

            {{ Form::model($user->site, array('method' => 'PATCH','route' => ['site.update', $user->id], 'class' => 'pure-form pure-form-stacked site-form',  'id' => 'confirmMe', 'name' => 'confirmMe')) }}

                <?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
                <?php $districts = ['' => 'Επιλέξτε...'] + District::lists('district_name', 'id'); ?>
                <?php $countries = Country::lists('country_name', 'id'); ?>
                <?php $languages = [
                    '1' => 'Ελληνικά',
                    '2' => 'Αγγλικά',
                    '3' => 'Γαλλικά',
                    '4' => 'Γερμανικά',
                    '5' => 'Ιταλικά',
                ]; ?>

                <?php
                    $counties_array = array();
                    foreach(County::all() as $county){
                        $counties_array[$county->district_name][$county->id] = $county->county_name;
                    }
                    $counties_array = ['0' => 'Επιλέξτε...'] + $counties_array;
                ?>

                @include('layouts.partials.sites_form')

                <fieldset>
                    <h3 id="grader-a-details">Στοιχεία Αξιολογητή Α</h3>

                    
                    @if(isset(Auth::user()->site->proposes_himself) && Auth::user()->site->proposes_himself == 'yes')
                    
                        <p>Έχετε προτείνει τον υπεύθυνο επικοινωνίας ως Αξιολογητή Α</p>
                    
                    @else
                    
                        @if(sizeof(Auth::user()->site->graders) == 0)
                            @if(Auth::user()->site->grader_agrees == 'no')
                                <div class="instructions white-font red little-block"><strong><i class="fa fa-frown-o"></i> O Αξιολογητής Α που έχετε προτείνει, δεν έχει αποδεχθεί την πρόσκλησή σας.</strong></div>
                                <div class="instructions white-font orange little-block"><strong><i class="fa fa-rocket"></i> Θα πρέπει να προτείνετε καινούριο Αξιολογητή Α, εντός 48 ωρών.</strong></div>
                                @include('layouts.partials.sites_form_graders_fields')                                
                            @endif
                        @else
                    
                            <p><strong>Επώνυμο προτεινόμενου Αξιολογητή Α</strong></p>
                            <p>{{ $user->site->grader_last_name }}</p>
                            {{ Form::hidden('grader_last_name', null, array('class' => 'pure-input-1', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}

                            <p><strong>Όνομα προτεινόμενου Αξιολογητή Α</strong></p>
                            <p>{{ $user->site->grader_name }}</p>
                            {{ Form::hidden('grader_name', null, array('class' => 'pure-input-1', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}

                            <p><strong>E-mail Αξιολογητή</strong></p>
                            <p>{{ $user->site->grader_email }}</p>
                            {{ Form::hidden('grader_email', null, array('class' => 'pure-input-1')) }}

                            <p><strong>Περιφέρεια Αξιολογητή Α</strong></p>
                            <p>{{ District::find($user->site->grader_district)->district_name }}</p>
                            {{ Form::hidden('grader_district', null, array('class' => 'pure-input-1')) }}

                            <p>{{ $user->site->grader_district_text }}</p>
                            {{ Form::hidden('grader_district_text', null, array('class' => 'pure-input-1')) }}

                            @if(isset($grader->id))
                                @if($grader->has_agreed)
                                    <div class="instructions white-font green little-block"><strong><i class="fa fa-thumbs-o-up"></i> O αξιολογητής Α που έχετε προτείνει, έχει αποδεχθεί την πρόσκλησή σας.</strong></div>
                                @endif
                                @if(Auth::user()->site->grader_agrees == 'na')
                                    <div class="instructions white-font orange little-block"><strong><i class="fa fa-info-circle"></i> O αξιολογητής Α που έχετε προτείνει, δεν έχει αποδεχθεί ακόμη την πρόσκλησή σας.</strong></div>                            
                                @endif
                            @endif
                    
                        @endif
                    
                    @endif
                    
                </fieldset>

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

            {{ Form::close() }}

        @else
            <p class='flash-message flash-error'>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
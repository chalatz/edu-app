@extends('layouts/default')

@section('content')

    <h1>Υποβολή Υποψηφιότητας Ιστότοπου</h1>

    {{ Form::open(array('route' => 'site.store', 'class' => 'pure-form pure-form-stacked site-form create-site-form', 'id' => 'confirmMe', 'name' => 'confirmMe')) }}

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
            <h3>Στοιχεία Αξιολογητή Α</h3>

            @include('layouts.partials.sites_form_graders_fields')
        
        </fieldset>

        {{ Form::checkbox('i_agree', 'yes', false, ['id' => 'i_agree', 'required']) }}
        <label for="i_agree" class="label-for-checkbox">
            Έχω διαβάσει τους <a href="http://www.eduwebawards.gr/requirements/" target="_blank">Όρους συμμετοχής</a> και συμφωνώ με αυτούς
        </label>
        <p class="error-message">{{ $errors->first('i_agree') }}</p> 
            
        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

@stop
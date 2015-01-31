@extends('layouts/default')

@section('content')

	<?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
    <?php $districts = ['' => 'Επιλέξτε...'] + District::lists('district_name', 'id'); ?>
    <?php $specialties = ['' => 'Επιλέξτε...'] + Specialty::lists('specialty_name', 'id'); ?>

    <?php
        $counties_array = array();
        foreach(County::all() as $county){
            $counties_array[$county->district_name][$county->id] = $county->county_name;
        }
        $counties_array = ['0' => 'Επιλέξτε...'] + $counties_array;
    ?>

    <?php 
        $lang_levels = [
            '' => 'Επιλέξτε Επίπεδο...',
            'A1' => 'B1 - Στοιχειώδης Γνώση',
            'A2' => 'A2 - Βασική Γνώση',
            'B1' => 'B1 - Μέτρια Γνώση',
            'B2' => 'B2 - Καλή Γνώση',
            'C1' => 'C1 - Πολύ καλή Γνώση',
            'C2' => 'C2 - Άριστη Γνώση',
        ];
    ?>

	@if($grader_type == 'a')

    	<h1>Εγγραφή Αξιολογητή Α</h1>

	@elseif($grader_type == 'b')

    	<h1>Εγγραφή Αξιολογητή Β</h1>

    	{{ Form::open(array('route' => 'grader.store', 'class' => 'pure-form pure-form-stacked grader-form', 'id' => 'confirmMeGrader', 'name' => 'confirmMeGrader')) }}

        @include('layouts.partials.graders_b_create_form')
            
        {{ Form::button('Καταχώριση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}

    {{ Form::close() }}

	@endif
    

@stop
@extends('layouts.admin')

@section('content')

    {{ Form::model($evaluation, array('method' => 'PATCH','route' => ['evaluation.update', $evaluation->id], 'class' => 'pure-form pure-form-stacked',  'id' => 'confirmMe', 'name' => 'confirmMe')) }}

        @include('layouts.partials.' .$criterion. '_criterion_form')
            
        {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

    {{ Form::close() }}

@stop
@extends('layouts.admin')

@section('content')

    <div class="evaluation-summaries">     
        <div class="site-info">
            <span class="site-info-label">Ιστότοπος:</span>
            <span class="site-name">{{ Site::find($evaluation->site_id)->title }}</span>
        </div>
        <div class="site-info">
            <span class="site-info-label">URL:</span>
            <span class="site-url"><a href="{{ Site::find($evaluation->site_id)->site_url }}" target="_blank">{{ Site::find($evaluation->site_id)->site_url }}</a></span>
        </div>
    </div>

    <p class="dynamic-criterion-grade-wrapper">Βαθμός: <span class="dynamic-criterion-grade green-font"></span></p>

    {{ Form::model($evaluation, array('method' => 'PATCH','route' => ['evaluation.update', $evaluation->id], 'class' => 'pure-form pure-form-stacked', 'id' => 'confirmMe', 'name' => 'confirmMe')) }}

        @include('layouts.partials.' .$criterion. '_criterion_form')
            
        {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

    {{ Form::close() }}

@stop
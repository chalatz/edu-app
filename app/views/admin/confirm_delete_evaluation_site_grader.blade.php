@extends('layouts.admin')

@section('content')

	<h1>Επιβεβαίωση Διαγραφής Ανάθεσης</h1>

    <h3>Έχετε επιλέξει να διαγράψετε την εξής ανάθεση</h3>

    <table class="pure-table">
        <thead>
            <th>Αξιολογητής</th>
            <th>Ιστότοπος</th>
        </thead>
        <tbody>
            <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
            <td>{{ $site->title }} ({{ $site->site_url }})</td>
        </tbody>
    </table>

    {{ Form::open(['method' => 'DELETE', 'route' => ['evaluation.destroy', $evaluation->id], 'class' => 'pure-form']) }}

        {{ Form::hidden('grader_type', 'a') }}

        {{Form::button('Διαγραφή', array('type' => 'submit', 'class' => 'pure-button pure-button-primary red', 'onclick' => 'return confirm("Είστε σίγουρος ότι επιθυμείτε να διαγράψετε αυτήν την ανάθεση;");'))}}

    {{ Form::close() }}


    {{ link_to_route('admin.assign_to_site', '&larr; Επιστροφή', [$site->id]) }}
       

@stop
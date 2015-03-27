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

    <p>
        {{ link_to_route ('evaluation.delete', 'Διαγραφή', [$evaluation->id], ['class' => 'anchor-button pure-button pure-button-secondary red'])}}
        {{ link_to_route('admin.assign_to_site', 'Επιστροφή', [$site->id]) }}
    </p>        

@stop
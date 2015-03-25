@extends('layouts.admin')

@section('content')


	<h1>Αξιολογήσεις Α</h1>

    <table id="evaluations-report-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Αξιολογητής Α</th>
                <th>Έχει αποδεχθεί</th>
                <th>Γιατί δεν έχει αποδεχθεί</th>
                <th>Βαθμός</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($evaluations as $evaluation)

                <tr>
                    <td>{{ Site::find($evaluation->site_id)->title }}</td>
                    <td><a href="{{ Site::find($evaluation->site_id)->site_url }}" target="_blank">{{ Site::find($evaluation->site_id)->site_url }}</a></td>
                    <td>{{ Grader::find($evaluation->grader_id)->grader_last_name }} {{ Grader::find($evaluation->grader_id)->grader_name }}</td>
                    <td>
                        @if($evaluation->can_evaluate == 'yes')Ναι @endif
                        @if($evaluation->can_evaluate == 'no') Όχι @endif
                        @if($evaluation->can_evaluate == 'na') Άγνωστο @endif
                    </td>
                    <td>@if($evaluation->can_evaluate == 'no') {{ $evaluation->why_not }} @endif</td>
                    <td>{{ $evaluation->total_grade }}</td>
                </tr>

            @endforeach
        </tbody>
        
        <tfoot>        
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Αξιολογητής Α</th>
                <th>Έχει αποδεχθεί</th>
                <th>Γιατί δεν έχει αποδεχθεί</th>
                <th>Βαθμός</th>
        </tfoot>

    </table>

@stop
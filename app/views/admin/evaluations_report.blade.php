@extends('layouts.admin')

@section('content')


	<h1>Αξιολογήσεις</h1>

    <table id="evaluations-report-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Αξιολογητής Α</th>
                <th>Έχει αποδεχθεί</th>
                <th>Γιατί δεν έχει αποδεχθεί</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($evaluations as $evaluation)

                <tr>
                    <td>{{ Site::find($evaluation->site_id)->title }}</td>
                    <td>{{ Site::find($evaluation->site_id)->site_url }}</td>
                    <td>{{ Grader::find($evaluation->grader_id)->grader_last_name }} {{ Grader::find($evaluation->grader_id)->grader_first_name }}</td>
                    <td>
                        @if($evaluation->can_evaluate == 'yes')Ναι @endif
                        @if($evaluation->can_evaluate == 'no') Όχι @endif
                        @if($evaluation->can_evaluate == 'na') Άγνωστο @endif
                    </td>
                    <td>@if($evaluation->can_evaluate == 'no') {{ $evaluation->why_not }} @endif</td>
                </tr>

            @endforeach
        </tbody>
        
        <tfoot>        
        
        </tfoot>

    </table>

@stop
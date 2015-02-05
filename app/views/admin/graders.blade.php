@extends('layouts.admin')

@section('content')


	<h1>Αξιολογητές Α</h1>

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Eπώνυμο</th>
                <th>Όνομα</th>
                <th>Email</th>
                <th>Τον πρότεινε</th>
                <th>Τον πρότεινε (email)</th>
                <th>Περιφέρεια</th>
                <th>Εδικότητα</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($graders as $grader)


                @if($grader->user->hasRole('grader'))

                    <tr>
                        <td>{{ $grader->grader_last_name }}</td>
                        <td>{{ $grader->grader_name }}</td>
                        <td>{{ $grader->user->email }}</td>
                        <td>@foreach($grader->sites as $site) {{$site->title}} ({{ $site->site_url }})<br> @endforeach</td>
                        <td>{{ $grader->from_who_email }}</td>
                        <td>@if($grader->grader_district_id != 100){{ District::find($grader->grader_district_id)->district_name }}@endif</td>
                        <td>@if(isset($grader->specialty)) {{Specialty::find($grader->specialty)->specialty_name}} @endif</td>
                    </tr>

                @endif

            @endforeach
        </tbody>

    </table>

@stop
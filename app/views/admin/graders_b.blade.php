@extends('layouts.admin')

@section('content')


	<h1>Αξιολογητές Β</h1>

    <table id="graders-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Eπώνυμο</th>
                <th>Όνομα</th>
                <th>Email</th>
                <th>Ειδικότητα</th>
                <th>Περιφέρεια</th>
                <th>Κατηγορίες που επιθυμεί</th>
                <th>Αξιολογητής Α στον προηγούμενο διαγωνισμό</th>
                <th>Αξιολογητής σε περισσότερους από έναν διαγωνισμούς</th>
                <th>Ξένες Γλώσσες</th>
                <th>Άλλες Ξένες Γλώσσες</th>
                <th>Δημιουργήθηκε</th>
                @if(Auth::user()->hasRole('ninja'))
                    <th>Μεταμφίεση</th>
                @endif
            </tr>
        </thead>
        
        <tbody>
            @foreach($graders as $grader)

                @if($grader->user->hasRole('grader_b'))

                    <tr>
                        <td>{{ $grader->grader_last_name }}</td>
                        <td>{{ $grader->grader_name }}</td>
                        <td>{{ $grader->user->email }}</td>
                        <td>@if(isset($grader->specialty)) {{Specialty::find($grader->specialty)->specialty_name}} @endif</td>
                        <td>@if($grader->district_id != 100){{ District::find($grader->district_id)->district_name }}@endif</td>
                        <td>{{ $grader->desired_category }}</td>
                        <td>{{ $grader->past_grader }}</td>
                        <td>{{ $grader->past_grader_more }}</td>
                        <td>
                            @if($grader->level_english_check == 'yes_english') Αγγλικά - {{ $grader->level_english }} @endif <br>
                            @if($grader->level_french_check == 'yes_french') Γαλλικά - {{ $grader->level_french }} @endif <br>
                            @if($grader->level_german_check == 'yes_german') Γερμανικά - {{ $grader->level_german }} @endif <br>
                            @if($grader->level_italian_check == 'yes_italian') Ιταλικά - {{ $grader->level_italian }} @endif
                        </td>
                        <td>@if(isset($grader->languages)) {{ $grader->languages }}  {{ $grader->languages_level }} @endif</td>
                        <td>{{ date('d / m / Y', strtotime($grader->created_at)) }}</td>
                        @if(Auth::user()->hasRole('ninja'))
                            <td>{{ link_to('/admin/masquerade/'.$grader->user_id, 'Μεταμφίεση') }}  </td>
                        @endif
                    </tr>

                @endif

            @endforeach
        </tbody>
        
        <tfoot>
        
            <th>Eπώνυμο</th>
            <th>Όνομα</th>
            <th>Email</th>
            <th>Ειδικότητα</th>
            <th>Περιφέρεια</th>
            <th>Κατηγορίες που επιθυμεί</th>
            <th>Αξιολογητής Α στον προηγούμενο διαγωνισμό</th>
            <th>Αξιολογητής σε περισσότερους από έναν διαγωνισμούς</th>
            <th>Ξένες Γλώσσες</th>
            <th>Άλλες Ξένες Γλώσσες</th>
            <th>Δημιουργήθηκε</th>    
        
        </tfoot>

    </table>

@stop
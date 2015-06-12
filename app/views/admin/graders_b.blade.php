@extends('layouts.admin')

@section('content')


	<h1>Αξιολογητές Β</h1>

    <p style="float: left" class="little-block light-blue white-font">
        <i class="fa fa-table"></i> 
        {{ link_to('/admin/graders_b/print', 'Εκτυπώσιμη Μορφή', ['target' => '_blank', 'class' => 'white-font']) }}
    </p>    

    <table id="graders-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                @if(Auth::user()->hasRole('ninja'))
                    <th>Μεταμφίεση</th>
                @endif
                <th>Έγκριση</th>
                <th>Κωδικός</th>
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

                    <?php
                        $grader_code = '';
                        if($grader->user->hasRole('grader')){
                            $grader_code = 'Α' . sprintf("%03d", $grader->id);
                        }
                        if($grader->user->hasRole('grader_b')){
                            $grader_code = 'Β' . sprintf("%03d", $grader->id);
                        }
                        if($grader->user->hasRole('grader') && $grader->user->hasRole('grader_b')){
                            $grader_code = 'ΑΒ' . sprintf("%03d", $grader->id);
                        }
                        if($grader->user->hasRole('admin')){
                            $grader_code = 'Γ' . sprintf("%03d", $grader->id);
                        }
                    ?>

                    <tr>
                        @if(Auth::user()->hasRole('ninja'))
                            <td>{{ link_to('/admin/masquerade/'.$grader->user_id, 'Μεταμφίεση') }}  </td>
                        @endif
                        <td>
                            @if($grader->approved && $grader->approved == 'yes')
                                Έχει Εγκριθεί από: <em>{{ User::find($grader->approver)->email }}</em>
                            @endif
                            @if(!isset($grader->approved) || $grader->approved == 'no')
                                {{ link_to_route('admin.approve_grader_b', 'Εγκρίνω', [$grader->id, Auth::user()->id], ['onclick' => 'return confirm("Είστε σίγουρος;");']) }}
                            @endif
                        </td>
                        <td>{{ $grader_code }}</td>
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
             @if(Auth::user()->hasRole('ninja'))
                <th></th>
            @endif
            <th></th>
            <th>Κωδικός</th>
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
@extends('layouts.bare')

@section('content')

    <table>
    
        <thead>
            <tr>
                <th>Κωδικός Site</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Κατηγορία</th>
                <th>Κατ Αξ.</th>
                <th>Αξιολογητής Β</th>
                <th>Email Αξιολ. Β</th>
                <th>Υπεύθ. Επικοινωνίας</th>
                <th>Email Υπεύθ. Επικοιν.</th>
                <th>Έχει αποδεχθεί;</th>
                <th>Γιατί δεν έχει αποδεχθεί</th>
                <th>Εκπαιδευτικός Ιστότοπος;</th>
                <th>Γιατί όχι Εκπαιδευτικός;</th>
                <th>Οριστική Βαθμολογία;</th>
                <th>Βαθμός</th>                
            </tr>

        </thead>
        
        <tbody>
            @foreach($evaluations as $evaluation)
                <?php $site =  Site::find($evaluation->site_id); ?>
                <?php
                    $grader = Grader::find($evaluation->grader_id);
                    $grader_code = '';
                    if($grader->user->hasRole('grader')){
                        $grader_code = 'Α' . sprintf("%03d", $grader->id);
                    }
                    if($grader->approved == 'yes'){
                        $grader_code = 'Β' . sprintf("%03d", $grader->id);
                    }
                    if($grader->user->hasRole('grader') && $grader->approved == 'yes'){
                        $grader_code = 'ΑΒ' . sprintf("%03d", $grader->id);
                    }
                    if($grader->user->hasRole('admin')){
                        $grader_code = 'Γ' . sprintf("%03d", $grader->id);
                    }
                ?>

                <tr>
                    <td>i{{ sprintf("%03d", $site->id) }}</td>
                    <td>{{ $site->title }}</td>
                    <td><a href="{{ $site->site_url }}" target="_blank">{{ $site->site_url }}</a></td>
                    <td>{{ $site->cat_id }}</td>
                    <td>@foreach ($grader->sites as $graders_site) {{$graders_site->cat_id}} @endforeach</td>
                    <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }} ({{ $grader_code }})</td>
                    <td>{{ $grader->user->email }}</td>
                    <td>{{ $site->contact_last_name }} {{ $site->contact_name }}</td>
                    <td>{{ $site->contact_email }}</td>
                    <td>
                        @if($evaluation->can_evaluate == 'yes')Ναι @endif
                        @if($evaluation->can_evaluate == 'no') Όχι @endif
                        @if($evaluation->can_evaluate == 'na') Άγνωστο @endif
                    </td>
                    <td>@if($evaluation->can_evaluate == 'no') {{ $evaluation->why_not }} @endif</td>
                    <td>
                        @if($evaluation->is_educational == 'yes')Ναι @endif
                        @if($evaluation->is_educational == 'no') Όχι @endif
                        @if($evaluation->is_educational == 'na') Άγνωστο @endif
                    </td>
                    <td>@if($evaluation->is_educational == 'no') {{ $evaluation->why_not_educational }} @endif</td>
                    <td>
                        @if($evaluation->finalized == 'yes')
                            Ναι
                        @else
                            Όχι
                        @endif
                    </td>
                    <td>{{ $evaluation->total_grade }}</td>
                </tr>

            @endforeach
        </tbody>        

    </table>

@stop
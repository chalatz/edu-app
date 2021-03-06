@extends('layouts.admin')

@section('content')

	<h1>Αξιολογήσεις Β</h1>

    <p style="float: left" class="little-block light-blue white-font">
        <i class="fa fa-table"></i> 
        {{ link_to('/admin/evaluations-report/print/b/', 'Εκτυπώσιμη Μορφή', ['target' => '_blank', 'class' => 'white-font']) }}
    </p>

    <table id="evaluations-b-report-table" class="admin-table pure-table pure-table-horizontal pure-table-striped pure-form">
    
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="grade-number-index"></th>
            <tr>
                <th>Κωδικός Site</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Κατηγορία</th>
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
                        $grader_code = 'ΑΑ' . sprintf("%03d", $grader->id);
                    }
                    if($grader->approved == 'yes'){
                        $grader_code = 'ΑΒ' . sprintf("%03d", $grader->id);
                    }
                    if($grader->user->hasRole('grader') && $grader->approved == 'yes'){
                        $grader_code = 'ΑΑΒ' . sprintf("%03d", $grader->id);
                    }
                    if($grader->user->hasRole('admin')){
                        $grader_code = 'ΑΓ' . sprintf("%03d", $grader->id);
                    }
                ?>

                <tr>
                    <td>i{{ sprintf("%03d", $site->id) }}</td>
                    <td>{{ $site->title }}</td>
                    <td><a href="{{ $site->site_url }}" target="_blank">{{ $site->site_url }}</a></td>
                    <td>{{ $site->cat_id }}</td>
                    @if($grader)
                        <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }} ({{ $grader_code }})</td>
                    @else
                        <td>--</td>
                    @endif
                    @if($grader)
                        <td>{{ $grader->user->email }}</td>
                    @else
                        <td>--</td>
                    @endif
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
        
        <tfoot>        
 
        </tfoot>

    </table>

@stop
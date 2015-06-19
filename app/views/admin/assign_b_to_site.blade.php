@extends('layouts.admin')

@section('content')

	<h1>Φάση Α - Αναθέσεις Ιστότοπου σε Αξιολογητές Β</h1>
    <p class="instructions">Ο λογαριασμός τους δεν περιέχει υποψηφιότητα.</p>    

    <p>Έπωνυμία: <strong>{{ $site->title }}</strong> (Κατηγορία: {{ $site->cat_id }}, Περιφέρεια: {{ $site->district_id }}, Κωδικός: {{ $site->id }})</p>
    <p>URL: {{ $site->site_url }}</p>

    @if($site->cat_id == 6)
        <p>Δημιουγός Ιστότοπου (από τη δήλωση υποφηφιότητας): {{ $site->creator }}</p>    
        <p>Αξιολογητής προτεινόμενος από τον Ιστότοπο: {{ $site->graders->first()->grader_last_name }} {{ $site->graders->first()->grader_name }}</p>
        @if($site->graders->first()->specialty)
            <p>Εδικότητα (από τη δήλωση του προτεινόμενου Αξιολογητή): {{ Specialty::find($site->graders->first()->specialty)->specialty_name }}</p>
        @endif
    @endif    

    <h2>Τρέχουσες αναθέσεις</h2>

    @if(isset($evaluations))
        <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
            <thead>
                <tr>
                    <th>Αξιολογητής</th>
                    <th>Ημ. Αποδοχής</th>
                    <th>Έχει αποδεχθεί;</th>
                    <th>Γιατί δεν έχει αποδεχθεί</th>
                    <th class="red white-font">Διαγραφή</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($evaluations as $evaluation)
                    <?php $grader = Grader::find($evaluation->grader_id); ?>
                    <tr>
                        <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
                        <td>
                            @if($evaluation->can_evaluate == 'yes')
                                {{ date('d / m / Y', strtotime($evaluation->assigned_at)) }}
                            @endif
                        </td>
                        <td>
                            @if($evaluation->can_evaluate == 'yes')Ναι @endif
                            @if($evaluation->can_evaluate == 'no') Όχι @endif
                            @if($evaluation->can_evaluate == 'na') Άγνωστο @endif
                        </td>
                        <td>@if($evaluation->can_evaluate == 'no') {{ $evaluation->why_not }} @endif</td>
                        <td>{{ link_to_route('admin.confirm_delete_evaluation_site_grader_b', 'Διαγραφή', [$evaluation->id], ['class' => 'red-font']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Δεν υπάρχουν αναθέσεις για αυτόν τον Ιστότοπο</p>
    @endif

    <h3>Αξιολογητές Β (εγκεκριμένοι)</h3>

    {{ Form::open(array('route' => 'evaluation.store', 'class' => 'pure-form pure-form-stacked')) }}
    
        <select name="grader_id" id="grader_id" class="chosen-select">
            <option value="">Επιλέξτε Αξιολογητή Β...</option>
            @foreach(Grader::all() as $grader)
                 @if($grader->approved == 'yes')
                    <?php $the_evals = Evaluation::where('grader_id', $grader->id)->get(); ?>
                    <option value="{{ $grader->id }}">
                        {{ $grader->grader_last_name }} {{ $grader->grader_name }} , {{ $grader->user->email }},
                        Επιθ. {{ $grader->desired_category }},
                        Περ. {{ $grader->grader_district_id }},
                        Αξιολ Α. @foreach($the_evals as $the_eval) {{ $the_eval->site_id }}| @endforeach,
                        @if ($grader->specialty != NULL) , {{ Specialty::find($grader->specialty)->specialty_name }}  @endif 
                    </option>
                @endif
            @endforeach
        </select>
        <p class="error-message">{{ $errors->first('grader_id') }}</p>

        {{ Form::hidden('site_id', $site->id); }}
        {{ Form::hidden('grader_type', 'b'); }}

        <p>{{ Form::checkbox('send_to_grader', 'send_to_grader', true) }} Να σταλεί email στον Αξιολογητή;</p>        
                        
        <p>{{ Form::button('Υποβολη Ανάθεσης', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}</p>

    {{ Form::close() }}

@stop
@extends('layouts.admin')

@section('content')

	<h1>Αναθέσεις Ιστότοπου σε Αξιολογητές Α</h1>

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
                        <td>{{ link_to_route('admin.confirm_delete_evaluation_site_grader', 'Διαγραφή', [$evaluation->id], ['class' => 'red-font']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Δεν υπάρχουν αναθέσεις για αυτόν τον Ιστότοπο</p>
    @endif

    <h3>Αξιολογητές Α</h3>

    {{ Form::open(array('route' => 'evaluation.store', 'class' => 'pure-form pure-form-stacked')) }}
    
        <p class="instructions">
            <strong>Επιθ.</strong>  - Επιθυμητές Κατηγορίες<br>
            <strong>Περ.</strong>   - Περιφέρεια<br>
            <strong>Αξιολ Α.</strong> - Τυχόν sites που έχει αξιολογήσει στην Α Φάση<br>
            <strong>Κωδ. site.</strong> - Κωδικός site υποψηφιότητας Αξιολογητή<br>
            <strong>Κατ. site.</strong> - Κατηγορία site υποψηφιότητας Αξιολογητή
        </p>

        <select name="grader_id" id="grader_id" class="chosen-select">
            <option value="">Επιλέξτε Αξιολογητή Α...</option>
            @foreach(Grader::all() as $grader)
                @if($grader->user->hasRole('grader'))
                <?php $the_evals = Evaluation::where('grader_id', $grader->id)->get(); ?>
                 @foreach($grader->sites as $the_site)
                    <?php $the_cat_id = $the_site->cat_id; ?>
                    <?php $the_site_id = $the_site->id; ?>

                @endforeach
                    @if($grader->district_id != 100)
                        <?php $the_district_id = $grader->district_id; ?>
                    @else
                        @foreach($grader->sites as $the_site)
                            <?php $the_district_id = $the_site->district_id; ?>
                            <?php $the_cat_id = $the_site->cat_id; ?>
                        @endforeach
                    @endif

                    @if($the_district_id != $site->district_id && $site->cat_id != $the_cat_id && $site->id != $the_site_id)

                        <option value="{{ $grader->id }}">
                            {{ $grader->grader_last_name }} {{ $grader->grader_name }} , {{ $grader->user->email }}, 
                            Επιθ. {{ $grader->desired_category }}, 
                            Περ. {{ $the_district_id }}, 
                            Αξιολ Α. @foreach($the_evals as $the_eval) {{ $the_eval->site_id }}| @endforeach, 
                            Κωδ. site. {{ $the_site_id }}, 
                            Κατ. site. {{ $the_cat_id }}
                            @if($grader->specialty != NULL) , {{ Specialty::find($grader->specialty)->specialty_name }}  @endif
                        </option>

                    @endif
                @endif
            @endforeach
        </select>
        <p class="error-message">{{ $errors->first('grader_id') }}</p>

        {{ Form::hidden('site_id', $site->id); }}
        {{ Form::hidden('grader_type', 'a'); }}

        <p>{{ Form::checkbox('send_to_grader', 'send_to_grader', true) }} Να σταλεί email στον Αξιολογητή;</p>

        <p>{{ Form::button('Υποβολη Ανάθεσης', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}</p>

    {{ Form::close() }}

@stop
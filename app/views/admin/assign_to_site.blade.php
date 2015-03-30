@extends('layouts.admin')

@section('content')

	<h1>Αναθέσεις Ιστότοπου σε Αξιολογητές Α</h1>

    <p>Έπωνυμία: {{ $site->title }}</p>
    <p>URL: {{ $site->site_url }}</p>

    <h2>Τρέχουσες αναθέσεις</h2>

    @if(isset($evaluations))
        <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
            <thead>
                <tr>
                    <th>Αξιολογητής</th>
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
    
        <select name="grader_id" id="grader_id" class="chosen-select">
            <option value="">Επιλέξτε Αξιολογητή Α...</option>
            @foreach(Grader::all() as $grader)
                 @if($grader->user->hasRole('grader'))
                    <option value="{{ $grader->id }}">{{ $grader->grader_last_name }} {{ $grader->grader_name }}</option>
                @endif
            @endforeach
        </select>
        <p class="error-message">{{ $errors->first('grader_id') }}</p>

        {{ Form::hidden('site_id', $site->id); }}
        {{ Form::hidden('grader_type', 'a'); }}

        <p>{{ Form::checkbox('send_to_grader', 'send_to_grader', false) }} Να σταλεί email στον Αξιολογητή;</p>
        <p>{{ Form::checkbox('send_to_site', 'send_to_site', false) }} Να σταλεί email στον Ιστότοπο;</p>

        <p>{{ Form::button('Υποβολη Ανάθεσης', array('type' => 'submit', 'class' => 'pure-button pure-button-primary')) }}</p>

    {{ Form::close() }}

@stop
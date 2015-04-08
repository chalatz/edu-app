@extends('layouts.admin')

@section('content')

	<h1>Αξιολογήσεις Α</h1>

<!--     <p style="float: left" class="little-block light-blue white-font">
        <i class="fa fa-table"></i> 
        {{ link_to('/admin/evaluations-report/print/', 'Εκτυπώσιμη Μορφή', ['target' => '_blank', 'class' => 'white-font']) }}
    </p> -->

    <table id="" class="admin-table pure-table pure-table-horizontal pure-table-striped pure-form">
    
        <thead>
            <tr>
                <th>Αξιολογητής</th>
                <th>Ιστότοπος που τον πρότεινε</th>
                <th>Αξιολογητής 1</th>
                <th>Αξιολογητής 2</th>
                <th>Βαθμός Αξ. 1</th>
                <th>Βαθμός Αξ. 2</th>
                <th>Αποδέχτηκε ο Αξ. 1 ;</th>
                <th>Αποδέχτηκε ο Αξ. 2 ;</th>
                <th>Εκπαιδευτικός ο Ιστότοπος από τον Αξ. 1;</th>
                <th>Εκπαιδευτικός ο Ιστότοπος από τον Αξ. 2;</th>
            </tr>

        </thead>
        
        <tbody>
            @foreach($evaluations as $evaluation)
                <?php $site =  Site::find($evaluation->site_id); ?>
                <?php $grader = Grader::find($evaluation->grader_id); ?>
                <?php $from_who_site = $grader->sites ?>
                <tr>
                    <td>{{ $grader->grader_last_name }}  {{ $grader->grader_name }}</td>
                    <td>@foreach ($from_who_site as $fsite) {{ $fsite->title }} ({{ $fsite->site_url }}) @endforeach</td>
                    
                    @foreach ($from_who_site as $fsite)
                        <?php $feval = Evaluation::where('site_id', '=', $fsite->id)->get(); ?>
                        <?php $sum = 0; ?>
                        @foreach ($feval as $fev)
                            <?php $sum += $fev->total_grade; ?>
                            <td>
                                {{ Grader::find($fev->grader_id)->grader_last_name }} {{ Grader::find($fev->grader_id)->grader_name }}
                            </td>
                        @endforeach
                    @endforeach
                    
                    @foreach ($from_who_site as $fsite)
                        <?php $feval = Evaluation::where('site_id', '=', $fsite->id)->get(); ?>
                        <?php $sum = 0; ?>
                        @foreach ($feval as $fev)
                            <?php $sum += $fev->total_grade; ?>
                            <td>
                                {{ $fev->total_grade }}
                            </td>
                        @endforeach
                    @endforeach
                    
                    @foreach ($from_who_site as $fsite)
                        <?php $feval = Evaluation::where('site_id', '=', $fsite->id)->get(); ?>
                        <?php $sum = 0; ?>
                        @foreach ($feval as $fev)
                            <?php $sum += $fev->total_grade; ?>
                            <td>
                                {{ $fev->can_evaluate }}
                            </td>
                        @endforeach
                    @endforeach
                    
                    @foreach ($from_who_site as $fsite)
                        <?php $feval = Evaluation::where('site_id', '=', $fsite->id)->get(); ?>
                        <?php $sum = 0; ?>
                        @foreach ($feval as $fev)
                            <?php $sum += $fev->total_grade; ?>
                            <td>
                                {{ $fev->is_educational }}
                            </td>
                        @endforeach
                    @endforeach
                    
                </tr>
            @endforeach
        </tbody>
        
        <tfoot>        
 
        </tfoot>

    </table>

@stop
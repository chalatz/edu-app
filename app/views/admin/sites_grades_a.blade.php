@extends('layouts.admin')

@section('content')

	<h1>Φάση Α - Βαθμολογίες Υποψήφιων Ιστότοπων</h1>

    <div style="margin-right: 1em; display: inline-block; padding: .5em" class="green white-font">Διαφορά μικρότερη από 20%</div>
    <div style="margin-right: 1em; display: inline-block; padding: .5em" class="red white-font">Διαφορά μεγαλύτερη από 20%</div>
    <div style="margin-right: 1em; display: inline-block; padding: .5em" class="orange white-font">Έχει βαθμολογήσει μόνο ο ένας</div>
    <div style="margin-right: 1em; display: inline-block; padding: .5em; background: #000" class="white-font">Δεν έχει βαθμολογήσει κανένας</div>

    <table id="sites-grades-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>            
            <tr>
                <th>Κωδικός</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Κατηγορία</th>
                @for($i = 1; $i <= $max_evals; $i++)
                    <th>Αξιολ. {{$i}}</th>
                @endfor
                @for($i = 1; $i <= $max_evals; $i++)
                    <th>Βαθμός {{$i}}</th>
                @endfor                
                <th>Διαφορά</th>
                <th>Ανάθεση Α</th>
                <th>Ανάθεση Β</th>
                @if(Auth::user()->hasRole('ninja'))
                    <th>Μεταμφίεση</th>
                @endif
            </tr>
        </thead>
        
        <tbody>
            @foreach($sites as $site)
            <?php
                $evaluations = Evaluation::where('site_id', $site->id)->get();
                $eval_count = $evaluations->count();
            ?>

                <tr>
                    <td>i{{ sprintf("%03d", $site->id) }}</td>
                    <td>{{ $site->title }}</td>
                    <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <?php $i = 0; ?>
                    @foreach($evaluations as $evaluation)                    
                        <?php $grader = Grader::find($evaluation->grader_id); ?>
                        @if($grader)
                            <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }} (αξ{{ sprintf("%03d", $grader->id) }})</td>
                        @else
                            <td>--</td>
                        @endif                           
                    @endforeach                    
                    @if($max_evals > $eval_count)
                        <?php $remaining = $max_evals - $eval_count; ?>                 
                        <?php for($i = 0; $i < $remaining; $i++): ?>
                            <td></td>
                        <?php endfor; ?>
                    @endif 
                    
                    @foreach($evaluations as $evaluation)
                        <td>{{ $evaluation->total_grade }}</td>
                    @endforeach
                    @if($max_evals > $eval_count)
                        <?php $remaining = $max_evals - $eval_count; ?>                 
                        <?php for($i = 0; $i < $remaining; $i++): ?>
                            <td></td>
                        <?php endfor; ?>
                    @endif
                    
                    <?php $tg = array(); $j = 0; $tg[0] = ''; $tg[1] = ''; ?>                        
                    @foreach($evaluations as $evaluation)
                        <?php
                            $tg[$j] = $evaluation->total_grade;
                            $j = $j + 1;
                        ?>
                    @endforeach
                    <?php
                        $bgc = '#fff';
                        $dif = abs($tg[0] - $tg[1]);
                        if( $dif > 20 && ( abs($tg[0]) >= 20 || abs($tg[1]) >= 20 ) ) {
                            $bgc = '#dd514c';
                        }
                        if($dif <= 20 && (abs($tg[0]) >= 20 || abs($tg[1]) >= 20)) {
                            $bgc = '#5eb95e';
                        }
                        if(abs($tg[0]) == 0 && abs($tg[1]) >= 20) {
                            $bgc = '#F37B1D';
                        }
                        if(abs($tg[0]) >= 0 && abs($tg[1]) == 0) {
                            $bgc = '#F37B1D';
                        }
                        if(abs($tg[0]) == 0 && abs($tg[1]) == 0) {
                            $bgc = '#000';
                        }
                    ?>
                    
                    <td style="background: {{ $bgc }}; color: #fff; padding: .5em; text-align: center; font-weight: bold;">{{ $dif }}</td>
                    
                    <td>{{ link_to_route('admin.assign_to_site', 'Ανάθεση σε Αξιολ. Α', [$site->id]) }}</td>


                    <td>{{ link_to_route('admin.assign_b_to_site', 'Ανάθεση σε Αξιολ. Β', [$site->id]) }}</td>
                    
                    @if(Auth::user()->hasRole('ninja'))
                        <td>{{ link_to('/admin/masquerade/'.$site->user_id, 'Μεταμφίεση') }}  </td>
                    @endif
                                        
                </tr>

            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                @for($i = 1; $i <= $max_evals; $i++)
                    <th></th>
                @endfor
                @for($i = 1; $i <= $max_evals; $i++)
                    <th></th>
                @endfor                
                <th></th>
                <th></th>
                <th></th>
                @if(Auth::user()->hasRole('ninja'))
                    <th></th>
                @endif
            </tr>
        </tfoot>

    </table>

@stop
@extends('layouts.bare')

@section('content')

    <table id="sites-grades-table-print">
    
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
            </tr>
        </thead>
        
        <tbody>
            @foreach($sites as $site)
                <?php
                    $evaluations = Evaluation::where('site_id', $site->id)->where('phase', 'a')->get();
                    $eval_count = $evaluations->count();

                    $tg_sum = 0;
                    foreach($site->graders as $grader){
                        $graders_evals = Evaluation::where('grader_id', $grader->id)->where('phase', 'a')->get();
                        foreach($graders_evals as $grader_eval){
                            $tg_sum += $grader_eval->total_grade;
                        }
                    }
                ?>

                @if($tg_sum > 0)
                    <tr>
                        <td>i{{ sprintf("%03d", $site->id) }}</td>
                        <td>{{ $site->title }}</td>
                        <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>
                        <td>{{ $site->cat_id }}</td>
                        <?php $i = 0; ?>
                        @foreach($evaluations as $evaluation)                    
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
                            @if($grader)
                                <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }} ({{ $grader_code }})</td>
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

                        <?php // tg stands for total grades ?>
                        <?php $tg = array(); $j = 0; $tg[0] = ''; $tg[1] = ''; ?>                        
                        @foreach($evaluations as $evaluation)
                            <?php
                                $tg[$j] = $evaluation->total_grade;
                                $j = $j + 1;
                            ?>
                        @endforeach

                        <?php $tg_rsorted = $tg; rsort($tg_rsorted); ?>
                        
                        @foreach($evaluations as $evaluation)
                            <td @if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0) style="color: green; font-weight: bold" @endif>
                                {{ $evaluation->total_grade }}
                            </td>
                        @endforeach

                        @if($max_evals > $eval_count)
                            <?php $remaining = $max_evals - $eval_count; ?>                 
                            <?php for($i = 0; $i < $remaining; $i++): ?>
                                <td></td>
                            <?php endfor; ?>
                        @endif
                        
                        <?php
                            $bgc = '#fff';
                            $dif = abs($tg_rsorted[0] - $tg_rsorted[1]);
                            if( $dif > 20 && ( abs($tg_rsorted[0]) >= 20 || abs($tg_rsorted[1]) >= 20 ) ) {
                                $bgc = '#dd514c';
                            }
                            if($dif <= 20 && (abs($tg_rsorted[0]) >= 20 || abs($tg_rsorted[1]) >= 20)) {
                                $bgc = '#5eb95e';
                            }
                            if(abs($tg_rsorted[0]) == 0 && abs($tg_rsorted[1]) >= 20) {
                                $bgc = '#F37B1D';
                            }
                            if(abs($tg_rsorted[0]) >= 20 && abs($tg_rsorted[1]) <= 1) {
                                $bgc = '#F37B1D';
                            }
                            if(abs($tg_rsorted[0]) >= 20 && abs($tg_rsorted[1]) == 0) {
                                $bgc = '#b2beb5';
                            }
                            if(abs($tg_rsorted[0]) == 0 && abs($tg_rsorted[1]) == 0) {
                                $bgc = '#000';
                            }
                        ?>
                        
                        <td style="background: {{ $bgc }}; color: #fff; padding: .5em; text-align: center; font-weight: bold;">{{ $dif }}</td>
                                            
                    </tr>
                @endif

            @endforeach
        </tbody>    

    </table>

@stop
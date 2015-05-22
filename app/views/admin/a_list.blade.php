@extends('layouts.admin')

@section('content')

    <h1>Φάση Α - Αποτελέσματα Κατηγορίας <span id="the_cat_id">{{ $cat_id }}</span> </h1>

    <p style="text-align: center" class="little-block light-blue white-font">
        <i class="fa fa-table"></i> 
        {{ link_to('/admin/a-list/print/'.$cat_id, 'Εκτυπώσιμη Μορφή', ['target' => '_blank', 'class' => 'white-font']) }}
        (Επιλογή όλων, αντιγραφή και επικόλληση στο excel)
    </p>

    <div class="pure-g">
        @for($l =1; $l <= 6; $l++)
                @if($l != $cat_id && $l !=5)
                    <div class="pure-u-1 pure-u-md-1-4">
                        <div class="aligned-block orange white-font">
                            {{ link_to_route('admin.a_list', 'Κατηγορία '. $l , $l, ['class' => 'white-font']) }}
                        </div>
                    </div>
                @endif
        @endfor
    </div>

    <table id="a-list-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>            
            <tr>
                <th>Κωδικός</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Βαθμός 1</th>
                <th>Βαθμός 2</th>
                <th>Μ.Ο</th>
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

                        <?php // tg stands for total grades ?>
                        <?php $tg = array(); $j = 0; $tg[0] = ''; $tg[1] = ''; ?>                        
                        @foreach($evaluations as $evaluation)
                            <?php
                                $tg[$j] = $evaluation->total_grade;
                                $j = $j + 1;
                            ?>
                        @endforeach

                        <?php $tg_rsorted = $tg; rsort($tg_rsorted); ?>

                        <td>
                            {{ $tg_rsorted[0] }}
                        </td>
                        <td>
                            {{ $tg_rsorted[1] }}
                        </td>

                        @if($tg_rsorted[0] >= 20 && $tg_rsorted[1] >= 20)
                            <?php $mo = ($tg_rsorted[0] + $tg_rsorted[1]) / 2; ?>
                        @else
                            <?php $mo = 0; ?>
                        @endif
                        
                        <td class="mo">{{ $mo }}</td>

                    </tr>
                @endif

            @endforeach
        </tbody>
        
        <tfoot>
        </tfoot>

    </table>
@stop
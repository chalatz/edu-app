@extends('layouts.admin')

@section('content')

    <h1>Φάση Α - Βαθμολογίες Υποψήφιων Ιστότοπων (χωρίς τους αποκλειόμενους)</h1>
    <p class="instructions">Χωρίς τους ιστότοπους των οποίων οι προτεινόμενοι αξιολογητές Α δεν αξιολόγησαν</p>

    <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-4">
            <div class="aligned-block green white-font">Διαφορά μικρότερη από 20%</div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4">
            <div class="aligned-block red white-font">Διαφορά μεγαλύτερη από 20%</div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4">
            <div class="aligned-block orange white-font">Έχει βαθμολογήσει μόνο ο ένας</div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4">
            <div class="aligned-block black white-font">Δεν έχει βαθμολογήσει κανένας</div>
        </div>
        <div class="pure-u-1 pure-u-md-1">
            <div class="aligned-block dark-gray white-font">Έχει βαθμολογήσει μόνο ο ένας, χωρίς ο άλλος να ασχοληθεί</div>
        </div>
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
                    $evaluations = Evaluation::where('site_id', $site->id)->get();
                    $eval_count = $evaluations->count();

                    $tg_sum = 0;
                    foreach($site->graders as $grader){
                        $graders_evals = Evaluation::where('grader_id', $grader->id)->get();
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
@extends('layouts.bare')

@section('content')

    <table>
    
        <thead>            
            <tr>
                <th>email</th>
                <th>Ονομασία</th>
                <th>Δημιουργός</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($sites as $site)
                @if(!in_array($site->id, $non_educational))
                    <?php
                        $evaluations = Evaluation::where('site_id', $site->id)->get();
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
                            <td>{{ $site->contact_email }}</td>
                            <td>{{ $site->title }}</td>
                            <td>{{ $site->creator }}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
        
        <tfoot>

        </tfoot>

    </table>

@stop
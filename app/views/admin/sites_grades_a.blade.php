@extends('layouts.admin')

@section('content')

	<h1>Φάση Α - Βαθμολογίες Υποψήφιων Ιστότοπων</h1>

    <table id="sites-grades-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th colspan="2">Αξιολογητές</th>
                <th colspan="2">Βαθμολογίες</th>
                <th>Διαφορά</th>
                @if(Auth::user()->hasRole('ninja'))
                    <th>Μεταμφίεση</th>
                @endif
            </tr>
        </thead>
        
        <tbody>
            @foreach($sites as $site)
            <?php
                $evaluations = Evaluation::where('site_id', $site->id)->get();
            ?>

                <tr>
                    <td>{{ $site->title }}</td>
                    <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>

                    @foreach($evaluations as $evaluation)                    
                        <?php $grader = Grader::find($evaluation->grader_id); ?>
                        <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>                        
                    @endforeach
                    
                    @foreach($evaluations as $evaluation)
                        <td>{{ $evaluation->total_grade }}</td>
                    @endforeach
                    
                    <?php $tg = array(); $j = 0; $tg[0] = ''; $tg[1] = ''; ?>                        
                    @foreach($evaluations as $evaluation)
                        <?php
                            $tg[$j] = $evaluation->total_grade;
                            $j = $j + 1;
                        ?>
                    @endforeach
                    <?php $dif = abs($tg[0] - $tg[1]); ?>                        
                    @if($dif > 20) 
                        <td style="background: red; ">{{ $dif }}</td>
                    @else
                        <td class="green white-font">{{ $dif }}</td>
                    @endif

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
            </tr>
        </tfoot>

    </table>

@stop
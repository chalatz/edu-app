@extends('layouts.bare')

@section('content')

    <h1>Φάση Α - Αποτελέσματα Κατηγορίας {{ $cat_id }}</h1>

    <table id="a-list-table-print">
    
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

    </table>

    <script src="{{ asset('js/jquery.js') }}"></script>
    
    <script>

        var $tbody = $('#a-list-table-print tbody');
        $tbody.find('tr').sort(function(a,b){ 
            var tda = $(a).find('td:eq(5)').text(); // can replace 1 with the column you want to sort on
            var tdb = $(b).find('td:eq(5)').text(); // this will sort on the second column
                    // if a < b return 1
            return tda < tdb ? 1 
                   // else if a > b return -1
                   : tda > tdb ? -1 
                   // else they are equal - return 0    
                   : 0;           
        }).appendTo($tbody);

        function GetUnique(inputArray)
        {
            var outputArray = [];
            
            for (var i = 0; i < inputArray.length; i++)
            {
                if ((jQuery.inArray(inputArray[i], outputArray)) == -1)
                {
                    outputArray.push(inputArray[i]);
                }
            }
           
            return outputArray;
        }

    function get_ten_highest(){
        var mos = [], i = 0;
        $('td.mo').each(function(){
          mos[i] = $(this).text() * 1;
          i++;
        });

        var uniq = GetUnique(mos);

        $('td.mo').each(function(){
        var $this = $(this),
            the_val = $(this).text() * 1;
          if(the_val >= uniq[9]){
            $(this).css({"background":"#1f8dd6", "color":"#fff", "font-weight":"bold"});
          }
        });
    }

    get_ten_highest();

    </script>

@stop
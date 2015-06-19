@extends('layouts.admin')

@section('content')

    <h1>Φάση Γ - Αποτελέσματα Κατηγορίας <span id="the_cat_id">{{ $cat_id }}</span></h1>

    <div class="pure-g">
        @for($l =1; $l <= 6; $l++)
                @if($l != $cat_id && $l !=5)
                    <div class="pure-u-1 pure-u-md-1-4">
                        <div class="aligned-block orange white-font">
                            {{ link_to_route('admin.c_list', 'Κατηγορία '. $l , $l, ['class' => 'white-font']) }}
                        </div>
                    </div>
                @endif
        @endfor
    </div> 

    <table id="c-list-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Κωδικός</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Δημιουργός</th>
                <th>Φ.Α: 1</th>
                <th>Φ.Α: 2</th>
                <th>Φ.Β: 1</th>
                <th>Φ.Β: 2</th>
                <th>Φ.Γ: 1</th>
                <th>Φ.Γ: 2</th>
                <th>Μ.Ο</th>
            </tr>
        </thead>

        <tbody>
            
            @foreach ($sites as $site_id=>$sites_arr)
                @if($sites_arr['the_cat_id'] == $cat_id)
                    <?php $site = Site::find($site_id); ?>
                    <tr>
                        <td>i{{ sprintf("%03d", $site_id) }}</td>
                        <td>{{ $site->title }}</td>
                        <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>
                        <td>{{ $site->creator }}</td>
                        <td 
                            @if($sites_arr['grade_a_1'] == $sites_arr['min_grade'] || $sites_arr['grade_a_1'] == $sites_arr['max_grade'])
                               style="background: red; color: white"
                           @else
                                style="background: green; color: white"
                           @endif
                        >
                            {{ $sites_arr['grade_a_1'] }}
                        </td>
                        <td 
                            @if($sites_arr['grade_a_2'] == $sites_arr['min_grade'] || $sites_arr['grade_a_2'] == $sites_arr['max_grade'])
                               style="background: red; color: white"
                           @else
                                style="background: green; color: white"
                           @endif
                        >
                            {{ $sites_arr['grade_a_2'] }}
                        </td>
                                                <td 
                            @if($sites_arr['grade_b_1'] == $sites_arr['min_grade'] || $sites_arr['grade_b_1'] == $sites_arr['max_grade'])
                               style="background: red; color: white"
                           @else
                                style="background: green; color: white"
                           @endif
                        >
                            {{ $sites_arr['grade_b_1'] }}
                        </td>
                        <td 
                            @if($sites_arr['grade_b_2'] == $sites_arr['min_grade'] || $sites_arr['grade_b_2'] == $sites_arr['max_grade'])
                               style="background: red; color: white"
                           @else
                                style="background: green; color: white"
                           @endif
                        >
                            {{ $sites_arr['grade_b_2'] }}
                        </td>
                        <td 
                            @if($sites_arr['grade_c_1'] == $sites_arr['min_grade'] || $sites_arr['grade_c_1'] == $sites_arr['max_grade'])
                               style="background: red; color: white"
                           @else
                                style="background: green; color: white"
                           @endif
                        >
                            {{ $sites_arr['grade_c_1'] }}
                        </td>
                        <td 
                            @if($sites_arr['grade_c_2'] == $sites_arr['min_grade'] || $sites_arr['grade_c_2'] == $sites_arr['max_grade'])
                               style="background: red; color: white"
                           @else
                                style="background: green; color: white"
                           @endif
                        >
                            {{ $sites_arr['grade_c_2'] }}
                        </td>
                        <td class="mo">{{ $sites_arr['average'] }}</td>                       
                    </tr>
                @endif
            @endforeach

        </tbody>    

    </table>   

@stop
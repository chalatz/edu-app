@extends('layouts.admin')

@section('content')

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">

        <thead>
            <tr>
                <th>Κωδικός</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Κατηγορία</th>
                <th>Περιφέρεια</th>
                <th>Βαθμός στη Φάση</th>
            </tr>
        </thead>

        <tbody>
            @foreach($evals as $eval)
              <?php $site = Site::find($eval->site_id); ?>
              <?php $the_final_grade = 0; ?>
              @if(Grade::where('site_id', $eval->site_id)->count() > 0)
                <?php $grade = Grade::where('site_id', $eval->site_id)->first(); ?>
                <?php $the_final_grade = $grade->the_final_grade; ?>
              @endif

                <tr>
                    <td>i{{ sprintf("%03d", $site->id) }}</td>
                    <td>{{ $site->title }}</td>
                    <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>{{ District::find($site->district_id)->district_name }}</td>
                    <td>{{ $the_final_grade }}</td>
                </tr>

            @endforeach
        </tbody>

    </table>

@stop

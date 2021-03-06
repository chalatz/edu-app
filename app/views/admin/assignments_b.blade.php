@extends('layouts.bare')

@section('content')


	<h1>Αναθέσεις</h1>

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
        <thead>
            <tr>
                <th>Ιστότοπος</th>
                <th>site_id</th>
                <th>past evals</th>
                <th>site</th>
                <th>site του</th>
                <th>Αξιολογητής</th>
                <th>grader_id</th>
                <th>Περιφέρεια Ιστότοπου</th>
                <th>Περιφέρεια Αξιολογητή</th>
                <th>Κατηγορία Ιστότοπου</th>
                <th>Κατηγορία Αξιολογητή</th>
                <th>Κατηγορίες που επιθυμεί ο Αξιολογητής</th>
                <th>grader email</th>
            </tr>                
        </thead>
        
        <tbody>
            @foreach($evaluations as $evaluation)
                <?php $site = Site::find($evaluation->site_id); $grader = Grader::find($evaluation->grader_id); ?>
                <tr>
                    <td>{{ $site->title }} ( <a href="{{ $site->site_url }}">{{ $site->site_url }}</a> )</td>
                    <td>{{ $site->id }}</td>
                    <td>
                        <?php $the_evals = Evaluation::where('grader_id', $grader->id)->get(); ?>
                        @foreach($the_evals as $the_eval)
                            {{ $the_eval->site_id }}|
                        @endforeach
                    </td>
                    <td>
                        <?php $the_user = User::find($grader->user_id); ?>
                        @if($the_user->hasRole('site'))
                            <?php $the_sites = Site::where('user_id', $the_user->id)->get(); ?>
                            @foreach($the_sites as $the_site) {{$the_site->id}} @endforeach
                        @else
                            0
                        @endif
                    </td>
                    <td>
                        @foreach($grader->sites as $graders_site) {{ $graders_site->id }} @endforeach
                    </td>
                    <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
                    <td>{{ $grader->id }}</td>
                    <td>{{ $site->district_id }}</td>
                    <td>{{ $grader->grader_district_id }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>
                        @foreach($grader->sites as $graders_site2) {{ $graders_site2->cat_id }} @endforeach
                    </td>
                    <td>{{ $grader->desired_category }}</td>
                    <td>{{ $grader->user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
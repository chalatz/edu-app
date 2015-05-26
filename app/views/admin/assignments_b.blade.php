@extends('layouts.bare')

@section('content')


	<h1>Αναθέσεις</h1>

    <table>
        <thead>
            <tr>
                <th>Ιστότοπος</th>
                <th>site_id</th>
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
                        @foreach($grader->sites as $site) {{ $site->id }} @endforeach
                    </td>
                    <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
                    <td>{{ $grader->id }}</td>
                    <td>{{ $site->district_id }}</td>
                    <td>{{ $grader->grader_district_id }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>
                        @foreach($grader->sites as $site) {{ $site->cat_id }} @endforeach
                    </td>
                    <td>{{ $grader->desired_category }}</td>
                    <td>{{ $grader->user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
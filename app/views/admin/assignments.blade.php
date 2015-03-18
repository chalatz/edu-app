@extends('layouts.bare')

@section('content')


	<h1>Αναθέσεις</h1>

    <table>
        <thead>
            <tr>
                <th>Ιστότοπος</th>
                <th>Αξιολογητής</th>
                <th>Περιφέρεια Ιστότοπου</th>
                <th>Περιφέρεια Αξιολογητή</th>
                <th>Κατηγορία Ιστότοπου</th>
                <th>Κατηγορία Αξιολογητή</th>
            </tr>                
        </thead>
        
        <tbody>
            @foreach($evaluations as $evaluation)
                <?php $site = Site::find($evaluation->site_id); $grader = Grader::find($evaluation->grader_id); ?>
                <tr>
                    <td>{{ $site->title }} ( <a href="{{ $site->site_url }}">{{ $site->site_url }}</a> )</td>
                    <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
                    <td>{{ $site->district_id }}</td>
                    <td>{{ $grader->district_id }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>{{ $grader->cat_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
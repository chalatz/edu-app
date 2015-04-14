@extends('layouts.admin')

@section('content')

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Grader</th>
                <th>Site</th>
                <th>count</th>
            </tr>
        </thead>
        
        <tbody>
                  
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{$evaluation->grader_id}}</td>
                    <?php $grader = Grader::find($evaluation->grader_id); ?>
                    @foreach($grader->sites as $site)
                        <td>{{ $site->title }} ({{ $site->site_url }})</td>
                        <td>{{ Evaluation::where('site_id', '=', $site->id)->Where('total_grade', '>=', '20')->Where('can_evaluate', '=', 'yes')->Where('is_educational', '=', 'yes')->count() }}</td>
                    @endforeach
                </tr>
            @endforeach            
        </tbody>
        

    </table>

@stop
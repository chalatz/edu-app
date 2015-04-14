@extends('layouts.admin')

@section('content')

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>aa</th>
                <th>Grader</th>
                <th>Site</th>
            </tr>
        </thead>
        
        <tbody>
            
            <?php $i = 1; ?>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{$evaluation->grader_id}}</td>
                    <?php $grader = Grader::find($evaluation->grader_id); ?>
                    @foreach($grader->sites as $site)
                        <td>{{ $site->title }}</td>                        
                    @endforeach
                </tr>
                <?php $i++; ?>
            @endforeach            
        </tbody>
        

    </table>

@stop
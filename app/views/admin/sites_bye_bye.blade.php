@extends('layouts.admin')

@section('content')

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>aa</th>
                <th>grader id</th>                
                <th>Υποψήφιος Ιστότοπος</th>
                <th>email επικοινωνίας Ιστότοπου</th>
                <th>Αξιολογητής</th>
                <th>email Αξιολογητή</th>       
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
                        <td>{{ $site->title }} ({{ $site->site_url }})</td>
                        <td>{{ $site->contact_email }}</td>
                    @endforeach
                    <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
                    <td>{{ $grader->user->email }}</td>                    
                </tr>
                <?php $i++; ?>
            @endforeach            
        </tbody>
        

    </table>

@stop
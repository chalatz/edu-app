@extends('layouts.bare')

@section('content')
    
    <table>
    
        <thead>
            <tr>
                <th>κωδικός</th>
                <th>Επώνυμο</th>
                <th>Όνομα</th>
            </tr>

        </thead>
        
        <tbody>
            @foreach($evals as $eval)
            <?php $grader = Grader::find($eval->grader_id); ?>
            @if($grader->user->hasRole('admin'))
                <tr>
                    <td>{{ $grader->id }}</td>
                    <td>{{ $grader->grader_last_name }}</td>
                    <td>{{ $grader->grader_name }}</td>
                </tr>
            @endif
            @endforeach
        </tbody>        

    </table>

@stop
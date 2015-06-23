@extends('layouts.bare')

@section('content')

    <table>
    
        <thead>
            <tr>
                <th>email</th>
                <th>Επώνυμο</th>
                <th>Όνομα</th>
                <th>Ειδικότητα</th>             
            </tr>

        </thead>
        
        <tbody>
            @foreach($evals as $eval)
            <tr>
                <?php $grader = Grader::find($eval->grader_id); ?>
                <td>{{ $grader->user->email }}</td>
                <td>{{ $grader->grader_last_name }}</td>
                <td>{{ $grader->grader_name }}</td>
                <td>{{ isset($grader->specialty) ? Specialty::find($grader->specialty)->specialty_name : '--' }}</td>
            </tr>
            @endforeach
        </tbody>        

    </table>

@stop
@extends('layouts.default')

@section('content')

    <?php $i = 1; ?>

	<h1>Αξιολογητές</h1>

    <table class="pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>#</th>
                <th>Ονοματεπώνυμο</th>
                <th>Email</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($graders as $grader)

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $grader->grader_name }}</td>
                    <td>{{ $grader->user->email }}</td>
                </tr>

                <?php $i++; ?>
            @endforeach
        </tbody>

    </table>

@stop
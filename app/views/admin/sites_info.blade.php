@extends('layouts.bare')

@section('content')

    <table>
    
        <thead>
            <tr>
                <th>email</th>
                <th>Επωνυμία</th>
                <th>conf</th>           
            </tr>

        </thead>
        
        <tbody>
            @foreach($sites as $site)
                <?php $user = User::find($site->user_id); ?>
                @if($user->confirmed == 1)
                    <tr>
                        <td>{{ $site->contact_email }}</td>
                        <td>{{ $site->title }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>        

    </table>

@stop



@foreach($users as $user)

    @if($user->hasRole('grader_b'))
        <p>{{$user->email}}</p>
    @endif

@endforeach
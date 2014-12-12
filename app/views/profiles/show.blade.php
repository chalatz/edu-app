@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Not logged in</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Profile of {{ $user->email }}</h1>

            <h2>Location</h2>
            <p>{{ $user->profile->location }}</p>

            <h2>Bio</h2>
            <p>{{ $user->profile->bio }}</p>

            <p><strong>twitter: </strong>{{ $user->profile->twitter_username }}</p>

            <p>{{ link_to_route('profile.edit', 'Edit your profile', $user->id) }}</p>

        @else
            <p>Not your profile</p>
        @endif
    @endif

@stop
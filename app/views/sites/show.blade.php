@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Not logged in</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Στοιχεία Site</h1>

            <h2>URL</h2>
            <p>{{ $user->site->site_url }}</p>

            <h2>District</h2>
            <p>{{ $user->site->district }}</p>

        @else
            <p>Not your profile</p>
        @endif
    @endif

@stop
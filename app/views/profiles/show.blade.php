@extends('layouts.default')

@section('content')

    <h1>Profile of {{ $user->email }}</h1>

    <h2>Location</h2>
    <p>{{ $user->profile->location }}</p>

    <h2>Bio</h2>
    <p>{{ $user->profile->bio }}</p>

    <p><strong>twitter: </strong>{{ $user->profile->twitter_username }}</p>

@stop
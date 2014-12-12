@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Not logged in</p>
    @else
        @if(Auth::user()->id == $user->id)

            {{ Form::model($user->profile, array('method' => 'PATCH','route' => ['profile.update', $user->id], 'class' => 'pure-form pure-form-stacked')) }}

                {{ Form::label('location', 'Location') }}
                {{ Form::text('location', null) }}

                {{ Form::label('bio', 'Bio') }}
                {{ Form::text('bio', null) }}

                {{ Form::label('twitter_username', 'Twitter') }}
                {{ Form::text('twitter_username', null) }}

                {{Form::button('Update Profile', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

            {{ Form::close() }}

        @else
            <p>Not your profile</p>
        @endif
    @endif

@stop
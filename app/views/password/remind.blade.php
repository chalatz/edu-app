@extends('layouts/default')

@section('content')

@if (Session::has('error'))
    {{ trans(Session::get('error')) }}
@elseif (Session::has('status'))
    An email with the password reset has been sent.
@endif

    <form action="{{ action('RemindersController@postRemind') }}" method="POST">
        <input type="email" name="email">
        <input type="submit" value="Send Reminder">
    </form>

@stop
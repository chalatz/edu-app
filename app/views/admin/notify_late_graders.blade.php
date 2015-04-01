@extends('layouts.admin')

@section('content')

    <h2>Λήγουν Σήμερα</h2>
    @foreach($expires_today as $of_today)
        <p>{{ $of_today }}</p>
    @endforeach
	
    <h2>Λήγουν σε 2 ημέρες</h2>
    @foreach($expires_in_two_days as $of_two_days)
        <p>{{ $of_two_days }}</p>
    @endforeach

@stop
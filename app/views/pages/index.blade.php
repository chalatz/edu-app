@extends('layouts/default')

@section('content')

	<h3>Καλώς ορίσατε.</h3>

    @if(Auth::check())
        <p>Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong></p>
    @else
        <p>{{ link_to('login', 'Συνδεθείτε') }} ή {{ link_to('register', 'Εγγραφείτε') }}</p>
    @endif

@stop
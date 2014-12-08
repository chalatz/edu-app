@extends('layouts/default')

@section('content')

	<h1>Home</h1>

	<h2>{{ Auth::check() ? "Welcome, " . Auth::user()->email : "Signup" }}</h2>


@stop
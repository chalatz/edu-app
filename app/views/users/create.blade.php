@extends('layouts.default')

@section('content')

	{{ Form::open(['route' => 'users.store']) }}

		<p>
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email') }}
			{{ $errors->first('email') }}
		</p>
		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
			{{ $errors->first('password') }}
		</p>
		<p>
			{{ Form::submit('Register') }}
		</p>

	{{ Form::close(); }}

@stop
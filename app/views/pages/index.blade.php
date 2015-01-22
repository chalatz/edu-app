@extends('layouts/default')

@section('content')

	<h3>Καλώς ορίσατε στο Πληροφοριακό σύστημα του 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων!</h3>

    @if(Auth::check())
        <p>Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong></p>
    @else

		<div class="pure-g">
		    <div class="pure-u-12-24 block-module blue">
		    	<p>{{ link_to('login', 'Συνδεθείτε') }}</p>
		    </div>

		    <div class="pure-u-12-24 block-module green">
		    	<p>{{ link_to('register/site', 'Εγγραφείτε ως Υποψήφιος Ιστότοπος') }}</p>
		    </div>
		</div>

    @endif

@stop
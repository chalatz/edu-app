@extends('layouts/default')

@section('content')

    @if(Auth::check())

        <p>Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong></p>

        <p>και με την ιδιότητα:</p>
        <ul>
	        @foreach(Auth::user()->roles as $role)
				<li>{{ $role->role_name }}</li>
	        @endforeach
	    </ul>

		<div class="pure-g">
			<div class="pure-u-1 pure-u-md-1-1">
    			{{ link_to('register/site', 'Eγγραφή Υποψηφιότητας', ['class' => 'big-link green']) }}
    		</div>
			<div class="pure-u-1 pure-u-md-1-1">
    			{{ link_to('register/grader', 'Eγγραφή Αξιολογητή Α', ['class' => 'big-link blue']) }}
    		</div>
    		<div class="pure-u-1 pure-u-md-1-1">
    			{{ link_to('register/grader_b', 'Eγγραφή Αξιολογητή Β', ['class' => 'big-link orange']) }}
    		</div>
		</div>

    @else
    	<h3>Καλώς ορίσατε στο Πληροφοριακό Σύστημα του 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων!</h3>

    	<p>Θα πρέπει να {{ link_to('register/user', 'εγγραφείτε') }} προκειμένου να:</p>
    	<ul>
    		<li>Καταθέσετε την υποψηφιότητά σας</li>
    		<li>Συμμετέχετε ως Αξιολογητής Α</li>
    		   <li>Συμμετέχετε ως Αξιολογητής Β</li>
    	</ul>

    	<div class="pure-g">
    		<div class="pure-u-1">
    			{{ link_to('register/user', 'Eγγραφείτε στο Πληροφοριακό Σύστημα', ['class' => 'register-block block green']) }}
    		</div>
    	</div>

		<!-- <div class="pure-g">
		    <div class="pure-u-1 pure-u-md-1-2 block-module blue">
		    	<p>{{ link_to('login', 'Συνδεθείτε') }}</p>
		    </div>

		    <div class="pure-u-1 pure-u-md-1-2 block-module green">
		    	<p>{{ link_to('register/site', 'Εγγραφείτε ως Υποψήφιος Ιστότοπος') }}</p>
		    </div>
		</div> -->

    @endif

@stop
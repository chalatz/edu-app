@extends('layouts/default')

@section('content')

    @if(Auth::check())

        <p>Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong></p>

        <p>και με την/τις ιδιότητα/ες:</p>
        <ul>
	        @foreach(Auth::user()->roles as $role)
                @if($role->id != 5)
				    <li>{{ $role->role_name }}</li>
                @endif
	        @endforeach
	    </ul>

		<div class="pure-g">
            @if(!Auth::user()->hasRole('site'))
                <div class="pure-u-1 pure-u-md-1-1">
                    {{ link_to('register/site', 'Υποβολή Υποψηφιότητας Ιστότοπου', ['class' => 'big-link green']) }}
                </div>
            @endif
            @if(!Auth::user()->hasRole('grader_b'))
                <div class="pure-u-1 pure-u-md-1-1">
                    {{ link_to('register/grader_b', 'Υποβολή Υποψηφιότητας Αξιολογητή Β', ['class' => 'big-link blue']) }}
                </div>
            @endif
		</div>

    @else
    <i class="fa fa-info-circle"></i>

    	<h3>Καλώς ορίσατε στο Πληροφοριακό Σύστημα του <br> 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων!</h3>

    	<p>{{ link_to('login', 'Συνδεθείτε') }} ή {{ link_to('register/user', 'Εγγραφείτε') }}</p>

    	<div class="pure-g">
    		<div class="pure-u-1">
    			{{ link_to('register/user', 'Εγγραφή Χρήστη στο Πληροφοριακό Σύστημα του 7ου ΔΕΕΙ', ['class' => 'register-block block green']) }}
    		</div>
    	</div>
        <p class="instructions">Για να χρησιμοποιήσετε το Πληροφοριακό Σύστημα του 7ου ΔΕΕΙ και να υποβάλλετε υποψηφιότητα στο διαγωνισμό ή να γίνετε αξιολογητής, θα πρέπει πρώτα να συνδεθείτε. Για να συνδεθείτε, θα πρέπει πρώτα να έχετε εγγραφεί και να επιβεβαιώσετε το email σας στο αυτοματοποιημένο mail που θα σας έλθει, πατώντας στον σύνδεσμο που περιέχει.</p>

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
<div class="top-section">

	<div class="top-section-content">

		@if(Auth::check())
			Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong>  | {{ link_to('/logout', 'Αποσύνδεση') }}
		@else
			{{ link_to('login', 'Είσοδος') }}
		@endif

	    @if(Session::has('ninja_id'))
	    <p>Αυτή τη στιγμή είστε <em>μεταμφιεσμένος</em>. Παρακαλούμε, <strong>Εργαστείτε Υπεύθυνα.</strong></p>
	        <p><i class="fa fa-undo"></i> {{ link_to_route('admin.switch_back', 'Επιστροφή ως Διαχειριστής') }}</p>
	    @endif

	</div>

</div>

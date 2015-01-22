<div class="top-section">

	<div class="top-section-content">
		@if(Auth::check())
			Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong>  | {{ link_to('/logout', 'Αποσύνδεση') }}
		@else
			{{ link_to('login', 'Συνδεθείτε') }}
		@endif
	</div>

</div>

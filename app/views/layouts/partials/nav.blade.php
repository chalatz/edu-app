<div id="menu">
    <div class="pure-menu pure-menu-open">
        <a class="pure-menu-heading" href="#">Edu Web Awards 2015</a>
        
        <ul>
            <li>{{ link_to('/', 'Αρχική') }}</li>
            @if (Auth::guest())
                <li>{{ link_to('/login', 'Είσοδος') }}</li>
            @else

                @foreach(Auth::user()->roles as $role)

                    @if($role->role == 'site')

                        @if (!Auth::user()->site)
                            <li>{{ link_to_route('site.create', 'Υποβολή Υποψηφιότητας Ιστότοπου') }}</li>
                        @else
                            <li>{{ link_to_route('site.edit', 'Υποψηφιότητα', Auth::user()->id) }}</li>
                        @endif

                    @endif

                    @if($role->role == 'grader')
                        @if(Auth::user()->grader)
                            <li>{{ link_to_route('grader.edit', 'Αξιολογητής Α', Auth::user()->id) }}</li>
                        @endif
                    @endif

                    @if($role->role == 'grader_b')
                        @if(Auth::user()->grader)
                            <li>{{ link_to_route('grader_b.edit', 'Αξιολογητής B', Auth::user()->id) }}</li>
                        @endif
                    @endif

                    @if($role->role == 'admin')
                        <li>{{ link_to('/admin/sites', 'Υποψήφιοι') }}</li>
                        <li>{{ link_to('/admin/graders', 'Αξιολογητές Α') }}</li>
                        <li>{{ link_to('/admin/graders_b', 'Αξιολογητές Β') }}</li>
                        <li>{{ link_to('/admin/evaluations-report/c', 'Αξιολογήσεις Γ') }}</li>
                        <li>{{ link_to('/admin/sites/grades/c/', 'Διαχ. Αναθ. Φ. Γ') }}</li>                                                
                        <li>{{ link_to('/admin/evaluations-report/b', 'Αξιολογήσεις Β') }}</li>
                        <li>{{ link_to('/admin/sites/grades/b/', 'Διαχ. Αναθ. Φ. Β') }}</li>
                        <li>{{ link_to('/admin/a-list/1', 'Αποτ. Φ. Α') }}</li>
                        <li>{{ link_to('/admin/b-list/1', 'Αποτ. Φ. Β') }}</li>                        
                        <li>{{ link_to('/admin/evaluations-report/', 'Αξιολογήσεις Α') }}</li>
                        <li>{{ link_to('/admin/sites/grades/a/ok', 'Διαχ. Αναθ. Φ. Α (χωρίς αποκλ.)') }}</li>
                        <li>{{ link_to('/admin/sites/grades/a/', 'Διαχ. Αναθ. Φ. Α (με αποκλ.)') }}</li>
                        <li>{{ link_to('/admin/stats', 'Στατιστικά') }}</li>
                    @endif

                @endforeach
            
                <li>{{ link_to('/change-password', 'Αλλαγή κωδικού πρόσβασης') }}</li>
                <li>{{ link_to('/logout', 'Αποσύνδεση') }}</li>
            @endif
        </ul>
    </div>
</div>
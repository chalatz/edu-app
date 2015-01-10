<div id="menu">
    <div class="pure-menu pure-menu-open">
        <a class="pure-menu-heading" href="#">Edu Web Awards 2015</a>

        <ul>
            <li>{{ link_to('/', 'Αρχική') }}</li>
            @if (Auth::guest())
                <li>{{ link_to('/login', 'Είσοδος') }}</li>
            @else
                @if(Auth::user()->roles->first()->role == 'site')
                    @if (!Auth::user()->site)
                        <li>{{ link_to_route('site.create', 'Υποβολή Υποψηφιότητας Ιστότοπου') }}</li>
                    @else
                        <li>{{ link_to_route('site.show', 'Στοιχεία Site', Auth::user()->id) }}</li>
                        <li>{{ link_to_route('site.edit', 'Επεξεργασία Στοιχείων Site', Auth::user()->id) }}</li>
                    @endif
                @endif
            
                @if(Auth::user()->roles->first()->role == 'grader')
                    @if(Auth::user()->has_site == 0)
                        <li>{{ link_to_route('grader.create', 'Επεξεργασία') }}</li>
                    @else
                        <li>{{ link_to_route('grader.show', 'Τα Στοιχεία Μου', Auth::user()->id) }}</li>
                        <li>{{ link_to_route('grader.edit', 'Επεξεργασία', Auth::user()->id) }}</li>
                    @endif
                @endif
            
                @if(Auth::user()->roles->first()->role == 'admin')
                    <li>{{ link_to('/admin/sites', 'Sites') }}</li>
                    <li>{{ link_to('/admin/graders', 'Αξιολογητές') }}</li>
                @endif
            
                <li>{{ link_to('/change-password', 'Αλλαγή κωδικού πρόσβασης') }}</li>
                <li>{{ link_to('/logout', 'Αποσύνδεση') }}</li>
            @endif
        </ul>
    </div>
</div>
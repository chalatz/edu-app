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

                        @if(!Auth::user()->grader)
<!--                             <li>{{ link_to_route('grader.create', 'Δημιουργία Καρτέλας Αξιολογητή') }}</li> -->
                        @else
                            <li>{{ link_to_route('grader.edit', 'Αξιολογητής Α', Auth::user()->id) }}</li>
                        @endif

                    @endif

                    @if($role->role == 'admin')
                        <li>{{ link_to('/admin/sites', 'Sites') }}</li>
                        <li>{{ link_to('/admin/graders', 'Αξιολογητές') }}</li>
                    @endif

                @endforeach
            
                <li>{{ link_to('/change-password', 'Αλλαγή κωδικού πρόσβασης') }}</li>
                <li>{{ link_to('/logout', 'Αποσύνδεση') }}</li>
            @endif
        </ul>
    </div>
</div>
<div id="menu">
    <div class="pure-menu pure-menu-open">
        <a class="pure-menu-heading" href="#">Edu Web Awards 2015</a>

        <ul>
            <li>{{ link_to('/', 'Αρχική') }}</li>
            @if (Auth::guest())
                <li>{{ link_to('/login', 'Είσοδος') }}</li>
                <li>{{ link_to('/login', 'Είσοδος') }}</li>
            @else
                <li>{{ link_to_route('site.show', 'Στοιχεία Site', Auth::user()->id) }}</li>
                <li>{{ link_to_route('site.create', 'Εισαγωγή Στοιχείων Site') }}</li>
                <li>{{ link_to('/logout', 'Αποσύνδεση') }}</li>
            @endif
        </ul>
    </div>
</div>
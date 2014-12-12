<div id="menu">
    <div class="pure-menu pure-menu-open">
        <a class="pure-menu-heading" href="#">Company</a>

        <ul>
            <li>{{ link_to('/', 'Home') }}</li>
            @if (Auth::guest())
                <li>{{ link_to('/register', 'Register') }}</li>
                <li>{{ link_to('/login', 'Login') }}</li>
            @else
                <li>{{ link_to_route('profile', 'Profile Page', Auth::user()->id) }}</li>    
                <li>{{ link_to('/logout', 'Logout') }}</li>
            @endif
        </ul>
    </div>
</div>
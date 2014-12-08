<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Side Menu &ndash; Layout Examples &ndash; Pure</title>

    
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">


    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{{ asset('css/side-menu-old-ie.css') }}">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{{ asset('css/side-menu.css') }}">
    <!--<![endif]-->
  
</head>

<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="#">Company</a>

            <ul>
                <li>{{ link_to('/', 'Home') }}</li>
                <li>{{ link_to('/register', 'Register') }}</li>
                @if (Auth::guest())
                    <li>{{ link_to('/login', 'Login') }}</li>
                @else
                    <li>{{ link_to('/logout', 'Logout') }}</li>
                @endif
            </ul>
        </div>
    </div>

    <div id="main">

        <div class="header">
            <h1>Edu</h1>
            <h2>A subtitle for your page goes here</h2>
        </div>

        <div class="content">
            @yield('content')
        </div>
        
    </div>
</div>


<script src="{{ asset('js/ui.js') }}"></script>


</body>
</html>

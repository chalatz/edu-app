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

    @include('layouts.partials.nav')

    <div id="main">

        <div class="header">
            <h1>Edu</h1>
            <h2>A subtitle for your page goes here</h2>
        </div>

        <div class="content">
            <div class="flash-message">
                @if(Session::has('flash_message'))
                    {{ Session::get('flash_message') }}
                @endif
            </div>
            @yield('content')
        </div>
        
    </div>
</div>


<script src="{{ asset('js/ui.js') }}"></script>


</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Edu Web Awards 2015</title>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{{ asset('css/side-menu-old-ie.css') }}">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{{ asset('css/side-menu.css') }}">
    <!--<![endif]-->
    
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  
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
            <h1>Edu Web Awards 2015</h1>
            <h2>Πληροφοριακό σύστημα 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων</h2>
        </div>

        <div class="content">
           
            @if(Session::has('flash_message'))
                <div class="flash-message {{Session::get('alert-class')}}">
                    {{ Session::get('flash_message') }}
             </div>
            @endif
            
            @yield('content')
            
        </div>
        
    </div>
</div>


<script src="{{ asset('js/ui.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>     

</body>
</html>

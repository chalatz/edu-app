<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Πληροφοριακό σύστημα 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων.">

    <title>Edu Web Awards 2015 - Πληροφοριακό Σύστημα</title>

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

    @include('layouts.partials.top')

    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    @include('layouts.partials.nav')

    <div id="main">

        <div class="header">
            <img src="{{ asset('img/header-edu.jpg') }}" alt="Edu web Awards 2015">
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

    @include('layouts.partials.bottom')

</div>


<script src="{{ asset('js/ui.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/messages_el.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>     
</body>
</html>

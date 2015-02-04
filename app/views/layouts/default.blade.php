<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Πληροφοριακό σύστημα 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων.">
<link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('img/favicon.ico') }}" />
    <title>Edu Web Awards 2015 - Πληροφοριακό Σύστημα</title>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
    
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{{ asset('css/side-menu-old-ie.css') }}">
        <link rel="stylesheet" href="{{ asset('css/grids-responsive-old-ie.css') }}">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
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

        @include('layouts.partials.top')


        <div class="header">
            <img src="{{ asset('img/header-edu.jpg') }}" alt="Edu web Awards 2015">
            <h2>Πληροφοριακό Σύστημα 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων</h2>
        </div>

        <div class="content">
           
            @if(Session::has('flash_message'))
                <div class="flash-message {{Session::get('alert-class')}}">
                    {{ Session::get('flash_message') }}
             </div>
            @endif
            
            @yield('content')
            
        </div>
        
        @include('layouts.partials.bottom')
    </div>

</div>


<script src="{{ asset('js/ui.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/messages_el.js') }}"></script>
<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/columnFilter.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>     
</body>
</html>

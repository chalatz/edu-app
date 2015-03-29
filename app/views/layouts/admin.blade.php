<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Πληροφοριακό σύστημα 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων.">
<link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('img/favicon.ico') }}" />
    
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>    
    
<title>Edu Web Awards 2015 - Πληροφοριακό Σύστημα</title>

<!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('css/side-menu-old-ie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grids-responsive-old-ie.css') }}">
<![endif]-->

<link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/global.css') }}">
      
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
            <h2>Πληροφοριακό Σύστημα 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων</h2>
        </div>

        <div class="content admin-content">
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
<script src="{{ asset('js/reveal.js') }}"></script>
<script src="{{ asset('js/chosen.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>     
</body>
</html>

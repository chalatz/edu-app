@extends('layouts/default')

@section('content')

    <div class="four-oh-four">
        <i class="fa fa-meh-o fa-5x"></i>    
    </div>

    <p>Ουπς! Κάτι δεν πήγε καλά. Αυτή η σελίδα δε θα έπρεπε να υπάρχει.</p>
    <p>Παρακαλούμε επιστρέψτε {{ link_to(URL::previous(), 'στην προηγούμενη σελίδα') }} ή όπου αλλού προτιμάτε εσείς.</p>


@stop
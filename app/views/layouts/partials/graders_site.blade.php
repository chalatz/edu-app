<section class="details-wrapper">
    
    <h2>Στοιχεία Υποψήφιου Ιστότοπου που με πρότεινε ως Αξιολογητή Α</h2>
    
    <div class="detail">
        <h3>Υποψήφιος Ιστότοπος που με πρότεινε</h3>
        <p>{{ $user->grader->from_who }}</p>
    </div>

    <div class="detail">
        <h3>Κατηγορία του Υποψήφιου Ιστότοπου που με πρότεινε</h3>
        <p>{{ $categories[$user->grader->cat_id] }}</p>
    </div>

    <div class="detail">
        <h3>Περιφέρεια του Υποψήφιου Ιστότοπου</h3>
        @foreach($grader->sites as $site)
            <p>{{ $districts[$site->district_id] }}</p>
        @endforeach
    </div>

    <div class="detail">
        <h3>Νομικά υπεύθυνος Υποψήφιου Ιστότοπου που με πρότεινε</h3>
        @foreach($grader->sites as $site)
            <p>{{ $site->responsible }}</p>
        @endforeach
    </div>

    <div class="detail">
        <h3>Ιδιότητα Νομικά υπεύθυνου Υποψήφιου Ιστότοπου που με πρότεινε</h3>
        @foreach($grader->sites as $site)
            <p>{{ $site->responsible_type }}</p>
        @endforeach
    </div>
    
</section>
<section class="details-wrapper">
    
    <h2>Στοιχεία Υποψήφιου Ιστότοπου που με πρότεινε</h2>
    
    <div class="detail">
        <h3>Υποψήφιος Ιστότοπος που με πρότεινε ως αξιολογητή</h3>
        <p>{{ $user->grader->from_who }}</p>
    </div>

    <div class="detail">
        <h3>Κατηγορία του Υποψήφιου Ιστότοπου που με πρότεινε ως αξιολογητή</h3>
        <p>{{ $categories[$user->grader->cat_id] }}</p>
    </div>

    <div class="detail">
        <h3>Περιφέρεια του Υποψήφιου Ιστότοπου</h3>
        @foreach($grader->sites as $site)
            <p>{{ $districts[$site->district_id] }}</p>
            @if($site->district_id == 14)
                <p>{{ $site->district_text }}</p>
            @endif
        @endforeach
    </div>

    <label>Νομικά υπεύθυνος Υποψήφιου Ιστότοπου που με πρότεινε</label>
    @foreach($grader->sites as $site)
        <p>{{ $site->responsible }}</p>
    @endforeach
    <hr>

    <label>Ιδιότητα Νομικά υπεύθυνου Υποψήφιου Ιστότοπου που με πρότεινε</label>
    @foreach($grader->sites as $site)
        <p>{{ $site->responsible_type }}</p>
    @endforeach
    
</section>
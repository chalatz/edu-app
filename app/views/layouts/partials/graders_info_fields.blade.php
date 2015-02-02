<section class="details-wrapper">

    <h2>Στοιχεία Αξιολογητή</h2>

    <div class="detail">
        <h3>Επώνυμο</h3>
        <p>{{ $user->grader->grader_last_name }}</p>
    </div>

    <div class="detail">
        <h3>Όνομα</h3>
        <p>{{ $user->grader->grader_name }}</p>
    </div>

    <div class="detail">
        <h3>Περιφέρεια</h3>
        <p>{{ $districts[$user->grader->district_id] }}</p>
    </div>
    
    @if($user->grader->desired_category)
        <div class="detail">
            <h3>Θα προτιμούσα να είμαι αξιολογητής στην κατηγορία:</h3>
            <p>{{ $categories[$user->grader->desired_category] }}</p>
        </div>
    @endif

    @if($user->grader->past_grader)
        <div class="detail">
            <h3>Ήμουν αξιολογητής Α στον προηγούμενο διαγωνισμό;</h3>
            @if($user->grader->past_grader == 'yes')
                <p>Ναι</p>
            @else
                <p>Όχι</p>
            @endif
        </div>
    @endif
    
    @if($user->grader->past_grader_more)
        <div class="detail">
            <h3>Ήμουν αξιολογητής σε περισσότερους από έναν διαγωνισμούς;</h3>
            @if($user->grader->past_grader_more == 'yes')
                <p>Ναι</p>
            @else
                <p>Όχι</p>
            @endif
        </div>
    @endif
    
    @if($user->grader->wants_to_be_grader_b)
        <div class="detail">
            <h3>Θα ήθελα να συμμετάσχω και ως Αξιολογητής Β</h3>
            @if($user->grader->wants_to_be_grader_b == 'yes')
                <p>Ναι</p>
            @else
                <p>Όχι</p>
            @endif
        </div>
    @endif
    
    @if($user->grader->languages)
        <div class="detail">
            <h3>Ξένες γλώσσες που γνωρίζω</h3>
            <p>{{ $user->grader->languages }}</p>
            @if($user->grader->languages_level)
                <h3>Επίπεδο ξένων γλωσσών που γνωρίζω</h3>
                <p>{{ $user->grader->languages_level }}</p>
            @endif
        </div>
    @endif

</section>

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
        @foreach($user->grader->sites as $site)
            <p>{{ $districts[$site->district_id] }}</p>
        @endforeach
    </div>

    <div class="detail">
        <h3>Νομικά υπεύθυνος Υποψήφιου Ιστότοπου που με πρότεινε</h3>
        @foreach($user->grader->sites as $site)
            <p>{{ $site->responsible }}</p>
        @endforeach
    </div>

    <div class="detail">
        <h3>Ιδιότητα Νομικά υπεύθυνου Υποψήφιου Ιστότοπου που με πρότεινε</h3>
        @foreach($user->grader->sites as $site)
            <p>{{ $site->responsible_type }}</p>
        @endforeach
    </div>
    
</section>
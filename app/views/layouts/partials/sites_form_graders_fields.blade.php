<p class="flash-message red">
    <i class="fa fa-fire"></i>&nbsp;&nbsp;
    <a href="#" data-reveal-id="myModal" class="white-font">
        Τι Είναι ο Αξιολογητής Α και ποιες οι υποχρεώσεις του
    </a>
</p>

{{ Form::checkbox('proposes_himself', 'yes') }}
{{ Form::label('proposes_himself', 'Προτείνω ως Αξιολογητή Α, τον Υπεύθυνο Επικοινωνίας', ['class' => 'label-for-checkbox']) }}

{{ Form::label('grader_last_name', 'Επώνυμο προτεινόμενου Αξιολογητή Α *') }}
{{ Form::text('grader_last_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
<p class="error-message">{{ $errors->first('grader_last_name') }}</p>            

{{ Form::label('grader_name', 'Όνομα προτεινόμενου Αξιολογητή Α *') }}
{{ Form::text('grader_name', null, array('class' => 'pure-input-1', 'required', 'placeholder' => 'Παρακαλούμε γράψτε με το πρώτο γράμμα κεφαλαίο και τα υπόλοιπα πεζά με τόνους')) }}
<p class="error-message">{{ $errors->first('grader_name') }}</p>

{{ Form::label('grader_district', 'Περιφέρεια Αξιολογητή Α *') }}
{{ Form::select('grader_district', $districts, null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_district') }}</p>

{{ Form::label('grader_email', 'E-mail Αξιολογητή Α *') }}
{{ Form::email('grader_email', null, array('class' => 'pure-input-1', 'required')) }}
<p class="error-message">{{ $errors->first('grader_email') }}</p>

<div id="myModal" class="reveal-modal">
    <h1>Τι Είναι ο Αξιολογητής Α και ποιες οι υποχρεώσεις του</h1>
    <p>Στην Α΄φάση του διαγωνισμού <a href="http://www.eduwebawards.gr/evaluation/" target="_blank">(Δείτε Διαδικασία Αξιολόγησης)</a>, η αξιολόγηση των ιστότοπων θα γίνει από τους ίδιους τους συμμετέχοντες - ομότιμους (peer review) και από τους Αξιολογητές Β (σώμα έμπειρων αξιολογητών). </p>
    <p>Για το λόγο αυτό, κατά την υποβολή υποψηφιότητας ιστότοπου, καλούμε κάθε υποψήφιο να προτείνει ως Αξιολογητή Α΄ <strong>είτε τον εαυτό του/ης είτε κάποιον άλλο/η συνάδελφο</strong> ο οποίος χρησιμοποιεί, συντηρεί ή είναι δημιουργός εκπαιδευτικών ιστότοπων. Αυτός/η θα κληθεί να αξιολογήσει δύο διαφορετικούς ιστότοπους, ο ένας εκ των οποίων τουλάχιστο θα είναι άλλης κατηγορίας διαγωνιζομένων και άλλης περιοχής/περιφέρειας.</p>
    <p>Η ανάθεση των ιστότοπων που θα αξιολογήσουν οι αξιολογητές Α΄ και Β΄ θα γίνει με ηλεκτρονική κλήρωση των υποψηφίων ιστότοπων - αξιολογητών. Ωστόσο, στην περίπτωση που τυχαίνει να συνδέεται ένας αξιολογητής με οποιονδήποτε τρόπο με τον εκπαιδευτικό ιστότοπο ή τους δημιουργούς ή διαχειριστές του, ή έχει στο παρελθόν υπηρετήσει σε αυτή τη σχολική μονάδα ή υπηρεσία που καλείται να αξιολογήσει, θα πρέπει να μας ζητήσει εντός 48 ωρών την αυτοεξαίρεσή του, ώστε να γίνει έγκαιρα αλλαγή Αξιολογητή Α.</p>
    <a class="close-reveal-modal">&#215;</a>
</div>

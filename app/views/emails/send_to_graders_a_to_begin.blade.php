<p style="text-align: center">
    <img width="200" src="{{ asset('img/logo-small.jpg') }}" alt="Edu web Awards 2015">
</p>

<h1 style="text-align: center">ΑΝΑΘΕΣΗ ΙΣΤΟΤΟΠΩΝ ΣΕ ΑΞΙΟΛΟΓΗΤΗ Α</h1>
<h2 style="text-align: center">7ος Διαγωνισμός Ελληνόφωνων Εκπαιδευτικών Ιστότοπων 2015</h2>
<h2 style="text-align: center">ΠΡΟΣΚΛΗΣΗ ΓΙΑ ΚΡΙΣΗ</h2>

<?php $the_vals = json_decode($the_evals, true); ?>

<p>Αγαπητή/τέ: {{ $grader_last_name }} {{ $grader_first_name }}</p>

<p>Σας παρακαλoύμε να αποδεχτείτε την πρόσκλησή μας να αξιολογήσετε τους ιστότοπους:</p>

<?php for($j = 0; $j<sizeof($the_vals); $j++): ?>
    <p>
        {{$j+1}}. Ιστότοπος: <strong>{{ $the_vals['site_title'][$j] }}</strong><br>
        URL: <a href="{{ $the_vals['site_url'][$j] }}">{{ $the_vals['site_url'][$j] }}</a>
    </p>
<?php endfor; ?>

<p>Παρακαλούμε συνδεθείτε στο πληροφοριακό σύστημα του 7ου ΔΕΕΙ (<a href="http://www.eduwebawards.gr/app/public/">http://www.eduwebawards.gr/app/public/</a>) και πατήστε <strong>Έναρξη Αξιολόγησης.</strong></p>

<p style="text-align: center">
    <img width="200" src="{{ asset('img/start-evaluation-screenshot.jpg') }}" alt="Edu web Awards 2015">
</p>

<p>Μετά από την κρίση σας σε κάθε κριτήριο-άξονα, πατήστε «ΑΠΟΘΗΚΕΥΣΗ». Εάν είστε σίγουρος ότι έχετε ολοκληρώσει, μπορείτε να πατήσετε “Οριστική Υποβολή Βαθμολογίας”. Αυτή η ενέργεια δεν είναι απαραίτητη, αρκεί βέβαια να έχετε βαθμολογήσει όλους τους άξονες.</p>

<p>Σας παρακαλούμε να έχετε συνδεθεί μέχρι τις <strong>26 Μαρτίου 2015 και 12:00μμ</strong> και να αποδεχτείτε να αξιολογήσετε τους ιστότοπους που σας έχουν ανατεθεί.</p>

<p>Εάν υπάρχει πολύ σοβαρός λόγος για την αυτο-εξαίρεσή σας, έχετε τη δυνατότητα μέχρι τις <strong>26 Μαρτίου 2015 και 12:00μμ</strong> να δηλώσετε ότι δεν μπορείτε να αναλάβετε την αξιολόγηση αυτού του ιστότοπου για αυτό το λόγο και να σας αλλάξουμε τον ιστότοπο.</p>

<p>Οι αξιολογήσεις, προαιρετικά, μπορούν να συνοδεύονται από σχόλια-υποδείξεις για βελτίωση του ιστότοπου συνολικά, ανά άξονα και ανά κριτήριο, με στόχο να βοηθήσουν τους δημιουργούς να βελτιώσουν τους ιστότοπούς τους στο μέλλον. Παρακαλούμε τουλάχιστο για ένα συνολικό σχόλιο ως προς το τι σας άρεσε περισσότερο σε κάθε ιστότοπο και στο τι θα προτείνατε για βελτιώσεις.</p>

<p>Αν έχετε ξεχάσει τον κωδικό πρόσβασης για την είσοδό σας στο πληροφοριακό σύστημα του 7ου ΔΕΕΙ, μπορείτε να πατήσετε στο “Ξέχασα τον Κωδικό Πρόσβασής μου”, για να σας αποσταλούν οδηγίες επαναφοράς κωδικού πρόσβασης.</p>

<p>Εάν αντιμετωπίσετε οποιοδήποτε πρόβλημα, παρακαλούμε επικοινωνήστε στο <strong>info@eduwebawards.gr<strong></p>

<p style="text-align: center">
Εκ μέρους της επιτροπής,<br>
Ο πρόεδρος<br>    
Δρ. Παπαδάκης Σπυρίδων<br>
Σχολικός Σύμβουλος ΠΕ19
</p>
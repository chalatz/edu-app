@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <?php
                $cats = [
                    '1' => 'Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία',
                    '2' => 'Γυμνάσια, ΕΕΕΕΚ',
                    '3' => 'Γενικά Λύκεια, ΕΠΑΛ, ΕΠΑΣ, ΣΕΚ, ΤΕΕ Ειδικής Αγωγής',
                    '4' => 'Υποστηρικτικές δομές εκπαίδευσης',
                    '5' => 'Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης',
                    '6' => 'Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών',
                ];

                $districts = [
                    '1' => 'Αττική',
                    '2' => 'Βόρειο Αιγαίο',
                    '3' => 'Νότιο Αιγαίο',
                    '4' => 'Δυτική Ελλάδα',
                    '5' => 'Θεσσαλία',
                    '6' => 'Ήπειρος',
                    '7' => 'Ιόνιο',
                    '8' => 'Κρήτη',
                    '9' => 'Ανατολική Μακεδονία και Θράκη',
                    '10' => 'Δυτική Μακεδονία',
                    '11' => 'Κεντρική Μακεδονία',
                    '12' => 'Πελοπόννησος',
                    '13' => 'Στερεά Ελλάδα',
                ];
            
            ?>

            <p>{{ link_to_route('grader.edit', 'Επεξεργασία των Στοιχείων μου', Auth::user()->id) }}</p>

            <h1>Στοιχεία Αξιολογητή</h1>

            <h2>Ονοματεπώνυμο</h2>
            <p>{{ $user->grader->grader_name }}</p>


            <h2>Κατηγορία του Site που θα αξιολογήσω</h2>
            <p>{{ $cats[$user->grader->cat_id] }}</p>

            <h2>Περιφέρεια που ανήκει το Site που θα αξιολογήσω</h2>
            <p>{{ $districts[$user->grader->district_id] }}</p>

            <h2>Έχω προταθεί από</h2>
            <p>{{ $user->grader->from_who }}</p>

            <p>{{ link_to_route('grader.edit', 'Επεξεργασία των Στοιχείων μου', Auth::user()->id) }}</p>

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
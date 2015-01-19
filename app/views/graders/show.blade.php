@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <?php $categories = Category::lists('category_name', 'id'); ?>
            <?php $districts = District::lists('district_name', 'id'); ?>

            <p>{{ link_to_route('grader.edit', 'Επεξεργασία των Στοιχείων μου', Auth::user()->id) }}</p>

            <h1>Στοιχεία Αξιολογητή</h1>

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
                    @if($user->grader->district_id == 14)
                        <p>{{ $user->grader->grader_district_text }}</p>
                    @endif
                </div>
                
                <div class="detail">
                    <h3>Θα προτιμούσα να είμαι αξιολογητής στην κατηγορία:</h3>
                    <p>{{ $categories[$user->grader->desired_category] }}</p>
                </div>

            </section>

            <h2>Ονοματεπώνυμο</h2>
            <p>{{ $user->grader->grader_name }}</p>

            <h2>Κατηγορία του Site που θα αξιολογήσω</h2>
            <p>{{ $categories[$user->grader->cat_id] }}</p>

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
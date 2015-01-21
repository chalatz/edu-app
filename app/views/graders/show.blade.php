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
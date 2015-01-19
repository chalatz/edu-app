@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <?php $categories = Category::lists('category_name', 'id'); ?>
            <?php $districts = District::lists('district_name', 'id'); ?>

            <p>{{ link_to_route('site.edit', 'Επεξεργασία Στοιχείων Υποψηφιότητας Ιστότοπου', Auth::user()->id) }}</p>

            <h1>Στοιχεία Υποψηφιότητας Ιστότοπου</h1>

            <section class="details-wrapper">
                <h2>Στοιχεία Υποψήφιου Ιστότοπου</h2>

                <div class="detail">
                    <h3>URL Ιστοσελίδας</h3>
                    <p>{{ $user->site->site_url }}</p>
                </div>
            
                <div class="detail">
                   <h3>Επωνυμία Ιστότοπου</h3>
                    <p>{{ $user->site->title }}</p> 
                </div>

                <div class="detail">
                    <h3>Κατηγορία</h3>
                    <p>{{ $categories[$user->site->cat_id] }}</p>
                </div>

                <div class="detail">
                    <h3>Δημιουργός / Δημιουργοί</h3>
                    <p>{{ $user->site->creator }}</p>
                </div>

                <div class="detail">
                    <h3>Νομικά υπεύθυνος</h3>
                    <p>{{ $user->site->responsible }}</p>                    
                </div>

                <div class="detail">
                    <h3>Ιδιότητα νομικά υπεύθυνου</h3>
                    <p>{{ $user->site->responsible_type }}</p>
                </div>

                <h3>Έχω λάβει γραπτή άδεια για να εμφανίζονται προσωπικά δεδομένα των παιδιών;</h3>
                @if(isset($user->site->received_permission))
                    <div class="detail">
                        @if($user->site->received_permission == 1)
                            <p>Ναι</p>
                        @else
                            <p>Όχι</p>
                        @endif
                    </div>
                @endif

                <h3>Έχει ο ιστότοπος περιορισμένη πρόσβαση;</h3>
                @if(isset($user->site->restricted_access))
                    <div class="detail">
                        @if($user->site->restricted_access == 1)
                            <p>Ναι</p>
                            <h3>Λεπτομέρειες Πρόσβασης</h3>
                            <div class="detail">
                                <p>{{ $user->site->restricted_access_details }}</p>
                            </div>
                        @else
                            <p>Όχι</p>
                        @endif
                    </div>
                @endif                

            </section>

            
            <section class="details-wrapper">
                
            </section>


            <h3>Υπέυθυνος επικοινωνίας</h3>
            <p>{{ $user->site->contact_name }}</p>

            <h3>E-mail επικοινωνίας</h3>
            <p>{{ $user->site->contact_email }}</p>

            <h3>Τηλέφωνο επικοινωνίας</h3>
            <p>{{ $user->site->phone }}</p>

            <h3>Περιφέρεια</h3>
            <p>{{ $districts[$user->site->district_id] }}</p>

            <h3>Προτεινόμενος αξιολογητής</h3>
            <p>{{ $user->site->grader_name }}</p>

            <h3>E-mail αξιολογητή</h3>
            <p>{{ $user->site->grader_email }}</p>

            <p>{{ link_to_route('site.edit', 'Επεξεργασία Στοιχείων Υποψηφιότητας Ιστότοπου', Auth::user()->id) }}</p>

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
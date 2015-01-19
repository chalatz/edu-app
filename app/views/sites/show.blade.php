@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <?php $categories = Category::lists('category_name', 'id'); ?>
            <?php $districts = District::lists('district_name', 'id'); ?>

            <p>{{ link_to_route('site.edit', 'Επεξεργασία Στοιχείων Υποψηφιότητας Ιστότοπου', Auth::user()->id, ['class' => 'pure-button button-secondary button-secondary-light-blue']) }}</p>    

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
                
                <h2>Στοιχεία Επικοινωνίας Υποψηφιότητας</h2>

                <div class="detail">
                    <h3>Υπεύθυνος επικοινωνίας υποψηφιότητας</h3>
                    <p>{{ $user->site->contact_name }}</p>
                </div>                


                <div class="detail">
                    <h3>Κινητό Τηλέφωνο</h3>
                    <p>{{ $user->site->mobile_phone }}</p>
                </div>

                <div class="detail">
                    <h3>Περιφέρεια</h3>
                    <p>{{ $districts[$user->site->district_id] }}</p>
                    @if($user->site->district_id == 14)
                        <p>{{ $user->site->district_text }}</p>
                    @endif
                </div>               

            </section>

            <section class="details-wrapper">
                
                <h2>Στοιχεία Αξιολογητή Α</h2>

                <div class="detail">
                    <h3>Επώνυμο προτεινόμενου αξιολογητή Α</h3>
                    <p>{{ $user->site->grader_last_name }}</p>
                </div>

                <div class="detail">
                    <h3>Όνομα προτεινόμενου αξιολογητή Α</h3>
                    <p>{{ $user->site->grader_name }}</p>
                </div>

                <div class="detail">
                    <h3>Περιφέρεια Αξιολογητή Α</h3>
                    <p>{{ $districts[$user->site->grader_district] }}</p>
                    @if($user->site->grader_district == 14)
                        <p>{{ $user->site->grader_district_text }}</p>
                    @endif
                </div>

                <div class="detail">
                    <h3>E-mail αξιολογητή Α</h3>
                    <p>{{ $user->site->grader_email }}</p>
                </div>

                <div class="detail">
                    <h3>Έχει ειδοποιηθεί ο αξιολογητής Α;</h3>
                    @if(isset($user->site->notify_grader))
                        @if($user->site->notify_grader == 1)
                            <p>Ναι</p>
                        @else
                            <p>Όχι</p>
                        @endif
                    @endif
                </div>

            </section>

            <p>{{ link_to_route('site.edit', 'Επεξεργασία Στοιχείων Υποψηφιότητας Ιστότοπου', Auth::user()->id, ['class' => 'pure-button button-secondary button-secondary-light-blue']) }}</p>

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
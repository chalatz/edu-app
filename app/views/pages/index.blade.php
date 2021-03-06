@extends('layouts/default')

@section('content')

    @if(Auth::check())

        @if(Auth::user()->hasRole('site'))
            @if(Grade::where('site_id', Auth::user()->site->id)->count() > 0)
                {{ link_to('summary', 'Δείτε τη Βαθμολογία σας και τυχόν σχόλια', ['class' => 'action-btn action-btn-gray anchor-block']) }}
            @endif
        @endif

        @if(isset(Auth::user()->site))
            @if(Auth::user()->hasRole('site') && Auth::user()->site->grader_agrees == 'no')
                <div class="instructions white-font red little-block"><strong><i class="fa fa-frown-o"></i> O Αξιολογητής Α που έχετε προτείνει, δεν έχει αποδεχθεί την πρόσκλησή σας.</strong></div>
                <div class="instructions orange little-block white-font"><strong><i class="fa fa-rocket"></i> {{ link_to('/site/'.Auth::user()->id.'/edit#grader-a-details', 'Θα πρέπει να προτείνετε καινούριο Αξιολογητή Α, εντός 48 ωρών.', ['class' => 'white-font']) }} </strong></div>
            @endif
        @endif

        @if(Auth::user()->hasRole('grader') && !Auth::user()->hasRole('site') && Auth::user()->grader->has_agreed == 'na')
            <p>{{ link_to_route('agrees.grader', 'Αποδέχομαι τη συμμετοχή μου ως Αξιολογητής Α στον 7ο ΔΕΕΙ', [Auth::user()->grader->id, 'yes'], ['class' => 'pure-button button-secondary button-secondary-green anchor-block', 'onclick' => 'return confirm("Είστε σίγουρος ότι συμφωνείτε;");']) }}</p>
            <p>{{ link_to_route('agrees.grader', 'Δεν αποδέχομαι τη συμμετοχή μου ως Αξιολογητής Α στον 7ο ΔΕΕΙ', [Auth::user()->grader->id, 'no'], ['class' => 'pure-button button-secondary button-secondary-red anchor-block', 'onclick' => 'return confirm("Είστε σίγουρος ότι διαφωνείτε;");']) }}</p>
        @endif

        @if(Auth::user()->hasRole('admin')) <?php // Phase A evaluations are closed ?>
            @if(Auth::user()->grader)
                @if( (Auth::user()->hasRole('grader') || Auth::user()->hasRole('grader_b')) && Evaluation::where('grader_id', Auth::user()->grader->id)->count() > 0 )
                    <div>
                        {{-- {{ link_to('evaluate/show', 'Έναρξη Αξιολόγησης', ['class' => 'action-btn action-btn-orange anchor-block']) }} --}}
                    </div>
                @endif
            @endif
        @endif

        <?php // Phase Β ?>
        {{-- @if(Auth::user()->grader) --}}
            {{-- @if( ( Auth::user()->grader->approved == 'yes' ) && Evaluation_b::where('grader_id', Auth::user()->grader->id)->count() > 0 ) --}}
                {{-- <div> --}}
                    <?php // Phase B evaluations are closed ?>
                    {{-- {{ link_to('evaluate/b/show', 'Β Φάση: Έναρξη Αξιολόγησης', ['class' => 'action-btn action-btn-purple anchor-block']) }} --}}
                {{-- </div> --}}
            {{-- @endif --}}
        {{-- @endif --}}

        <?php // Phase C ?>
        @if(Auth::user()->grader)
            @if( ( Auth::user()->grader->approved == 'yes' ) && Evaluation_c::where('grader_id', Auth::user()->grader->id)->count() > 0 )
                <div>
                    {{ link_to('evaluate/c/show', 'Γ Φάση: Έναρξη Αξιολόγησης', ['class' => 'action-btn action-btn-red anchor-block']) }}
                </div>
            @endif
        @endif        


        @if(Auth::user()->id == 59)
            <div>
                {{-- {{ link_to('/admin/manual-cron/', 'Manual Cron', ['class' => 'action-btn action-btn-purple anchor-block']) }} --}}
            </div>
        @endif

        <p>Έχετε συνδεθεί ως <strong>{{ Auth::user()->email }}</strong></p>

        @if(!(sizeof(Auth::user()->roles) == 1 && Auth::user()->hasRole('user')))
            <p>και με την/τις ιδιότητα/ες:</p>
            <ul>
                @foreach(Auth::user()->roles as $role)
                    @if($role->id != 5)
                        <strong><li>{{ $role->role_name }}</li></strong>
                    @endif
                @endforeach
            </ul>
        @endif

        <div class="pure-g">
            @if(!Auth::user()->hasRole('site') && !Auth::user()->hasRole('grader'))
                <div class="pure-u-1 pure-u-md-1-1">
                    {{ link_to('site/create', 'Υποβολή Υποψηφιότητας Ιστότοπου', ['class' => 'action-btn action-btn-green anchor-block']) }}
                </div>
            @endif
            @if(!Auth::user()->hasRole('grader_b'))
                <div class="pure-u-1 pure-u-md-1-1">
                    {{ link_to('grader/create/b', 'Υποβολή Υποψηφιότητας Αξιολογητή Β', ['class' => 'action-btn action-btn-blue anchor-block']) }}
                </div>
            @endif
        </div>

    @else

        <h3>Καλώς ορίσατε στο Πληροφοριακό Σύστημα του <br> 7ου Διαγωνισμού Ελληνόφωνων Εκπαιδευτικών Ιστότοπων!</h3>

        <p>{{ link_to('login', 'Συνδεθείτε') }} ή {{ link_to('register', 'Εγγραφείτε') }}</p>

        <p>{{ link_to('password/remind', 'Ξέχασα τον Κωδικό Πρόσβασής μου') }}</p>

        <div class="pure-g">
            <div class="pure-u-1">
                {{ link_to('register', 'Εγγραφή Χρήστη στο Πληροφοριακό Σύστημα του 7ου ΔΕΕΙ', ['class' => 'action-btn action-btn-green anchor-block']) }}
            </div>
        </div>
        <p class="instructions">Για να χρησιμοποιήσετε το Πληροφοριακό Σύστημα του 7ου ΔΕΕΙ και να υποβάλετε υποψηφιότητα στο διαγωνισμό ή να γίνετε αξιολογητής, θα πρέπει πρώτα να συνδεθείτε. Για να συνδεθείτε, θα πρέπει πρώτα να έχετε εγγραφεί και να επιβεβαιώσετε το email σας στο αυτοματοποιημένο mail που θα σας έλθει, πατώντας στον σύνδεσμο που περιέχει.</p>

    @endif

@stop

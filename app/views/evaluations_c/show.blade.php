@extends('layouts.default')

@section('content')

    <?php $site_index = 0; $i =0; $evaluations_count = $evaluations->count(); $sites_meter = 0; ?>

    <h1>Γ Φάση - Οι Αναθέσεις μου</h1>

    <div class="block">
        <h3>{{ $evaluations_count }} Αναθέσεις</h3>
        <div class="pure-g row">
            @foreach($evaluations as $evaluation)
                <?php
                    $i++;
                    if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0) { $sites_meter++; }
                ?>                
                <div class="pure-u-1 pure-u-md-1-{{ $evaluations_count }}">
                    <a class="anchor-button pure-button pure-button-secondary orange" href="#evaluation-{{$i}}"><i class="fa fa-tasks"></i> {{$i}}η ανάθεση</a>
                    @if($evaluation->can_evaluate == 'yes')
                        <div>Ημερομηνία Ανάθεσης: <strong>{{ date('d/m/y', strtotime($evaluation->assigned_at)) }}</strong></div>
                        <div>Αξιολόγηση μέχρι: <strong>{{ date('d/m/y', strtotime($evaluation->assigned_until)) }}</strong></div>
                    @endif
                </div>                                        
            @endforeach
        </div>
        <?php
            $sites_percent = $sites_meter * 100 / $evaluations_count;
            $sites_progress_length = 'style="width:'.$sites_percent.'%"';
        ?>
        <div class="sites-meter big-meter">
            <div class="progress-bar" {{$sites_progress_length}}></div>
            <div class="meter-number">Βαθμολογήσατε {{ $sites_meter }} από {{ $evaluations_count }} Ιστότοπους</div>
        </div>
    </div>

    @foreach($evaluations as $evaluation)

        <?php
            $meter = 0;
            if($evaluation->beta_grade > 0){ $meter++; }
            if($evaluation->gama_grade > 0){ $meter++; }
            if($evaluation->delta_grade > 0){ $meter++; }
            if($evaluation->epsilon_grade > 0){ $meter++; }
            if($evaluation->st_grade > 0){ $meter++; }
            $percent = $meter * 100 / 5;
            $progress_length = 'style="width:'.$percent.'%"';
        ?>

        <?php $site_index++ ?>

        <div class="evaluation-summaries">

            <div class="evaluation-single-summary" id="evaluation-{{$site_index}}">

                <div class="site-section">
                    <div class="site-index-wrapper">
                        <div class="site-index">{{ $site_index }}η</div>
                        <div class="site-index-text">ανάθεση</div>
                    </div>
                    <div class="site-info">
                        <span class="site-info-label">Ιστότοπος:</span>
                        <span class="site-name">{{ Site::find($evaluation->site_id)->title }}</span>
                    </div>
                    <div class="site-info">
                        <span class="site-info-label">URL:</span>
                        <span class="site-url"><a href="{{ Site::find($evaluation->site_id)->site_url }}" target="_blank">{{ Site::find($evaluation->site_id)->site_url }}</a></span>
                    </div>

                </div>
                
                @if(Site::find($evaluation->site_id)->restricted_access == 'yes')
                    <hr>
                    <h4>Ο Ιστότοπος έχει δηλώσει ότι έχει περιορισμένη πρόσβαση και ως πληροφορίες εισόδου έχει δώσει τα εξής:</h4>
                    <p><em>{{ Site::find($evaluation->site_id)->restricted_access_details }}</em></p>
                    <hr>
                @endif
                
                @if($evaluation->can_evaluate == 'na')
                    <div>
                        {{ Form::model($evaluation, array('method' => 'PUT','route' => ['do_can_evaluate_c_submit', $evaluation->id], 'class' => 'pure-form pure-form-stacked', 'id' => 'confirmCanEvaluate-'.$site_index, 'name' => 'confirmCanEvaluate-'.$site_index)) }}
                            {{ Form::label('can_evaluate', 'Αποδέχεστε να αξιολογήσετε αυτόν τον ιστότοπο;') }}
                            {{ Form::select('can_evaluate',[
                                '' => 'Επιλέξτε...',
                                'yes' => 'Ναι',
                                'no' => 'Όχι',
                            ], null, array('class' => 'pure-input-1 can_evaluate-'.$site_index, 'required')) }}
                            <div class="instructions"><strong>Μόνο</strong> εάν αποδεχτείτε, θα μπορέσετε να προχωρήσετε στην αξιολόγησή του.</div>        
                            <p class="error-message">{{ $errors->first('can_evaluate') }}</p>    

                            {{ Form::label('why_not', 'Εάν ΔΕΝ αποδέχεστε να αξιολογήσετε αυτόν τον ιστότοπο και εφόσον συντρέχει πολύ σοβαρός λόγος, παρακαλούμε αιτιολογήστε') }}
                            {{ Form::textarea('why_not', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Γιατί ΔΕΝ αποδέχεστε να αξιολογήσετε αυτόν τον Ιστότοπο;')) }}

                            {{Form::button('Υποβολή', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

                    {{ Form::close() }}
                    </div>
                @endif

                @if($evaluation->can_evaluate == 'yes')                
                    @if($evaluation->is_educational == 'yes')
                        <div class="site-total-grade-wrapper">
                            @if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0)
                                <span class="site-total-grade-label">Βαθμολογία Ιστότοπου:</span>
                                <span class="site-total-grade">{{ $evaluation->total_grade }}</span>
                            @else
                                <span class="gray-font">Πρέπει να βαθμολογήσετε όλους τους άξονες για να δείτε τη Βαθμολογία.</span>
                            @endif

                        </div>
                
                        @if($evaluation->finalized != 'yes')
                            <div class="sites-meter">
                                <div class="progress-bar" {{$progress_length}}></div>
                                <div class="meter-number">Βαθμολογήσατε {{ $meter }} από 5 άξονες</div>
                            </div>                                                           

                            <div class="criteria-section">
                                <div class="criterion-link-wrapper">
                                    {{ link_to_route('grader.evaluate_b_edit', 'Β Άξονας (Ταυτότητα - Ενημέρωση)', [Auth::user()->id, 'beta', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                                    <div class="criteron-check">
                                        @if($evaluation->beta_grade > 0)
                                            <div class="info-block green white-font" style="width:{{ $evaluation->beta_grade }}%">Ο Βαθμός σας: <strong>{{ $evaluation->beta_grade }}%</strong></div>
                                        @else
                                            <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="criterion-link-wrapper">
                                    {{ link_to_route('grader.evaluate_b_edit', 'Γ Άξονας (Περιεχόμενο)', [Auth::user()->id, 'gama', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                                    <div class="criteron-check">
                                        @if($evaluation->gama_grade > 0)
                                            <div class="info-block green white-font" style="width:{{ $evaluation->gama_grade }}%">Ο Βαθμός σας: <strong>{{ $evaluation->gama_grade }}%</strong></div>
                                        @else
                                            <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="criterion-link-wrapper">
                                    {{ link_to_route('grader.evaluate_b_edit', 'Δ Άξονας (Διεπαφή - Αισθητική)', [Auth::user()->id, 'delta', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                                    <div class="criteron-check">
                                        @if($evaluation->delta_grade > 0)
                                            <div class="info-block green white-font" style="width:{{ $evaluation->delta_grade }}%">Ο Βαθμός σας: <strong>{{ $evaluation->delta_grade }}%</strong></div>
                                        @else
                                            <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="criterion-link-wrapper">
                                    {{ link_to_route('grader.evaluate_b_edit', 'Ε Άξονας (Προσωπικά Δεδομένα)', [Auth::user()->id, 'epsilon', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                                    <div class="criteron-check">
                                        @if($evaluation->epsilon_grade > 0)
                                            <div class="info-block green white-font" style="width:{{ $evaluation->epsilon_grade }}%">Ο Βαθμός σας: <strong>{{ $evaluation->epsilon_grade }}%</strong></div>
                                        @else
                                            <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="criterion-link-wrapper">
                                    {{ link_to_route('grader.evaluate_b_edit', 'ΣΤ Άξονας (Αλληλεπίδραση)', [Auth::user()->id, 'st', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                                    <div class="criteron-check">
                                        @if($evaluation->st_grade > 0)
                                            <div class="info-block green white-font" style="width:{{ $evaluation->st_grade }}%">Ο Βαθμός σας: <strong>{{ $evaluation->st_grade }}%</strong></div>
                                        @else
                                            <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div>
                                {{ Form::model($evaluation, array('method' => 'PUT','route' => ['do_comments_c_submit', $evaluation->id], 'class' => 'pure-form pure-form-stacked overflow-hidden')) }}

                                    {{ Form::label('site_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για τον Ιστότοπο') }}
                                    {{ Form::textarea('site_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για τον Ιστότοπο.')) }}

                                    {{Form::button('Υποβολή Σχολίου', array('type' => 'submit', 'class' => 'pure-button pure-button-primary float-right'))}}

                                {{ Form::close() }}
                            </div>
                
                            @if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0)
                                <div class="row">                                                   
                                    <p>{{ link_to_route('evaluation_b.finalize', 'Οριστική Υποβολή Βαθμολογίας', $evaluation->id, ['class' => 'pure-button button-secondary button-secondary-green anchor-block', 'onclick' => 'return confirm("Είστε σίγουρος ότι επιθυμείτε να υποβάλλετε τη βαθμολογία σας οριστικά;");']) }}</p>
                                    <div class="instructions">Μόνον εφόσον είστε <strong>απολύτως σίγουρος</strong> πατήστε την Οριστική Υποβολή Βαθμολογίας.</div>                        
                                </div>                                   
                            @endif
                
                        @else
                            <div class="flash-message flash-success">Έχετε υποβάλλει οριστική βαθμολογία για αυτόν τον Ιστότοπο, στις <span class="underlined">{{ date('d / m / y', strtotime($evaluation->finalized_at)) }}</span></div>                                               
                        @endif
                                        
                    @else
                        {{ Form::model($evaluation, array('method' => 'PUT','route' => ['do_is_educational_c_submit', $evaluation->id], 'class' => 'pure-form pure-form-stacked', 'id' => 'confirmAlpha-'.$site_index, 'name' => 'confirmAlpha-'.$site_index)) }}

                            {{ Form::label('is_educational', 'Α Άξονας: Είναι ο Ιστότοπος Εκπαιδευτικός;') }}
                            <div>Ο Ιστότοπος θεωρείται εκπαιδευτικός εφόσον πληροί τους <a href="http://www.eduwebawards.gr/requirements/" target="_blank">Όρους Συμμετοχής.</a></div>
                            {{ Form::select('is_educational',[
                                '' => 'Επιλέξτε...',
                                'yes' => 'Ναι',
                                'no' => 'Όχι',
                            ], null, array('class' => 'pure-input-1 is_educational-'.$site_index, 'required')) }}
                            <div class="instructions"><strong>Μόνο</strong> εάν επιβεβαιώσετε ότι ο ιστότοπος ότι είναι εκπαιδευτικός, θα μπορέσετε να προχωρήσετε στην αξιολόγησή του.</div>        
                            <p class="error-message">{{ $errors->first('is_educational') }}</p>    

                            {{ Form::label('why_not_educational', 'Εάν ο ιστότοπος ΔΕΝ είναι εκπαιδευτικός, αιτιολογήστε') }}
                            {{ Form::textarea('why_not_educational', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Γιατί ο Ιστότοπος ΔΕΝ είναι εκπαιδευτικός;')) }}

                            {{Form::button('Αποστολή', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

                        {{ Form::close() }}
                    @endif
                @endif
                @if($evaluation->can_evaluate == 'no')
                    <div class="flash-message flash-error">
                        <i class="fa fa-user-times"></i> Δεν έχετε αποδεχτεί να αξιολογήσετε αυτόν τον Ιστότοπο. Θα σας ανατεθεί άλλος Ιστότοπος.
                    </div>
                @endif
            </div>

        </div>

    @endforeach

@stop
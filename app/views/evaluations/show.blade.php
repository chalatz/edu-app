@extends('layouts.default')


@section('content')

    <?php $site_index = 0; $i =0; $evaluations_count = $evaluations->count(); $sites_meter = 0; ?>

    <h1>Οι Αξιολογήσεις Μου</h1>

    <div class="block">
        <h3>{{ $evaluations_count }} Αναθέσεις</h3>
        <p>
            @foreach($evaluations as $evaluation)
                <?php
                    $i++;
                    if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0) { $sites_meter++; }
                ?>
                <a class="anchor-button pure-button pure-button-secondary" href="#evaluation-{{$i}}"><i class="fa fa-tasks"></i> {{$i}}η ανάθεση</a>
            @endforeach
        </p>
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
                    <div class="site-total-grade-wrapper">
                        @if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0)
                            <span class="site-total-grade-label">Βαθμολογία Ιστότοπου:</span>
                            <span class="site-total-grade">{{ $evaluation->total_grade }}%</span>
                        @else
                            <span class="gray-font">Πρέπει να βαθμολογήσετε όλους τους άξονες για να δείτε τη Βαθμολογία.</span>
                        @endif
                        
                    </div>
                    <div class="sites-meter">
                        <div class="progress-bar" {{$progress_length}}></div>
                        <div class="meter-number">Βαθμολογήσατε {{ $meter }} από 5 άξονες</div>
                    </div>                    
                </div>
                
                <div class="criteria-section">
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Β Άξονας (Ταυτότητα - Ενημέρωση)', [Auth::user()->id, 'beta', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                        <div class="criteron-check">
                            @if($evaluation->beta_grade > 0)
                                <div class="info-block green white-font">Ο Βαθμός σας: <strong>{{ $evaluation->beta_grade }}%</strong></div>
                            @else
                                <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Γ Άξονας (Περιεχόμενο)', [Auth::user()->id, 'gama', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                        <div class="criteron-check">
                            @if($evaluation->gama_grade > 0)
                                <div class="info-block green white-font">Ο Βαθμός σας: <strong>{{ $evaluation->gama_grade }}%</strong></div>
                            @else
                                <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Δ Άξονας (Διεπαφή - Αισθητική)', [Auth::user()->id, 'delta', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                        <div class="criteron-check">
                            @if($evaluation->delta_grade > 0)
                                <div class="info-block green white-font">Ο Βαθμός σας: <strong>{{ $evaluation->delta_grade }}%</strong></div>
                            @else
                                <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Ε Άξονας (Προσωπικά Δεδομένα)', [Auth::user()->id, 'epsilon', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                        <div class="criteron-check">
                            @if($evaluation->epsilon_grade > 0)
                                <div class="info-block green white-font">Ο Βαθμός σας: <strong>{{ $evaluation->epsilon_grade }}%</strong></div>
                            @else
                                <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'ΣΤ Άξονας (Αλληλεπίδραση)', [Auth::user()->id, 'st', $grader->id, $evaluation->site_id], ['class' => 'action-btn action-btn-blue anchor-block']) }}
                        <div class="criteron-check">
                            @if($evaluation->st_grade > 0)
                                <div class="info-block green white-font">Ο Βαθμός σας: <strong>{{ $evaluation->st_grade }}%</strong></div>
                            @else
                                <div class="info-block red white-font">Δεν έχετε καταχωρήσει Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        
        
            
        </div>

    @endforeach

@stop
@extends('layouts.default')


@section('content')

    <?php $site_index = 0; ?>

    <h1>Οι Αξιολογήσεις Μου</h1>

    @foreach($evaluations as $evaluation)

        <?php $site_index++ ?>

        <div class="evaluation-summaries">
            
            <div class="evaluation-single-summary">
                
                <div class="site-section">
                    <div class="site-index">
                        {{ $site_index }}
                    </div>
                    <div class="site-info">
                        <span class="site-info-label">Επωνυμία Ιστότοπου:</span>
                        <span>{{ Site::find($evaluation->site_id)->title }}</span>
                    </div>
                    <div class="site-info">
                        <span class="site-info-label">URL Ιστότοπου:</span>
                        <span><a href="{{ Site::find($evaluation->site_id)->site_url }}" target="_blank">{{ Site::find($evaluation->site_id)->site_url }}</a></span>
                    </div>
                    <div class="site-total-grade-wrapper">
                        @if($evaluation->beta_grade > 0 && $evaluation->gama_grade > 0 && $evaluation->delta_grade > 0 && $evaluation->epsilon_grade > 0 && $evaluation->st_grade > 0)
                            <span class="site-total-grade">Βαθμολογία Ιστότοπου:</span>
                            <span class="site-total-grade">{{ $evaluation->total_grade }}</span>
                        @else
                            <span class="orange-font">Πρέπει να βαθμολογήσετε όλα τα κριτήρια για να υπολογιστεί η Βαθμολογία.</span>
                        @endif
                        
                    </div>
                </div>
                
                <div class="criteria-section">
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Κριτήριο Β', [Auth::user()->id, 'beta', $grader->id, $evaluation->site_id], ['class' => 'criterion-link']) }}
                        <div class="criteron-check">
                            @if($evaluation->beta_grade > 0)
                                <div class="green white-font">Έχει καταχωρηθεί Βαθμολογία</div>
                            @else
                                <div class="red white-font">Δεν έχει καταχωρηθεί Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Κριτήριο Γ', [Auth::user()->id, 'gama', $grader->id, $evaluation->site_id], ['class' => 'criterion-link']) }}
                        <div class="criteron-check">
                            @if($evaluation->gama_grade > 0)
                                <div class="green white-font">Έχει καταχωρηθεί Βαθμολογία</div>
                            @else
                                <div class="red white-font">Δεν έχει καταχωρηθεί Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Κριτήριο Δ', [Auth::user()->id, 'delta', $grader->id, $evaluation->site_id], ['class' => 'criterion-link']) }}
                        <div class="criteron-check">
                            @if($evaluation->delta_grade > 0)
                                <div class="green white-font">Έχει καταχωρηθεί Βαθμολογία</div>
                            @else
                                <div class="red white-font">Δεν έχει καταχωρηθεί Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Κριτήριο Ε', [Auth::user()->id, 'epsilon', $grader->id, $evaluation->site_id], ['class' => 'criterion-link']) }}
                        <div class="criteron-check">
                            @if($evaluation->epsilon_grade > 0)
                                <div class="green white-font">Έχει καταχωρηθεί Βαθμολογία</div>
                            @else
                                <div class="red white-font">Δεν έχει καταχωρηθεί Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                    <div class="criterion-link-wrapper">
                        {{ link_to_route('grader.evaluate_edit', 'Κριτήριο ΣΤ', [Auth::user()->id, 'st', $grader->id, $evaluation->site_id], ['class' => 'criterion-link']) }}
                        <div class="criteron-check">
                            @if($evaluation->st_grade > 0)
                                <div class="green white-font">Έχει καταχωρηθεί Βαθμολογία</div>
                            @else
                                <div class="red white-font">Δεν έχει καταχωρηθεί Βαθμολογία</div>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        
        
            
        </div>

    @endforeach

@stop
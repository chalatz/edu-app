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
                </div>
                
                <div class="criteria-section">
                    <div class="criterion-link">
                        <a href="#">Κριτήριο Β</a>
                    </div>
                </div>
                
            </div>
        
        
            
        </div>

    @endforeach

@stop
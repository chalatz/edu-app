@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <h1>Επεξεργασία Στοιχείων Αξιολογητή Α</h1>

            @if(!isset(Auth::user()->site->proposes_himself) || Auth::user()->site->proposes_himself != 'yes')
                @if($grader->has_agreed != null && $grader->has_agreed != 'yes')
                    <p>
                        {{ link_to_route('agrees.grader', 'Συμφωνώ', [Auth::user()->grader->id, 'yes'], ['class' => 'pure-button button-secondary button-secondary-green', 'onclick' => 'return confirm("Είστε σίγουρος ότι συμφωνείτε;");']) }}
                        {{ link_to_route('agrees.grader', 'Δε Συμφωνώ', [Auth::user()->grader->id, 'no'], ['class' => 'pure-button button-secondary button-secondary-red', 'onclick' => 'return confirm("Είστε σίγουρος ότι διαφωνείτε;");']) }}
                    </p>
                @endif
            @endif
            

            {{ Form::model($user->grader, array('method' => 'PATCH','route' => ['grader.update', $user->id], 'class' => 'pure-form pure-form-stacked',  'id' => 'confirmMe', 'name' => 'confirmMe')) }}

                <?php $categories = ['' => 'Επιλέξτε...'] + Category::lists('category_name', 'id'); ?>
                <?php $districts = ['' => 'Επιλέξτε...'] + District::lists('district_name', 'id'); ?>
                <?php 
                    $lang_levels = [
                        '' => 'Επιλέξτε Επίπεδο...',
                        'A1' => 'B1 - Στοιχειώδης Γνώση',
                        'A2' => 'A2 - Βασική Γνώση',
                        'B1' => 'B1 - Μέτρια Γνώση',
                        'B2' => 'B2 - Καλή Γνώση',
                        'C1' => 'C1 - Πολύ καλή Γνώση',
                        'C2' => 'C2 - Άριστη Γνώση',
                    ];
                ?>

                @include('layouts.partials.graders_form')

                @include('layouts.partials.graders_site')

                {{Form::button('Αποθήκευση', array('type' => 'submit', 'class' => 'pure-button pure-button-primary'))}}

    {{ Form::close() }}

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
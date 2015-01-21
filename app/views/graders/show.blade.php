@extends('layouts.default')

@section('content')

    @if(Auth::guest())
        <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
    @else
        @if(Auth::user()->id == $user->id)

            <?php $categories = Category::lists('category_name', 'id'); ?>
            <?php $districts = District::lists('district_name', 'id'); ?>

            <p>{{ link_to_route('grader.edit', 'Επεξεργασία των Στοιχείων μου', Auth::user()->id, ['class' => 'pure-button button-secondary button-secondary-light-blue']) }}</p>

            <h1>Στοιχεία Αξιολογητή</h1>

            @include('layouts.partials.graders_info_fields')

            <p>{{ link_to_route('grader.edit', 'Επεξεργασία των Στοιχείων μου', Auth::user()->id, ['class' => 'pure-button button-secondary button-secondary-light-blue']) }}</p>

        @else
            <p>Δεν έχετε δικαιώματα πρόσβασης σε αυτήν την σελίδα.</p>
        @endif
    @endif

@stop
@extends('layouts.admin')

@section('content')

    <?php
        $cats_count = 0;
        $districts_count = 0;
    ?>

	<h1>Στατιστικά</h1>
    <hr>

    <h2>Κατηγορίες</h2>
    <table class="pure-table pure-table-striped stats-table">
        <thead>
            <tr>
                <th>Κατηγορία</th>
                <th>Πλήθος Υποψ.</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($cats as $cat)
                <tr>
                    <td>{{ $cat->category_name }}</td>
                    <td>{{ Site::where('cat_id', '=', $cat->id)->count() }}</td>
                </tr>
                <?php $cats_count += Site::where('cat_id', '=', $cat->id)->count(); ?>
            @endforeach
        </tbody>
    </table>

    <p>Σύνολο: <strong>{{ $cats_count }}</strong></p>
    <hr>

    <h2>Περιφέρειες</h2>
    <table class="pure-table pure-table-striped stats-table">
        <thead>
            <tr>
                <th>Περιφέρεια</th>
                <th>Πλήθος Υποψ.</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($districts as $district)
                <tr>
                    <td>{{ $district->district_name }}</td>
                    <td>{{ Site::where('district_id', '=', $district->id)->count() }}</td>
                </tr>
                <?php $districts_count += Site::where('district_id', '=', $district->id)->count(); ?>
            @endforeach
        </tbody>
    </table>

    <p>Σύνολο: <strong>{{ $districts_count }}</strong></p>
    <hr>

@stop
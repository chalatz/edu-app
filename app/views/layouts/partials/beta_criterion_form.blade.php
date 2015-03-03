<?php $criteria = BetaCriterion::all()->first(); ?>

<h3>Β: {{ $criteria->main_title }}</h3>
<h4>Ποσοστό επί του συνόλου: {{ $criteria->weight }}%</h4>

<table class="pure-table">
    <thead>
        <tr>
            <th colspan="2"></th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Βκ1</strong></td>
            <td>{{ $criteria->bk1_title }}</td>
            <td>{{ $criteria->bk1_1_title }}</td>
            <td>{{ $criteria->bk1_2_title }}</td>
            <td>{{ $criteria->bk1_3_title }}</td>
            <td>{{ $criteria->bk1_4_title }}</td>
            <td>{{ $criteria->bk1_5_title }}</td>
        </tr>
    </tbody>
</table>


<label for="bk1">Bk1 ({{ $criteria->bk1_weight }}%)</label>
    {{ Form::select('bk1',[
        '' => 'Βαθμολογήστε (1 έως 5)...',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
    ], null, array('class' => 'pure-input-1', 'required')) }}
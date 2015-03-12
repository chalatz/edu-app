<?php $criteria = EpsilonCriterion::all()->first(); ?>

<h3>Ε: {{ $criteria->main_title }}</h3>
<h4>Ποσοστό επί του συνόλου: {{ $criteria->weight }}%</h4>

<div class="criterion-wrapper">    
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
                <td><strong>Εκ1</strong></td>
                <td>{{ $criteria->ek1_title }}</td>
                <td>{{ $criteria->ek1_1_title }}</td>
                <td>{{ $criteria->ek1_2_title }}</td>
                <td>{{ $criteria->ek1_3_title }}</td>
                <td>{{ $criteria->ek1_4_title }}</td>
                <td>{{ $criteria->ek1_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="ek1">Εκ1 ({{ $criteria->ek1_weight }}%) *</label>
        {{ Form::select('ek1',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('ek1') }}</p>
    
    {{ Form::label('ek1_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Εκ1') }}
    {{ Form::textarea('ek1_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
</div>

<div class="criterion-wrapper">    
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
                <td><strong>Εκ2</strong></td>
                <td>{{ $criteria->ek2_title }}</td>
                <td>{{ $criteria->ek2_1_title }}</td>
                <td>{{ $criteria->ek2_2_title }}</td>
                <td>{{ $criteria->ek2_3_title }}</td>
                <td>{{ $criteria->ek2_4_title }}</td>
                <td>{{ $criteria->ek2_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="ek2">Εκ2 ({{ $criteria->ek2_weight }}%) *</label>
        {{ Form::select('ek2',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('ek2') }}</p>
    
    {{ Form::label('ek2_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Εκ2') }}
    {{ Form::textarea('ek2_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
</div>

<div class="criterion-wrapper">
    {{ Form::label('epsilon_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για τον Ε Άξονα') }}
    {{ Form::textarea('epsilon_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για τον Άξονα.')) }}
</div>


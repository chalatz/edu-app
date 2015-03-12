<?php $criteria = StCriterion::all()->first(); ?>

<h3>ΣΤ: {{ $criteria->main_title }}</h3>
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
                <td><strong>ΣΤκ1</strong></td>
                <td>{{ $criteria->stk1_title }}</td>
                <td>{{ $criteria->stk1_1_title }}</td>
                <td>{{ $criteria->stk1_2_title }}</td>
                <td>{{ $criteria->stk1_3_title }}</td>
                <td>{{ $criteria->stk1_4_title }}</td>
                <td>{{ $criteria->stk1_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="stk1">ΣΤκ1 ({{ $criteria->stk1_weight }}%) *</label>
        {{ Form::select('stk1',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('stk1') }}</p>
    
    {{ Form::label('stk1_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο ΣΤκ1') }}
    {{ Form::textarea('stk1_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
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
                <td><strong>ΣΤκ2</strong></td>
                <td>{{ $criteria->stk2_title }}</td>
                <td>{{ $criteria->stk2_1_title }}</td>
                <td>{{ $criteria->stk2_2_title }}</td>
                <td>{{ $criteria->stk2_3_title }}</td>
                <td>{{ $criteria->stk2_4_title }}</td>
                <td>{{ $criteria->stk2_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="stk2">ΣΤκ2 ({{ $criteria->stk2_weight }}%) *</label>
        {{ Form::select('stk2',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('stk2') }}</p>
    
    {{ Form::label('stk2_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο ΣΤκ2') }}
    {{ Form::textarea('stk2_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
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
                <td><strong>ΣΤκ3</strong></td>
                <td>{{ $criteria->stk3_title }}</td>
                <td>{{ $criteria->stk3_1_title }}</td>
                <td>{{ $criteria->stk3_2_title }}</td>
                <td>{{ $criteria->stk3_3_title }}</td>
                <td>{{ $criteria->stk3_4_title }}</td>
                <td>{{ $criteria->stk3_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="stk3">ΣΤκ3 ({{ $criteria->stk3_weight }}%) *</label>
        {{ Form::select('stk3',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('stk3') }}</p>

    {{ Form::label('stk3_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο ΣΤκ3') }}
    {{ Form::textarea('stk3_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
</div>

<div class="criterion-wrapper">
    {{ Form::label('st_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για τον ΣΤ Άξονα') }}
    {{ Form::textarea('st_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για τον Άξονα.')) }}
</div>
<?php $criteria = BetaCriterion::all()->first(); ?>

<h3>Β: {{ $criteria->main_title }}</h3>
<h4>Ποσοστό επί του συνόλου: {{ $criteria->weight }}%</h4>

@if(Site::find($evaluation->site_id)->purpose)
    <hr>
    <h4>Σκοπός - Στόχοι Ιστότοπου:</h4>
    <p><em>{{ Site::find($evaluation->site_id)->purpose }}</em></p>
    <hr>
@endif 

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
    <label for="bk1">Βκ1 ({{ $criteria->bk1_weight }}%) *</label>
        {{ Form::select('bk1',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('bk1') }}</p>
    
    {{ Form::label('bk1_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Βκ1') }}
    {{ Form::textarea('bk1_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
                
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
                <td><strong>Βκ2</strong></td>
                <td>{{ $criteria->bk2_title }}</td>
                <td>{{ $criteria->bk2_1_title }}</td>
                <td>{{ $criteria->bk2_2_title }}</td>
                <td>{{ $criteria->bk2_3_title }}</td>
                <td>{{ $criteria->bk2_4_title }}</td>
                <td>{{ $criteria->bk2_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="bk2">Βκ2 ({{ $criteria->bk2_weight }}%) *</label>
        {{ Form::select('bk2',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('bk2') }}</p>
    
    {{ Form::label('bk2_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Βκ2') }}
    {{ Form::textarea('bk2_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
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
                <td><strong>Βκ3</strong></td>
                <td>{{ $criteria->bk3_title }}</td>
                <td>{{ $criteria->bk3_1_title }}</td>
                <td>{{ $criteria->bk3_2_title }}</td>
                <td>{{ $criteria->bk3_3_title }}</td>
                <td>{{ $criteria->bk3_4_title }}</td>
                <td>{{ $criteria->bk3_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="bk3">Βκ3 ({{ $criteria->bk3_weight }}%) *</label>
        {{ Form::select('bk3',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('bk3') }}</p>

    {{ Form::label('bk3_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Βκ3') }}
    {{ Form::textarea('bk3_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
</div>   

<div class="criterion-wrapper">
    {{ Form::label('beta_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για τον Β Άξονα') }}
    {{ Form::textarea('beta_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για τον Άξονα.')) }}
</div>
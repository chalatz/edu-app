<?php $criteria = GamaCriterion::all()->first(); ?>

<h3>Γ: {{ $criteria->main_title }}</h3>
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
                <td><strong>Γκ1</strong></td>
                <td>{{ $criteria->gk1_title }}</td>
                <td>{{ $criteria->gk1_1_title }}</td>
                <td>{{ $criteria->gk1_2_title }}</td>
                <td>{{ $criteria->gk1_3_title }}</td>
                <td>{{ $criteria->gk1_4_title }}</td>
                <td>{{ $criteria->gk1_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="gk1">Γκ1 ({{ $criteria->gk1_weight }}%) *</label>
        {{ Form::select('gk1',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('gk1') }}</p>
    
    {{ Form::label('gk1_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Γκ1') }}
    {{ Form::textarea('gk1_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
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
                <td><strong>Γκ2</strong></td>
                <td>{{ $criteria->gk2_title }}</td>
                <td>{{ $criteria->gk2_1_title }}</td>
                <td>{{ $criteria->gk2_2_title }}</td>
                <td>{{ $criteria->gk2_3_title }}</td>
                <td>{{ $criteria->gk2_4_title }}</td>
                <td>{{ $criteria->gk2_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="gk2">Γκ2 ({{ $criteria->gk2_weight }}%) *</label>
        {{ Form::select('gk2',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('gk2') }}</p>
    
    {{ Form::label('gk2_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Γκ2') }}
    {{ Form::textarea('gk2_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
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
                <td><strong>Γκ3</strong></td>
                <td>{{ $criteria->gk3_title }}</td>
                <td>{{ $criteria->gk3_1_title }}</td>
                <td>{{ $criteria->gk3_2_title }}</td>
                <td>{{ $criteria->gk3_3_title }}</td>
                <td>{{ $criteria->gk3_4_title }}</td>
                <td>{{ $criteria->gk3_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="gk3">Γκ3 ({{ $criteria->gk3_weight }}%) *</label>
        {{ Form::select('gk3',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('gk3') }}</p>
    
    {{ Form::label('gk3_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Γκ3') }}
    {{ Form::textarea('gk3_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
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
                <td><strong>Γκ4</strong></td>
                <td>{{ $criteria->gk4_title }}</td>
                <td>{{ $criteria->gk4_1_title }}</td>
                <td>{{ $criteria->gk4_2_title }}</td>
                <td>{{ $criteria->gk4_3_title }}</td>
                <td>{{ $criteria->gk4_4_title }}</td>
                <td>{{ $criteria->gk4_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="gk4">Γκ4 ({{ $criteria->gk4_weight }}%) *</label>
    {{ Form::select('gk4',[
        '' => 'Βαθμολογήστε (1 έως 5)',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
    ], null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('gk4') }}</p>  
    
    {{ Form::label('gk4_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Γκ4') }}
    {{ Form::textarea('gk4_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}

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
                <td><strong>Γκ5</strong></td>
                <td>{{ $criteria->gk5_title }}</td>
                <td>{{ $criteria->gk5_1_title }}</td>
                <td>{{ $criteria->gk5_2_title }}</td>
                <td>{{ $criteria->gk5_3_title }}</td>
                <td>{{ $criteria->gk5_4_title }}</td>
                <td>{{ $criteria->gk5_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="gk5">Γκ5 ({{ $criteria->gk5_weight }}%) *</label>
    {{ Form::select('gk5',[
        '' => 'Βαθμολογήστε (1 έως 5)',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
    ], null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('gk5') }}</p>
    
    {{ Form::label('gk5_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για το Κριτήριο Γκ5') }}
    {{ Form::textarea('gk5_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για το Κριτήριο.')) }}
    
</div>

<div class="criterion-wrapper">
    {{ Form::label('gama_comment', 'Σχόλια - Παρατηρήσεις - Προτάσεις για τον Γ Άξονα') }}
    {{ Form::textarea('gama_comment', null, array('rows' => 3, 'cols' => '50', 'class' => 'pure-input-1', 'placeholder' => 'Προαιρετικά σχόλια για τον Άξονα.')) }}
</div>
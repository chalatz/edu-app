<?php $criteria = DeltaCriterion::all()->first(); ?>

<h3>Δ: {{ $criteria->main_title }}</h3>
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
                <td><strong>Δκ1</strong></td>
                <td>{{ $criteria->dk1_title }}</td>
                <td>{{ $criteria->dk1_1_title }}</td>
                <td>{{ $criteria->dk1_2_title }}</td>
                <td>{{ $criteria->dk1_3_title }}</td>
                <td>{{ $criteria->dk1_4_title }}</td>
                <td>{{ $criteria->dk1_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="dk1">Δκ1 ({{ $criteria->dk1_weight }}%)</label>
        {{ Form::select('dk1',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('dk1') }}</p>
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
                <td><strong>Δκ2</strong></td>
                <td>{{ $criteria->dk2_title }}</td>
                <td>{{ $criteria->dk2_1_title }}</td>
                <td>{{ $criteria->dk2_2_title }}</td>
                <td>{{ $criteria->dk2_3_title }}</td>
                <td>{{ $criteria->dk2_4_title }}</td>
                <td>{{ $criteria->dk2_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="dk2">Δκ2 ({{ $criteria->dk2_weight }}%)</label>
        {{ Form::select('dk2',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('dk2') }}</p>
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
                <td><strong>Δκ3</strong></td>
                <td>{{ $criteria->dk3_title }}</td>
                <td>{{ $criteria->dk3_1_title }}</td>
                <td>{{ $criteria->dk3_2_title }}</td>
                <td>{{ $criteria->dk3_3_title }}</td>
                <td>{{ $criteria->dk3_4_title }}</td>
                <td>{{ $criteria->dk3_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="dk3">Δκ3 ({{ $criteria->dk3_weight }}%)</label>
        {{ Form::select('dk3',[
            '' => 'Βαθμολογήστε (1 έως 5)',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        ], null, array('class' => 'pure-input-1', 'required')) }}
        <p class="error-message">{{ $errors->first('dk3') }}</p>
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
                <td><strong>Δκ4</strong></td>
                <td>{{ $criteria->dk4_title }}</td>
                <td>{{ $criteria->dk4_1_title }}</td>
                <td>{{ $criteria->dk4_2_title }}</td>
                <td>{{ $criteria->dk4_3_title }}</td>
                <td>{{ $criteria->dk4_4_title }}</td>
                <td>{{ $criteria->dk4_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="dk4">Δκ4 ({{ $criteria->dk4_weight }}%)</label>
    {{ Form::select('dk4',[
        '' => 'Βαθμολογήστε (1 έως 5)',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
    ], null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('dk4') }}</p>  
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
                <td><strong>Δκ5</strong></td>
                <td>{{ $criteria->dk5_title }}</td>
                <td>{{ $criteria->dk5_1_title }}</td>
                <td>{{ $criteria->dk5_2_title }}</td>
                <td>{{ $criteria->dk5_3_title }}</td>
                <td>{{ $criteria->dk5_4_title }}</td>
                <td>{{ $criteria->dk5_5_title }}</td>
            </tr>
        </tbody>
    </table>
    <label for="dk5">Δκ5 ({{ $criteria->dk5_weight }}%)</label>
    {{ Form::select('dk5',[
        '' => 'Βαθμολογήστε (1 έως 5)',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
    ], null, array('class' => 'pure-input-1', 'required')) }}
    <p class="error-message">{{ $errors->first('dk5') }}</p>
</div>
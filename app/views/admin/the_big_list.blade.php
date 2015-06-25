@extends('layouts.bare')

@section('content')

    <table class="admin-table pure-table pure-table-horizontal pure-table-striped">

        <thead>
            <tr>
                <th>Κωδικός</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Κατηγορία</th>
                <th>Περιφέρεια</th>
                <th>Βαθμός στη Φάση</th>
                <th>Δημιουργός</th>
                <th>Αξιολογητής</th>
                <th>Τυχόν Λόγος μη αποδοχής</th>
                <th>Τυχόν Λόγος για μη εκπαιδευτικό</th>
                <th>Γενικό Σχόλιο</th>
                <th>Βαθμός Βκ1</th>
                <th>Σχόλιο Βκ1</th>
                <th>Βαθμός Βκ2</th>
                <th>Σχόλιο Βκ2</th>
                <th>Βαθμός Βκ3</th>
                <th>Σχόλιο Βκ3</th>
                <th>Βαθμός Γκ1</th>
                <th>Σχόλιο Γκ1</th>
                <th>Βαθμός Γκ2</th>
                <th>Σχόλιο Γκ2</th>
                <th>Βαθμός Γκ3</th>
                <th>Σχόλιο Γκ3</th>
                <th>Βαθμός Γκ4</th>
                <th>Σχόλιο Γκ4</th>
                <th>Βαθμός Γκ5</th>
                <th>Σχόλιο Γκ5</th>
                <th>Βαθμός Δκ1</th>
                <th>Σχόλιο Δκ1</th>
                <th>Βαθμός Δκ2</th>
                <th>Σχόλιο Δκ2</th>
                <th>Βαθμός Δκ3</th>
                <th>Σχόλιο Δκ3</th>
                <th>Βαθμός Δκ4</th>
                <th>Σχόλιο Δκ4</th>
                <th>Βαθμός Δκ5</th>
                <th>Σχόλιο Δκ5</th>
                <th>Βαθμός Εκ1</th>
                <th>Σχόλιο Εκ1</th>
                <th>Βαθμός Εκ2</th>
                <th>Σχόλιο Εκ2</th>
                <th>Βαθμός ΣΤκ1</th>
                <th>Σχόλιο ΣΤκ1</th>
                <th>Βαθμός ΣΤκ2</th>
                <th>Σχόλιο ΣΤκ2</th>
                <th>Βαθμός ΣΤκ3</th>
                <th>Σχόλιο ΣΤκ3</th>
                <th>Βαθμός Β Άξονα</th>
                <th>Σχόλιο Β Άξονα</th>
                <th>Βαθμός Γ Άξονα</th>
                <th>Σχόλιο Γ Άξονα</th>
                <th>Βαθμός Δ Άξονα</th>
                <th>Σχόλιο Δ Άξονα</th>
                <th>Βαθμός Ε Άξονα</th>
                <th>Σχόλιο Ε Άξονα</th>
                <th>Βαθμός ΣΤ Άξονα</th>
                <th>Σχόλιο ΣΤ Άξονα</th>

            </tr>
        </thead>

        <tbody>
            @foreach($evals as $eval)
              <?php $site = Site::find($eval->site_id); ?>
              <?php $grader = Grader::find($eval->grader_id); ?>
              <?php $the_final_grade = 0; ?>
              @if(Grade::where('site_id', $eval->site_id)->count() > 0)
                <?php $grade = Grade::where('site_id', $eval->site_id)->first(); ?>
                <?php $the_final_grade = $grade->the_final_grade; ?>
              @endif

                <tr>
                    <td>i{{ sprintf("%03d", $site->id) }}</td>
                    <td>{{ $site->title }}</td>
                    <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>{{ District::find($site->district_id)->district_name }}</td>
                    <td>{{ $the_final_grade }}</td>
                    <td>{{ $site->creator }}</td>
                    <td>{{ $grader->grader_last_name }} {{ $grader->grader_name }}</td>
                    <td> @if($eval->can_evaluate == 'no') {{ $eval->why_not }} @else --- @endif</td>
                    <td> @if($eval->is_educational == 'no') {{ $eval->why_not_educational }} @else --- @endif</td>
                    <td>{{ $eval->site_comment }}</td>
                    <td>{{ $eval->bk1 }}</td>
                    <td>{{ $eval->bk1_comment }}</td>
                    <td>{{ $eval->bk2 }}</td>
                    <td>{{ $eval->bk2_comment }}</td>
                    <td>{{ $eval->bk3 }}</td>
                    <td>{{ $eval->bk3_comment }}</td>
                    <td>{{ $eval->gk1 }}</td>
                    <td>{{ $eval->gk1_comment }}</td>
                    <td>{{ $eval->gk2 }}</td>
                    <td>{{ $eval->gk2_comment }}</td>
                    <td>{{ $eval->gk3 }}</td>
                    <td>{{ $eval->gk3_comment }}</td>
                    <td>{{ $eval->gk4 }}</td>
                    <td>{{ $eval->gk4_comment }}</td>
                    <td>{{ $eval->gk5 }}</td>
                    <td>{{ $eval->gk5_comment }}</td>
                    <td>{{ $eval->dk1 }}</td>
                    <td>{{ $eval->dk1_comment }}</td>
                    <td>{{ $eval->dk2 }}</td>
                    <td>{{ $eval->dk2_comment }}</td>
                    <td>{{ $eval->dk3 }}</td>
                    <td>{{ $eval->dk3_comment }}</td>
                    <td>{{ $eval->dk4 }}</td>
                    <td>{{ $eval->dk4_comment }}</td>
                    <td>{{ $eval->dk5 }}</td>
                    <td>{{ $eval->dk5_comment }}</td>
                    <td>{{ $eval->ek1 }}</td>
                    <td>{{ $eval->ek1_comment }}</td>
                    <td>{{ $eval->ek2 }}</td>
                    <td>{{ $eval->ek2_comment }}</td>
                    <td>{{ $eval->stk1 }}</td>
                    <td>{{ $eval->stk1_comment }}</td>
                    <td>{{ $eval->stk2 }}</td>
                    <td>{{ $eval->stk2_comment }}</td>
                    <td>{{ $eval->stk3 }}</td>
                    <td>{{ $eval->stk3_comment }}</td>
                    <td>{{ $eval->beta_grade }}</td>
                    <td>{{ $eval->beta_comment }}</td>
                    <td>{{ $eval->gama_grade }}</td>
                    <td>{{ $eval->gama_comment }}</td>
                    <td>{{ $eval->delta_grade }}</td>
                    <td>{{ $eval->delta_comment }}</td>
                    <td>{{ $eval->epsilon_grade }}</td>
                    <td>{{ $eval->epsilon_comment }}</td>
                    <td>{{ $eval->st_grade }}</td>
                    <td>{{ $eval->st_comment }}</td>
                </tr>

            @endforeach
        </tbody>

    </table>

@stop

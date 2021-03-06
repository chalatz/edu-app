@extends('layouts.default')

@section('content')

    @if($site_id == 294)
      <div class="instructions">Μετά από έλεγχο διαπιστώθηκε ότι ο ιστότοπός σας δεν είναι εκπαιδευτικός, καθώς περιέχει διαφημίσεις και σχεδιάστηκε από εταιρεία (http://www.wf8.gr/), γεγονός αντίθετο με τους <a href="http://www.eduwebawards.gr/requirements/">όρους του Διαγωνισμού</a> (άρθρο 4 και 5)</div>
    @elseif($site_id == 64)
      <div class="instructions">Μετά από έλεγχο διαπιστώθηκε ότι ο ιστότοπός σας δεν είναι εκπαιδευτικός, καθώς περιέχει διαφημιστικό υλικό, γεγονός αντίθετο με τους <a href="http://www.eduwebawards.gr/requirements/">όρους του Διαγωνισμού</a> (άρθρο 5)</div>

    @elseif($final_grade && $final_grade > 0)

      <p>
      <span style="font-size: 1.3em">Ο Ιστότοπός σας έχει φτάσει στη φάση <strong>{{ $phase }}</strong> και πήρε το βαθμό:</span>
      </p>
      <p>
        <span class="final-grade">{{ $final_grade }}</span>
      </p>

      @if(Evaluation::where('site_id', $site_id)->count() >= 2)
        <h2>Σχόλια Αξιολογητών από τη Φάση Α:</h2>
        <?php $evals_a = Evaluation::where('site_id', $site_id)->get(); ?>
        @foreach($evals_a as $eval_a)
          <p class="dd">{{{ $eval_a->site_comment }}}</p>

          <p class="dd">{{{ $eval_a->bk1_comment }}}</p>
          <p class="dd">{{{ $eval_a->bk2_comment }}}</p>
          <p class="dd">{{{ $eval_a->bk3_comment }}}</p>

          <p class="dd">{{{ $eval_a->gk1_comment }}}</p>
          <p class="dd">{{{ $eval_a->gk2_comment }}}</p>
          <p class="dd">{{{ $eval_a->gk3_comment }}}</p>
          <p class="dd">{{{ $eval_a->gk4_comment }}}</p>
          <p class="dd">{{{ $eval_a->gk5_comment }}}</p>

          <p class="dd">{{{ $eval_a->dk1_comment }}}</p>
          <p class="dd">{{{ $eval_a->dk2_comment }}}</p>
          <p class="dd">{{{ $eval_a->dk3_comment }}}</p>
          <p class="dd">{{{ $eval_a->dk4_comment }}}</p>
          <p class="dd">{{{ $eval_a->dk5_comment }}}</p>

          <p class="dd">{{{ $eval_a->ek1_comment }}}</p>
          <p class="dd">{{{ $eval_a->ek2_comment }}}</p>

          <p class="dd">{{{ $eval_a->stk1_comment }}}</p>
          <p class="dd">{{{ $eval_a->stk2_comment }}}</p>
          <p class="dd">{{{ $eval_a->stk3_comment }}}</p>

          <p class="dd">{{{ $eval_a->beta_comment }}}</p>
          <p class="dd">{{{ $eval_a->gama_comment }}}</p>
          <p class="dd">{{{ $eval_a->delta_comment }}}</p>
          <p class="dd">{{{ $eval_a->epsilon_comment }}}</p>
          <p class="dd">{{{ $eval_a->st_comment }}}</p>
        @endforeach
      @endif

      @if(Evaluation_b::where('site_id', $site_id)->count() >= 2)
        <h2>Σχόλια Αξιολογητών από τη Φάση Β:</h2>
        <?php $evals_b = Evaluation_b::where('site_id', $site_id)->get(); ?>
        @foreach($evals_b as $eval_b)
          <p class="dd">{{{ $eval_b->site_comment }}}</p>

          <p class="dd">{{{ $eval_b->bk1_comment }}}</p>
          <p class="dd">{{{ $eval_b->bk2_comment }}}</p>
          <p class="dd">{{{ $eval_b->bk3_comment }}}</p>

          <p class="dd">{{{ $eval_b->gk1_comment }}}</p>
          <p class="dd">{{{ $eval_b->gk2_comment }}}</p>
          <p class="dd">{{{ $eval_b->gk3_comment }}}</p>
          <p class="dd">{{{ $eval_b->gk4_comment }}}</p>
          <p class="dd">{{{ $eval_b->gk5_comment }}}</p>

          <p class="dd">{{{ $eval_b->dk1_comment }}}</p>
          <p class="dd">{{{ $eval_b->dk2_comment }}}</p>
          <p class="dd">{{{ $eval_b->dk3_comment }}}</p>
          <p class="dd">{{{ $eval_b->dk4_comment }}}</p>
          <p class="dd">{{{ $eval_b->dk5_comment }}}</p>

          <p class="dd">{{{ $eval_b->ek1_comment }}}</p>
          <p class="dd">{{{ $eval_b->ek2_comment }}}</p>

          <p class="dd">{{{ $eval_b->stk1_comment }}}</p>
          <p class="dd">{{{ $eval_b->stk2_comment }}}</p>
          <p class="dd">{{{ $eval_b->stk3_comment }}}</p>

          <p class="dd">{{{ $eval_b->beta_comment }}}</p>
          <p class="dd">{{{ $eval_b->gama_comment }}}</p>
          <p class="dd">{{{ $eval_b->delta_comment }}}</p>
          <p class="dd">{{{ $eval_b->epsilon_comment }}}</p>
          <p class="dd">{{{ $eval_b->st_comment }}}</p>
        @endforeach
      @endif

      @if(Evaluation_c::where('site_id', $site_id)->count() >= 2)
        <h2>Σχόλια Αξιολογητών από τη Φάση Γ:</h2>
        <?php $evals_c = Evaluation_c::where('site_id', $site_id)->get(); ?>
        @foreach($evals_c as $eval_c)
          <p class="dd">{{{ $eval_c->site_comment }}}</p>

          <p class="dd">{{{ $eval_c->bk1_comment }}}</p>
          <p class="dd">{{{ $eval_c->bk2_comment }}}</p>
          <p class="dd">{{{ $eval_c->bk3_comment }}}</p>

          <p class="dd">{{{ $eval_c->gk1_comment }}}</p>
          <p class="dd">{{{ $eval_c->gk2_comment }}}</p>
          <p class="dd">{{{ $eval_c->gk3_comment }}}</p>
          <p class="dd">{{{ $eval_c->gk4_comment }}}</p>
          <p class="dd">{{{ $eval_c->gk5_comment }}}</p>

          <p class="dd">{{{ $eval_c->dk1_comment }}}</p>
          <p class="dd">{{{ $eval_c->dk2_comment }}}</p>
          <p class="dd">{{{ $eval_c->dk3_comment }}}</p>
          <p class="dd">{{{ $eval_c->dk4_comment }}}</p>
          <p class="dd">{{{ $eval_c->dk5_comment }}}</p>

          <p class="dd">{{{ $eval_c->ek1_comment }}}</p>
          <p class="dd">{{{ $eval_c->ek2_comment }}}</p>

          <p class="dd">{{{ $eval_c->stk1_comment }}}</p>
          <p class="dd">{{{ $eval_c->stk2_comment }}}</p>
          <p class="dd">{{{ $eval_c->stk3_comment }}}</p>

          <p class="dd">{{{ $eval_c->beta_comment }}}</p>
          <p class="dd">{{{ $eval_c->gama_comment }}}</p>
          <p class="dd">{{{ $eval_c->delta_comment }}}</p>
          <p class="dd">{{{ $eval_c->epsilon_comment }}}</p>
          <p class="dd">{{{ $eval_c->st_comment }}}</p>
        @endforeach
      @endif

    @else

      <div class="instructions">Δεν υπάρχουν σχόλια για την υποψηφιότητά σας.</div>
      
    @endif

@stop

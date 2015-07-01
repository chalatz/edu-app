@extends('layouts.bare')

    @section('content')

        <table>

            <thead>
                <tr>
                    <th>Κωδικός</th>
                    <th>Eπώνυμο</th>
                    <th>Όνομα</th>
                    <th>Email</th>
                    <th>Ειδικότητα</th>
                    <th>Περιφέρεια</th>
                    <th>Ταχ. Διεύθυνση</th>
                    <th>Κατηγορίες που επιθυμεί</th>
                    <th>Αξιολογητής Α στον προηγούμενο διαγωνισμό</th>
                    <th>Αξιολογητής σε περισσότερους από έναν διαγωνισμούς</th>
                    <th>Ξένες Γλώσσες</th>
                    <th>Άλλες Ξένες Γλώσσες</th>
                    <th>Γιατί αυτοπροτείνεται</th>
                    <th>Δημιουργήθηκε</th>
                </tr>
            </thead>

            <tbody>
                @foreach($graders as $grader)

                    @if($grader->user->hasRole('grader_b'))

                    <?php
                        $grader_code = '';
                        if($grader->user->hasRole('grader')){
                            $grader_code = 'Α' . sprintf("%03d", $grader->id);
                        }
                        if($grader->user->hasRole('grader_b')){
                            $grader_code = 'Β' . sprintf("%03d", $grader->id);
                        }
                        if($grader->user->hasRole('grader') && $grader->user->hasRole('grader_b')){
                            $grader_code = 'ΑΒ' . sprintf("%03d", $grader->id);
                        }
                        if($grader->user->hasRole('admin')){
                            $grader_code = 'Γ' . sprintf("%03d", $grader->id);
                        }
                    ?>

                        <tr>
                            <td>{{ $grader_code }}</td>
                            <td>{{ $grader->grader_last_name }}</td>
                            <td>{{ $grader->grader_name }}</td>
                            <td>{{ $grader->user->email }}</td>
                            <td>@if(isset($grader->specialty)) {{Specialty::find($grader->specialty)->specialty_name}} @endif</td>
                            <td>@if($grader->district_id != 100){{ District::find($grader->district_id)->district_name }}@endif</td>
                            <td>{{ $grader->address }}</td>
                            <td>{{ $grader->desired_category }}</td>
                            <td>{{ $grader->past_grader }}</td>
                            <td>{{ $grader->past_grader_more }}</td>
                            <td>
                                @if($grader->level_english_check == 'yes_english') Αγγλικά - {{ $grader->level_english }} @endif <br>
                                @if($grader->level_french_check == 'yes_french') Γαλλικά - {{ $grader->level_french }} @endif <br>
                                @if($grader->level_german_check == 'yes_german') Γερμανικά - {{ $grader->level_german }} @endif <br>
                                @if($grader->level_italian_check == 'yes_italian') Ιταλικά - {{ $grader->level_italian }} @endif
                            </td>
                            <td>@if(isset($grader->languages)) {{ $grader->languages }}  {{ $grader->languages_level }} @endif</td>
                            <td>{{ $grader->why_self_proposed }}</td>
                            <td>{{ date('d / m / Y', strtotime($grader->created_at)) }}</td>
                        </tr>

                    @endif

                @endforeach
            </tbody>

        </table>

@stop

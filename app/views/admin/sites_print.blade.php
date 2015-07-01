@extends('layouts.bare')

@section('content')

    <?php $languages = [
        '1' => 'Ελληνικά',
        '2' => 'Αγγλικά',
        '3' => 'Γαλλικά',
        '4' => 'Γερμανικά',
        '5' => 'Ιταλικά',
    ]; ?>

    <table class="pure-table pure-table-horizontal pure-table-striped">

        <thead>
            <tr>
                <th>Κωδικός</th>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Κατηγορία</th>
                <th>Δημιουργός/οί</th>
                <th>Νομικά υπεύθυνος</th>
                <th>Ιδιότητα Νομικά υπεύθυνου</th>
                <th>Περιφέρεια</th>
                <th>Χώρα</th>
                <th>Γλώσσα</th>
                <th>Προσωπικά Δεδομένα</th>
                <th>Έχει λάβει άδεια;</th>
                <th>Περιορισμένη Πρόσβαση</th>
                <th>Λεπτομέρειες Εισόδου</th>
                <th>Επώνυμο Υπεύθυνου επικοινωνίας</th>
                <th>Όνομα Υπεύθυνου επικοινωνίας</th>
                <th>Email Επικοινωνίας</th>
                <th>Τηλέφωνα</th>
                <th>Ταχ. Διεύθυνση</th>
                <th>Αυτοπροτείνεται</th>
                <th>Δημιουργήθηκε</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sites as $site)

                <tr>
                    <td>i{{ sprintf("%03d", $site->id) }}</td>
                    <td>{{ $site->title }}</td>
                    <td>{{ link_to($site->site_url, $site->site_url, ['target' => '_blank']) }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>{{ $site->creator }}</td>
                    <td>{{ $site->responsible }}</td>
                    <td>{{ $site->responsible_type }}</td>
                    <td>{{ District::find($site->district_id)->district_name }}</td>
                    <td>{{ Country::find($site->country_id)->country_name }}</td>
                    <td>{{ $languages[$site->language_id] }}</td>
                    <td>{{ $site->uses_private_data }}</td>
                    <td>{{ $site->received_permission }}</td>
                    <td>{{ $site->restricted_access }}</td>
                    <td>{{ $site->restricted_access_details }}</td>
                    <td>{{ $site->contact_last_name }}</td>
                    <td>{{ $site->contact_name }}</td>
                    <td>{{ $site->contact_email }}</td>
                    <td>{{ $site->phone }}</td>
                    <td>{{ $site->address }}</td>
                    <td>{{ $site->proposes_himself }}</td>
                    <td>{{ date('d / m / Y', strtotime($site->created_at)) }}</td>
                </tr>

            @endforeach
        </tbody>

    </table>

@stop

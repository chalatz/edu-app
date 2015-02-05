@extends('layouts.admin')

@section('content')

	<h1>Υποψήφιοι Ιστότοποι</h1>

    <table id="sites-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Email Επικοινωνίας</th>
                <th>Τηλέφωνο</th>
                <th>Κατηγορία</th>
                <th>Περιφέρεια</th>
                <th>Αυτοπροτείνεται</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($sites as $site)

                <tr>
                    <td>{{ $site->title }}</td>
                    <td>{{ $site->site_url }}</td>
                    <td>{{ $site->contact_email }}</td>
                    <td>{{ $site->phone }}</td>
                    <td>{{ $site->cat_id }}</td>
                    <td>{{ District::find($site->district_id)->district_name }}</td>
                    <td>{{ $site->proposes_himself }}</td>
                </tr>

            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Email Επικοινωνίας</th>
                <th>Τηλέφωνο</th>
                <th>Κατηγορία</th>
                <th>Περιφέρεια</th>
                <th>Αυτοπροτείνεται</th>
            </tr>
        </tfoot>

    </table>

@stop
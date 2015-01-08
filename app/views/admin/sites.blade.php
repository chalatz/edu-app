@extends('layouts.default')

@section('content')

    <?php $i = 1; ?>

	<h1>Sites</h1>

    <table class="pure-table pure-table-horizontal pure-table-striped">
    
        <thead>
            <tr>
                <th>#</th>
                <th>Τίτλος</th>
                <th>URL</th>
                <th>Email Επικοινωνίας</th>
                <th>Τηλέφωνο</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($sites as $site)

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $site->title }}</td>
                    <td>{{ $site->site_url }}</td>
                    <td>{{ $site->contact_email }}</td>
                    <td>{{ $site->phone }}</td>
                </tr>

                <?php $i++; ?>
            @endforeach
        </tbody>

    </table>

@stop
@extends('layouts.bare')

@section('content')

    <table>

        <thead>
            <tr>
                <th>Επωνυμία</th>
                <th>URL</th>
                <th>Δημιουργός</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sites as $site_id)

              <?php $site = Site::find($site_id); ?>
              <tr>
                <td>{{ $site->title }}</td>
                <td>{{ $site->site_url }}</td>
                <td>{{ $site->creator }}</td>
                <td>{{ $site->contact_email }}</td>
              </tr>

            @endforeach
        </tbody>

        <tfoot>
        </tfoot>

    </table>

@stop

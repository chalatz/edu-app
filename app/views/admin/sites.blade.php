@extends('layouts.admin')
@section('content')

    <?php $languages = [
        '1' => 'ÃŽâ€¢ÃŽÂ»ÃŽÂ»ÃŽÂ·ÃŽÂ½ÃŽÂ¹ÃŽÂºÃŽÂ¬',
        '2' => 'ÃŽâ€˜ÃŽÂ³ÃŽÂ³ÃŽÂ»ÃŽÂ¹ÃŽÂºÃŽÂ¬',
        '3' => 'ÃŽâ€œÃŽÂ±ÃŽÂ»ÃŽÂ»ÃŽÂ¹ÃŽÂºÃŽÂ¬',
        '4' => 'ÃŽâ€œÃŽÂµÃÂÃŽÂ¼ÃŽÂ±ÃŽÂ½ÃŽÂ¹ÃŽÂºÃŽÂ¬',
        '5' => 'ÃŽâ„¢Ãâ€žÃŽÂ±ÃŽÂ»ÃŽÂ¹ÃŽÂºÃŽÂ¬',
    ]; ?>

	<h1>ÃŽÂ¥Ãâ‚¬ÃŽÂ¿ÃË†ÃŽÂ®Ãâ€ ÃŽÂ¹ÃŽÂ¿ÃŽÂ¹ ÃŽâ„¢ÃÆ’Ãâ€žÃÅ’Ãâ€žÃŽÂ¿Ãâ‚¬ÃŽÂ¿ÃŽÂ¹</h1>

    <p style="float: left" class="little-block light-blue white-font">
        <i class="fa fa-table"></i>
        {{ link_to('/admin/sites/print', 'ÃŽâ€¢ÃŽÂºÃâ€žÃâ€¦Ãâ‚¬ÃÅ½ÃÆ’ÃŽÂ¹ÃŽÂ¼ÃŽÂ· ÃŽÅ“ÃŽÂ¿ÃÂÃâ€ ÃŽÂ®', ['target' => '_blank', 'class' => 'white-font']) }}
    </p>

    <table id="sites-table" class="admin-table pure-table pure-table-horizontal pure-table-striped">

        <thead>
            <tr>
                <th>ÃŽÅ¡Ãâ€°ÃŽÂ´ÃŽÂ¹ÃŽÂºÃÅ’Ãâ€š</th>
                <th>ÃŽâ€¢Ãâ‚¬Ãâ€°ÃŽÂ½Ãâ€¦ÃŽÂ¼ÃŽÂ¯ÃŽÂ±</th>
                <th>URL</th>
                <th>ÃŽÅ¡ÃŽÂ±Ãâ€žÃŽÂ·ÃŽÂ³ÃŽÂ¿ÃÂÃŽÂ¯ÃŽÂ±</th>
                <th>ÃŽâ€ÃŽÂ·ÃŽÂ¼ÃŽÂ¹ÃŽÂ¿Ãâ€¦ÃÂÃŽÂ³ÃÅ’Ãâ€š/ÃŽÂ¿ÃŽÂ¯</th>
                <th>ÃŽÂÃŽÂ¿ÃŽÂ¼ÃŽÂ¹ÃŽÂºÃŽÂ¬ Ãâ€¦Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€š</th>
                <th>ÃŽâ„¢ÃŽÂ´ÃŽÂ¹ÃÅ’Ãâ€žÃŽÂ·Ãâ€žÃŽÂ± ÃŽÂÃŽÂ¿ÃŽÂ¼ÃŽÂ¹ÃŽÂºÃŽÂ¬ Ãâ€¦Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€¦</th>
                <th>ÃŽÂ ÃŽÂµÃÂÃŽÂ¹Ãâ€ ÃŽÂ­ÃÂÃŽÂµÃŽÂ¹ÃŽÂ±</th>
                <th>ÃŽÂ§ÃÅ½ÃÂÃŽÂ±</th>
                <th>ÃŽâ€œÃŽÂ»ÃÅ½ÃÆ’ÃÆ’ÃŽÂ±</th>
                <th>ÃŽÂ ÃÂÃŽÂ¿ÃÆ’Ãâ€°Ãâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¬ ÃŽâ€ÃŽÂµÃŽÂ´ÃŽÂ¿ÃŽÂ¼ÃŽÂ­ÃŽÂ½ÃŽÂ±</th>
                <th>ÃŽË†Ãâ€¡ÃŽÂµÃŽÂ¹ ÃŽÂ»ÃŽÂ¬ÃŽÂ²ÃŽÂµÃŽÂ¹ ÃŽÂ¬ÃŽÂ´ÃŽÂµÃŽÂ¹ÃŽÂ±;</th>
                <th>ÃŽÂ ÃŽÂµÃÂÃŽÂ¹ÃŽÂ¿ÃÂÃŽÂ¹ÃÆ’ÃŽÂ¼ÃŽÂ­ÃŽÂ½ÃŽÂ· ÃŽÂ ÃÂÃÅ’ÃÆ’ÃŽÂ²ÃŽÂ±ÃÆ’ÃŽÂ·</th>
                <th>ÃŽâ€ºÃŽÂµÃâ‚¬Ãâ€žÃŽÂ¿ÃŽÂ¼ÃŽÂ­ÃÂÃŽÂµÃŽÂ¹ÃŽÂµÃâ€š ÃŽâ€¢ÃŽÂ¹ÃÆ’ÃÅ’ÃŽÂ´ÃŽÂ¿Ãâ€¦</th>
                <th>ÃŽâ€¢Ãâ‚¬ÃÅ½ÃŽÂ½Ãâ€¦ÃŽÂ¼ÃŽÂ¿ ÃŽÂ¥Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€¦ ÃŽÂµÃâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¿ÃŽÂ¹ÃŽÂ½Ãâ€°ÃŽÂ½ÃŽÂ¯ÃŽÂ±Ãâ€š</th>
                <th>ÃŽÅ’ÃŽÂ½ÃŽÂ¿ÃŽÂ¼ÃŽÂ± ÃŽÂ¥Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€¦ ÃŽÂµÃâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¿ÃŽÂ¹ÃŽÂ½Ãâ€°ÃŽÂ½ÃŽÂ¯ÃŽÂ±Ãâ€š</th>
                <th>Email ÃŽâ€¢Ãâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¿ÃŽÂ¹ÃŽÂ½Ãâ€°ÃŽÂ½ÃŽÂ¯ÃŽÂ±Ãâ€š</th>
                <th>ÃŽÂ¤ÃŽÂ·ÃŽÂ»ÃŽÂ­Ãâ€ Ãâ€°ÃŽÂ½ÃŽÂ±</th>
                <th>ÃŽÂ¤ÃŽÂ±Ãâ€¡. ÃŽâ€ÃŽÂ¹ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃÆ’ÃŽÂ·</th>
                <th>ÃŽâ€˜Ãâ€¦Ãâ€žÃŽÂ¿Ãâ‚¬ÃÂÃŽÂ¿Ãâ€žÃŽÂµÃŽÂ¯ÃŽÂ½ÃŽÂµÃâ€žÃŽÂ±ÃŽÂ¹</th>
                <th>ÃŽâ€ÃŽÂ·ÃŽÂ¼ÃŽÂ¹ÃŽÂ¿Ãâ€¦ÃÂÃŽÂ³ÃŽÂ®ÃŽÂ¸ÃŽÂ·ÃŽÂºÃŽÂµ</th>
                @if(Auth::user()->hasRole('ninja'))
                    <th>ÃŽÅ“ÃŽÂµÃâ€žÃŽÂ±ÃŽÂ¼Ãâ€ ÃŽÂ¯ÃŽÂµÃÆ’ÃŽÂ·</th>
                @endif
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
                    @if(Auth::user()->hasRole('ninja'))
                        <td>{{ link_to('/admin/masquerade/'.$site->user_id, 'ÃŽÅ“ÃŽÂµÃâ€žÃŽÂ±ÃŽÂ¼Ãâ€ ÃŽÂ¯ÃŽÂµÃÆ’ÃŽÂ·') }}  </td>
                    @endif
                </tr>

            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th>ÃŽÅ¡Ãâ€°ÃŽÂ´ÃŽÂ¹ÃŽÂºÃÅ’Ãâ€š</th>
                <th>ÃŽâ€¢Ãâ‚¬Ãâ€°ÃŽÂ½Ãâ€¦ÃŽÂ¼ÃŽÂ¯ÃŽÂ±</th>
                <th>URL</th>
                <th>ÃŽÅ¡ÃŽÂ±Ãâ€žÃŽÂ·ÃŽÂ³ÃŽÂ¿ÃÂÃŽÂ¯ÃŽÂ±</th>
                <th>ÃŽâ€ÃŽÂ·ÃŽÂ¼ÃŽÂ¹ÃŽÂ¿Ãâ€¦ÃÂÃŽÂ³ÃÅ’Ãâ€š/ÃŽÂ¿ÃŽÂ¯</th>
                <th>ÃŽÂÃŽÂ¿ÃŽÂ¼ÃŽÂ¹ÃŽÂºÃŽÂ¬ Ãâ€¦Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€š</th>
                <th>ÃŽâ„¢ÃŽÂ´ÃŽÂ¹ÃÅ’Ãâ€žÃŽÂ·Ãâ€žÃŽÂ± ÃŽÂÃŽÂ¿ÃŽÂ¼ÃŽÂ¹ÃŽÂºÃŽÂ¬ Ãâ€¦Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€¦</th>
                <th>ÃŽÂ ÃŽÂµÃÂÃŽÂ¹Ãâ€ ÃŽÂ­ÃÂÃŽÂµÃŽÂ¹ÃŽÂ±</th>
                <th>ÃŽÂ§ÃÅ½ÃÂÃŽÂ±</th>
                <th>ÃŽâ€œÃŽÂ»ÃÅ½ÃÆ’ÃÆ’ÃŽÂ±</th>
                <th>ÃŽÂ ÃÂÃŽÂ¿ÃÆ’Ãâ€°Ãâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¬ ÃŽâ€ÃŽÂµÃŽÂ´ÃŽÂ¿ÃŽÂ¼ÃŽÂ­ÃŽÂ½ÃŽÂ±</th>
                <th>ÃŽË†Ãâ€¡ÃŽÂµÃŽÂ¹ ÃŽÂ»ÃŽÂ¬ÃŽÂ²ÃŽÂµÃŽÂ¹ ÃŽÂ¬ÃŽÂ´ÃŽÂµÃŽÂ¹ÃŽÂ±;</th>
                <th>ÃŽÂ ÃŽÂµÃÂÃŽÂ¹ÃŽÂ¿ÃÂÃŽÂ¹ÃÆ’ÃŽÂ¼ÃŽÂ­ÃŽÂ½ÃŽÂ· ÃŽÂ ÃÂÃÅ’ÃÆ’ÃŽÂ²ÃŽÂ±ÃÆ’ÃŽÂ·</th>
                <th>ÃŽâ€ºÃŽÂµÃâ‚¬Ãâ€žÃŽÂ¿ÃŽÂ¼ÃŽÂ­ÃÂÃŽÂµÃŽÂ¹ÃŽÂµÃâ€š ÃŽâ€¢ÃŽÂ¹ÃÆ’ÃÅ’ÃŽÂ´ÃŽÂ¿Ãâ€¦</th>
                <th>ÃŽâ€¢Ãâ‚¬ÃÅ½ÃŽÂ½Ãâ€¦ÃŽÂ¼ÃŽÂ¿ ÃŽÂ¥Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€¦ ÃŽÂµÃâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¿ÃŽÂ¹ÃŽÂ½Ãâ€°ÃŽÂ½ÃŽÂ¯ÃŽÂ±Ãâ€š</th>
                <th>ÃŽÅ’ÃŽÂ½ÃŽÂ¿ÃŽÂ¼ÃŽÂ± ÃŽÂ¥Ãâ‚¬ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃŽÂ¿Ãâ€¦ ÃŽÂµÃâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¿ÃŽÂ¹ÃŽÂ½Ãâ€°ÃŽÂ½ÃŽÂ¯ÃŽÂ±Ãâ€š</th>
                <th>Email ÃŽâ€¢Ãâ‚¬ÃŽÂ¹ÃŽÂºÃŽÂ¿ÃŽÂ¹ÃŽÂ½Ãâ€°ÃŽÂ½ÃŽÂ¯ÃŽÂ±Ãâ€š</th>
                <th>ÃŽÂ¤ÃŽÂ·ÃŽÂ»ÃŽÂ­Ãâ€ Ãâ€°ÃŽÂ½ÃŽÂ±</th>
                <th>ÃŽÂ¤ÃŽÂ±Ãâ€¡. ÃŽâ€ÃŽÂ¹ÃŽÂµÃÂÃŽÂ¸Ãâ€¦ÃŽÂ½ÃÆ’ÃŽÂ·</th>
                <th>ÃŽâ€˜Ãâ€¦Ãâ€žÃŽÂ¿Ãâ‚¬ÃÂÃŽÂ¿Ãâ€žÃŽÂµÃŽÂ¯ÃŽÂ½ÃŽÂµÃâ€žÃŽÂ±ÃŽÂ¹</th>
                <th>ÃŽâ€ÃŽÂ·ÃŽÂ¼ÃŽÂ¹ÃŽÂ¿Ãâ€¦ÃÂÃŽÂ³ÃŽÂ®ÃŽÂ¸ÃŽÂ·ÃŽÂºÃŽÂµ</th>
            </tr>
        </tfoot>

    </table>

@stop

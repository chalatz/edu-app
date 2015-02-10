@extends('layouts.admin')

@section('content')

	<h1>Στατιστικά</h1>

    @foreach($cats as $cat)
    <p>{{$cat->id}} , {{ Site::where('cat_id', '=', $cat->id)->count() }}</p>
    @endforeach

    <table>
        <thead>
            <th>Κατηγορία</th>
            <th>Πλήθος Υποψ.</th>
        </thead>
        
        <tbody>
            <tr>
            
            </tr>
        </tbody>
</table>

@stop
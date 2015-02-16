@extends('layouts.admin')

@section('content')

    <?php
        $cats_count = 0;
        $districts_count = 0;
    ?>

    <script>
        var cat_names = [],
            cat_counts = [],
            district_names = [],
            district_counts = [];
    </script>

	<h1>Στατιστικά</h1>
    <hr>

    <h2>Κατηγορίες</h2>
    <table class="pure-table pure-table-striped stats-table">
        <thead>
            <tr>
                <th>Κατηγορία</th>
                <th>Πλήθος Υποψ.</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($cats as $cat)
                <tr>
                    <td>{{ $cat->category_name }}</td>
                    <td>{{ Site::where('cat_id', '=', $cat->id)->count() }}</td>
                </tr>
                <?php $cats_count += Site::where('cat_id', '=', $cat->id)->count(); ?>
            
                <script>
                    var cat_name = "{{ $cat->category_name }}",
                        cat_count = {{ Site::where('cat_id', '=', $cat->id)->count() }};
                    cat_names.push(cat_name);
                    cat_counts.push(cat_count);
                </script>
            @endforeach
        </tbody>
    </table>

    <p>Σύνολο: <strong>{{ $cats_count }}</strong></p>

    <div class="ct-chart ct-golden-section cats-bars-chart"></div>

    <hr>

    <h2>Περιφέρειες</h2>
    <table class="pure-table pure-table-striped stats-table">
        <thead>
            <tr>
                <th>Περιφέρεια</th>
                <th>Πλήθος Υποψ.</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($districts as $district)
                <tr>
                    <td>{{ $district->district_name }}</td>
                    <td>{{ Site::where('district_id', '=', $district->id)->count() }}</td>
                </tr>
                <?php $districts_count += Site::where('district_id', '=', $district->id)->count(); ?>
            
                <script>
                    var district_name = "{{ $district->district_name }}",
                        district_count = {{ Site::where('district_id', '=', $district->id)->count() }};
                    district_names.push(district_name);
                    district_counts.push(district_count);
                </script>
            @endforeach
        </tbody>
    </table>

    <p>Σύνολο: <strong>{{ $districts_count }}</strong></p>

    <div class="ct-chart ct-golden-section districts-bars-chart"></div>

    <hr>

    <script>
        var cats_data = {
            labels: cat_names,
            series: [
            cat_counts
          ]
        };
        
        var districts_data = {
            labels: district_names,
            series: [
            district_counts
          ]
        };

        var options = {
          seriesBarDistance: 15
        };

        var responsiveOptions = [
          ['screen and (min-width: 641px) and (max-width: 1024px)', {
            seriesBarDistance: 10,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value;
              }
            }
          }],
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        new Chartist.Bar('.cats-bars-chart', cats_data, options, responsiveOptions);
        new Chartist.Bar('.districts-bars-chart', districts_data, options, responsiveOptions);
        
    </script>

@stop
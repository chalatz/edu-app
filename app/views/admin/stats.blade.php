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
    <table class="pure-table pure-table-striped stats-table cats-stats-table">
        <thead>
            <tr>
                <th>Κατηγορία</th>
                <th>Πλήθος Υποψ.</th>
                <th>Πλήθος Υποψ. %</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($cats as $cat)
                <?php $cat_count = Site::where('cat_id', '=', $cat->id)->count(); ?>
                <?php $cat_count_100 = ($cat_count / $cats_total) * 100; ?>    
            
                <tr class="stats-cats-row" id="stats-cats-row-{{$cat->id}}">
                    <td>{{ $cat->category_name }}</td>
                    <td>{{ $cat_count }} </td>
                    <td>{{ round($cat_count_100, 2) }}</td>
                </tr>
            
                <script>
                    var cat_name = "{{ $cat->category_name }}",
                        cat_count_100 = {{ $cat_count_100 }};
                    cat_names.push(cat_name);
                    cat_counts.push(cat_count_100);
                </script>
            @endforeach
        </tbody>
    </table>

    <p>Σύνολο: <strong>{{ $cats_total }}</strong></p>

    <div class="pure-g">
        <div class="pure-u-1 pure-u-md-2-3">
            <div class="ct-chart ct-golden-section cats-bars-chart"></div>            
        </div>
        <div class="pure-u-1 pure-u-md-1-3">
          <div class="pie-legend">
            @foreach($cats as $cat)
                <div class="pie-legend-item" id="pie-legend-item-{{$cat->id}}">{{ $cat->category_name }}</div>
            @endforeach
        </div>  
        </div>    
    </div>

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
                <?php 
                    $districts_count += Site::where('district_id', '=', $district->id)->count();
                ?>
            
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
            series: cat_counts
        };
        
        var sum = function(a, b) { return a + b };
        
        var districts_data = {
            labels: district_names,
            series: [
            district_counts
          ]
        };

        var options = {
          seriesBarDistance: 15
        };
        
        var bar_options = {
          seriesBarDistance: 10,
          reverseData: true,
          horizontalBars: true,
          axisY: {
            offset: 70
          }
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

        //new Chartist.Pie('.cats-bars-chart', cats_data, options, responsiveOptions);
        
        new Chartist.Pie('.cats-bars-chart', cats_data, {
          labelInterpolationFnc: function(value) {
            return Math.round(value / cats_data.series.reduce(sum) * 100) + '%';
          }
        });
        
        new Chartist.Bar('.districts-bars-chart', districts_data, bar_options, responsiveOptions);
        
    </script>

@stop
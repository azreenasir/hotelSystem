@extends('layouts.app')

@section('title', 'Room Reports')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    Room Reports
                </div>
                <div class="card-body">
                    <div id="piechart_3d" style="width: 1800px; height: 700px;"></div>
                </div>
            </div>
    </div>
</div>



@endsection

@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Resevation Statistic', 'Room Number'],
          <?php echo $data; ?>
        ]);

        var options = {
          title: 'Room Chart',
          is3D: true,
          fontSize: 23
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
@endsection


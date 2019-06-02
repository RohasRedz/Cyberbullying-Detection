<?php 
include "connection.php";
	
$r="select distinct(user_id) as users, count(means_tot) as flags from tbl_cbd group by user_id";

$results = mysqli_query($conn ,$r);

$data = array();

foreach($results as $row) {
    $data[] = $row;
}


mysqli_close($conn)




?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/jsapi"></script>
    <script type="text/javascript">
      //visualisation API and charts package
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.DataTable();
        data.addColumn('string', 'User ID');
        data.addCloumn('number', 'Flag');
        data.addRows([$data]);

        var options = {
          title: 'User vs Flag'
        };

        //Instantiate and draw our chart, passing in some options
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      // make charts responsive
      //jQuery(document).ready(function(){
      //    jQuery(window).resize(function(){
      //        drawChart();
      //    });
      //});

    </script>


    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000]
      ]);

      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    
  </head>
  <body>
    <div id="piechart" style="width: 650px; height: 450px;"></div>

    <div id="chart_div" style = "width: 650px; height: 450px;"></div>
      
    <div id="curve_chart" style="width: 650px; height: 500px"></div>
  
<?php 
mysqli_close($conn);

?>
  </body>
</html>
<?php  
 include "connection.php";
	
 $query = "select distinct(user_id) , SUM(means_tot) as sums from tbl_cbd group by user_id";  
 $result = mysqli_query($conn, $query);  

 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['users', 'flags'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["user_id"]."', ".$row["sums"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'USERS VS FLAG',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
            }  
            </script>  
<?php 

	
$query2 = "select distinct(cat_id) , SUM(means_tot) as sumsi from tbl_cbd group by cat_id";  
$result2 = mysqli_query($conn, $query2);  


?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['sumsi', 'cat_id'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["cat_id"]."', ".$row["sumsi"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'USERS VS FLAG',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
            }  
            </script>  


<?php 

// bar graph  user flag vs date
$query3 = "SELECT DISTINCT(comment_date), sum(means_tot) as sumsii from tbl_cbd group by comment_date";  
$result3 = mysqli_query($conn, $query3);  


?>
<script type="text/javascript">
                google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = google.visualization.arrayToDataTable([
                    ['comment_date', 'Flags'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["comment_date"]."', ".$row["sumsii"]."],";  
                          }  
                          ?>  
                     ]);  

                var options = {
                    title: 'Flags occured vs Date',
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
            
      </head>  
      <body>  
           <br /><br />  
           <div style="width:600px;">  
                <h3 align="center">USER X FLAG</h3>  
                <br />  
                <div id="piechart" style="width: 600px; height: 400px;"></div>  
           </div>  

           <div style="width:600px;">  
                <h3 align="center">CATEGORY X FLAG</h3>  
                <br />  
                <div id="piechart2" style="width: 600px; height: 400px;"></div>  
           </div>  

           <div style="width:600px;">  
                <h3 align="center">FLAG X TIME</h3>  
                <br />  
                <div id="chart_div" style="width: 600px; height: 400px;"></div>  
           </div>  



      </body>  
 </html>  
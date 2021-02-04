<?php
require("header.php");
?>
<h3>Staistic Year Wise</h3>
 <div id="columnchart" style="width: 900px; height: 300px;">
 </div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Year', 'Bookings'],
 <?php 
$query = "SELECT EXTRACT(Year FROM bookings.booking_date) as odate ,count(bookings.id) as total_entry FROM bookings where (bookings.booking_date >= NOW() - INTERVAL 1 Year) and bookings.dr_id = '15' group by odate";


 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){
$month = $row['odate'];
//$datev = DateTime::createFromFormat('!m',$month);
//$namew = $datev->format('F');

 echo "['".$month."',".$row['total_entry']."],";
 }
 ?>
 
 ]);

var options = {'title':'Sales',
                     'width':600,
                     'height':700};
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
<?php
require("footer.php");
?>
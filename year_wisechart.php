<?php
require("header.php");
//session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

	
?>
<div class="container">
<h3>Статистика за весь год</h3>
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
$query = "SELECT EXTRACT(Year FROM bookings.booking_date) as odate ,count(bookings.booking_id) as total_entry FROM bookings where (bookings.booking_date >= NOW() - INTERVAL 1 Year) and bookings.dr_id = '".$_SESSION['SESS_USERID']."' group by odate";


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

 </div>
<?php
}



?>

<?php
require("header.php");
//session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

	
?>
<h3>Статистика за месяцы</h3>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Months', 'Bookings'],
 <?php 
 $query = "SELECT EXTRACT(MONTH FROM bookings.booking_date) as odate ,count(bookings.id) as total_entry  FROM bookings where (bookings.booking_date >= NOW() - INTERVAL 12 MONTH) and bookings.dr_id = '".$_SESSION['SESS_USERID']."' group by odate";


 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){
$month = $row['odate'];
$datev = DateTime::createFromFormat('!m',$month);
$namew = $datev->format('F');

 echo "['".$namew."',".$row['total_entry']."],";
 }
 ?>
 
 ]);

var options = {'title':'Sales',
                     'width':100,
                     'height':200};
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
 <div id="columnchart" style="width: 100px; height: 200px;">
 </div>
 <?php
 require("footer.php");
}

?>

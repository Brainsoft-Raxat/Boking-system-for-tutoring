<?php
require("header.php");
//session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

	
?>
<h3>Статистика за дни</h3>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Date', 'Bookings'],
 <?php 
 $query = "SELECT bookings.booking_date as odate,count(bookings.booking_id) as total_entry FROM bookings where (bookings.booking_date <= curdate()) and bookings.dr_id = '".$_SESSION['SESS_USERID']."' group by bookings.booking_date";

 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['odate']."',".$row['total_entry']."],";
 }
 ?>

 ]);

var options = {'title':'Bookings',
                     'width':600,
                     'height':700};
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
 <div id="columnchart" style="width: 900px; height: 500px;">
 </div>
 <?php
 require("footer.php");
}

?>




 
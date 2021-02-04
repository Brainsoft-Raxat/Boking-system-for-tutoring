<?php
session_start();
$er = 0;
include("db_connect.php");
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

} 


    $query="SELECT * FROM bookings, all_time_slots, logins WHERE bookings.student_id = '".$_SESSION['SESS_USERID']."' and bookings.booking_time = all_time_slots.slot_id and bookings.dr_id=logins.id and bookings.dr_id=all_time_slots.dr_id  group by bookings.booking_id order By bookings.booking_date desc";
    
    $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 
 if($total_row > 0)
 { 
     echo'
     
     <table class="table display table-bordered" id="bookings-table">
    <thead class="thead-dark">
  <tr>
    <th onclick="sortTable(0)" scope="col">Дата занятий</th>
    <th onclick="sortTable(1)" scope="col">Время занятий</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Учитель</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Предмет</th>
	<th onclick="sortTable(0)" scope="col" >Адрес проведения</th>
	<th onclick="sortTable(0)" scope="col">Статус оплаты</th>
	<th scope="col">Цена</th>
	<th scope="col">Отменить</th>
  </tr>
  </thead>
  <tbody>
     ';
     
  foreach($result as $loginrow)
  {
      $doa = $loginrow['booking_date'];
	$date1 = date("Y-m-d");
	if($date1 > $doa){
	
	echo "
	<tr class='table-danger'>
	<td>".$loginrow['booking_date']."</td>
	<td>".$loginrow['slot_time']." "."hrs"."</td>
	<td>".$loginrow['username']."</td> 
		<td>".$loginrow['specialization']."</td> 
	<td>".$loginrow['address']."</td>
	<td>".$loginrow['payment']."</td>
	<td>".$loginrow['price']."</td>
	  </tr> ";
    }
	else{
	echo "
	  <tr class='table-success'>
	<td>".$loginrow['booking_date']."</td>
	<td>".$loginrow['slot_time']." "."hrs"."</td>
	<td>".$loginrow['username']."</td> 
		<td>".$loginrow['specialization']."</td> 
	<td>".$loginrow['address']."</td>
	<td>".$loginrow['payment']."</td>
	<td>".$loginrow['price']."</td>
	<td>
	<p id='delete' onclick='ensure(".$loginrow["booking_id"].")'>[X]</p>
	</td>
	  </tr>  
    ";
  }
 }
 
 echo"
 </tbody>
</table>";
     
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
    
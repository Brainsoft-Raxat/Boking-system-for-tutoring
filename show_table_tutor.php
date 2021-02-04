<?php
session_start();
$er = 0;
include("db_connect.php");
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

} 


    $query="SELECT * FROM bookings,all_time_slots,logins WHERE bookings.dr_id = '".$_SESSION['SESS_USERID']."' and bookings.booking_time = all_time_slots.slot_id and bookings.dr_id = all_time_slots.dr_id and bookings.student_id=logins.id order By bookings.booking_date desc";
    
    $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 
 if($total_row > 0)
 { 
     echo'
     
    <table class="table table-bordered" id="book-table">
  <thead class="thead-dark"><tr>
    <th onclick="sortTable(0)">Дата занятия</th>
    <th onclick="sortTable(1)">Время</th>
	<th onclick="sortTable(2)">Ученик</th>
	<th onclick="sortTable(3)" >Возвраст</th>
	<th>Номер телефона</th>
	<th>Пол</th>
	<th onclick="sortTable(4)">Статус</th>
	<th scope="col">Удалить</th>
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
	<td>".$loginrow['slot_time']." "."Hrs"."</td>
	<td>".$loginrow['username']."</td> 
	<td>".$loginrow['age']."</td> 
	<td>".$loginrow['phone_no']."</td>
	<td>".$loginrow['gender']."</td>	
	<td>". $loginrow['bookings_status']."</td>	
	<td><p id='delete' onclick='ensure(".$loginrow["booking_id"].")'>[X]</p></td>
	
	  </tr> ";
    }
	else{
	echo "
	  <tr class='table-success'>
	<td>".$loginrow['booking_date']."</td>
	<td>".$loginrow['slot_time']." "."Hrs"."</td>
	<td>".$loginrow['username']."</td> 
	<td>".$loginrow['age']."</td> 
	<td>".$loginrow['phone_no']."</td>
	<td>".$loginrow['gender']."</td>	
	<td>". $loginrow['bookings_status']."</td>	
	<td><p id='delete' onclick='ensure(".$loginrow["booking_id"].")'>[X]</p></td>
	
	  </tr> ";
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
    
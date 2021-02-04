<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");
if($_SESSION['SESS_USERTYPE'] == 'admin') {
    
    $query = "SELECT * FROM bookings, all_time_slots, logins WHERE bookings.booking_time = all_time_slots.slot_id and bookings.dr_id=logins.id and bookings.dr_id=all_time_slots.dr_id  group by bookings.booking_id order By bookings.booking_date desc";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    
    
    
}
else {
    header("Location:login.php");
} 

require("header.php");
?>
<div class="container">
  <h1>Все Занятия</h1>  
 <table class="table display table-bordered" id="bookings-table">
    <thead class="thead-dark">
  <tr>
    <th onclick="sortTable(0)" scope="col">Дата занятий</th>
    <th onclick="sortTable(1)" scope="col">Время занятий</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Ученик</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Учитель</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Предмет</th>
	<th onclick="sortTable(0)" scope="col" >Адрес проведения</th>
	<th onclick="sortTable(0)" scope="col">Статус</th>
	<th scope="col">Цена</th>
	<th scope="col">Отменить</th>
  </tr>
  </thead>
  <tbody>
<?php 
      if($total_row > 0)
 { 
     
  foreach($result as $row)
  {
      ?>
   	<tr class='table-danger'>
	<td><?php echo $loginrow['booking_date']?></td>
	<td><?php echo $loginrow['slot_time']?> hrs</td>
	<td>".$loginrow['username']."</td> 
		<td>".$loginrow['specialization']."</td> 
	<td>".$loginrow['address']."</td>
	<td>".$loginrow['bookings_status']."</td>
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
	<td>".$loginrow['bookings_status']."</td>
	<td>".$loginrow['price']."</td>
	<td>
	<p id='delete' onclick='ensure(".$loginrow["booking_id"].")'>[X]</p>
	</td>
	  </tr>  
   <?php
  }
 }
      ?>
       </tbody>
</table>
</div>
</div>
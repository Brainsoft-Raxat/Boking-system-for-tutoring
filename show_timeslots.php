<?php
session_start();
$er = 0;
include("db_connect.php");
require("config.php");

$query="SELECT * FROM `all_time_slots` WHERE `dr_id`='".$_POST['customer_id']."'";
    
    $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 
 if($total_row > 0)
 { 
     echo'
     
     <table class="table table-bordered mt-3" id="slot-table">
  <thead class="thead-dark">
    <tr>
      <th style="width: 25px;">Выбрать</th>
      <th scope="col">Номер слота</th>
      <th onclick="sortTable(1)" scope="col">Время</th>
      <th onclick="sortTable(2)" scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
     ';
     
  foreach($result as $row)
  {
      $status = $row["status"]; 
	if ($status == "booked"){
	
	echo "
	<tr class='table-danger'>
    <td><input type='checkbox' class='check' disabled value='".$row['slot_id']."' /></td>
	<td> ".$row['slot_id']."</td>
	<td>". $row['slot_time']."</td>
	<td>". $row['status']."</td>
	  </tr>";
    }
	else if($status == "available"){
	echo "
	  <tr class='table-success'>
    <td><input type='checkbox' class='check' value='".$row['slot_id']."' /></td>
	<td> ".$row['slot_id']."</td>
	<td>". $row['slot_time']."</td>
	<td>". $row['status']."</td>
	  </tr> 
    ";
  }
  else{
      echo "
	  <tr class='table-secondary'>
    <td><input type='checkbox' class='check' value='".$row['slot_id']."' /></td>
	<td> ".$row['slot_id']."</td>
	<td>". $row['slot_time']."</td>
	<td>". $row['status']."</td>
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

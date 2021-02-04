<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];
$select_booking_id=$_REQUEST['booking_id'];

$query1 = "SELECT * FROM bookings WHERE booking_id='". $select_booking_id ."'";
$statement = $connect->prepare($query1);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
 if($total_row > 0)
 {  foreach($result as $row)
  {
     $booking_id = $select_booking_id;
     $tutor_id = $row['dr_id'];
     $time_slot = $row['booking_time'];

$statement2 = $connect->prepare("UPDATE all_time_slots SET status ='available' WHERE dr_id='". $tutor_id ."' AND slot_id='". $time_slot."'");
$statement2->execute();

$statement3 = $connect->prepare("DELETE  FROM bookings WHERE booking_id='". $booking_id."'");
$statement3->execute();

}
}

else
{
	header("Location:login.php");
}
}
?>
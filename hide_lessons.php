<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");


if($_POST['action']=='hide'){
foreach($_POST['time_slots'] as $value){
    $statement = $connect->prepare("UPDATE all_time_slots SET status ='hidden' WHERE dr_id='".$_SESSION['SESS_USERID'] ."' AND slot_id='".$value."'   ");
    $statement->execute();
}
}
else{
  foreach($_POST['time_slots'] as $value){
    $statement = $connect->prepare("UPDATE all_time_slots SET status ='available' WHERE dr_id='".$_SESSION['SESS_USERID'] ."' AND slot_id='".$value."'   ");
    $statement->execute();
}  
}


?>
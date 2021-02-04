<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");



foreach($_POST['bookings'] as $value){
    $statement = $connect->prepare("UPDATE bookings SET payment ='made' WHERE booking_id='". $value."'");
    $statement->execute();
}

?>
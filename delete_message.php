<?php 

include("db_connect.php"); 

$statement3 = $connect->prepare("DELETE  FROM messages WHERE id='". $_GET['id']."'");
$statement3->execute();

header("Location: messages.php")

?>
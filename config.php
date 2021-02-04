<?php
$dbhost = "localhost";
$dbuser = "u70739na_ag_demo";
$dbpassword = "123654";
$dbdatabase = "u70739na_ag_demo";
$config_basedir = "http://u70739na.beget.tech/";
$config_sitename = "Educational center";

$conn = new mysqli($dbhost, $dbuser, $dbpassword );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_select_db($conn,$dbdatabase);
?>

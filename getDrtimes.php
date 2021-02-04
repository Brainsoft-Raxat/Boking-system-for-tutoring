<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];
$q = intval($_GET['q']);

echo 

mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM `all_time_slots` WHERE `dr_id`='".$q."' and status='available'  ";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result);

while($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['slot_id'] . "'>" . $row['slot_time'] . "</option>";
  
}
}
require("footer.php");
?>

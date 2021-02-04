<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];
$q = intval($_GET['q']);
$dr_id = intval($_GET['dr_id']);


mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM `all_time_slots` WHERE `dr_id`='".$dr_id."' and slot_id='".$q."' and Status ='booked'";
$result = mysqli_query($conn,$sql);

         if (mysqli_num_rows($result) > 0) {
            echo "sorry this slot not avalaible";
         }

}

?>
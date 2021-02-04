<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

$alldata = "SELECT * FROM logins where id ='".$_SESSION['SESS_USERID']."'";
$alldata = mysqli_query($conn,$alldata);
$numrows = mysqli_num_rows($alldata);
if($numrows == 1)
{
	$loginrow = mysqli_fetch_assoc($alldata);
	$user_id=$loginrow['id'];
	$user_name=$loginrow['username'];
	$email=$loginrow['email'];
	$specialization=$loginrow['specialization'];
	$qualification=$loginrow['qualification'];
	$hospital=$loginrow['hospital'];
	$phone_no=$loginrow['phone_no'];
}
} 
if(isset($_POST['submit']))
{
	$slot_id =0;
	
	$alltimeslots = "SELECT * FROM `all_time_slots` WHERE `dr_id`='".$_SESSION['SESS_USERID']."'";
	$alltimeslots = mysqli_query($conn,$alltimeslots);
	$numrows = mysqli_num_rows($alltimeslots);
if($numrows >= 1)
{
    $delsqlbooking = "DELETE FROM `dr_booking_slots` WHERE `dr_id` = '".$_SESSION['SESS_USERID']."'";  
	mysqli_query($conn, $delsqlbooking);
	$delsql = "DELETE FROM `all_time_slots` WHERE `dr_id` = '".$_SESSION['SESS_USERID']."'";  
	mysqli_query($conn, $delsql);	
	}
else{
	$slot_id =0;
}

	 $starttime= $_POST['start_time']; // your start time
 $endtime= $_POST['end_time']; // End time
 if(!empty($_POST['duration']))
 {
	 $duration =  $_POST['duration'];  // split by 30 mins
 }
 else
 {
     $duration = 30;
 }

	$sql = "INSERT INTO `dr_booking_slots`(`dr_id`, `start_time`, `end_time`, `duration`) VALUES ('".$_SESSION['SESS_USERID']."','".$starttime."','".$endtime."','".$duration."')";

            if (mysqli_query($conn, $sql)) {
				 //header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
               
            } else {
				 //header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
            }
	
	
	$array_of_time = array ();
	$start_time    = strtotime ($starttime); //change to strtotime
	$end_time      = strtotime ($endtime); //change to strtotime

	$add_mins  = $duration * 60;

	while ($start_time <= $end_time) // loop between time
	{
	$array_of_time[] = date ("H:i", $start_time);
	$start_time += $add_mins; // to check endtie=me
	}
	 $numberofslots= count($array_of_time);
		foreach($array_of_time as $value)
	{
	
		$incrementvalue = ++$slot_id;
	$settime = "INSERT INTO `all_time_slots`(`dr_id`, `slot_id`, `slot_time`) 
	VALUES ('".$_SESSION['SESS_USERID']."','".$incrementvalue."','".$value."')";

		if (mysqli_query($conn, $settime)) {	 
				 $var=1;   
			} 
			else { 
			$var=0;
			}
	}
	if($var==1)
	{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
	}
else{
	header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
	
}	

}

else
{
require("header.php");
?>

<p>
<?php
if(isset($_GET['error'])) {
echo "<strong>Time Slots Added Successfully</strong>";
} else if($er == '2'){
echo "<strong> porblem occur while adding time slot</strong>";
}
?>

<div class="container">
    <div class="row justify-content-left">
<div class="col-md-4 order-md-1">
          <h4 class="mb-3">Открытые часы</h4>
          <form class="needs-validation" action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
              <input type="hidden" name="userOption" value="tutor">
          <div class="well">
            <div class="form-group">
    <label>Время Открытия</label>
              <input type="time" id="datetimepicker3" data-format="hh:mm" class="form-control input-append" name="start_time">
              <span class="add-on" style="height: 30px;">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
          </div>
          <div class="form-group">
    <label>Время Закрытия</label>
              <input type="time" data-format="hh:mm" class="form-control" name="end_time">
          
         </div>
          <div class="form-group">
  <label> Длительность <small >в минутах</small></label>
	<input class="form-control" type="number" name="duration" style="height: 30px;" placeholder="30">
	</div>
 
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Get Time Slots" >Получить расписание</button>
          </form>
        </div>
    </div>

</div>
</div>


<?php
}
require("footer.php");
?>

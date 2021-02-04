<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];
$select_dr=$_REQUEST['dr_id'];

$alldata = "SELECT * FROM logins where id ='".$_SESSION['SESS_USERID']."'";
$alldata = mysqli_query($conn,$alldata);
$numrows = mysqli_num_rows($alldata);
if($numrows == 1)
{
	$loginrow = mysqli_fetch_assoc($alldata);
	$user_id=$loginrow['id'];
	$user_name=$loginrow['username'];
	$gender=$loginrow['gender'];
	$age = $loginrow['age'];
	$phone_no = $loginrow['phone_no'];
}



}
else
{
	header("Location:login.php");
}
 require("header.php");
if(isset($_POST['submit']))
{
   /* new code */

   $student_name=$_POST['student_name'];
   $student_id=$_POST['student_id']; 
   $student_phone=$_POST['student_phone'];
   $selecttutor=$select_dr;
 $student_booking_date=$_POST['student_booking_date'];
 $select_slot=$_POST['Avalability']; 
	 $details=$_POST['details'];  
	 $age2=$_POST['age']; 
	 $gender2=$_POST['gender'];

	

	
	
	
	
	
     
		
		//save in database

	$sql="INSERT INTO `bookings`(`dr_id`, `student_id`, `booking_date`, `booking_time`, `age`, `details`, `phone_no`, `gender`, `payment`) VALUES ('".$selecttutor."','".$student_id."', '".$student_booking_date."','".$select_slot."','".$age2."','".$details."' , '".$student_phone."','".$gender."', 'no')";
	

 
 
	
if (mysqli_query($conn, $sql)) {


$updatestatus = "UPDATE `all_time_slots` SET `status`='booked' WHERE `dr_id` ='".$selecttutor."' and slot_id='".$select_slot."'";
   
   if (mysqli_query($conn, $updatestatus)) {
      	
      	$i=0;
      	  header("Location: ". $config_basedir.'courses.php');
      	  echo "<script>alert('Appointment Booked Successfully');</script>";
	//  header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
   } else {
      	header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
   }


} else {
   	header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
}
/* new code */

}


?>
<div class="container">
<h1>Забронировать урок</h1>

<p>
<?php
if(isset($_GET['error'])) {
echo "<strong>Appointment Requested Successfully. </strong>";
} else if($er == '2'){
echo "<strong> porblem in update</strong>";
}
else if($er == '3'){
echo "<strong> kindly Register yourself before appointment </strong>";
}

?>
<div class="row">
<div class="col-md-8 order-md-1">
<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST" enctype="multipart/form-data" >
<input type="hidden" value="<?php echo $select_dr;?>" id="tutors"/>

<div class="form-group">
                    <label>Имя ученика</label>
                    <input type="textbox" class="form-control" name="student_name" placeholder="Username"  value="<?php echo $user_name; ?>" required>
<input type="hidden" name="student_id" value="<?php echo $user_id; ?>">
                
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
            </div>


              <div hidden class="form-group">
    <?php 
if($gender=='male'){
    ?>
      <div class="form-group">
      <label>Пол</label><br>
      <label class="form-check form-check-inline">
      <input required class="form-check-input" type="radio" checked="" name="gender" value="male">
      <span class="form-check-label"> Мужской </span>
    </label>
    <label class="form-check form-check-inline">
      <input required class="form-check-input" type="radio" name="gender" value="female">
      <span class="form-check-label"> Женский</span>
    </label>
  </div>
  <?php }
else {
    ?>
      <div class="form-group">
      <label>Пол</label><br>
      <label class="form-check form-check-inline">
      <input required class="form-check-input" type="radio" name="gender" value="male">
      <span class="form-check-label"> Мужской </span>
    </label>
    <label class="form-check form-check-inline">
      <input required class="form-check-input" type="radio"  checked="" name="gender" value="female">
      <span class="form-check-label"> Женский</span>
    </label>
  </div>
  <?php } ?>
  </div>
  
  <div class="form-group">
            <label>Ваш возвраст</label>
        <input  required class="form-control" type="number" name="age"  value="<?php echo $age?>" onfocus="showUser();" required></td>
            </div>
<div class="form-group">
    <label>Дата проведения</label>
            <div class="col-sm-4">
                <input required class="form-control" type="date" name="student_booking_date" id="student_booking_date">
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
          </div>
          
          <div class="form-group">
              <label>Выберите время</label>
 <select required  class="form-control" id="all_time_slots" name="Avalability"  
 onchange="showAvalability(this.value);" onfocus="showUser();" required>
</select>
      </div>
<div class="form-group">
              <label for="address">Номер телефона</label>
              <input required type="text" class="form-control" name="student_phone" placeholder="Ваш номер телфона" value="<?php echo $phone_no; ?>">
            </div>



<div class="form-group">
                  <label for="address">Подробности(Что бы хотели узнать на уроке?)</label>
     <textarea class="form-control" rows="5" id="comment" name="details"></textarea> 
</div>



<hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Book Now" >Забронировать</button>

</form>
</div>
    </div>
<script>
function showUser() {
    
var dr_id= document.getElementById("tutors").value;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				
				
				//alert(this.responseText);
                document.getElementById("all_time_slots").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getDrtimes.php?q="+dr_id,true);
        xmlhttp.send();

}

/* new code to check time avalable or not */
function showAvalability(str) {

	 var dr_id= document.getElementById("tutors").value;
	 var booking_date= document.getElementById("patient_booking_date").value;
	// alert(booking_date);
 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if (!this.responseText){   
				//alert("What follows is blank: " + data);
				}
				else{
				alert(this.responseText);
				}
            }
        };
        xmlhttp.open("GET","getSlotStatus.php?q="+str+'&dr_id='+dr_id,+'&booking_date='+booking_date,true);
        xmlhttp.send();


   
}
/* new code to check time avalable or not ends here */ 


</script>
</div>
<?php

require("footer.php");
?>

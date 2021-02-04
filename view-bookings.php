<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

}


if(isset($_POST['submit']))
{
/* new code */

   echo $dr_id=$_SESSION['SESS_USERID']; 
   echo $bokoing_id=$_POST['booking_id']; 
   echo $student_phone=$_POST['student_phone'];
  echo $slot_id=$_pOST['time_slot'];
  $sqlupdate ="UPDATE `bookings` SET `booking_time`='". $slot_id."',`timechanged`='1' WHERE `id` '". $bokoing_id."' and `dr_id` '". $dr_id."'";
   
   if (mysqli_query($conn, $sqlupdate)) {
   //   header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");   
   echo "hello";
	die();
   } 
   else {
    // 	header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
	echo "hi";
	die();
   } 
}   
/* new code */
require("header.php");
?>
<div class="container">
    <style>
    #delete:hover {
     color:blue;
     text-decoration: underline;
     font-size: 120%;
    }
</style>
<h2>Все занятия</h2>
<div class="mt-3 row card-columns final_data">
    
</div>
</div>
<script>
$(document).ready(function(){
        show_table();
});
        function show_table()
        {
            
            $.ajax({
                url:"show_table_tutor.php",
                method:"POST",
                dataType: "html",
                success:function(text){
                    $('.final_data').html(text);
                }
            });
        }
function ensure(booking_id) { 
            var result = confirm('Are you sure you want to delete?');
            
            if (result == true) { 
                deleteCourse(booking_id);
            } else { 
                alert("Без изменений!")
            }
    
} 
function deleteCourse(booking_id){

$.ajax({
                    url:'delete_appointment.php',
                    data:{booking_id:booking_id},
                    method:"POST",
                    success:function(data){
                          $('.final_data').html(data);
                          show_table();
                    }
      });
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("book-table");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$('body').on('click', '.cancelAppt', function(){
	var booking_id=  $(this).attr("data-id");
	 var cancel="cancel";
	 alert(booking_id);
     $.ajax({
          type: "get",
          url: "changeAppointmentStatus.php",
		  data: {'booking_id' :booking_id,
				'status' :cancel,	
				},
          success: function(response) {
            console.log(response);
			alert(response);
             }
        });
	 });

$('body').on('click', '.confirmAppt', function(){
	var booking_id=  $(this).attr("data-id");
	 var cancel="confirmed";
     $.ajax({
          type: "get",
          url: "changeAppointmentStatus.php",
		  data: {'booking_id' :booking_id,
				'status' :cancel,	
				},
          success: function(response) {
            console.log(response);
			alert(response);
             }
        });
});
function myfunction() {

	 var tutor_id= document.getElementById("tutor_id").value;
	 var booking_id= document.getElementById("booking_id").value;
	  var slot_id= document.getElementById("slot_id").value;
	 alert(tutor_id);
	 alert(booking_id);
	 alert("slot id"+slot_id);
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
        xmlhttp.open("GET","changeSlotStatus.php?tutor_id="+tutor_id+'&booking_id='+booking_id+'&slot_id='+slot_id,true);
        xmlhttp.send(); 


   
}
</script>
<p>
<?php
if(isset($_GET['error'])) {
echo "<strong>Time Slots Added Successfully</strong>";
} else if($er == '2'){
echo "<strong> porblem occur while adding time slot</strong>";
}
?>


<?php

require("footer.php");
?>

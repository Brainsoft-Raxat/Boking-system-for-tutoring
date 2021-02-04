<?php
session_start();
$er = 0;
require("config.php");
if($_SESSION['SESS_USERTYPE'] == 'admin') {
    
    
}
else {
    header("Location:login.php");
} 

require("header.php");
?>
<div class="container">
<h1>Расписание учителя <?php echo $_GET["username"]; ?></h1>

<table class="table table-bordered" id="slot-table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Номер слота</th>
      <th onclick="sortTable(1)" scope="col">Время</th>
      <th onclick="sortTable(2)" scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    <?php 
 $alltimeslots = "SELECT * FROM `all_time_slots` WHERE `dr_id`='".$_GET['id']."'";
	$alltimeslots = mysqli_query($conn,$alltimeslots);
	$numrows = mysqli_num_rows($alltimeslots);
if($numrows >= 1)
{
	while($row = mysqli_fetch_assoc($alltimeslots)) {  
	$status = $row["status"]; 
	if ($status == "booked"){
	
	?>
	<tr class="table-danger">
	<td> <?php echo  $row["slot_id"]; ?></td>
	<td><?php echo $row["slot_time"]; ?></td>
	<td><?php echo $row["status"]; ?></td>
	  </tr>
	
<?php	}
else if($status == "available"){ ?>
    <tr class="table-success">
	<td> <?php echo  $row["slot_id"]; ?></td>
	<td><?php echo $row["slot_time"]; ?></td>
	<td><?php echo $row["status"]; ?></td>
	  </tr> 
	  <?php
}
else{
    ?>
    <tr class="table-secondary">
	<td> <?php echo  $row["slot_id"]; ?></td>
	<td><?php echo $row["slot_time"]; ?></td>
	<td><?php echo $row["status"]; ?></td>
	  </tr> 
    <?php
}
	    
	} 	
	}
  ?>
  </tbody>
</table>
</div>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("slot-table");
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

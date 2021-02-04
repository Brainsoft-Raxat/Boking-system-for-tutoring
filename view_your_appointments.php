<?php
session_start();
$er = 0;
include("db_connect.php");
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];
} 

require("header.php");
?>
<head>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
 
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    
</head>
<style>
    #delete:hover {
     color:blue;
     text-decoration: underline;
     font-size: 120%;
    }
</style>
<div class='container'>
<h1>Мои занятия(<?php echo $_SESSION['SESS_USERNAME'] ?>)</h1>
<button class="btn btn-primary" onclick="show_table()">Обновить</button>

<div class="mt-3 row card-columns final_data">
    
</div>


</div>

<script>
$(document).ready(function(){
        show_table();
         $('#bookings-table').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

        function show_table()
        {
            
            $.ajax({
                url:"show_table.php",
                method:"POST",
                dataType: "html",
                success:function(text){
                    $('.final_data').html(text);
                }
            });
        }
        

function ensure(booking_id) { 
            var result = confirm('Вы уверены что хотите отменить урок');
            
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
                          show_table();
                          alert("Успешно удалено!");
                          
                    }
      });
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("bookings-table");
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


require("footer.php");
?>

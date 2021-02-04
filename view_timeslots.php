<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];
} 

require("header.php");
?>
<div class="container">
<h1>Расписание на сегодня</h1>
<div class="d-flex">
<button class="btn-secondary btn" onclick="hide('hide');" id="hide">Скрыть</button>
<button class="btn-success btn ml-2 " onclick="hide('show')" id="show">Сделать доступными</button>

<button class="btn-primary btn ml-auto ml-2" onclick="showtable();">Обновить</button>
</div>
<div class="final_data">
    
</div>
</div>
<script>
 $(document).ready(function(){
        show_table();
});

        function show_table()
        {   
            var customer_id = <?php echo $_SESSION['SESS_USERID']; ?>;
            console.log(customer_id);
            $.ajax({
                url:"show_timeslots.php",
                method:"POST",
                data:{customer_id:customer_id},
                success:function(data){
                    $('.final_data').html(data);
                }
            });

        }
function hide(action){
    var time_slots = collect('check');

    if(time_slots.length > 0){
    $.ajax({
                    
                    url:'hide_lessons.php',
                    data:{action:action, time_slots:time_slots},
                    method:"POST",
                    success:function(text){
                        $('.result').html(text);
                          show_table();
                          alert("Вы скрыли выбранные слоты времени!");
                          
                    }
      });
    }
    
    else{
        alert("Выберите слоты времени!");
    }
}    
function collect(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
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

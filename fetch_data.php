<?php 
//require("config.php");
include("db_connect.php");
if(isset($_POST["action"]))
{    
    $alldata2 = "update `bookings` set bookings_status='done' WHERE bookings_status='pending' and booking_date< CURRENT_DATE" ;
    $all2 = $connect->prepare($alldata2);
    $all2->execute();
    $query = "
    SELECT * FROM dr_booking_slots, logins WHERE logins.user_type='tutor' AND dr_booking_slots.dr_id = logins.id";
    	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND logins.price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
    if(isset($_POST["subject"])){
        $subject = implode("','", $_POST["subject"]);
        $query .= "AND logins.specialization IN('".$subject."')
        ";
    }
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 
 if($total_row > 0)
 { 
  foreach($result as $row)
  {
      ?>
   
<div class="card shadow p-2" style="width: 18rem;">
  <img src="tutors/<?php echo $row["image"]; ?>" class="card-img-top mb-1" style="width: 268px; height: 297px;" >
  <div class="card-body">
    <h5 class="card-title"><strong><?php echo $row['username'];?></strong></h5>
    <h5 class="card-title">Предмет: <?php echo$row['specialization']; ?></h5>
    <h5 class="card-title"><strong><?php echo $row['price']; ?></strong> за одно занятие</h5>
    <p class="card-text">Адрес: <?php echo $row['address']; ?></p>
    <p class="card-text">Доступные часы:  <b> <?php echo $row['start_time'];?> hrs</b> to <b><?php echo $row['end_time']; ?> hrs </b> </p>
    <form action="book_apponitment.php" method="get">
		<input type="hidden" value="<?php echo $row['id']; ?> " name="dr_id"/>
    <input type="submit" value="Забронировать урок" class="btn btn-success">
    </form>
  </div>
   <div class="card-footer">
      <small class="text-muted"></small>
    </div>
</div>
   
   <?php
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}





?>
<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");
if($_SESSION['SESS_USERTYPE'] == 'admin') {
    
    $query = "SELECT * FROM logins WHERE user_type='tutor'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    
    
    
}
else {
    header("Location:login.php");
} 

require("header.php");
?>
<div class="container">
  <h1>Все Учителя</h1>  
 <div class="mt-3 row card-columns">
<?php 
      if($total_row > 0)
 { 
     
  foreach($result as $row)
  {
      ?>
   <div class="card shadow p-2" style="width: 18rem;">
  <img src="tutors/<?php echo $row["image"]; ?>" class="card-img-top mb-1" style="width: 268px; height: 297px;" >
  <div class="card-body">
    <a href="tutor_schedule.php?id=<?php echo $row["id"];?>&username=<?php echo $row["username"]; ?>" class="card-title"><strong>Username: <?php echo $row['username'];?></strong></a>
    <h5 class="card-title"><strong>Имя: </strong><?php echo $row['firstname'];?></h5>
    <h5 class="card-title"><strong>Фамилия: </strong><?php echo $row['lastname'];?></h5>
    <p class="card-text">Email: <?php echo $row['email'];?></p>
    <p class="card-text">Дата Рождения: <?php echo $row['date_of_birth'];?></p>
    <p class="card-text">Возвраст: <?php echo $row['age'];?></p>
    <p class="card-text">Пол: <?php echo $row['gender'];?></p>
    <p class="card-text">Квалификация: <?php echo $row['qualification'];?></p>
    <p class="card-text">Опыт работы: <?php echo $row['years_of_experience'];?></p>
    <h5 class="card-title">Предмет: <?php echo$row['specialization']; ?></h5>
    <h5 class="card-title"><strong><?php echo $row['price']; ?></strong> за один урок</h5>
    <p class="card-text">Адресс: <?php echo $row['address']; ?></p>
  </div>
   <div class="card-footer">
      <small class="text-muted"></small>
    </div>
</div>
   <?php
  }
 }
      ?>
</div>
</div>
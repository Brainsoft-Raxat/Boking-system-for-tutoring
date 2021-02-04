<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");
if($_SESSION['SESS_USERTYPE'] == 'admin') {
    
}
else {
    header("Location:login.php");
} 

require("header.php");
$query="SELECT * FROM messages";
$statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 
 if($total_row > 0)
?><div class="container">
    <h1 style="font-family: 'Oswald', sans-serif; font-size: 2em; font-weight: bolder;">Сообщения от пользователей</h1>
    <div class="row">
        <?php if($total_row > 0){
         foreach($result as $row)
  { ?>
            <div class="col-md-4">
      <div class="card border-primary mb-3" style="max-width: 25rem;">
  <div class="card-header"><h4><?php echo $row['email']; ?></h4></div>
  <div class="card-body text" style='min-height: 10rem;'>
    <p class="card-text"><?php echo $row['message']; ?></p>
  </div>
  <div class="card-footer"> <p><a class="btn btn-secondary" href="delete_message.php?id=<?php echo $row['id'] ?>" role="button">Удалить сообщение</a></p></div>
  </div>
          </div>
       <?php   }
          } ?>
        </div>
    
</div>



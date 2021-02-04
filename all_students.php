<?php
session_start();
$er = 0;
require("config.php");
include("db_connect.php");
if($_SESSION['SESS_USERTYPE'] == 'admin') {
    
    $query = "SELECT * FROM logins WHERE user_type='student'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    
    
    
}
else {
    header("Location:login.php");
} 

require("header.php");
?><style>
    #delete:hover {
     color:blue;
     text-decoration: underline;
     font-size: 120%;
    }
</style>
<div class="container">
  <h1>Все ученики</h1>  
  <table class="table display table-bordered" id="bookings-table">
    <thead class="thead-dark">
  <tr>
    <th onclick="sortTable(0)" scope="col">Username</th>
    <th onclick="sortTable(1)" scope="col">Имя</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Фамилия</th>
    <th onclick="sortTable(0)" scope="col" style="width: 150px;">Email</th>
	<th onclick="sortTable(0)" scope="col" >Дата Рождения</th>
	<th onclick="sortTable(0)" scope="col">Возвраст</th>
	<th  scope="col">Пол</th>
	<th scope="col">Номер телефона</th>
  </tr>
  </thead>
  <tbody>
<?php 
      if($total_row > 0)
 { 
     
  foreach($result as $row)
  {
      ?>
   <tr>
    <td onclick="sortTable(0)" scope="col"><a href="student_bookings.php?id=<?php echo $row['id'] ?>&username=<?php echo $row['username'] ?>"><?php echo $row['username'] ?></a></td>
    <td onclick="sortTable(1)" scope="col"><?php echo $row['firstname'] ?></td>
    <td onclick="sortTable(0)" scope="col" style="width: 150px;"><?php echo $row['lastname'] ?></td>
    <td onclick="sortTable(0)" scope="col" style="width: 150px;"><?php echo $row['email'] ?></td>
	<td onclick="sortTable(0)" scope="col" ><?php echo $row['date_of_birth'] ?></td>
	<td onclick="sortTable(0)" scope="col"><?php echo $row['age'] ?></td>
	<td  scope="col"><?php echo $row['gender'] ?></td>
	<td scope="col"><?php echo $row['phone_no'] ?></td>
  </tr>
   <?php
  }
 }
      ?>
</div>
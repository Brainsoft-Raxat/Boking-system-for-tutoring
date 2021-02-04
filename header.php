<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}
require("config.php");
include("db_connect.php");
?>
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $config_sitename; ?></title>
  <meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="js/jquery-1.10.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href = "css/jquery-ui.css" rel = "stylesheet">
 <script src="js/jquery-ui.js"></script>
 <script src="js/croppie.js"></script>
  <link rel="stylesheet" href="css/croppie.css" />
	
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet">
	<script type="text/javascript"
     src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js">
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
      });
    </script>
    
	</head>
<body>
<style>
    a , td, span, p {font-family: 'Oswald', sans-serif; font-size: 1.15em; font-weight: 300;}
    th {font-family: 'Oswald', sans-serif; font-size: 1.15em; }
    label {font-family: 'Oswald', sans-serif; font-size: 1.5em; font-weight: 300; }
    h1 {font-family: 'Oswald', sans-serif; font-size: 2.2em; }
    h2 {font-family: 'Oswald', sans-serif; font-size: 2em; }
    h3 {font-family: 'Oswald', sans-serif; font-size: 1.9em; }
    h4 {font-family: 'Oswald', sans-serif; font-size: 1.7em; }
    h5 {font-family: 'Oswald', sans-serif; font-size: 1.5em;  }
    button , select, input , textarea {font-family: 'Oswald', sans-serif; font-size: 1.5em; font-weight: 300; }
    #orgname {
        color: #000;
    text-decoration: none;
}

    #orgname:hover 
{

     text-decoration:none; 
     cursor:pointer;  
}
    }
</style>
<nav class="p-3 px-md-4 mb-3 navbar sticky-top navbar-expand-lg navbar-light bg-white rounded shadow-sm">
         <img src="/img/logo.jpg" width="35" height="35" class="d-inline-block align-top mr-2" id="logo" alt="logo">
        <a id="orgname" href="index.php" class="my-0 mr-md-auto font-weight-normal pr-5 " style="font-family: 'Oswald', sans-serif; font-size: 2em; font-weight: bolder;">It's Time</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="navbar-collapse collapse " id="navbarsExample09">
          <ul class="navbar-nav mr-auto ">
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about.php">Блог</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courses.php">Доступные курсы</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact.php">Контактная форма</a>
            </li>
            
          
         <?php  if(isset($_SESSION['SESS_LOGGEDIN']))
{
    $loginsql3 = "SELECT * FROM logins WHERE id ='".$_SESSION['SESS_USERID']."'";
    $loginres3 = mysqli_query($conn,$loginsql3);
    $numrows3 = mysqli_num_rows($loginres3);
    if($numrows3 == 1)
{
	$loginrow3 = mysqli_fetch_assoc($loginres3);
	$userDob3 = $loginrow3['date_of_birth'];
	
}$dob3 = new DateTime($userDob3);
 
//We need to compare the user's date of birth with today's date.
$now3 = new DateTime();
 
//Calculate the time difference between the two dates.
$difference3 = $now3->diff($dob3);
 
//Get the difference in years, as we are looking for the user's age.
$age3 = $difference3->y;
$sql3 = "UPDATE logins SET age = '".$age3."' WHERE  id ='".$_SESSION['SESS_USERID']."'";
$res3 = mysqli_query($conn,$sql3); 


/* new code */
if($_SESSION['SESS_USERTYPE']=='tutor')
{
    
    ?>
    </ul>
     <div class="dropdown show m-1">
        <a class="btn btn-primary dropdown-toggle m-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['SESS_USERNAME'] ?>'s кабинет
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $config_basedir ?>update_dr_info.php">Обновить детали</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>settime_slot.php">Назначить время</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>view_timeslots.php">Расписание</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>view-bookings.php">Бронированые занятия</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>daywisecahrt.php">Статистика за день</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>view_statistics.php">Статистика за месяц</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>year_wisechart.php">Статистика за год</a>
        </div>
      </div>
        
        
    <a class='btn btn-outline-primary m-1'  href=' <?php echo $config_basedir ?>logout.php'>Выйти</a></br>
<?php
}
else if($_SESSION['SESS_USERTYPE']=='admin')
{
    
    
    ?>
    </ul>
    <div class="dropdown show m-1">
        <a class="btn btn-primary dropdown-toggle m-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Page
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $config_basedir ?>all_students.php">Все ученики</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>all_tutors.php">Все учителя</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>add_post.php">Добавить Пост</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>messages.php">Сообщения</a>
        </div>
      </div>
     <a class='btn btn-outline-primary m-1'  href=' <?php echo $config_basedir ?>logout.php'>Выйти</a></br>
    <?php }
else{
  ?>  
	</ul>
	
	<a class='btn btn-primary m-1' href='<?php echo $config_basedir ?>view_your_appointments.php'> <?php echo $_SESSION['SESS_USERNAME'] ?> кабинет</a></br>
    <a class='btn btn-outline-primary'  href=' <?php echo $config_basedir ?>logout.php'>Выйти</a></br>
<?php	
}
/* new code */




}
else
{
    ?>
    </ul>
    
<div class="dropdown show  m-1">
        <a class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Регистрация
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $config_basedir ?>register.php">Регистрация учителя</a>
          <a class="dropdown-item" href="<?php echo $config_basedir ?>student_register.php">Регистрация ученика</a>
        </div>
      </div>
      
<a class='btn btn-outline-primary' href='<?php echo $config_basedir ?>login.php'>Войти</a><br>
<?php
}
?>
        </div>
        
      </nav>
      </body>
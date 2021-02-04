<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
$loginsql1 = "SELECT * FROM logins  order by customer_id desc";
$loginres1 = mysqli_query($conn,$loginsql1);
$row = mysqli_fetch_assoc($loginres1);
$c =$row['customer_id']+1;
$loginsql2 = "SELECT * FROM logins  where username='".$_POST['userBox']."' and user_type='".$_POST['userOption']."'";
$loginres2 = mysqli_query($conn,$loginsql2);
$row2 = mysqli_fetch_assoc($loginres2);

$userDob = $_POST['date_of_birth'];
 
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($userDob);
 
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
 
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
 
//Get the difference in years, as we are looking for the user's age.
$age = $difference->y;

if(mysqli_num_rows($loginres2) ==0)
{
if($_POST['passBox']==$_POST['passBox2']){
$sql = "INSERT INTO logins(username,firstname,lastname,password,email,date_of_birth,age,gender,grade,phone_no,customer_id,user_type) VALUES('".$_POST['userBox']."','".$_POST['firstname']."','".$_POST['lastname']."','".sha1($_POST['passBox'])."', '".$_POST['userEmail']."', '".$_POST['date_of_birth']."', '".$age."', '".$_POST['gender']."', '".$_POST['grade']."', '".$_POST['userPhone']."', '$c','".$_POST['userOption']."')";
$res = mysqli_query($conn,$sql);
?>
	    <script>
	        alert("Регистрация прошла успешно!");
	    </script>
	    <?php
	header("Location: http://" .$_SERVER['HTTP_HOST']. '/login.php');
}
else {
    ?>
	    <script>
	        alert("Пароли не совпадают!");
	    </script>
	    <?php
}
$cid = mysqli_insert_id();

$loginsql = "SELECT * FROM logins WHERE id='$cid'";
$loginres = mysqli_query($conn,$loginsql);
$numrows = mysqli_num_rows($loginres);

if($numrows == 1)
{
$loginrow = mysqli_fetch_assoc($loginres);
$_SESSION['SESS_LOGGEDIN'] = 1;
$_SESSION['SESS_USERNAME'] = $loginrow['username'];
$_SESSION['SESS_USERID'] = $loginrow['id'];
$ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
$orderres = mysqli_query($conn,$ordersql);
$orderrow = mysqli_fetch_assoc($orderres);
$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
$er = 2;
header("Location: " . $config_basedir);
}
else{
 header("Location: http://" .$_SERVER['HTTP_HOST']. '/login.php'  . "?error=5");
}
}
else
{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=2");
}
}

require("header.php");
?>

<p>
<?php
if(isset($_GET['error'])) {
echo "<strong> User with this Id Already registered...Please <a href='login.php' style='color:#3F51B5'>login ! </a></strong>";
} else if($er == '2'){
echo "<strong> Registered Successfully.. you may please <a href='login.php' style='color:#3F51B5'>login Now !</a></strong>";
}
 
?>

<div class="row justify-content-center"> 
<div class="col-md-6">
<div class="card">
<header class="card-header">
    <a href="login.php" class="float-right btn btn-outline-primary mt-1">Войти</a>
  <h4 class="card-title mt-2">Регистрация Ученика</h4>
</header>
<article class="card-body">

<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
    <?php include('errors.php'); ?>

<input type="hidden" name="userOption" value="student">
<div class="form-group">
    	<label>Имя пользователя</label>
        <input required name="userBox" class="form-control" placeholder="Username" type="textbox">
    </div> <!-- form-group// -->
<div class="form-row">
    <div class="col form-group">
      <label>Имя </label>   
        <input required type="text" class="form-control" name="firstname"  placeholder="">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label>Фамилия</label>
        <input required type="text" class="form-control" name="lastname" placeholder=" ">
    </div> <!-- form-group end.// -->
  </div>
  <div class="form-group">
    <label>Email</label>
    <input required  type="email" class="form-control" name="userEmail" placeholder="">
    <small class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label>Дата Рождения</label>
            <div class="col-sm-4">
              <input required type="date" placeholder="Date Of Birth" class="form-control" name="date_of_birth">
            </div>
          </div>
    <div class="form-group">
      <label>Пол</label><br>
      <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="male">
      <span class="form-check-label"> Мужской </span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="female">
      <span class="form-check-label"> Женский</span>
    </label>
  </div>      
          <div class="form-group">
    <label>Класс</label>
  <input required hidden type="number" list="grades" id="grade" class="form-control" name="grade"/>
<select required class="custom-select" id="select_grade">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select>
<script>
    select_grade.oninput = function() {
     grade.value = select_grade.value ;
  };
</script>
<div class="form-group">
    <label>Номер телефона</label>
      <input required class="form-control"  name="userPhone">
  </div> 
 <div class="form-group">
    	<label>Введите пароль</label>
        <input required class="form-control" name="passBox" placeholder="******" type="password">
    </div>
    <div class="form-group">
    	<label>Подтвердите пароль</label>
        <input required class="form-control" name="passBox2" placeholder="******" type="password">
    </div>

 <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit" value="Register">Зарегистрироваться</button>
    </div>


</form>


</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div>

<?php
require("footer.php");
?>

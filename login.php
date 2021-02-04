<?php
session_start();
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
$loginsql = "SELECT * FROM logins WHERE username = '" . $_POST['userBox']. "' AND password = '" . sha1($_POST['passBox']) . "' AND user_type = '" . $_POST['userOption']. "'";
$loginres = mysqli_query($conn,$loginsql);
$numrows = mysqli_num_rows($loginres);
if($numrows == 1)
{
$loginrow = mysqli_fetch_assoc($loginres);

$_SESSION['SESS_LOGGEDIN'] = 1;
$_SESSION['SESS_USERNAME'] = $loginrow['username'];
$_SESSION['SESS_USERID'] = $loginrow['id'];
$_SESSION['SESS_USERTYPE'] = $loginrow['user_type'];
$ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
$orderres = mysqli_query($conn,$ordersql);
$orderrow = mysqli_fetch_assoc($orderres);
$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
if($orderrow['user_type']=='tutor')
{
header("Location: about.php");
}
else{
header("Location: " . $config_basedir);	
}
}
else
{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
}
}

else
{
require("header.php");
?>
<?php
if($_GET['error'] == '5'){
echo "<strong> Registered Successfully.. you may <a href='login.php' style='color:#3F51B5'>login Now !</a></strong>";
}



?>



<div class="row justify-content-center"> 
<div class="col-md-4">
<div class="card">
<header class="card-header">
  <h4 class="card-title mt-2">Войти</h4>
  <?php if(isset($_GET['error'])) {
echo "<strong>Неверный пароль или логин</strong>"; }?>
</header>
<article class="card-body">
    
<form method="POST" action="<?php $_SERVER['SCRIPT_NAME']; ?>">
     	<?php include('errors.php'); ?>
     <div class="form-group">
     <label>Тип пользователя</label>
<select name="userOption" class="form-control">
     <option value="student">Ученик</option> 
  <option value="tutor">Учитель</option>
 
</select>
</div>

    <div class="form-group">
    	<label>Имя пользователя/username</label>
        <input name="userBox" class="form-control" placeholder="Username" type="textbox">
    </div> <!-- form-group// -->
    <div class="form-group">
    	<label>Пароль</label>
        <input class="form-control" name="passBox" placeholder="******" type="password">
    </div> <!-- form-group// --> 
    <div class="form-group"> 
    <div class="checkbox">
    </div> <!-- checkbox .// -->
    </div> <!-- form-group// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit" value="Log in"> Войти  </button>
    </div> <!-- form-group// -->                                                           
</form>
</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 

<?php
}
require("footer.php");
?>

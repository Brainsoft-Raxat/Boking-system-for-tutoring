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
 
//Print it out.



/* new code to upload image */
if(mysqli_num_rows($loginres2) ==0)
{

	//$sql="insert into packages(package_name, dr_image) values('$package_name','" . basename($_FILES["dr_image"]["name"]) . "')";
	if($_POST['passBox']==$_POST['passBox2']){
	    
	
	$sql ="INSERT INTO `logins` (`customer_id`, `username`, `firstname`, `lastname`, `password`, `email`, `date_of_birth`,  `age`, `gender`, `specialization`, `price`, `phone_no`, `user_type`, `image`,  `qualification`, `address`,  `years_of_experience`) VALUES ('$c', '".$_POST['userBox']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".SHA1($_POST['passBox'])."', '".$_POST['userEmail']."', '".$_POST['date_of_birth']."', '".$age."', '".$_POST['gender']."', '".$_POST['userSpecialization']."', '".$_POST['price']."', '".$_POST['userPhone']."', '".$_POST['userOption']."', '".$_POST['dr_image']."', '".$_POST['userQualification']."','".$_POST['address']."','".$_POST['experience']."')";
	mysqli_query($conn,$sql);
	?>
	    <script>
	        alert("Регистрация прошла успешно!");
	    </script>
	    <?php
	header("Location: http://" .$_SERVER['HTTP_HOST']. '/login.php');
	
	}
	else{
	    ?>
	    <script>
	        alert("Пароли не совпадают!");
	    </script>
	    <?php
	}
	
/* new code ends here to upload image */

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
$orderrow = mysql_fetch_assoc($conn,$orderres);
$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
$er = 2;
header("Location: " . $config_basedir);
}
else
{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
}
}
else{
    ?>
    <script>
        alert("Пользователь с username <?php echo $_POST['userBox'] ?> уже зарегистрирован в системе. Пожалуйста, введите другой username!");
    </script>
    <?php
    header("Refresh:0");
}
}

require("header.php");
?>

<p>
<?php
if($_GET['error']==1) {
echo "<strong>Registered Successfully...Please login now </strong>";
header("Loaction: u70739na.beget.tech/login.php");
} else if($er == '2'){
echo "<strong> Registered Successfully</strong>";
}
else if($er == '3'){
echo "<strong> kindly Register yourself before appointment </strong>";
}
?>

<div class="row justify-content-center"> 
<div class="col-md-6">
<div class="card">
<header class="card-header">
  <a href="login.php" class="float-right btn btn-outline-primary mt-1">Войти</a>
  <h4 class="card-title mt-2">Регистрация учителя</h4>
</header>
<article class="card-body">
    
<form method="post" action="<?php $_SERVER['SCRIPT_NAME']; ?>" enctype="multipart/form-data">
      <?php include('errors.php'); ?>
      <input type="hidden" name="userOption" value="tutor">
    <div class="form-group">
    <label>Имя пользователя</label>
    <input type="text" required="" class="form-control" name="userBox" placeholder="">
  </div> <!-- form-group end.// -->
  <div class="form-row">
    <div class="col form-group">
      <label>Имя </label>   
        <input required="" type="text" class="form-control" name="firstname"  placeholder="">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label>Фамилия</label>
        <input type="text" required="" class="form-control" name="lastname" placeholder=" ">
    </div> <!-- form-group end.// -->
  </div> <!-- form-row end.// -->
  <div class="form-group">
    <label>Email</label>
    <input type="email" required="" class="form-control" name="userEmail" placeholder="">
    <small class="form-text text-muted"></small>
  </div> <!-- form-group end.// -->
<div class="form-group">
    <label>Дата Рождения</label>
            <div class="col-sm-4">
              <input type="date" required="" placeholder="Date Of Birth" class="form-control" name="date_of_birth">
            </div>
          </div>
  <div class="form-group" >
      <label>Пол</label><br>
      <label class="form-check form-check-inline">
      <input class="form-check-input"  type="radio" name="gender" value="male">
      <span class="form-check-label"> Мужской </span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input"  type="radio" name="gender" value="female">
      <span class="form-check-label"> Женский</span>
    </label>
  </div> <!-- form-group end.// -->
  
  <div class="form-group">
    <label> Квалификация</label>
      <input class="form-control" required="" name="userQualification">
  </div> 
  
  <div class="form-group">
    <label>Предмет</label>
  <input hidden type="text"  list="subjects" id="subject" class="form-control" name="userSpecialization"/>
<select class="custom-select" id="select_sub">
  <option value="Physics">Physics</option>
  <option value="Math">Math</option>
  <option value="IELTS">IELTS</option>
  <option value="SAT">SAT</option>
  <option value="Biology">Biology</option>
  <option value="Chemistry">Chemistry</option>
  <option value="NUFYPET">NUFYPET</option>
</select>
<script>
    select_sub.oninput = function() {
     subject.value = select_sub.value ;
  };
</script>
</div>

<div class="form-group">
    <label>Стоимость одного занятия</label>
      <input class="form-control" required="" type="number" min="0" max="10000" step="1" name="price"  >
  </div> 
  
  <div class="form-group">
    <label>Номер телефона</label>
      <input class="form-control" required=""  name="userPhone">
  </div> 
  
  <div class="form-group">
    <label>Адрес</label>
     <textarea class="form-control" required="" rows="4" cols="50" name="address">
</textarea>
  </div> 
  
  <div class="form-group">
    <label>Опыт работы</label>
      <input class="form-control"  required="" type="textbox" name="experience">
  </div> 
  
  <div class="form-group">
      
<div class="input-group mb-3">
  <div class="custom-file">
   <input type="file" class="custom-file-input"  name="upload_image" id="upload_image">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
   <br/>
   
  </div>
 <div id="uploaded_image"></div>
</div>
      
  
  <!-- form-group end.// --
  
  <div class="form-group">
    <label>Create password</label>
      <input class="form-control" type="password" name="password_1">
  </div> <!-- form-group end.// -->  
   <div class="form-group">
    <label>Введите пароль</label>
      <input class="form-control" required="" type="password" name="passBox">
  </div>
  <div class="form-group">
    <label>Подтвердите пароль</label>
      <input class="form-control" required="" type="password" name="passBox2">
  </div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit" value="Register"> Зарегистрироваться  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">Нажимая на кнопку "Зарегисрироваться" вы даете согласие на наши<br> Условия использования и Политику конфиденциальности</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">У вас уже есть аккаунт? <a href="login.php">Войти</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->
</div>
</div>
<?php
?> 

<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>

<script>  
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:268,
      height:297,
      type:'square' //circle
    },
    boundary:{
      width:321,
      height:350
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>
<?php
require("footer.php");
?>

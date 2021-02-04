<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
$_SESSION['SESS_USERID'];

$alldata = "SELECT * FROM logins where id ='".$_SESSION['SESS_USERID']."'";
$alldata = mysqli_query($conn,$alldata);
$numrows = mysqli_num_rows($alldata);
if($numrows == 1)
{
	$loginrow = mysqli_fetch_assoc($alldata);
	$user_id=$loginrow['id'];
	$user_name=$loginrow['username'];
	$firstname=$loginrow['firstname'];
	$lastname=$loginrow['lastname'];
	$date_of_birth=$loginrow['date_of_birth'];
	$gender=$loginrow['gender'];
	$email=$loginrow['email'];
	$specialization=$loginrow['specialization'];
    $price=$loginrow['price'];
	$qualification=$loginrow['qualification'];
	$address=$loginrow['address'];
	$phone_no=$loginrow['phone_no'];
	$image=$loginrow['image'];
}
}

if(isset($_POST['submit']))
{
 
$sql="UPDATE `logins` set`username`='".$_POST['userBox']."', `firstname`='".$_POST['firstname']."', `lastname`='".$_POST['lastname']."',`email`='".$_POST['userEmail']."', `date_of_birth`='".$_POST['date_of_birth']."', `gender`='".$_POST['gender']."', `qualification`='".$_POST['userQualification']."', `specialization`='".$_POST['userSpecialization']."', `price`='".$_POST['price']."', `phone_no`='".$_POST['userPhone']."', `address`='".$_POST['address']."',  `image`='".$_POST['dr_image']."' WHERE `id`='".$user_id."'";
 if (mysqli_query($conn, $sql)) {
	//drpannle.php
?>
<script>
    alert("Data updated Successfully");
</script>
<?php
	  header("Location:  http://".$config_basedir);
	  header("Refresh:0");
   }  else { ?>
   <script>
    alert("Data error");
</script>
      <?php
      header("Refresh:0");
	  header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
	  
} }

require("header.php");
?>

<p>
<?php
if(isset($_GET['error'])) { ?>
<script>
    alert("Data updated Successfully");
</script>
<?php
echo "<script type='text/javascript'>window.top.location='http://u70739na.beget.tech/update_dr_info.php';</script>"; exit;
} else if($er == '2'){ ?>
<script>
    alert("problem in update");
</script> <?php
}
?>

<div class="container">
    <div class="row">
<div class="col-md-8 order-md-1">
          <h4 class="mb-3">Обновить персональные данные</h4>
          <form class="needs-validation" action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST" novalidate="">
              <input type="hidden" name="userOption" value="tutor">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Имя</label>
                <input type="textbox" class="form-control"  required="" id="firstName" name="firstname" value="<?php echo $firstname;?>" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Фамилия</label>
                <input type="text" class="form-control" id="lastName" required=""name="lastname" value="<?php echo $lastname;?>" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            
            
                <div class="form-group">
                    <label>Username</label>
                <input type="text" class="form-control" id="username" required="" value="<?php echo $user_name ?>" name="userBox" placeholder="Username" required="">
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
            </div>
              
            
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="userEmail" required="" class="form-control" id="email" value="<?php echo $email;?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

           
            
            <div class="form-group">
    <label>Дата рождения</label>
            <div class="col-sm-4">
              <input type="date" placeholder="Date Of Birth" required="" class="form-control" value="<?php echo $date_of_birth; ?>" name="date_of_birth">
            </div>
          </div>
  <div class="form-group">
    <?php 
if($gender=='male'){
    ?>
      <div class="form-group">
      <label>Пол</label><br>
      <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" checked="" name="gender" value="male">
      <span class="form-check-label"> Мужской </span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="female">
      <span class="form-check-label"> Женский</span>
    </label>
  </div>
  <?php }
else {
    ?>
      <div class="form-group">
      <label>Пол</label><br>
      <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="male">
      <span class="form-check-label"> Мужской </span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio"  checked="" name="gender" value="female">
      <span class="form-check-label"> Женский</span>
    </label>
  </div>
  <?php } ?>
  
      
      
  </div>
  
        <div class="form-group">
              <label for="address">Квалификация</label>
              <input required="" type="text" class="form-control" name="userQualification" placeholder="Your Qualification" value="<?php echo $qualification; ?>">
            </div>
            

    <div class="form-group">
              <label for="address">Предмет</label>
 <input hidden type="text" list="subjects" id="subject" class="form-control" required="" value="<?php echo $specialization ?>" name="userSpecialization"/>
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
        subject.value = select_sub.value;
        }
    var options = document.getElementById("select_sub").options;
    name = "<?php echo $specialization ?>";
for (var i = 0; i < options.length; i++) {
  if (options[i].text == name) {
    options[i].selected = true;
    break;
  }
}
</script>
   
   </div>
   <div class="form-group">
    <label>Стоимость занятия</label>
      <input class="form-control" type="number" min="0" max="10000" step="1" name="price" value="<?php echo $price; ?>" required="required">
  </div> 
    <div class="form-group">
              <label for="address">Номер телефона</label>
              <input type="text" class="form-control" required="" name="userPhone" placeholder="Your Subject" value="<?php echo $phone_no; ?>">
            </div>

            <div class="mb-3">
              <label for="address">Адрес</label>
              <input type="text" class="form-control" required="" name="address" id="address2" placeholder="Place of work" value="<?php echo $address; ?>">
            </div>
            <div class="input-group mb-3">
               
  <div class="custom-file">
   <input type="file" class="custom-file-input" name="upload_image" id="upload_image">
   <input type="textbox" hidden class="custom-file-input" name="dr_image"  value="<?php echo $image ?>">
   
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Выберите файл</label>
   <br/>
   
  </div>
  </div>
   <img src="tutors/<?php echo $image ?>" class="card-img-top m-3" style="width: 268px; height: 297px;" >
 <div id="uploaded_image"></div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Update" >Обновить</button>
          </form>
        </div>
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

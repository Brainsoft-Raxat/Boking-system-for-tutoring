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
if(isset($_POST['submit']))
{
$query="INSERT INTO `posts`(`title`, `slug`, `image`, `body`) VALUES ('".$_POST['title']."','".$_POST['slug']."', '".$_POST['post_image']."','".$_POST['body']."')";
 $statement = $connect->prepare($query);
 $statement->execute();
    
}

require("header.php");
?>
<div class="container">
<div class="row">
<div class="col-md-8 order-md-1">
<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="title">Название</label>
        <input required class="form-control" id="title" type="text" name="title">
    </div>
    <div class="form-group">
    <label for="slug">Краткое Содержание</label>
        <textarea required  style="height: 100px" class="form-control" id="slug" type="text" name="slug"></textarea>
 </div>
  <div class="form-group">
      <label for="upload_image">Загрузить рисунок</label>
  <div class="input-group mb-3">
  <div class="custom-file">
   <input type="file" class="custom-file-input" required="" name="upload_image" id="upload_image">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Выбрать файл</label>
   <br/>
   
  </div>
  </div>
  </div>
    <div  id="uploaded_image">
        
        
    </div>
    <div class="form-group">
        <label for="body">Текст</label>
        <textarea required style="height: 300px" class="form-control" id="body" type="text" name="body"></textarea>
    </div>
    
    <div class="form-group">
     <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="add_post" >Добавить новый пост</button>
    </div>
</form>
</div>
</div>
</div>

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
      width:200,
      height:250,
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
        url:"image_post.php",
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
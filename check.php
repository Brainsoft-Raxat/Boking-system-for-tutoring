<?php 
require("config.php");
include("db_connect.php");

 	$email = $_POST['email'];
	$message = $_POST['message'];

	$error = '';
	if(trim($email) == '')
		$error = "Введите ваш email";
	elseif (trim($message) == '') 
		$error = "Введите само сообщение";
	elseif (strlen($message) < 10)
		$error = 'Сообщение должно быть более 10 символов';

	if($error != ''){
		echo $error;
		exit;
	}

	
$query="INSERT INTO `messages`(`email`, `message`) VALUES ('".$email."','".$message."')";
$statement = $connect->prepare($query);
 if($statement->execute()){
     echo"<script>alert('Отправлено успешно!');</script>";
   echo "<script type='text/javascript'>window.top.location='http://u70739na.beget.tech/contact.php';</script>"; exit;
}
else{ ?>
    <script>alert("Ошибка отправки. Попробуйте еще раз");</script>
    <?
    echo "<script type='text/javascript'>window.top.location='http://u70739na.beget.tech/contact.php';</script>"; exit;
}
?>
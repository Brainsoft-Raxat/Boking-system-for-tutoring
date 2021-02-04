<?php
session_start();
header("Location: " .$config_basedir.'index.php');
require("header.php");
require("config.php");
unset($_SESSION['SESS_LOGGEDIN']);
unset($_SESSION['SESS_USERNAME']);
unset($_SESSION['SESS_USERID']);
session_destroy();

require("footer.php");


?>

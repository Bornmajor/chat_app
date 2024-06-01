<?php
include 'includes/connection.php';

session_start();


$_SESSION['chat_usr_id'] = null;

setcookie("chat_usr_id", "", time() - 3600,"/");

header("Location:index.php");


?>
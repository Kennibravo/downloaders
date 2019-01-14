<?php 
require_once 'includes/config.php';
require_once 'admin-functions.php';

if(check()){
	unset($_SESSION['adminId']);
	header('Location: admin-login.php');
}else{
	header('Location: admin-login.php');
}


?>
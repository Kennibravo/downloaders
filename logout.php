<?php 
require_once 'includes/config.php';
require_once 'functions.php';

if(check()){
	unset($_SESSION['userId']);
	header('Location: login.php');
}else{
	header('Location: login.php');
}


?>
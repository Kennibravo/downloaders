<?php 
$currentDir = getcwd();
$ds = DIRECTORY_SEPARATOR;
require_once $currentDir . $ds .   'includes' . $ds . 'config.php';

require_once 'functions.php';




if(!check() && !isset($_SESSION['adminId'])){
	header('Location: login.php');
}
if(isset($_SESSION['userId'])){
$userId = $_SESSION['userId'];
$user = get('username,id', 'users', 'id', $userId);
$userProfileData = get('id,username,email,password', 'users', 'id', $userId);
}


if(isset($_SESSION['adminId'])){
$adminId = $_SESSION['adminId'];
$admin = get('username,id', 'users', 'id', $adminId);
$userProfileData = get('id,username,email,password', 'users', 'id', $adminId);
}

?>
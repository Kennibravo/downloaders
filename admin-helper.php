<?php 
$currentDir = getcwd();
$ds = DIRECTORY_SEPARATOR;
require_once $currentDir . $ds .   'includes' . $ds . 'config.php';

require_once 'admin-functions.php';

$adminId = $_SESSION['adminId'];

if(!check()){
	header('Location: admin-login.php');
}

$admin = get('username,id', 'admins', 'id', $adminId);
$adminProfileData = get('id,username,email,password', 'admins', 'id', $adminId);

?>
<?php
require_once $currentDir . $ds .  'admin-helper.php';


$id = $_GET['id'];



if($id == NULL){
	header('Location: index.php');
}
$checkId = get('id', 'users', 'id', $id);
if($checkId == NULL){
	header('Location: 404.php');
}


$userProfileData = get('id,username,email,password', 'admins', 'id', $id);





?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<div class="container">
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'admin-nav.php'; ?>
<br><br>
<?php if($id == $adminId){ ?>
	<a class="waves-effect waves-light btn" href="admin-edit-profile.php?id=<?php echo $adminId ; ?>""><i class="material-icons left"></i>Edit Profile</a>
<?php } ?>
<div class="row">

      <div class="row">
        <div class="input-field col s6">
          <input id="username" type="text" class="validate" disabled="" value="<?php echo $userProfileData['username']; ?>">
          <label for="username" class="active">Username</label>
        </div>
        <?php if($id == $adminId){ ?>
        <div class="input-field col s6">
          <input id="email" type="email" class="validate" disabled="" value="<?php echo $userProfileData['email']; ?>">
          <label for="email" class="active">Email-Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" value="" disabled="">
          <label for="password" class="active">Password</label>
        </div>
      </div>
        <?php } ?>
      
      </div>
    
  </div>
  </div>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

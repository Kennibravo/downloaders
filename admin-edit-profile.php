<?php 


require_once $currentDir . $ds .  'admin-helper.php';
require_once $currentDir . $ds . 'includes' . $ds . 'validation.php';

$id = $_GET['id'];
if($id != $adminId){
  header('Location: 404.php');
}



if(isset($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['email'])){
	$username = validateData($_POST['username']);
	$password = validateData($_POST['password']);
	$password_hash = md5(validateData($password));
	$confirm_password = validateData($_POST['confirm_password']);
	$email = validateData($_POST['email']);

	if(!empty($username) || !empty($password) || !empty($confirm_password) || !empty($email)){

		if($password == $confirm_password && !$password){
			$query = "UPDATE admins SET username = '$username', password = '$password_hash', email = '$email' WHERE id = '$adminId'";
			$query_run = mysqli_query($db, $query);


			if(mysqli_affected_rows($db) == 1){
				header('Location: profile.php?id=$adminId');
				echo "OK";
			}else{
				echo "Sorry, there are some problems with your data";
			}
		}else{
			echo "Password fields does not match";
		}

	}else{
		echo "Please fill in all inputs correctly!";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
<div class="container">
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'admin-nav.php'; ?>
<br><br>
	<form action="" method="POST">
	<div class="row">

      <div class="row">
        <div class="input-field col s6">
          <input id="username" type="text"  value="<?php echo $adminProfileData['username']; ?>" name="username" disabled="">
          <label for="username" class="active">Username</label>
        </div>
        <div class="input-field col s6">
          <input id="email" type="email"  value="<?php echo $adminProfileData['email']; ?>" name="email" disabled="">
          <label for="email" class="active">Email-Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password">
          <label for="password" class="active">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="confirm_password">
          <label for="confirm_password" class="active">Confirm Password</label>
        </div>
      </div>
      
      </div>

      <input class="waves-effect waves-light btn" type="submit" value="Update"></button>
      <br><br>
  </form>
  </div>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

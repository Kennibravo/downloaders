<?php 
	$currentDir = getcwd();
	$ds = DIRECTORY_SEPARATOR;
	require_once $currentDir . $ds .   'includes' . $ds . 'config.php';
	if(isset($_SESSION['userId'])){
		header('Location: downloads.php');
	}


if(isset($_POST['username'], $_POST['password'], $_POST['confirm_password'], $_POST['email'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_hash = md5($password);
	$confirm_password = $_POST['confirm_password'];
	$email = $_POST['email'];

	if(!empty($username) || !empty($password) || !empty($confirm_password) || !empty($email)){
		$query = "SELECT * FROM users WHERE username = '$username'";
		$query_run = mysqli_query($db, $query);

		if(mysqli_num_rows($query_run) == 1){
			echo 'Username: <strong> ' . $username . '</strong>' . ' is taken already';
		}else{
			if($password == $confirm_password){
				$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email',  '$password_hash')";
				$query_run = mysqli_query($db, $query);

				if($query_run){
					echo "User registered successfully";
				}else{
					echo mysqli_error($db);
				}

			}else{
				echo "Both password fields must be equal";
			}
		}
	}else{
		echo "All fields should be filled";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>
<form action="" method="POST">
<label for="username">Username</label>
<input type="text" name="username">

<label for="email">Email</label>
<input type="email" name="email">

<label for="password">Password</label>
<input type="password" name="password">


<label for="password">Password</label>
<input type="confirm_password" name="confirm_password">

<input type="submit" value="Register">

</form>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

<?php 
	$currentDir = getcwd();
	$ds = DIRECTORY_SEPARATOR;
  require_once $currentDir . $ds .   'includes' . $ds . 'config.php';
  require_once $currentDir . $ds . 'includes' . $ds . 'validation.php';
	if(isset($_SESSION['userId'])){
		header('Location: downloads.php');
	}
	
	if(isset($_POST['username'], $_POST['password'])){
		$username = validateData($_POST['username']);
		$password = validateData($_POST['password']);
		$password_hash = md5(validateData($password));
    
    
		if(!empty($username) && !empty($password)){	
			if(strlen($username) >= 6 && strlen($password) >= 6){
				$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password_hash'";
				$query_run = mysqli_query($db, $query);

				$userId = 0;

				if(mysqli_num_rows($query_run) == 1){
					while($row = mysqli_fetch_assoc($query_run)){
						$userId  = $row['id'];
					}
					$_SESSION['userId'] = $userId;
					if($_SESSION['userId']){
						header("Location: index.php");
					}
				}else{
					echo "NO";
				}



			}else{
				echo "Username/password must be 6 letter longs";
			}
		}else{
			echo "Please fill in all fields";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>


  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <!-- <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" /> -->
      <div class="section"></div>

      <h5 class="indigo-text">User, Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input type='text' name='username' id='username' />
                <label for='username'>Enter your Username</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="#!">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

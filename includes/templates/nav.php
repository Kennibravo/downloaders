    <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Downloader</a>
      <?php if(isset($_SESSION['userId'])){ ?>
      <ul class="right hide-on-med-and-down">
       
        <li><a href="profile.php?id=<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="downloads.php">Downloads</a></li>
        <?php if(isset($_SESSION['adminId'])){?>
        <li><a href="dashboard.php">Dashboard</a></li>
        <?php } ?>
      
      </ul>
        <?php }else{?>
             <ul class="right hide-on-med-and-down">
       
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      
      </ul>

        <?php } ?>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

        
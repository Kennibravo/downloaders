<?php 

$currentDir = getcwd();
        $ds = DIRECTORY_SEPARATOR;
        
	 	require_once   $currentDir . $ds  . 'admin-helper.php';


 $query = "SELECT dct.download_count AS download_count, dct.last_downloaded AS last_downloaded, u.id AS id, u.name AS name, u.real_name AS real_name, u.size AS size, u.date_added AS date_added, us.username AS username , us.id AS user_id FROM uploads AS u  JOIN downloads_count AS dct ON  dct.upload_id = u.id INNER JOIN users AS us ON u.user_id = us.id";

    $query_run = mysqli_query($db, $query);

        $downloads = [];
        if(mysqli_num_rows($query_run) > 0){
            while($row = mysqli_fetch_assoc($query_run)){
                $downloads[] = $row;
            }

  }else{
      header('Location: 404.php');
  }
  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<div class="container">
	<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'admin-nav.php'; ?>

 <h1>List of User's Uploads</h1>
 
 
    <!-- <div class="collection">
        <a class="collection-item" href="view-downloads.php?downid=<?php echo $download['id']; ?>"><?php echo $download['real_name']; ?></a>
        <a class="waves-effect waves-light btn" href="/">Delete</a>
        
              <span class="badge"><?php echo $download['download_count']; ?> Downloads</span>

      </div> -->




      <table class="striped highlight centered responsive-table">
        <thead>
         
          <tr>
                <th>ID</th>
              <th>Name</th>
              <th>Real Name</th>
              <th>URL</th>
              <th>Action(s)</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        <?php 
    foreach($downloads AS $download) {
  ?>
          <tr>
            <td><?php echo $download['id']; ?></td>
            <td><a href="view-downloads.php?downid=<?php echo $download['id']; ?>"><?php echo $download['name']; ?></a></td>
            <td><?php echo $download['real_name']; ?></td>
            <td><?php echo $download['name']; ?></td>
            <td><a class="waves-effect waves-light btn">Delete</a></td>
            <td><a class="waves-effect waves-light btn">Hide</a></td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
            


    
    
      </div>



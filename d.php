<?php 

require_once $currentDir . $ds .  'helpers.php';


 if(!isset($_GET['i'])){
	header('Location: downloads.php');	
}else{

$ii = $_GET['i'];
$query = "SELECT u.id AS id, u.name AS name, u.real_name AS real_name, u.size AS size, u.date_added AS date_added, us.username AS username FROM uploads AS u INNER JOIN users AS us ON u.user_id = us.id WHERE u.id = '$ii'";

$query_run = mysqli_query($db, $query);
}
$downloads = [];
  if(mysqli_num_rows($query_run) > 0){
    forceDownload($downloads[0]['name']);

      while($row = mysqli_fetch_assoc($query_run)){
        $downloads[] = $row;
        
      }
     $id = $downloads[0]['id'];
      $query = "SELECT dc.download_count AS dcount FROM downloads_count AS dc INNER JOIN uploads AS up ON dc.upload_id = up.id WHERE up.id = '$id'";
      $query_run = mysqli_query($db, $query);

    $dcount = [];
     while($row = mysqli_fetch_assoc($query_run)){
        $dcount[] = $row;
        
      }
      $download_count = $dcount[0]['dcount'];
      $download_count++;

      $query = "UPDATE downloads_count SET download_count = '$download_count', last_downloaded = NOW() WHERE downloads_count.upload_id = '$id'";
      $query_run = mysqli_query($db, $query);

      if($query_run){
        echo "Downloaded successfully";
      }

  }else{
    header('Location:404.php');
  }




  

  



?>

<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'head.php'; ?>
<body>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>
</body>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>
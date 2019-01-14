<?php
  require_once $currentDir . $ds .  'helpers.php';


 $query = "SELECT dct.download_count AS download_count, dct.last_downloaded AS last_downloaded, u.id AS id, u.name AS name, u.real_name AS real_name, u.size AS size, u.date_added AS date_added, us.username AS username , us.id AS user_id FROM uploads AS u  JOIN downloads_count AS dct ON  dct.upload_id = u.id INNER JOIN users AS us ON u.user_id = us.id";

$query_run = mysqli_query($db, $query);
  $downloads = [];
  if(mysqli_num_rows($query_run) > 0){
      while($row = mysqli_fetch_assoc($query_run)){
        $downloads[] = $row;
      }

  }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Downloads</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

  <body>
  <?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>
    <div class="container">
<div class="row">
    <form class="col s12" action="search.php" method="GET">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">search</i>
          <input id="icon_prefix" type="text" class="validate" name="q">
          <label for="icon_prefix">Search</label>
          </div>
          </form>

        </div>
        </div>
      <h1>Latest Uploads</h1>  
<?php 
foreach($downloads as $download){
?>
  

<ul class="collapsible">
  <li>
    <div class="collapsible-header">
      <i class="material-icons">filter_drama</i>
      <a href="view-downloads.php?downid=<?php echo $download['id']; ?>"><?php echo $download['real_name']; ?></a>
      <span class="badge"><?php echo $download['download_count']; ?> Downloads</span></div>
  </li>
</ul>

<?php } ?>
</div>

<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

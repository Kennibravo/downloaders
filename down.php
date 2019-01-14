<?php
  require_once 'helpers.php';


  $query = "SELECT u.id AS id, u.name AS name, u.real_name AS real_name, u.size AS size, u.date_added AS date_added, us.username AS username FROM uploads AS u INNER JOIN users AS us ON u.user_id = us.id ";
  $query_run = mysqli_query($db, $query);
  $downloads = [];
  if(mysqli_num_rows($query_run) > 0){
      while($row = mysqli_fetch_assoc($query_run)){
        $downloads[] = $row;
      }

  }


?>

<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'head.php'; ?>

  <body>
    <div class="container">

<?php 
foreach($downloads as $download){
?>
<ul class="collapsible">
  <li>
    <div class="collapsible-header">
      <i class="material-icons">filter_drama</i>
      <a href="upload.php?downid=<?php echo $download['id']; ?>" download="<?php echo $download['name']; ?>"><?php echo $download['real_name']; ?></a>
      <span class="new badge">4</span></div>
    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
  </li>
</ul>

<?php } ?>
</div>

<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

<?php 

require_once $currentDir . $ds .  'helpers.php';

if(isset($_GET['q'])){
    $searchText = $_GET['q'];

    if(!empty($searchText)){
        $query = "SELECT * FROM uploads WHERE real_name LIKE '%$searchText%'";
        $query_run = mysqli_query($db, $query);

        if(mysqli_num_rows($query_run) > 0){
            $searchResults = [];  
            while($row = mysqli_fetch_assoc($query_run)){
                $searchResults[] = $row;
            }
           
        }
        $noOfSearchResults = mysqli_num_rows($query_run);
      
    }else{
        echo "Your search query is empty!";
    }
}else{
        echo "You must enter a search query please";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Search Result | <?php echo $searchText; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<div class="container">
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>
    <?php 
    echo '<strong>' . $noOfSearchResults . ' Results found!</strong> ';
if(mysqli_num_rows($query_run) > 0){
foreach($searchResults as $searchResult){
?>
<ul class="collapsible">
  <li>
    <div class="collapsible-header">
      <i class="material-icons">filter_drama</i>
      <a href="view-downloads.php?downid=<?php echo $searchResult['id']; ?>"><?php echo $searchResult['real_name']; ?></a>
      <span class="new badge">4</span></div>
    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
  </li>
</ul>

<?php } }?>
</div>
</div>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

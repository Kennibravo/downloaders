<?php 

require_once $currentDir . $ds .  'helpers.php';

if(isset($_SESSION['adminId'])){
  $adminId = $_SESSION['adminId'];
  $admin = get('username,id', 'admins', 'id', $adminId);
  $adminProfileData = get('id,username,email,password', 'admins', 'id', $adminId);
}


if(!isset($_GET['downid'])){
	header('Location: downloads.php');	
}else{

$dId = $_GET['downid'];
$query = "SELECT dct.download_count AS download_count, dct.last_downloaded AS last_downloaded, u.id AS id, u.name AS name, u.real_name AS real_name, u.size AS size, u.date_added AS date_added, us.username AS username , us.id AS user_id FROM uploads AS u  JOIN downloads_count AS dct ON  dct.upload_id = u.id INNER JOIN users AS us ON u.user_id = us.id WHERE u.id = $dId";

$query_run = mysqli_query($db, $query);


$downloads = [];
  if(mysqli_num_rows($query_run) > 0){
      while($row = mysqli_fetch_assoc($query_run)){
        $downloads[] = $row;
      }


  }else{
      header('Location: 404.php');
  }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> View Downloads | <?php echo $downloads[0]['real_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

                            <body>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>
<div class="container">

  <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><strong>Name: </strong><?php echo $downloads[0]['real_name']; ?></span>
            <span class="card-title"><strong>Date Uploaded: </strong><?php echo $downloads[0]['date_added']; ?></span>
            <span class="card-title"><strong>Size: </strong><?php echo formatBytes($downloads[0]['size']); ?></span>
            <span class="card-title"><strong>Uploaded by: </strong><a href="profile.php?id=<?php echo $downloads[0]['user_id']; ?>"><?php echo $downloads[0]['username']; ?></a></span>
            <span class="card-title"><strong>Download Count: </strong><?php echo $downloads[0]['download_count']; ?></span>
            <span class="card-title"><strong>Last Downloaded on: </strong><?php echo $downloads[0]['last_downloaded']; ?></span>
            



        </div>
        <div class="card-action">
 <a class="waves-effect waves-light btn-small" href="d.php?i=<?php echo $downloads[0]['id']; ?>"><i class="material-icons right">cloud</i>Download Now</a>
        </div>
      </div>
    </div>
  </div>
            
     </div>   
      
     <div id="disqus_thread"></div>
<script>

/*
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
*/


var disqus_config = function () {
this.page.url = "<?php echo $_SERVER['REQUEST_URI']; ?>";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "<?php echo $downloads[0]['id']; ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://downloads-5.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
      <script id="dsq-count-scr" src="//downloads-5.disqus.com/count.js" async></script>
     
     <?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

<?php
	require_once 'includes/config.php';

	if (isset($_GET['submit'])) {

		$db = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

		$user_query = mysqli_real_escape_string($db, strip_tags(trim($_GET['download-search'])));

		$query = "SELECT download_title, download_url FROM downloads WHERE download_title LIKE '%$user_query%' AND download_visibility = 'visible' ORDER BY download_stamp DESC LIMIT 10";

		$data = mysqli_query($db, $query);		
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Downloads</title>
		<link rel="stylesheet" href="downloads.css" />
	</head>

	<body>
		<h1 class="page-title">Downloads</h1>
		<span class="page-subtitle">Excellent documents to download...</span>

		<form id="download-search-form" action="search-downloads.php" method="GET">
			<input type="search" name="download-search" value="" />
			<input type="submit" value="" />
		</form>

<?php
		while ($row = mysqli_fetch_array($data)) {
?>
			<article class="download">
				<p class="download-title"><?= $row['download_title']?></p>
				<a class="download-url" href="<?= $row['download_url']; ?>">&#10084;</a>
			</article>
<?php
		}
	}
?>
	</body>

</html>
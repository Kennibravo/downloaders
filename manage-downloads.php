<?php
	require_once 'includes/config.php';

	if (isset($_POST['upload'])) {

		$report = '';

		$db = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

		$file_upload = mysqli_real_escape_string($db, strip_tags(trim($_FILES['file-upload']['name'])));

		$upload_title = mysqli_real_escape_string($db, strip_tags(trim($_POST['upload-title'])));

		$src = $_FILES['file-upload']['tmp_name'];
		$f_name = $_FILES['file-upload']['name'];
		$dst = 'uploads/' . $f_name;

		$doc_type = array('application/pdf', 'application/msword');

		if($_FILES['file-upload']['error'] == 0) {
			if ($_FILES['file-upload']['size'] < 32768000) {
				if (in_array($_FILES['file-upload']['type'], $doc_type)) {
					$move_doc = move_uploaded_file($src, $dst);

					if ($move_doc) {
						$query = "INSERT INTO downloads SET download_title = '$upload_title', download_url = SHA('$f_name')";

						$data = mysqli_query($db, $query);
						$report = "Your file was uploaded successfully!";
					}
				} else {
					$report = "Please upload a valid document type!";
				}
			} else {
				$report = "Your file size is too big!";
			}
		} else {
			$report = "Sorry, there was a problem uploading your file!";
		}
		@unlink($_FILES['file-upload']['tmp_name']);
	}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Upload Documents</title>
		<link rel="stylesheet" href="downloads.css" />
	</head>

	<body>
		<section id="upload-docs">
			<h1 class="page-title">Upload New Documents</h1>

			<p id="report">
				<?php
					if(!empty($report)) echo $report;
				?>
			</p>

			<form id="upload-form" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
				<input type="text" name="upload-title" placeholder="Enter the document title" />

				<input type="file" name="file-upload" />

				<input type="submit" name="upload" value="upload" />
			</form>
		</section>


		<section id="uploaded-docs">
			<?php
				require_once 'downloads.php';
			?>
		</section>

	</body>
</html>

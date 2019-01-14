<?php
		$currentDir = getcwd();
        $ds = DIRECTORY_SEPARATOR;
        
	 	require_once   $currentDir . $ds  . 'admin-helper.php';
        


	if(isset($_POST['submit'])){
		if(isset($_FILES['file']) && !empty($_POST['desc']) ){
			$file = $_FILES['file'];
			$target_dir = $currentDir . $ds . 'uploads/';
			$target_file = $target_dir . round(microtime(true) * 1000) . basename($file["name"]);
			//echo $target_file;
			$real_download_name = basename($file["name"]);
			$file_size = $file['size'];
			//$username = $admin['username'];
			$date_added = date('l jS \of F Y h:i:s A');
			 
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	$query = "INSERT INTO uploads (name, real_name, user_id, size, date_added) VALUES ('$target_file', '$real_download_name', '$adminId', '$file_size', '$date_added')";
		$query_run = mysqli_query($db, $query);
		$lastInsertedId = mysqli_insert_id($db);
		if($query_run){
					$query = "INSERT INTO downloads_count (upload_id, download_count, last_downloaded) VALUES('$lastInsertedId', 0, NOW() )";
					$query_run = mysqli_query($db, $query);
					if($query_run){
						echo "All worked!";
					}
					echo "Uploads added successfully!";
		}else{
					echo "Sorry your files cannot be saved into the database";
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
		}else{
			echo "Please choose a file and upload and give a description too";
		}
	}

	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upload Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>


	<body>
	<div class="container">
	<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'admin-nav.php'; ?>
		<h1 class="page-title">Upload Files</h1>

		<form id="download-search-form" action="" method="POST" enctype="multipart/form-data" class="col s12">

			<div class="file-field input-field">
			<div class="btn">
			<span>File to upload</span>

			<input type="file" name="file">
				
				
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
			</div>

			<label for="desc">FileName</label>
			<input type="text" name="desc">
		
			<input type="submit" value="Upload" name="submit" class="waves-effect waves-light btn"/>
		</form>
		<br><br>
</div>

<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

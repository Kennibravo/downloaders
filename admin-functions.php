<?php
$currentDir = getcwd();
$ds = DIRECTORY_SEPARATOR;
require_once $currentDir . $ds .   'includes' . $ds . 'config.php';

function check(){
	if(isset($_SESSION['adminId'])){
		return true;
	}else{
		return false;
	}
}


function get($data, $table, $where, $to){
	global $db;
	$query = "SELECT $data FROM $table WHERE $where = $to";
	$query_run = mysqli_query($db, $query);

	$datArray = [];
	if(mysqli_num_rows($query_run) > 0){
		while($row = mysqli_fetch_assoc($query_run)){
			$datArray = $row;
		}

		return $datArray;
	}


}

function forceDownload($filename, $type = "application/octet-stream") {
    header('Content-Type: '.$type.'; charset=utf-8');
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	
	return true;
	
}

?>
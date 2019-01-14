<?php
	ob_start();
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	/**
	 *The database connection configuration parameters.
	 */
	define('HOST', 'localhost:3306');
	define('USERNAME', 'kennibravo');
	define('PASSWORD', 'toyosi');
	define('DB', 'downloads');

	$db = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

	?>
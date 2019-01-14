<?php 
$currentDir = getcwd();
$ds = DIRECTORY_SEPARATOR;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>404 | Page Not Found </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/gfont.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'nav.php'; ?>
<h1>Can't find what you are looking for!</h1> 


<?php require_once $currentDir . $ds . 'includes' . $ds . 'templates' . $ds . 'footer.php'; ?>

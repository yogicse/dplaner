<?php 
$path = realpath(__DIR__.'/..');

include_once $path.'/settings.php';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );
if(!$connection){
    die("Database connection error: " . mysqli_last_error($connection));
}
?>
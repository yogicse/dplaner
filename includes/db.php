<?php 
$path = realpath(__DIR__.'/..');

include_once $path.'/settings.php';

$conStr = "host=" . DB_HOST . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS;

$connection = mysqli_connect(DB_HOST, DB_USER, "", DB_NAME );
if(!$connection){
    die("Database connection error: " . mysqli_last_error($connection));
}
?>
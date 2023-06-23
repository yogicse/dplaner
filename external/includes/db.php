<?php 
include '../settings.php';

$conStr = "host=" . DB_HOST .  " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS;

$connection = pg_pconnect("host=" . DB_HOST .  " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS);

if(!$connection){
    die("Database connection error: " . pg_last_error($connection));
}
?>
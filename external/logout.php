<?php session_start(); 
$_SESSION['uid'] = null;
$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['role'] = null;

header("Location: ../login.php");

?>
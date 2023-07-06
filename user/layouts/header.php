<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
include_once '../includes/db.php';


if (empty($_SESSION['role'])) {
    header("Location: /login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=(isset($page_title) && !empty($page_title)) ? $page_title." - " : ""?>Time Sheet</title>
    <link href="/assets/back/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="/assets/back/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/css/plugins/morris.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/assets/back/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/back/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/assets/ckeditor/samples/js/readonlyeditor.js"></script>
    <link href="/assets/back/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
   

</head>

<body id="page-top">

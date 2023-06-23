<?php

include_once '../includes/db.php';

ob_start();
if (!isset($_SESSION)) {
    session_start();
}
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

    <title><?=(isset($page_title) && !empty($page_title)) ? $page_title." - " : ""?> Legal CMS Administration</title>

    <link href="/assets/back/kendo/js/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/back/kendo/js/kendo.blueopal.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/back/kendo/js/kendo.ext.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/back/kendo/js/BridgeCRM.min.css" rel="stylesheet" type="text/css" />


    <link href="/assets/back/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/css/sb-admin.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/css/plugins/morris.css" rel="stylesheet" type="text/css">
    <link href="/assets/back/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="/assets/back/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/back/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/assets/ckeditor/samples/js/readonlyeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <style>
        .bulk_options {
            margin-bottom: 20px;
            margin-left: 1px;
        }

        .enable_color {
            color: forestgreen;
        }

        .disable_color {
            color: red;
        }

        .archive_color {
            color: gray;
        }        
    </style>


</head>

<body>
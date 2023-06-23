<?php include 'db.php';
include 'functions.php';
ob_start();
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['role'])){
if($_SESSION['role'] == 'Client'){
        header("Location: /client/index.php");
    }
}
else {
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

    <title>Legal CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css"  rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css"  rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css"  rel="stylesheet" type="text/css">
    <link href="css/style.css"  rel="stylesheet" type="text/css">
    <link href="css/plugins/morris.css"  rel="stylesheet" type="text/css">
     
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
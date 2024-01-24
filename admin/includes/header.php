<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../includes/db.php"); ?>
<?php include("./functions.php"); ?>

<?php


if (!isset($_SESSION['user_role'])) {
    header("Location: ../index.php");
} else if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Subscriber") {
    header("Location: ../index.php");
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

    <title>Brokerage System Admin</title>

    <!-- Bootstrap  CSS 3.3.2 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/styles.css">

    <!-- loader icon -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script src="js/jquery.js"></script>



</head>

<body>
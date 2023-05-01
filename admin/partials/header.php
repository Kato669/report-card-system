<?php  
    include_once('constants.php'); 
    include_once('not-loggedin.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Student Report Management System </title>
    <link rel="icon" href="../img/adminlogo.png">
    <!-- bootstrap css -->
    <!-- toast code -->
    <link rel="stylesheet" href="../toarst/toastr.min.css">
    <!-- //fontawesome -->
    <script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="left">
            <div class="text">
                <p>SRMS | admin</p>
            </div>
            <div class="icons">
                 <i class="fa-solid fa-user"></i>
            </div>
        </div>
        <div class="right">
            <p>
                <a href="./logout.php" style="text-decoration: none">
                    <span><i class="fa-solid fa-right-from-bracket"></i></span>
                    <span id="logout">logout</span>
                </a>
            </p>
        </div>
    </div>
<!-- toastr -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../toarst/toastr.min.js"></script>



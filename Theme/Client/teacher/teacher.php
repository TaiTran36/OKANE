<?php
session_start();
if(!isset($_SESSION['full_name']) || $_SESSION['full_name'] == NULL){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>OKANE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body,h1,h2,h3,h4,h5,h6{font-family: "Lato", sans-serif}
        .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
        .w3-menu{position: fixed !important;}
        footer{background-color: #242424}
        a{text-decoration: none !important}
        li{list-style-type: none;}
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="w3-display-container">
    <header>
        <?php include('layout/header.php'); ?>
    </header>
</div>
<section>
    <div class="w3-display-container">
        <?php include('layout/list_menu.php'); ?>
    </div>
    <div class="w3-col w3-right w3-padding-64 contant" id = "contant" style="width: 80%;height:auto;">
        <div id="list_job">
            <?php
            if(isset($_REQUEST['detail'])){
                $detail = $_REQUEST['detail'];
                if($detail == 'detail_request'){
                    include('list_detail.php');
                }
                if($detail == 'assignment'){
                    include('assignment.php');
                }
                if($detail == 'list_student_register'){
                    include('list_student_register.php');
                }
                if($detail == 'list_student_unassigned'){
                    include('list_student_unassigned.php');
                }
                if($detail == 'list_ability'){
                    include('list_ability.php');
                }
            }else{
                include('layout/content.php');
            }
            ?>
        </div>
    </div>
</section>


<script>
    function myFunction() {
        var x = document.getElementById("list");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['full_name']) && $_SESSION['full_name'] != NULL){
    unset($_SESSION['full_name']);
    header('Location: ../../Theme/Client/index.php');
}
if(isset($_SESSION['organization_name']) && $_SESSION['organization_name'] != NULL){
    unset($_SESSION['organization_name']);
    header('Location: ../../Theme/Client/index.php');
}
?>
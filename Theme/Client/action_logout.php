<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
    unset($_SESSION['username']);
    header('index.php');
    header('Location: index.php');
}
?>

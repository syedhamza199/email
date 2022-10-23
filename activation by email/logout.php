<?php
    session_start();

    session_destroy();

    if(!isset($_SESSION['Name'])){
        header('location:login.php');
    }
?>
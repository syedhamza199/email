<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $db = "upload";

    $connect = mysqli_connect($server,$username, $password,$db);

    if(!$connect){
        echo 'connection unsuccessfull';
    }
?>
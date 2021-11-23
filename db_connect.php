<?php
    $host = 'localhost';
    $user = 'root';
    $password = '1234';
    $database = 'userinfo';
    $port = '3307';

    $connect = mysqli_connect($host, $user, $password, $database, $port) or die("fail : " . mysqli_connect_error());
?>
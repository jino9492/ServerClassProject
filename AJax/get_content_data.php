<?php
    include("../db_connect.php");
    $data = $_POST['data'];
    $userID = $_POST['userID'];

    $update = "UPDATE userContent SET content='$data' WHERE userID='$userID'";
    $result = mysqli_query($connect, $update);
    echo "<script>alert('$userID')</script>";
?>
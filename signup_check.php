<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'wjdwlsdh112';
    $database = 'userInfo';

    $connect = mysqli_connect($host, $user, $password, $database) or die("fail");

    session_start();
    $email = addslashes($_POST['userEmail']);
    $id = addslashes($_POST['userID']);
    $pw = addslashes($_POST['userPW']);
    #null instance chk
    if(!$id || !$pw)
    {
        echo "<script>alert('No NULL values...');history.back();</script>";
        exit();
    }

    $pw_hash = hash("sha256",addslashes($_POST['userPW']));
    #same id check
    $chk = "SELECT * FROM user WHERE userID='$id'";
    $res = mysqli_query($connect,$chk);
    $num = mysqli_num_rows($res);

    if ($num != 0) {
        echo "<script>alert('ID already Exists...');history.back();</script>";
        exit();
    }
    else{
        $query = "INSERT INTO user VALUES ('$email', '$id', '$pw_hash')";
        mysqli_query($connect,$query);
        echo "<script>alert('join successfully')</script>";
        #login 처리
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }

    mysqli_close($connect);

?>
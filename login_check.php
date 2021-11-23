<?php
    session_start();
    #DB connect
    include("db_connect.php");

    $id = addslashes($_POST['userID']);
    $pw = addslashes($_POST['userPW']);
    #null instance chk
    if(!$id || !$pw){
        echo "<script>alert('NULL value NOT allowed.');history.back();</script>";
    }
    $pw_hash = hash("sha256",addslashes($_POST['userPW']));
    $query = "SELECT 'userID' FROM user WHERE userID='$id' and userPW='$pw_hash'";
    $res = mysqli_query($connect,$query);
    $num = mysqli_num_rows($res);
    #login process
    if($num == 1){
        $_SESSION['userID']=$id;
        if(isset($_SESSION['userID'])){
            echo "<script>alert('login as $id')</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }
        else {
            echo "login fail...";
        }
    }
    else if ($num==0){
        echo "<script>alert('NO SUCH ID OR WRONG PW');history.back();</script>";
    }
    else{
        echo "<script>alert('ERROR...Contact ADMIN')</script>";
    }
    
    mysqli_close($connect);

 ?>